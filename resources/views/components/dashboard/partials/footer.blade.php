<footer id="footer-dashboard-sibau">
    <div class="footer-copyright text-center py-3 px-3 fw-bold">
        <span class="font-italic">Dibuat dengan Penuh Cinta <i class="bi bi-heart-fill"></i></span><br>
        <span class="">Copyright © 2023 Tim RPL BAU</span>
    </div>
    <!-- Copyright -->
</footer>

</body>
<script>
    function send_data_ajax(endpoint, data) {
        $.ajax({
            url: 'api/' + endpoint,
            type: 'POST',
            data: data,
            async: false,
            global: false,
            success: function(result) {
                if (result.status) {
                    console.log('berhasil');
                } else {
                    console.log('gagal');
                }
            }
        });
    }

    /**
     * Preloader
     */
    // let preloader = $('#preloader');
    // if (preloader) {
    //     window.addEventListener('load', () => {
    //     preloader.remove()
    //     });
    // }
</script>
