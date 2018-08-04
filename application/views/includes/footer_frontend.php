<!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Address -->
                <div class="col-sm-4 col-md-3">
                    <div class="footer-box address-inner">
                        <p class="tulwarfooter">Layanan Pelanggan </p>
                        <div class="address">
                            <i class="flaticon-customer-service"></i>
                            <p class="tulwarfooter">(021) 2523820</p>
                        </div>
                        <div class="address">
                            <i class="flaticon-mail"></i>
                            <p class="tulwarfooter"> admin@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="footer-box">
                                <h5><b>RUTE PESAWAT TERPOPULER</b></h5>
                                <ul class="categoty">
                                    <li><a href="#" class="tulwarfooter">Tiket Pesawat Tujuan Bali (dari Jakarta)</a></li>
                                    <li><a href="#" class="tulwarfooter">Tiket Pesawat Tujuan Malang (dari Jakarta)</a></li>
                                    <li><a href="#" class="tulwarfooter">Tiket Pesawat Tujuan Papua (dari Jakarta)</a></li>
                                    <li><a href="#" class="tulwarfooter">Tiket Pesawat Tujuan Medan (dari Jakarta)</a></li>
                                    <li><a href="#" class="tulwarfooter">Tiket Pesawat Tujuan Flores (dari Jakarta)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5">
                            <div class="footer-box">
                                <h5><b>KATEGORI TERPOPULER</b></h5>
                                <ul class="categoty">
                                    <li><a href="#" class="tulwarfooter">Produk Terlaris Kategori Elektronik</a></li>
                                    <li><a href="#" class="tulwarfooter">Produk Terlaris Kategori Kecantikan</a></li>
                                    <li><a href="#" class="tulwarfooter">Produk Terlaris Kategori Fashion</a></li>
                                    <li><a href="#" class="tulwarfooter">Produk Terlaris Kategori Alat Kesehatan</a></li>
                                    <li><a href="#" class="tulwarfooter">Produk Terlaris Kategori Makanan & Minuman</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-2">
                            <div class="footer-box">
                                <h5><b>TENTANG PASAR PRODUK BUMN</b></h5>
                                <ul class="categoty">
                                    <li><a href="#" class="tulwarfooter">Hubungi Kami</a></li>
                                    <li><a href="#" class="tulwarfooter">Cara Pemesanan Ticket</a></li>
                                    <li><a href="#" class="tulwarfooter">Cara Pemesanan Produk Retail</a></li>
                                    <li><a href="#" class="tulwarfooter">Bantuan</a></li>
                                    <li><a href="#" class="tulwarfooter">Karir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p style="text-align: center">Copyright 2018 PT. Rajawali Nusindo</p>
                    </div>
                    <!--  <div class="col-sm-7">
                        <div class="footer-menu">
                             <ul>
                                <li><a href="">Home</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Service</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Shop</a></li>
                                <li><a href="">Forum</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <!-- jquery ui js -->
    <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- fraction slider js -->
    <script src="assets/js/jquery.fractionslider.js" type="text/javascript"></script>
    <!-- owl carousel js -->
    <script src="assets/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- counter -->
    <script src="assets/js/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="assets/js/waypoints.js" type="text/javascript"></script>
    <!-- filter portfolio -->
    <script src="assets/js/jquery.shuffle.min.js" type="text/javascript"></script>
    <script src="assets/js/portfolio.js" type="text/javascript"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- range slider -->
    <script src="assets/js/ion.rangeSlider.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>
    <!-- custom -->
    <script src="assets/js/custom.js" type="text/javascript"></script>
</body>

</html>
<script>
$('.btn-number').click(function(e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if (type == 'minus') {

            if (currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            }
            if (parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if (type == 'plus') {

            if (currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function() {
    $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {

    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }


});
$(".input-number").keydown(function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
</script>