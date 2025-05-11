@extends('admin.layouts.master')

@section('title')
    Shop Page
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Shop Page
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.shop-page.update', $shopPage->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Shop Page Information</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="banner_title">Banner Title</label>
                                    <input id="banner_title" name="banner_title" placeholder="Enter Banner Title" type="text" class="form-control" value="{{ $shopPage->banner_title }}" required>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="banner_image" class="form-label">Banner Image</label>
                                        <input class="form-control" type="file" name="banner_image" id="banner_image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="banner_image" class="form-label">Banner Preview Image</label>
                                    <div class="mb-3">
                                        @if ($shopPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $shopPage->banner_image)))
                                            <img src="{{ asset('assets/uploads/cms-pages/' . $shopPage->banner_image) }}" class="rounded me-2" title="Site Logo" width="150" height="120" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>

                                <div class="row col-lg-12">
                                    <div class="mb-3">
                                        <label for="banner_desc" class="form-label">Banner Description</label>
                                        <textarea type="text" class="form-control" name="banner_desc" placeholder="Enter Banner Description" id="banner_desc">{{ $shopPage->banner_desc }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Meta Data</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                   
                        <div class="p-4 border-top">
                            <div class="row col-sm-12">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_title">Meta Title</label>
                                        <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $shopPage->meta_title }}">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                        <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $shopPage->meta_keywords }}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $shopPage->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col text-end">
                <button class="btn btn-primary" type="submit">Update Form Information</button>
            </div>
        </div>
    </form>
@endsection
  
@section('scripts')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
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
                        width: 100,
                        height: 100,
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

