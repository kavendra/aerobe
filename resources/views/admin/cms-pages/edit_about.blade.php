@extends('admin.layouts.master')

@section('title')
    About Page
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    About Page
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.about-page.update', $aboutPage->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Website Information</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="header_heading">Header Heading</label>
                                    <input id="header_heading" name="header_heading" placeholder="Enter Header Heading" type="text" class="form-control" value="{{ $aboutPage->header_heading }}" required>
                                </div>
                            </div>

                            <div class="row col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="header_heading">Header Title</label>
                                    <input id="header_title" name="header_title" placeholder="Enter Header Title" type="text" class="form-control" value="{{ $aboutPage->header_title }}" required>
                                </div>
                            </div>

                            <div class="row col-lg-8">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="header_image" class="form-label">Header Image</label>
                                        <input class="form-control" type="file" name="header_image" id="header_image">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        @if ($aboutPage->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $aboutPage->header_image)))
                                            <img src="{{ asset('assets/cms-pagess/cms-pages/' . $aboutPage->header_image) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label for="header_desc" class="form-label">Header Description <span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="header_desc" placeholder="Enter Header Description" id="header_desc">{{ $aboutPage->header_desc }}</textarea>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="about_image" class="form-label">About Image</label>
                                        <input class="form-control" type="file" name="about_image" id="about_image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if ($aboutPage->about_image && file_exists(public_path('assets/uploads/cms-pages/' . $aboutPage->about_image)))
                                            <img src="{{ asset('assets/uploads/cms-pages/' . $aboutPage->about_image) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label for="about_desc" class="form-label">About Description <span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="about_desc" placeholder="Enter About Description" id="about_desc">{{ $aboutPage->about_desc }}</textarea>
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
                           
                                <div class="row col-sm-8">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_title">Meta Title</label>
                                            <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $aboutPage->meta_title }}">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                            <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $aboutPage->meta_keywords }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-sm-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $aboutPage->meta_description }}</textarea>
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
                <button class="btn btn-primary" type="submit">Update</button>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </form>
@endsection


@section('scripts')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 3000);
    </script>
@endsection
