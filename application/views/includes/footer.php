
</body>
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white">
    <!-- Grid container -->
    <div class=" p-4 pb-0">
        <hr class="my-3">

        <!-- Section: Copyright -->
        <section class="pt-0">
        <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-md-2 col-lg-3 text-center text-md-start">
            <!-- Copyright -->
            <div>
                © 2023
                <a class="text-white" href="https://mirota.id/"
                    >Mirota KSM</a
                >
            </div>
            <!-- Copyright -->
            </div>
            <!-- Grid column -->
            <div class="col-md-7 col-lg-6 text-center text-md-start">
                <!-- Manu -->
                <div class="menu-footer">
                    <nav>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('syaratketentuan')?>">Syarat & Ketentuan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('privasi')?>">Kebjiakan Privasi</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('karir')?>">Karir</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kontakkami')?>">Kontak Kami</a>
                        </li>
                    </ul>
                    </nav>

                </div>
                <!-- Copyright -->
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 ml-lg-0 text-center text-md-end">
            <!-- Facebook -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="fab fa-linkedin-in"></i></a>

            <!-- Twitter -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="fab fa-instagram"></i
                ></a>

            <!-- Google -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="fab fa-tiktok"></i
                ></a>
            </div>
            <!-- Grid column -->
        </div>
        </section>
        <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
    </footer>
    <!-- Footer -->
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Jquery needed -->
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landingpage/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/642bd8e34247f20fefe9b31c/1gt5keeqb';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
    <!--End of Tawk.to Script-->


    <script>
    $(document).ready(function() {
        
        $("#load").fadeOut(2000);
        $("#info-kunjungan").hide();

        $(".theSelect").select2({
            
        });
        
    	<?php if (isset($_SESSION['swal_icon'])){ ?>
			Swal.fire({
			icon: '<?php echo $_SESSION['swal_icon'] ?>',
			title: '<?php echo $_SESSION['swal_title'] ?>',
			text: '<?php echo $_SESSION['swal_text'] ?>',
			showConfirmButton: false,
  		    timer: 1500
			})
		<?php } ?>
    
    
    });
    </script>

    <!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.navBar').addClass('affix');
                $('.logo').addClass('affixlogo');
                document.getElementById("logo").style.display = "block";
                console.log("OK");
            } else {
                document.getElementById("logo").style.display = "none";
                $('.navBar').removeClass('affix');
                $('.logo').addClass('affixlogo');
            }
        });
    </script>

    <script id="rendered-js">
    $('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

    });
    //# sourceURL=pen.js
    </script>
    
    <script>
        $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsiveClass:true,
            nav:false,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                }
            }
        });
        });
    </script>
</html>