@extends('admin.layouts.master')
@section('title')
    Business Vertical Management
@endsection
@section('css')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">

    <!-- Sweet Alert-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Business Vertical Management
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Business Vertical List <a href="{{ route('admin.business-vertical.create') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Add New Business Vertical</button></a></h4>
                        
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  
<!-- Include SortableJS -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<!-- Your existing script with modifications -->
<script>
let gridInstance;
let formattedData = [];

function loadGrid() {
    fetch('{{ route('admin.business-vertical.index') }}', {
        headers: { 
            "X-Requested-With": "XMLHttpRequest",
            "Cache-Control": "no-cache"
        },
        credentials: "include"
    })
    .then(response => response.json())
    .then(data => {
        formattedData = data.map(item => ({
            name: item.label,
            logo: item.logo,
            status: item.status,
            id: item.id,
           
        }));

 const gridInstance = new gridjs.Grid({
  columns: [
    "Name",
    {
      name: "Logo",
      formatter: (cell, row) => {
        const logo = row.cells[1].data;
        const defaultLogo = "/assets/images/no-image.png";
        const logoUrl = logo ? `/assets/uploads/business-verticals/${logo}` : defaultLogo;
        return gridjs.html(`<img src="${logoUrl}" class="rounded me-2" title="Logo" width="80" />`);
      }
    },
    {
      name: "Status",
      formatter: (cell, row) => {
        const status = row.cells[2].data;
        const color = status == 1 ? 'success' : 'danger';
        const label = status == 1 ? 'Active' : 'Inactive';
        return gridjs.html(`<span class="badge badge-pill badge-soft-${color} font-size-12">${label}</span>`);
      }
    },
    {
      name: "Action",
      formatter: (cell, row) => {
        return gridjs.html(`
          <div class="d-flex gap-3">
            <a onclick="editRecord(${row.cells[3].data})" href="javascript:void(0);" title="Edit" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
            <a onclick="deleteRecord(${row.cells[3].data})" href="javascript:void(0);" title="Delete" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
          </div>
        `);
      }
    }
  ],
  pagination: false,
  sort: false,
  search: true,
  data: formattedData.map(item => [
    item.name,
    item.logo,
    item.status,
    item.id
  ]),
  className: {
    tr: 'sortable-row'
  },
  rowAttributes: (rowData) => {
    return { 'data-id': rowData[3] }; // Assuming 'id' is the fourth column
  }
}).render(document.getElementById("table-gridjs"));


        // Wait a bit to ensure table is rendered before initializing Sortable
        setTimeout(() => {
            const tbody = document.querySelector("#table-gridjs table tbody");
            if (!tbody) return;

            new Sortable(tbody, {
                animation: 150,
                onEnd: function () {
                    let order = [];
                    tbody.querySelectorAll(".sortable-row").forEach((row, index) => {
                        order.push({
                            id: row.getAttribute("data-id"),
                            position: index + 1
                        });
                    });

                    // Send new order to Laravel backend
                    fetch("{{ route('admin.business-vertical.reorder') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({ order: order })
                    }).then(response => {
                        if (!response.ok) console.error("Reordering failed");
                    });
                }
            });
        }, 500);
    });
}


function deleteRecord(id) {
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to delete this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#34c38f",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: "{{ url('admin/business-vertical') }}/" + id,
                data: { _token: CSRF_TOKEN },
                dataType: 'JSON',
                success: function (response) {
                    if (response.success === 1) {
                        formattedData = formattedData.filter(item => item.id !== id);

                        // ✅ Safely update Grid.js without reloading page
                        gridInstance.updateConfig({
                            data: formattedData.map(item => [
                                item.name,
                                item.logo,
                                item.status,
                                item.id
                            ])
                        }).forceRender();

                        Swal.fire("Deleted!", "Record deleted successfully.", "success");
                    } else {
                        Swal.fire("Error!", response.message, "error");
                    }
                },
                error: function () {
                    Swal.fire("Error!", "Something went wrong!", "error");
                }
            });
        }
    });
}
   
document.addEventListener('DOMContentLoaded', loadGrid);

 function editRecord(id) {
    const editUrl = "{{ url('admin/business-vertical') }}/" + id + "/edit";
    window.location.href = editUrl;
}
        </script>
       

    @endsection
