@extends('admin.layouts.master')

@section('title')
    Edit Video
@endsection

@section('page-title')
    Edit Video
@endsection

@section('body')
    <body>
@endsection

    @section('content')
      <form method="post" class="needs-validation" novalidate action="{{ route('admin.video.update', $video->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div id="addproduct-accordion" class="custom-accordion">
                <div class="card">
                    <div class="p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">
                                    Edit Video Information
                                    <a href="{{ route('admin.video.index') }}" style="float:right">
                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light">Video Listing</button>
                                    </a>
                                </h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-top">
                        <div class="row col-lg-12">

                            {{-- Category --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="product_id">Select Product</label>
                                    <select id="product_id" class="form-select" name="product_id">
                                        <option value="">Select Category</option>
                                        @foreach($ourPortfolios as $ourPortfolio)
                                            <option value="{{ $ourPortfolio->id }}" {{ old('product_id', $video->product_id) == $ourPortfolio->id ? 'selected' : '' }}>
                                                {{ $ourPortfolio->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                     @error('product_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="label">Title</label>
                                    <input id="label" name="label" placeholder="Enter Title" type="text" class="form-control" value="{{ old('label', $video->label) }}" required>
                                    @error('label') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                              {{-- Image --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="url">You Tube URL</label>
                                    <input id="url" name="url" placeholder="Enter Title" type="text" class="form-control"  value="{{ old('url', $video->url) }}" required>
                                    @error('url') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{-- Current Image --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    @if(!empty($video->url))
                                       <iframe width="150" height="120"
    src="{{ $video->url }}"
    title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen>
</iframe>

                                    @endif
                                </div>
                            </div>

                          

                            {{-- Status --}}
                            <div class="col-lg-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="1" {{ old('status', $video->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $video->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                        </div> <!-- row -->
                    </div> <!-- card body -->
                </div> <!-- card -->
            </div> <!-- accordion -->
        </div> <!-- col -->
    </div> <!-- row -->

    <div class="row mb-4">
        <div class="col text-end">
            <button class="btn btn-primary" type="submit">Update</button>
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
        </script>
@endsection
