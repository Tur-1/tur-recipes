<!-- Bootstrap JavaScript Libraries -->


<livewire:scripts />

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<script type="text/javascript">
    $(window).on('load', () => {

        $("#loading").fadeOut(1000);

        $("#app").fadeIn(1000);
    });
</script>



<script type="text/javascript" defer>
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js');
        console.log('Laravel PWA: ServiceWorker registration success:');
    } else {
        console.log('Laravel PWA: ServiceWorker registration failed:');
    }
</script>


@stack('script')
