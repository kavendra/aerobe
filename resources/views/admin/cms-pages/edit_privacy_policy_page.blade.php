@extends('admin.layouts.master')

@section('title')
    Privacy & Policy Page
@endsection

@section('page-title')
    Privacy & Policy Page
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.privacy-policy-page.update', $privacyPolicyPage->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Privacy & Policy Information</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-12">
                             
                                <div class="row col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="header_title">Header Title</label>
                                        <input id="header_title" name="header_title" placeholder="Enter Header Title" type="text" class="form-control" value="{{ $privacyPolicyPage->header_title }}" required>
                                    </div>
                                </div>
                                
                                <div class="row col-lg-6"></div>
                               
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="header_image" class="form-label">Header Image</label>
                                        <input class="form-control" type="file" name="header_image" id="header_image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if ($privacyPolicyPage->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $privacyPolicyPage->header_image)))
                                            <img src="{{ asset('assets/uploads/cms-pages/' . $privacyPolicyPage->header_image) }}" class="rounded me-2" title="Site Logo" height="120px" width="150px" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" height="120px" width="150px" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>

                                <div class="row col-lg-12">
                                    <div class="mb-3">
                                        <label for="header_desc" class="form-label">Header Description <span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="header_desc" placeholder="Enter Header Description" id="header_desc">{{ $privacyPolicyPage->header_desc }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Page Data</h5>
                                </div>
                            </div>
                        </div>
                   
                        <div class="p-4 border-top">
                            <div class="row col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="cookie_preference_desc">Privacy Page Description</label>
                                    <textarea class="form-control" id="cookie_preference_desc" placeholder="Enter Description" name="privacy_desc" rows="4">{{ $privacyPolicyPage->privacy_desc }}</textarea>
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
                                            <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $privacyPolicyPage->meta_title }}">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                            <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $privacyPolicyPage->meta_keywords }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-sm-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $privacyPolicyPage->meta_description }}</textarea>
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

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("cookie_preference_desc"), {
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
            placeholder: 'Enter Cookie Preferences Page Description',
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
