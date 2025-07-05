@extends('admin.layouts.master')

@section('title')
    Country Management
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Country Management
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Country List <a href="{{ route('admin.country.create') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Add New Country</button></a></h4>
                    
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
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    
     <!-- Include SortableJS -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        let gridInstance;
        let formattedData = [];

        function loadGrid() {
            fetch('{{ route('admin.country.index') }}', { // ✅ use indexdata route here
                  headers: { 
                    "X-Requested-With": "XMLHttpRequest", 
                    "Cache-Control": "no-cache" 
                },
                credentials: "include" // ✅ Ensures authentication cookies are sent
            })
            .then(response => response.json())
            .then(data => {
                formattedData = data.map(item => ({
                    id: item.id,
                    name: item.label,
                    code: item.code,
                    image: item.image,
                    status: item.status,
                    id: item.id
                }));

                gridInstance = new gridjs.Grid({
                    columns: [
                        "ID",
                        "Name",
                        'Code',
                        {
                            name: "Flag",
                            formatter: (cell, row) => {
                                const logo = row.cells[3].data; // Assuming logo filename is stored in the second column
                                const defaultLogo = "/assets/images/no-image.png"; // Use a relative path or full URL

                                if (!logo) {
                                    return gridjs.html(`<img src="${defaultLogo}" class="rounded me-2" title="Site Logo" width="150" height="120" />`);
                                }

                                const logoUrl = `/assets/uploads/countries/${logo}`; // Construct URL dynamically

                                return gridjs.html(`<img src="${logoUrl}" class="rounded me-2" title="User Logo" width="150" height="120" />`);
                            }
                        },
                        {
                            name: "Status",
                            formatter: (cell, row) => {
                                const status = row.cells[4].data;
                                const color = status == 1 ? 'success' : 'danger';
                                const label = status == 1 ? 'Active' : 'Inactive';
                                return gridjs.html(`<span><span class="badge badge-pill badge-soft-${color} font-size-12">${label}</span></span>`);
                            }
                        },

                        {
                            name: "Action",
                            formatter: (cell, row) => {
                                return gridjs.html(`
                                    <div class="d-flex gap-3">
                                        <a onclick="editRecord(${row.cells[5].data})" href="javascript:void(0);" title="Edit" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        
                                        <a href="javascript:void(0);" onclick="deleteRecord(${row.cells[5].data})" title="Delete" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                    </div>
                                `);
                            }
                        }
                    ],
                    pagination: { limit: 15 },
                    sort: true,
                    search: true,
                    data: formattedData.map(item => [
                         item.id,
                        item.name,
                        item.code,
                        item.image,
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

                    // Loop through each row and assign data-id
                    tbody.querySelectorAll("tr").forEach((row, index) => {
                        // You can get the ID from a hidden column, or customize as needed
                        // Example: assuming first cell (td) has the ID
                        const idCell = row.querySelector("td"); // or use specific index: row.querySelectorAll("td")[0]
                        if (idCell) {
                            const id = idCell.textContent.trim();
                            row.classList.add("sortable-row");
                            row.setAttribute("data-id", id);
                        }
                    });

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
                            fetch("{{ route('admin.country.reorder') }}", {
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
                        url: "{{ url('admin/country') }}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (response) {
                            if (response.success === 1) {
                                formattedData = formattedData.filter(item => item.id !== id);

                                // ✅ Safely update Grid.js without reloading page
                                gridInstance.updateConfig({
                                    data: formattedData.map(item => [
                                        item.id,
                                        item.name,
                                        item.code,
                                        item.image,
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
            const editUrl = "{{ url('admin/country') }}/" + id + "/edit";
            window.location.href = editUrl;
        }
    </script>
@endsection
