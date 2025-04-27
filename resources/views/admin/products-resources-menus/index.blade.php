@extends('admin.layouts.master')

@section('title')
    Products Resource Menu Management
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Products Resource Menu Management
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Products Resource Menu List <a href="{{ route('admin.products-resource-menu.create') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Add New Products Resource Menu</button></a></h4>
                    
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
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        let gridInstance;
        let formattedData = [];

        function loadGrid() {
            fetch('{{ route('admin.products-resource-menu.index') }}', { // ✅ use indexdata route here
                 headers: { 
                    "X-Requested-With": "XMLHttpRequest", 
                    "Cache-Control": "no-cache" 
                },
                credentials: "include" // ✅ Ensures authentication cookies are sent
            })
            .then(response => response.json())
            .then(data => {
                formattedData = data.map(item => ({
                    name: item.label,
                    status: item.status,
                    id: item.id
                }));

                gridInstance = new gridjs.Grid({
                    columns: [
                        "Name",
                        {
                            name: "Status",
                            formatter: (cell, row) => {
                                const status = row.cells[1].data;
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
                                        <a onclick="editRecord(${row.cells[2].data})" href="javascript:void(0);" title="Edit" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        
                                        <a href="javascript:void(0);" onclick="deleteRecord(${row.cells[2].data})" title="Delete" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                    </div>
                                `);
                            }
                        }
                    ],
                    pagination: { limit: 5 },
                    sort: true,
                    search: true,
                    data: formattedData.map(item => [
                        item.name,
                        item.status,
                        item.id
                    ])
                }).render(document.getElementById("table-gridjs"));
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
                        url: "{{ url('admin/products-resource-menu') }}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (response) {
                            if (response.success === 1) {
                                formattedData = formattedData.filter(item => item.id !== id);

                                // ✅ Safely update Grid.js without reloading page
                                gridInstance.updateConfig({
                                    data: formattedData.map(item => [
                                        item.name,
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
            const editUrl = "{{ url('admin/products-resource-menu') }}/" + id + "/edit";
            window.location.href = editUrl;
        }
    </script>
@endsection
