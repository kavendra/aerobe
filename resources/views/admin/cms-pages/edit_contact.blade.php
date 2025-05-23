@extends('admin.layouts.master')

@section('title')
    Contact Page
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Contact Page
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.contact-page.update', $contactPage->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Global Information</h5>
                                   <!--  <p class="text-muted text-truncate mb-0">Fill all information below</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="glb_call_us_today">Call US Today</label>
                                        <input id="glb_call_us_today" name="glb_call_us_today" placeholder="Enter Banner Title" type="text" class="form-control" value="{{ $contactPage->glb_call_us_today }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="glb_tech_support_email" class="form-label">Tech Support Email</label>
                                        <input class="form-control" type="text" name="glb_tech_support_email" id="glb_tech_support_email" placeholder="Enter Tech Support Email" value="{{ $contactPage->glb_tech_support_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="glb_chat_with_us_email" class="form-label">Chat With Us Email</label>
                                        <input class="form-control" type="text" name="glb_chat_with_us_email" id="glb_chat_with_us_email" placeholder="Enter Chat With Us Email" value="{{ $contactPage->glb_chat_with_us_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="glb_enquiry_email" class="form-label">Enquiry Email</label>
                                        <input class="form-control" type="text" name="glb_enquiry_email" id="glb_enquiry_email" placeholder="Enter Enquiry Email" value="{{ $contactPage->glb_enquiry_email }}">
                                    </div>
                                </div>
                         
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="glb_company_name">Company Name</label>
                                        <input id="glb_company_name" name="glb_company_name" placeholder="Enter Company Name" type="text" class="form-control" value="{{ $contactPage->glb_company_name }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="glb_company_address" class="form-label">Company Address</label>
                                        <textarea type="text" class="form-control" name="glb_company_address" placeholder="Enter Company Address" id="glb_company_address">{{ $contactPage->glb_company_address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Singapore Information</h5>
                                   <!--  <p class="text-muted text-truncate mb-0">Fill all information below</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sg_call_us_today">Call US Today</label>
                                        <input id="sg_call_us_today" name="sg_call_us_today" placeholder="Enter Banner Title" type="text" class="form-control" value="{{ $contactPage->sg_call_us_today }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="sg_tech_support_email" class="form-label">Tech Support Email</label>
                                        <input class="form-control" type="text" name="sg_tech_support_email" id="sg_tech_support_email" placeholder="Enter Tech Support Email" value="{{ $contactPage->sg_tech_support_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="sg_chat_with_us_email" class="form-label">Chat With Us Email</label>
                                        <input class="form-control" type="text" name="sg_chat_with_us_email" id="sg_chat_with_us_email" placeholder="Enter Chat With Us Email" value="{{ $contactPage->sg_chat_with_us_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="sg_enquiry_email" class="form-label">Enquiry Email</label>
                                        <input class="form-control" type="text" name="sg_enquiry_email" id="sg_enquiry_email" placeholder="Enter Enquiry Email" value="{{ $contactPage->sg_enquiry_email }}">
                                    </div>
                                </div>
                         
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sg_company_name">Company Name</label>
                                        <input id="sg_company_name" name="sg_company_name" placeholder="Enter Company Name" type="text" class="form-control" value="{{ $contactPage->sg_company_name }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="sg_company_address" class="form-label">Company Address</label>
                                        <textarea type="text" class="form-control" name="sg_company_address" placeholder="Enter Company Address" id="sg_company_address">{{ $contactPage->sg_company_address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Australia Information</h5>
                                   <!--  <p class="text-muted text-truncate mb-0">Fill all information below</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="au_call_us_today">Call US Today</label>
                                        <input id="au_call_us_today" name="au_call_us_today" placeholder="Enter Banner Title" type="text" class="form-control" value="{{ $contactPage->au_call_us_today }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="au_tech_support_email" class="form-label">Tech Support Email</label>
                                        <input class="form-control" type="text" name="au_tech_support_email" id="au_tech_support_email" placeholder="Enter Tech Support Email" value="{{ $contactPage->au_tech_support_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="au_chat_with_us_email" class="form-label">Chat With Us Email</label>
                                        <input class="form-control" type="text" name="au_chat_with_us_email" id="au_chat_with_us_email" placeholder="Enter Chat With Us Email" value="{{ $contactPage->au_chat_with_us_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="au_enquiry_email" class="form-label">Enquiry Email</label>
                                        <input class="form-control" type="text" name="au_enquiry_email" id="au_enquiry_email" placeholder="Enter Enquiry Email" value="{{ $contactPage->au_enquiry_email }}">
                                    </div>
                                </div>
                         
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="au_company_name">Company Name</label>
                                        <input id="au_company_name" name="au_company_name" placeholder="Enter Company Name" type="text" class="form-control" value="{{ $contactPage->au_company_name }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="au_company_address" class="form-label">Company Address</label>
                                        <textarea type="text" class="form-control" name="au_company_address" placeholder="Enter Company Address" id="au_company_address">{{ $contactPage->au_company_address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">India Information</h5>
                                   <!--  <p class="text-muted text-truncate mb-0">Fill all information below</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="in_call_us_today">Call US Today</label>
                                        <input id="in_call_us_today" name="in_call_us_today" placeholder="Enter Banner Title" type="text" class="form-control" value="{{ $contactPage->in_call_us_today }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="in_tech_support_email" class="form-label">Tech Support Email</label>
                                        <input class="form-control" type="text" name="in_tech_support_email" id="in_tech_support_email" placeholder="Enter Tech Support Email" value="{{ $contactPage->in_tech_support_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="in_chat_with_us_email" class="form-label">Chat With Us Email</label>
                                        <input class="form-control" type="text" name="in_chat_with_us_email" id="in_chat_with_us_email" placeholder="Enter Chat With Us Email" value="{{ $contactPage->in_chat_with_us_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="in_enquiry_email" class="form-label">Enquiry Email</label>
                                        <input class="form-control" type="text" name="in_enquiry_email" id="in_enquiry_email" placeholder="Enter Enquiry Email" value="{{ $contactPage->in_enquiry_email }}">
                                    </div>
                                </div>
                         
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="in_company_name">Company Name</label>
                                        <input id="in_company_name" name="in_company_name" placeholder="Enter Company Name" type="text" class="form-control" value="{{ $contactPage->in_company_name }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="in_company_address" class="form-label">Company Address</label>
                                        <textarea type="text" class="form-control" name="in_company_address" placeholder="Enter Company Address" id="in_company_address">{{ $contactPage->in_company_address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Malaysia Information</h5>
                                   <!--  <p class="text-muted text-truncate mb-0">Fill all information below</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="my_call_us_today">Call US Today</label>
                                        <input id="my_call_us_today" name="my_call_us_today" placeholder="Enter Banner Title" type="text" class="form-control" value="{{ $contactPage->my_call_us_today }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="my_tech_support_email" class="form-label">Tech Support Email</label>
                                        <input class="form-control" type="text" name="my_tech_support_email" id="my_tech_support_email" placeholder="Enter Tech Support Email" value="{{ $contactPage->my_tech_support_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="my_chat_with_us_email" class="form-label">Chat With Us Email</label>
                                        <input class="form-control" type="text" name="my_chat_with_us_email" id="my_chat_with_us_email" placeholder="Enter Chat With Us Email" value="{{ $contactPage->my_chat_with_us_email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="my_enquiry_email" class="form-label">Enquiry Email</label>
                                        <input class="form-control" type="text" name="my_enquiry_email" id="my_enquiry_email" placeholder="Enter Enquiry Email" value="{{ $contactPage->my_enquiry_email }}">
                                    </div>
                                </div>
                         
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="my_company_name">Company Name</label>
                                        <input id="my_company_name" name="my_company_name" placeholder="Enter Company Name" type="text" class="form-control" value="{{ $contactPage->my_company_name }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="my_company_address" class="form-label">Company Address</label>
                                        <textarea type="text" class="form-control" name="my_company_address" placeholder="Enter Company Address" id="my_company_address">{{ $contactPage->my_company_address }}</textarea>
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
                                        <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $contactPage->meta_title }}">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                        <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $contactPage->meta_keywords }}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-sm-8">
                                <div class="mb-3">
                                    <label class="form-label" for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $contactPage->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<script type="text/javascript">
    setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 3000);
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
        <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("glb_company_address"), {
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
                    // Replace it on production website with other aerobe-academys:
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
                <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("sg_company_address"), {
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
                    // Replace it on production website with other aerobe-academys:
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
                <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("au_company_address"), {
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
                    // Replace it on production website with other aerobe-academys:
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
                <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("my_company_address"), {
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
                    // Replace it on production website with other aerobe-academys:
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
                <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("in_company_address"), {
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
                    // Replace it on production website with other aerobe-academys:
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
