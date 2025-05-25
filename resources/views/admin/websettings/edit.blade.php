@extends('admin.layouts.master')

@section('title')
    Websetting
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Web Settings
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.web-setting.update', $webSetting->id) }}" enctype="multipart/form-data">
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
                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="site_name">Site Name</label>
                                    <input id="site_name" name="site_name" placeholder="Enter Site Name" type="text" class="form-control" value="{{ $webSetting->site_name }}" required>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="site_logo" class="form-label">Site Logo</label>
                                        <input class="form-control" type="file" name="site_logo" id="site_logo">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if ($webSetting->site_logo && file_exists(public_path('assets/uploads/websettings/' . $webSetting->site_logo)))
                                            <img src="{{ asset('assets/uploads/websettings/' . $webSetting->site_logo) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="site_favicon" class="form-label">Site Favicon</label>
                                        <input class="form-control" type="file" name="site_favicon" id="site_favicon">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if ($webSetting->site_logo && file_exists(public_path('assets/uploads/websettings/' . $webSetting->site_favicon)))
                                            <img src="{{ asset('assets/uploads/websettings/' . $webSetting->site_favicon) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="facebook_url" class="form-label">Facebook URL</label>
                                        <input type="text" class="form-control" name="facebook_url" id="facebook_url" placeholder="Enter Facebook URL" value="{{ $webSetting->facebook_url }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="instagram_url" class="form-label">Instagram1 URL</label>
                                        <input type="text" class="form-control" id="instagram1_url" name="instagram1_url" placeholder="Enter Instagram URL" value="{{ $webSetting->instagram1_url }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="instagram_url" class="form-label">Instagram2 URL</label>
                                        <input type="text" class="form-control" id="instagram2_url" name="instagram2_url" placeholder="Enter Instagram URL" value="{{ $webSetting->instagram2_url }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="twitter_url" class="form-label">Twitter URL</label>
                                        <input type="text" class="form-control" name="twitter_url" id="twitter_url" placeholder="Enter Twitter URL" value="{{ $webSetting->twitter_url }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="youtube_url" class="form-label">Youtube URL</label>
                                        <input type="text" class="form-control" name="youtube_url" id="youtube_url" placeholder="Enter Youtube URL" value="{{ $webSetting->youtube_url }}">
                                    </div>
                                </div>
                           
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="linkedin_url" class="form-label">Linkedin URL</label>
                                        <input type="text" class="form-control" name="linkedin_url" id="linkedin_url" placeholder="Enter Linkedin URL" value="{{ $webSetting->linkedin_url }}">
                                    </div>
                                </div>

                                <!-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pininterest_url" class="form-label">Pininterest URL</label>
                                        <input type="text" class="form-control" name="Pininterest URL" id="pininterest_url" placeholder="Enter Facebook URL" value="{{ $webSetting->pininterest_url }}">
                                    </div>
                                </div> -->
                            </div>

                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label for="footer_shortdesc" class="form-label">Footer Short Description <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="footer_shortdesc" placeholder="Enter Footer Short Desc" id="footer_shortdesc">{{ $webSetting->footer_shortdesc }}</textarea>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="copyright_text">Copyright Text</label>
                                    <textarea class="form-control" name="copyright_text" id="copyright_text" placeholder="Enter Copyright Text" rows="4">{{ $webSetting->copyright_text }}</textarea>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label for="opening_hours" class="form-label">Opening Hours<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="opening_hours" id="opening_hours" placeholder="Enter Opening Hours">{{ $webSetting->opening_hours }}</textarea>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label for="customers_in_countries" class="form-label">Customers In Countries<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customers_in_countries" id="customers_in_countries" placeholder="Enter Customers In Countries" value="{{ $webSetting->customers_in_countries }}">
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="mb-3">
                                    <label for="offices_in_countries" class="form-label">Offices In Countries<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="offices_in_countries" id="offices_in_countries" placeholder="Enter Offices In Countries" value="{{ $webSetting->offices_in_countries }}">
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
                                        <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $webSetting->meta_title }}">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                        <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $webSetting->meta_keywords }}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $webSetting->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Mail Details</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                  
                        <div class="p-4 border-top">
                            <div class="row col-lg-12">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="from_name">From Name</label>
                                        <input id="from_name" name="from_name" placeholder="Enter From Name" value="{{ $webSetting->from_name }}" type="text" class="form-control">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="from_email">From Email</label>
                                        <input id="from_email" name="from_email" placeholder="Enter From Email" type="text" value="{{ $webSetting->from_email }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="to_name">To Name</label>
                                        <input id="to_name" name="to_name" placeholder="Enter To Name" type="text" value="{{ $webSetting->to_name }}" class="form-control">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="to_email">To Email</label>
                                        <input id="to_email" name="to_email" placeholder="Enter To Email" type="text" value="{{ $webSetting->to_email }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="mail_mailer">Mail Mailer</label>
                                        <input id="mail_mailer" name="mail_mailer" placeholder="Enter Mail Mailer" type="text" value="{{ $webSetting->mail_mailer }}" class="form-control">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="mail_host">Mail Host</label>
                                        <input id="mail_host" name="mail_host" placeholder="Enter Mail Host" type="text" value="{{ $webSetting->mail_host }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="mail_port">Mail Port</label>
                                        <input id="mail_port" name="mail_port" placeholder="Enter Mail Port" type="text" value="{{ $webSetting->mail_port }}" class="form-control">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="mail_username">Mail Username</label>
                                        <input id="mail_username" name="mail_username" placeholder="Enter Mail Username" value="{{ $webSetting->mail_username }}" type="text" class="form-control">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="mail_password">Mail Password</label>
                                        <input id="mail_password" name="mail_password" placeholder="Enter Mail Password" value="{{ $webSetting->mail_password }}" type="password" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="mail_encryption">Mail Encryption</label>
                                        <input id="mail_encryption" name="mail_encryption" placeholder="Enter Mail Encryption" value="{{ $webSetting->mail_encryption }}" type="text" class="form-control">
                                    </div>
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
