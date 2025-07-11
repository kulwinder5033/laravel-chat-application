@extends('layouts.user')
@section('title', 'Chat | User')
@section('head')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
@endsection
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
                            Chat</h1>
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
                            <li class="breadcrumb-item text-muted">Chat</li>
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
                    <div class="chat">

                    <!-- Header -->
                    <div class="top">
                         Chat With User
                    </div>
                    <!-- End Header -->

                    <!-- Chat -->
                    <div class="messages">
                        @foreach($chats as $chat)
                            @if($chat->sender_id == auth()->id())
                                @include('user.chat.broadcast', ['message' => $chat->message])
                            @else
                                @include('user.chat.receive', ['message' => $chat->message])
                            @endif
                        @endforeach
                        @if($chats->isEmpty())
                            @include('user.chat.receive', ['message' => "Ask a friend to open this link and you can chat with them!"])  
                        @endif           
                    </div>
                    <!-- End Chat -->

                    <!-- Footer -->
                    <div class="bottom">
                        <form>
                        <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                        <button type="submit"></button>
                        </form>
                    </div>
                    <!-- End Footer -->

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
      
  $("form").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url:     "{{ route('user.chat.broadcast') }}",
      method:  'POST',
      data:    {
        _token:  '{{csrf_token()}}',
        message: $("form #message").val(),
      }
    }).done(function (res) {
      $(".messages > .message").last().after(res);
      $("form #message").val('');
      $(document).scrollTop($(document).height());
    });
  });

</script>
@endpush
