@extends('admin.layouts.master')
@section('title')
    Create Business Vertical
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Create Business Vertical
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.business-vertical.store') }}" enctype="multipart/form-data">
   
        @csrf
        @method('post')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Create Business Vertical Information  <a href="{{ route('admin.business-vertical.index') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Business Vertical Listing</button></a></h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>

                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="label">Title</label>
                                        <input id="label" name="label" placeholder="Enter Name" type="text" class="form-control" value="" required>
                                        @error('label') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="link">Link</label>
                                        <input id="link" name="link" placeholder="Enter Url" type="text" class="form-control" value="" required>
                                        @error('link') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="logo" id="logo" required>
                                        @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                {{-- Empty Column --}}
                                <div class="col-lg-6">
                                    <div class="mb-3"></div>
                                </div>
                         
                                <div class="col-lg-6 mb-3">
                                    <label for="input9" class="form-label">Status</label>
                                    <select id="input9" class="form-select" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-4">
            <div class="col text-end">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </form>
    @endsection
  

    @section('scripts')
 
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        
        <script type="text/javascript">
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000);
        </script>

        <script type="text/javascript">

        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 3000);
   
        $(document).ready(function () {
            $('input[type=file]').on('change', function (event) {
                let tmppath = URL.createObjectURL(event.target.files[0]);

                // Find the next `.col-lg-2` div and place the image inside it
                let previewContainer = $(this).closest('.col-lg-6').next('.col-lg-6').find('.mb-3');

                // Check if an image preview already exists
                let previewImage = previewContainer.find('img');
                if (previewImage.length === 0) {
                    previewImage = $('<img/>', {
                        width: 150,
                        height: 120,
                        class: 'rounded',
                        src: tmppath
                    }).appendTo(previewContainer); // Append inside .mb-3 div
                } else {
                    previewImage.attr('src', tmppath); // Update existing preview
                }
            });
        });
    </script>

@endsection
