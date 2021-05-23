<div wire:poll>
    <div class="col-12 px-0">
        <div class="px-4 py-5 chat-box bg-white">
        @forelse ($messages as $message)

            @if($message->user->name == auth()->user()->name)
                <!-- Reciever Message-->
                    <div class="media w-50 ml-auto mb-3">انا
                        <div class="media-body">
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">{{ $message->message_text }}</p>
                            </div>
                            <p class="small text-muted">{{ $message->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>



            @else
                <!-- Sender Message-->
                    <div class="media w-50 mb-3">{{ $message->user->name }}
                        <div class="media-body ml-3">
                            <div class="bg-warning rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">{{ $message->message_text }}</p>
                            </div>
                            <p class="small text-muted">{{ $message->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                @endif
            @empty
                لاتوجد رسائل سابقة
            @endforelse
        </div>
        <!-- Typing area -->
        <form wire:submit.prevent="sendMessage">
            <div class="mt-12 row">
                <div class="col-9">
                    <input wire:model.defer="messageText" type="text" placeholder="اكتب رسالتك" required class="form-control"/>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </div>
        </form>
    </div>
</div>
