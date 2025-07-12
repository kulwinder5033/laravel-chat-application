@extends('layouts.user')
@section("title", "Follow Ups | User")
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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Follow Ups</h1>
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
                        <li class="breadcrumb-item text-muted">Follow Ups</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('user.follow-ups.create') }}" class="btn btn-sm fw-bold btn-primary">Add Follow Up</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                @include("user.sections.flash-message")

                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-12 mb-xl-12">
                        <!--begin::Card widget-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                  <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-150px">ID</th>
                                            <th class="min-w-150px">User Name</th>
                                            <th class="min-w-150px">DOB</th>
                                            <th class="min-w-150px">Action</th>             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($follow_ups as $follow_up)
                                        <tr>
                                            <td>#{{ $follow_up->id }}</td>
                                            <td>{{ $follow_up->user->name }}</td>
                                            <td>{{  \Carbon\Carbon::parse($follow_up->follow_up_date)->format('d-M-Y h:i A') }}</td>
                                            <td>
                                                <a href="{{ route('user.follow-ups.edit', $follow_up->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="javascript:void(0);" onclick="confirmDelete({{ $follow_up->id }})" class="btn btn-sm btn-danger">Delete</a>
                                                <form id="delete-form{{$follow_up->id}}" action="{{ route('user.follow-ups.destroy', $follow_up->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach 
                                   
                                    <tr>
                                        <td colspan="6">
                                            {{ $follow_ups->appends(request()->query())->links('pagination::bootstrap-5') }}
                                        </td>       
                                    </tr>
                                     </tbody>
                                  </table>
                                 
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget -->

                    </div>

                </div>

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
   
</div>
@endsection
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function confirmDelete(e) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {
            t.isConfirmed && document.getElementById("delete-form" + e).submit()
        })
    }
</script>
@endpush

