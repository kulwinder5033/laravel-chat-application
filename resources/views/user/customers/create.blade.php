@extends('layouts.user')
@section('title', 'Add Customer | User')
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
                            Add Customer</h1>
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
                            <li class="breadcrumb-item text-muted">Add Customer</li>
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
                    @include('user.sections.flash-message')
                    <!--begin::Row-->
                    <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                        <!--begin::Col-->
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-12 mb-xl-12">
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-body">
                                    <form id="accountForm" method="POST" action="{{ route('user.customers.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="first_name">
                                                <span class="required">First Name</span>
                                            </label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                placeholder="Enter First Name" value="{{ old('first_name') }}" >
                                            @error('first_name')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                         <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="last_name">
                                                <span class="required">Last Name</span>
                                            </label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Enter Last Name" value="{{ old('last_name') }}" >
                                            @error('last_name')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                         <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="age">
                                                <span class="required">Age</span>
                                            </label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                placeholder="Enter age" value="{{ old('age') }}" max="3" min="1">
                                            @error('age')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                       
                                       
                                        <div class="fv-row mb-2 fv-plugins-icon-container">
                                            <!--begin::Email-->
                                            <label class="fs-6 fw-semibold form-label mt-3" for="domation_date">
                                                <span class="required">Date Of Birth</span>
                                            </label>
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                placeholder="Enter dob" value="{{ old('dob') }}">
                                            @error('dob')
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
                                                placeholder="Enter Email Address" value="{{ old('email') }}">
                                            @error('email')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="text_input" data-validator="notEmpty">{{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
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
                    <a href="https://n2rtechnologies.com/" target="_blank" class="text-gray-800 text-hover-primary">N2R
                        Technologies</a>
                </div>
                <!--end::Copyright-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
