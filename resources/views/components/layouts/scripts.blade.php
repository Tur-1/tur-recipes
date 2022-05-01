<!-- Bootstrap JavaScript Libraries -->


<livewire:scripts />


<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(window).on('load', () => {

        $("#loading").fadeOut(1000);

        $("#app").fadeIn(1000);
    });

    $('.recommend-recipes-row').slick({
        centerMode: true,
        slidesToShow: 1,
        infinite: true,
        autoplay: true,
        swipe: true,
        speed: 1000,
        arrows: false,
        variableWidth: true,


    });
</script>



<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js');
        console.log('Laravel PWA: ServiceWorker registration success:');
    } else {
        console.log('Laravel PWA: ServiceWorker registration failed:');
    }
</script>


@stack('script')
