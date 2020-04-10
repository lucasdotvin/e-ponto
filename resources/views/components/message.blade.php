@php
    $messageTypeClass = '';

    switch ($type) {
        case 'danger':
            $messageTypeClass = 'is-danger';
            break;

        case 'info':
            $messageTypeClass = 'is-info';
            break;

        case 'success':
            $messageTypeClass = 'is-success';
            break;

        case 'warning':
            $messageTypeClass = 'is-warning';
            break;
    }
@endphp

<div class="message {{ $messageTypeClass }}">
    <div class="message-body">
        {{ $message }}
    </div>
</div>
