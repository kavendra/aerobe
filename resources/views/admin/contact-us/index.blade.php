@extends('admin.layouts.master')

@section('title')
    Contact Management
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Contact Management
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Contact List</h4>
                    
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
            fetch('{{ route('admin.contact-us.index') }}', { // ✅ use indexdata route here
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.json())
            .then(data => {
                formattedData = data.map(item => ({
                    name: item.name,
                    email: item.email,
                    phone: item.phone,
                    message: item.message,
                    id: item.id
                }));

                gridInstance = new gridjs.Grid({
                    columns: [
                        "Name",
                        "Email",
                        "Phone",
                        "Message",
                        {
                            name: "Action",
                            formatter: (cell, row) => {
                                return gridjs.html(`
                                    <div class="d-flex gap-3">
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
                        item.email,
                        item.phone,
                        item.message,
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
                        url: "{{ url('admin/contact-us') }}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (response) {
                            if (response.success === 1) {
                                formattedData = formattedData.filter(item => item.id !== id);

                                // ✅ Safely update Grid.js without reloading page
                                gridInstance.updateConfig({
                                    data: formattedData.map(item => [
                                        item.name,
                                        item.email,
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
            const editUrl = "{{ url('admin/contact-us') }}/" + id + "/edit";
            window.location.href = editUrl;
        }
    </script>
@endsection
