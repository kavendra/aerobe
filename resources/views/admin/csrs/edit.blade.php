@extends('admin.layouts.master')

@section('title')
    Edit CSR
@endsection

@section('page-title')
    Edit CSR
@endsection

@section('body')
    <body>
@endsection

    @section('content')
     <form method="post" class="needs-validation" novalidate action="{{ route('admin.csr.update', $csr->id) }}" enctype="multipart/form-data">
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
                                    Edit CSR Information  
                                    <a href="{{ route('admin.csr.index') }}" style="float:right">
                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light">CSR Listing</button>
                                    </a>
                                </h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border-top">
                        <div class="row col-lg-8">

                            {{-- Category --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="category_id">Select Category</label>
                                    <select id="category_id" class="form-select" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $csr->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input id="title" name="title" placeholder="Enter Title" type="text" class="form-control" value="{{ old('title', $csr->title) }}" required>
                                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            
                              {{-- Title --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control" placeholder="Enter Slug" value="{{ old('slug', $csr->slug) }}" required>
                                    @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>



                            {{-- Image --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="image" id="image" @if(empty($csr->image)) required @endif>
                                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    @if(!empty($csr->image))
                                        <img src="{{ asset('assets/uploads/csrs/'.$csr->image) }}" class="rounded" height="100" width="100" />
                                    @endif
                                </div>
                            </div>

                            {{-- Short Description --}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_description" placeholder="Enter Short Description" id="short_description" required>{{ old('short_description', $csr->short_description) }}</textarea>
                                    @error('short_description') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Author Name --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="author_name">Author Name</label>
                                    <input id="author_name" name="author_name" placeholder="Enter Author Name" type="text" class="form-control" value="{{ old('author_name', $csr->author_name) }}" required>
                                    @error('author_name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Event Date --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Event Date</label>
                                    <input type="date" id="datepicker" name="event_date" class="form-control" value="{{ old('event_date', \Carbon\Carbon::parse($csr->event_date)->format('Y-m-d')) }}" required>
                                    @error('event_date') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Author Image --}}
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="author_image" class="form-label">Author Image</label>
                                    <input class="form-control" type="file" name="author_image" id="author_image">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    @if(!empty($csr->author_image))
                                        <img src="{{ asset('assets/uploads/csrs/'.$csr->author_image) }}" class="rounded" height="100" width="100" />
                                    @endif
                                </div>
                            </div>

                            {{-- Long Description --}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="long_description" class="form-label">Long Description</label>
                                    <textarea class="form-control" name="long_description" placeholder="Enter Description" id="long_description">{{ old('long_description', $csr->long_description) }}</textarea>
                                </div>
                            </div>

                              {{-- Tags --}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="tag_id" class="form-label">Select Tags</label>
                                    <div class="row">
                                        @php
                                            $selectedTags = old('tag_id', []);
                                        @endphp
                                        @foreach($tags as $tag)
                                            <div class="col-lg-2 col-md-4 col-sm-6">
                                                <div required class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="tag_id[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                                                        {{ is_array($selectedTags) && in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                                                        {{ $tag->label }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('tag_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                             {{-- Country Selection --}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Select Countries</label>
                                    <div class="row">
                                        @php($selectedCountries = old('country_id', is_array($csr->country_id) ? $csr->country_id : json_decode($csr->country_id, true))
                                        )
                                        @foreach($countries as $country)
                                            <div class="col-lg-2 col-md-4 col-sm-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="country_id[]" id="country-{{ $country->id }}" value="{{ $country->id }}"
                                                        {{ is_array($selectedCountries) && in_array($country->id, $selectedCountries) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="country-{{ $country->id }}">
                                                        {{ $country->label }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('country_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-lg-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" class="form-select" name="status">
                                    <option value="1" {{ old('status', $csr->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $csr->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Submit Button --}}
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
         <script>
            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')     // Remove special chars
                    .replace(/\s+/g, '-')             // Replace spaces with dashes
                    .replace(/-+/g, '-');             // Collapse multiple dashes
            }
        
            $(document).ready(function() {
                $('#title').on('input', function() {
                    let slug = generateSlug($(this).val());
                    $('#slug').val(slug);
                });
            });
        </script>
        <script type="text/javascript">
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000);
        </script>

        <script type="text/javascript">
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

        <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("long_description"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Enter Achievement Description',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragÃ©e', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflÃ©',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'MultiLevelList',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });
  
        </script>
@endsection
