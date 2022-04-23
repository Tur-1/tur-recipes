<div id="toast-alert"
    class="toast align-items-center  d-none {{ Session::has('background') ? Session::get('background') : '' }}"
    role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            {{ Session::has('message') ? Session::get('message') : '' }}
        </div>

    </div>
</div>

@push('script')
    @if (Session::has('message'))
        <script>
            let toastAlert = document.getElementById('toast-alert')
            let toast = new bootstrap.Toast(toastAlert)
            toastAlert.classList.remove("d-none");

            toast.show();
        </script>
    @endif
    <script>
        window.addEventListener('show-alert-message', (e) => {
            let toastAlert = document.getElementById('toast-alert')
            let toast = new bootstrap.Toast(toastAlert)
            toastAlert.classList.remove("d-none");
            toastAlert.classList.add(e.detail.background);
            document.querySelector('.toast-body').textContent = e.detail.message;
            toast.show();
        });
    </script>
@endpush
