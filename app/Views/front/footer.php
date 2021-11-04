 <!-- Footer -->
 
  <footer id="footer" class="footer" data-bg-img="<?= base_url('public/front_assets/images/footer-bg.png'); ?>" data-bg-color="#001018">
    <div class="container pt-70 pb-40">
      <div class="row border-bottom-black">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-20" alt="" src="<?= base_url('public/front_assets/images/topwinner.png'); ?>">
            <!---<p style="text-align:justify;">Sit amet consectetur adipisicing elit. Aliquid iste iusto reiciendis praesentium dolorem doloribus nisi architecto voluptatibus explicabo, possimus ullam quae illum maiores aperiam consequuntur.</p>--->

          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title" style="border-bottom:1px solid #444"><?= lang("home.SocialMedia"); ?></h5>
            <div class="latest-posts">
              <ul class="social-icons icon-bordered icon-circled icon-sm mt-15">
              <li><a href="https://www.facebook.com/topwinner.kw/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.instagram.com/Topwinnerkw/"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title" style="border-bottom:1px solid #444;"><?= lang("home.implinks"); ?></h5>
            <ul class="list angle-double-right list-border">
              <li><a href="<?= base_url('Home'); ?>"><?= lang("home.home") ?></a></li>
              <li><a href="<?= base_url('Shop'); ?>" target="_blank"><?= lang("home.Shop") ?></a></li>
              <li><a href="#"><?= lang("home.aboutus") ?></a></li>
              <li><a href="#"><?= lang("home.services") ?></a></li>
              <!--<li><a href="#">Privecy Policy</a></li>
              <li><a href="<?= base_url('Login') ?>" target="_blank">Login</a></li>-->              
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
              <h5 class="widget-title" style="border-bottom:1px solid #444"><?= lang("home.contactus") ?></h5>
            <!---<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta.</p>--->
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone mr-5" style="color:#eb7822;"></i> <a class="text-gray" href="#">(+965)99141090</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o mr-5" style="color:#eb7822;"></i> <a class="text-gray" href="#">info@topwinnerkw.com</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe mr-5" style="color:#eb7822;"></i> <a class="text-gray" href="#">www.topwinnerkw.com</a> </li>
            </ul>
            <!--<ul class="social-icons icon-bordered icon-circled icon-sm mt-15">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>--->
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom" data-bg-color="#001111">
      <div class="container pt-15 pb-10">
        <div class="row">
          <div class="col-md-12">
            <p class="font-12 text-gray m-0 text-center">Copyright &copy;<?= date('Y'); ?> <span class="text-theme-colored"></span>.Design & developed by <a href="https://gulfnetwork.net/">Gulfnetwork.net</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> </div>

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?= base_url('public/front_assets/js/custom.js'); ?>"></script>
