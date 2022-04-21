<div id="toast-alert" class="toast align-items-center  d-none" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">

        </div>

    </div>
</div>
@push('script')
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
