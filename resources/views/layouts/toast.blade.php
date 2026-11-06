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
    <div id="toast-box" style="
        position: fixed; top: 100px; right: 20px; z-index: 9999;
        min-width: 280px; max-width: 380px; padding: 14px 18px;
        border-radius: 12px; color: #fff; font-size: 15px; font-weight: 600;
        box-shadow: 0 6px 20px rgba(0,0,0,0.25);
        background: {{ $toastType == 'success' ? '#16a34a' : '#dc2626' }};">
        <span onclick="document.getElementById('toast-box').style.display='none'"
              style="float:right; cursor:pointer; margin-left:12px;">&times;</span>
        {{ $toastMessage }}
    </div>

    <script>
        setTimeout(function () {
            var box = document.getElementById('toast-box');
            if (box) { box.style.display = 'none'; }
        }, 5000);
    </script>
@endif