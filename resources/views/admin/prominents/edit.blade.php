@extends('admin.layouts.master')

@section('title')
    Edit Prominent Customer
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Edit Prominent Customer
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.prominent.update', $prominent->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Edit Prominent Customer Information  <a href="{{ route('admin.prominent.index') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Prominent Customers Listing</button></a></h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>

                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-12">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="label">Country</label>
                                        <select id="input9" class="form-select" name="country_id" required>
                                            <option value="">Select Country</option>
                                            @if($countries->count() > 0)
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" @if($prominent->country_id == $country->id) selected @endif>{{ $country->label }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('country_id') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="label">Name</label>
                                        <input id="label" name="label" placeholder="Enter Name" type="text" class="form-control" value="{{ $prominent->label }}" required>
                                        @error('label') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="link">Link</label>
                                        <input id="link" name="link" placeholder="Enter Url" type="text" class="form-control" value="{{ $prominent->link }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="logo" id="logo" @if(empty($prominent->logo)) required @endif>
                                    </div>
                                    @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if ($prominent->logo && file_exists(public_path('assets/uploads/prominents/' . $prominent->logo)))
                                            <img src="{{ asset('assets/uploads/prominents/' . $prominent->logo) }}" class="rounded me-2" title="Logo" width="150" height="120" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Logo" width="150" height="120" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>
                         
                                <div class="col-lg-6 mb-3">
                                    <label for="input9" class="form-label">Status</label>
                                    <select id="input9" class="form-select" name="status">
                                        <option value="1" @if($prominent->label == 1) selected @endif>Active</option>
                                        <option value="0" @if($prominent->label == 0) selected @endif>Inactive</option>
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
