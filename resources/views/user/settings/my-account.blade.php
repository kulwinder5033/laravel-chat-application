@extends('layouts.user')
@section("title", "My Profile | User")
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            My Profile</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">My Profile</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    @include("user.sections.flash-message")
                    <!--begin::Row-->
                    <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                        <!--begin::Col-->
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-12 mb-xl-12">
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-body">
                                <form id="accountForm" method="POST"
                        action="{{ route('superadmin.my-account.update', Auth::guard('superadmin')->id()) }}"
                        enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="name">
                                                <span class="required">Full Name</span>
                                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Full Name" value="{{ old('name', $admin->name) }}">
                                @error('name')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="email">
                                                <span class="required">Email Address</span>
                                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address" value="{{ old('email', $admin->email) }}">
                                @error('email')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="phone">
                                                <span class="required">Phone Number</span>
                                            </label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone Number" value="{{ old('phone', $admin->phone) }}">
                                @error('phone')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                        </div>
                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="avatar">
                                                <span class="required">Profile Picture</span>
                                            </label>
                                            <input type="file" class="form-control" id="avatar" name="avatar"
                                            onchange="loadPreview(this);">
                            @error('avatar')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                            <img id="preview_img" src="{{ $admin->avatar }}" class="mt-1" width="100"
                                height="100" />
                        </div>
                        <div class="text-end pt-10">

                                            <!--begin::Wrapper-->
                                            <div>
                                                <button type="submit" class="btn btn-lg btn-primary" form="accountForm">
                                                    <span class="indicator-label">Submit
                                                        <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i></span>

                                                </button>

                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                    </form>
                                    <!--begin::Content container-->

                                </div>
                            </div>
                            <!--end::Content container-->
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2025&copy;</span>
                   
                </div>
                <!--end::Copyright-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
@push('scripts')
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
