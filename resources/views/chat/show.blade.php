@extends('templates.admin')

@section('title', 'Chat dengan ' . $recipient->nama_customer)

@section('content')
    <style>
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 75vh;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .chat-header {
            padding: 12px 16px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #ddd;
        }

        .chat-header .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #4CAF50;
        }

        .chat-messages {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }

        .chat-message {
            margin-bottom: 12px;
            max-width: 60%;
            padding: 10px 14px;
            border-radius: 18px;
            line-height: 1.4;
            word-wrap: break-word;
        }

        .chat-message.sent {
            background-color: #d1e7dd;
            align-self: flex-end;
        }

        .chat-message.received {
            background-color: #e2e3e5;
            align-self: flex-start;
        }

        .chat-input {
            padding: 12px 16px;
            border-top: 1px solid #ddd;
            background-color: #fff;
            display: flex;
            gap: 8px;
        }

        .chat-input textarea {
            flex: 1;
            resize: none;
        }

        .chat-input button {
            white-space: nowrap;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="chat-container d-flex flex-column">
                <div class="chat-header">
                    <span class="status-dot"></span>
                    <strong>{{ $recipient->nama_customer }}</strong>
                </div>

                <div id="chat-box" class="chat-messages d-flex flex-column">
                    @foreach ($messages as $msg)
                       <div class="chat-message {{ $msg->sender_type === \App\Models\User::class && $msg->sender_id === auth()->id() ? 'sent ms-auto' : 'received me-auto' }}">
                         {{ $msg->message }}
                       </div>

                    @endforeach
                </div>

                <form id="chat-form" class="chat-input" autocomplete="off">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $recipient->Customer_ID }}">
                    <textarea name="message" rows="1" class="form-control" placeholder="Ketik pesan..."></textarea>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        $(document).ready(function () {
            const recipientId = "{{ $recipient->Customer_ID }}";
            const $chatBox = $('#chat-box');

            // Init Pusher
            const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
                cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
                encrypted: true
            });

            console.log("asd");
            const channel = pusher.subscribe('apenpu-chat');
            channel.bind('message', function(data) {
                console.log('Received:', data);
                if (data.sender_id == recipientId || data.receiver_id == recipientId) {
                    const isIncoming = data.sender_id == recipientId;

                    const $msg = $('<div>')
                        .addClass('chat-message')
                        .addClass(isIncoming ? 'received me-auto' : 'sent ms-auto')
                        .text(data.message);

                    $chatBox.append($msg);
                    $chatBox.scrollTop($chatBox.prop('scrollHeight'));
                }
            });

            $('#chat-form').on('submit', function (e) {
                e.preventDefault();
                const message = $(this).find('textarea[name="message"]').val().trim();
                if (!message) return;

                $.ajax({
                    url: "{{ route('chat.send') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    contentType: "application/json",
                    data: JSON.stringify({
                        receiver_id: recipientId,
                        message: message
                    }),
                });

                $(this).find('textarea[name="message"]').val('');
            });

            $chatBox.scrollTop($chatBox.prop('scrollHeight'));
        });
    </script>
@endpush

