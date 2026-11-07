@php
    $toastMessage = null;
    $toastType = 'success';

    if (session('success')) {
        $toastMessage = session('success');
        $toastType = 'success';
    } elseif (session('error')) {
        $toastMessage = session('error');
        $toastType = 'error';
    } elseif ($errors->any()) {
        $toastMessage = $errors->first();
        $toastType = 'error';
    }
@endphp

@if ($toastMessage)
    <div id="toast-box" class="toast-box toast-{{ $toastType }}">
        <span class="toast-close"
              onclick="document.getElementById('toast-box').style.display='none'">&times;</span>
        {{ $toastMessage }}
    </div>

    <script>
        setTimeout(function () {
            var box = document.getElementById('toast-box');
            if (box) { box.style.display = 'none'; }
        }, 5000);
    </script>
@endif