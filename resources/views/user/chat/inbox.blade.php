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