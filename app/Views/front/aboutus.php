<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div class="main-content">

    <!-- Section: inner-header -->
    <!--<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1080">
      <div class="container pt-70 pb-50">
        <!-- Section Content -->
        <!--<div class="section-content">
         
        </div>
      </div>
    </section>--->

    <!-- Section: About -->
    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-uppercase mt-0"><?= lang("home.welcome") ?> <span class="text-theme-colored" style="color:#eb7822 !important;"><?= lang("home.topwinner") ?></span><br> <?= lang("home.CONSULTANCY") ?></h2>
              
              <p style="text-align:justify;"><?= lang("home.about_title") ?></p> 
              <!--<a href="#" class="btn btn-flat text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px" style="background-color:#eb7822 !important;color:white !important">Read More</a>--->
            </div>
            <div class="col-md-6">
              <div class="row mb-10">
                <div class="col-sm-6 col-md-6 pr-5 pr-sm-15 mb-sm-10">
                  <img class="img-fullwidth" src="<?= base_url("public/assets/images/con/cont1.png"); ?>" alt="">
                </div>
                <div class="col-sm-6 col-md-6 pl-5 pl-sm-15">
                  <img class="img-fullwidth" src="<?= base_url("public/assets/images/con/cont2.png") ?>" alt="test">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6 pr-5 pr-sm-15 mb-sm-10">
                  <img class="img-fullwidth" src="<?= base_url("public/assets/images/con/cont3.png") ?>" alt="">
                </div>
                <div class="col-sm-6 col-md-6 pl-5 pl-sm-15">
                  <img class="img-fullwidth" src="<?= base_url("public/assets/images/ab/abss14.jpg") ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
 <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-uppercase mt-0" style="font-weight:600;line-height:1.42857143;"><?= lang("home.thevision") ?></h3>
              
              <p><?= lang("home.vision_title") ?></p> 
            </div>
            
          </div>
        </div>
      </div>
    </section>
    
    <section class="" >
      <div class="container"style="margin-top:-73px;">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-uppercase mt-0" style="font-weight:600; line-height:1.42857143;"><?= lang("home.Themission") ?></h3>
              
              <p style="text-align:justify;"><?= lang("home.mission_title") ?></p> 
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <section class="" >
      <div class="container"style="margin-top:-73px;">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-uppercase mt-0" style="font-weight:600; line-height:1.42857143;"><?= lang("home.Objectives") ?></h3>
              
              <p style="text-align:justify;"><?= lang("home.Objectives_title1"); ?></p> 
              <p style="text-align:justify;"><?= lang("home.Objectives_title2"); ?></p> 
              <p style="text-align:justify;"><?= lang("home.Objectives_title3"); ?></p> 
              <p style="text-align:justify;"><?= lang("home.Objectives_title4"); ?></p> 
              <p style="text-align:justify;"><?= lang("home.Objectives_title5"); ?></p> 
              <p style="text-align:justify;"><?= lang("home.Objectives_title6"); ?></p> 
              <p style="text-align:justify;"><?= lang("home.Objectives_title7"); ?></p> 
            </div>
            
          </div>
        </div>
      </div>
    </section>
 
    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-dark-6" data-bg-img="http://placehold.it/1920x1080" data-parallax-ratio="0.7">
      <div class="container pt-90 pb-90">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="754" class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0" style="color:#eb7822 !important;">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"><?= lang("home.HappyClients"); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-rocket mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="675" class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0" style="color:#eb7822 !important;">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"><?= lang("home.SuccessStory"); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-add-user mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="248" class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0" style="color:#eb7822 !important;">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"><?= lang("home.OurCounselor"); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-global mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="24" class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0"style="color:#eb7822 !important;">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"><?= lang("home.ServicePoints"); ?></h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Upcoming Events -->
    <!--<section>
      <div class="container pt-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-7 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase title mt-0 mb-30"><i class="fa fa-thumb-tack text-gray-darkgray mr-10"></i>Our <span class="text-theme-colored" style="color:#eb7822 !important;">Counselor</span></h3>
              <div class="owl-carousel-2col">
                <div class="item">
                  <div class="team-members maxwidth400">
                    <div class="team-thumb">
                      <img class="img-fullwidth" alt="" src="<?= base_url("public/assets/images/ab/sms-1.jpg") ?>">
                    </div>
                    <div class="team-bottom-part border-1px text-center p-10 pt-20 pb-10">
                      <h4 class="text-uppercase font-raleway text-theme-color-2 font-weight-600 line-bottom-center m-0">Jhon Anderson</h4>
                      <p class="font-13 mt-10 mb-10">Lorem ipsum dolorsit amet consecte turadip isior ipsum dolor sit ametor ipsum dolor sit amet conse</p>
                      <ul class="styled-icons icon-sm icon-gray icon-hover-theme-colored">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="team-members maxwidth400">
                    <div class="team-thumb">
                      <img class="img-fullwidth" alt="" src="<?= base_url("public/assets/images/ab/sms-2.jpg") ?>">
                    </div>
                    <div class="team-bottom-part border-1px text-center p-10 pt-20 pb-10">
                      <h4 class="text-uppercase font-raleway text-theme-color-2 font-weight-600 line-bottom-center m-0">Zakaria Smith</h4>
                      <p class="font-13 mt-10 mb-10">Lorem ipsum dolorsit amet consecte turadip isior ipsum dolor sit ametor ipsum dolor sit amet conse</p>
                      <ul class="styled-icons icon-sm icon-gray icon-hover-theme-colored">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="team-members maxwidth400">
                    <div class="team-thumb">
                      <img class="img-fullwidth" alt="" src="<?= base_url("public/assets/images/ab/sms-3.jpg") ?>">
                    </div>
                    <div class="team-bottom-part border-1px text-center p-10 pt-20 pb-10">
                      <h4 class="text-uppercase font-raleway text-theme-color-2 font-weight-600 line-bottom-center m-0">David Matthews</h4>
                      <p class="font-13 mt-10 mb-10">Lorem ipsum dolorsit amet consecte turadip isior ipsum dolor sit ametor ipsum dolor sit amet conse</p>
                      <ul class="styled-icons icon-sm icon-gray icon-hover-theme-colored">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="team-members maxwidth400">
                    <div class="team-thumb">
                      <img class="img-fullwidth" alt="" src="<?= base_url("public/assets/images/ab/sms-4.jpg") ?>">
                    </div>
                    <div class="team-bottom-part border-1px text-center p-10 pt-20 pb-10">
                      <h4 class="text-uppercase font-raleway text-theme-color-2 font-weight-600 line-bottom-center m-0">Andrew Smith</h4>
                      <p class="font-13 mt-10 mb-10">Lorem ipsum dolorsit amet consecte turadip isior ipsum dolor sit ametor ipsum dolor sit amet conse</p>
                      <ul class="styled-icons icon-sm icon-gray icon-hover-theme-colored">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase title mt-sm-20 mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i>Upcoming <span class="text-theme-colored" style="color:#eb7822 !important;">Events</span></h3>
              <article class="post media-post clearfix pb-0 mb-20">
                <div class="event-date-time pull-left bg-theme-colored text-center mt-5 p-15 pt-10" style="background-color:#eb7822 !important;">
                  <h4 class="text-white font-weight-600 font-28 mt-0 mb-0">22</h4>
                  <span class="text-white">Sep</span>
                </div>
                <div class="post-right upcoming-event-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-clock-o mr-5"></i> At 6.30 pm |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam <a class="text-theme-colored font-weight-600 font-13 ml-5" href="#">→</a></p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-20">
                <div class="event-date-time pull-left bg-theme-colored text-center mt-5 p-15 pt-10" style="background-color:#eb7822 !important;">
                  <h4 class="text-white font-weight-600 font-28 mt-0 mb-0">24</h4>
                  <span class="text-white">Oct</span>
                </div>
                <div class="post-right upcoming-event-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-clock-o mr-5"></i> At 6.30 pm |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam <a class="text-theme-colored font-weight-600 font-13 ml-5" href="#">→</a></p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-20">
                <div class="event-date-time pull-left bg-theme-colored text-center mt-5 p-15 pt-10" style="background-color:#eb7822 !important;">
                  <h4 class="text-white font-weight-600 font-28 mt-0 mb-0">26</h4>
                  <span class="text-white">Dec</span>
                </div>
                <div class="post-right upcoming-event-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-clock-o mr-5"></i> At 6.30 pm |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam <a class="text-theme-colored font-weight-600 font-13 ml-5" href="#">→</a></p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0">
                <div class="event-date-time pull-left bg-theme-colored text-center mt-5 p-15 pt-10" style="background-color:#eb7822 !important;">
                  <h4 class="text-white font-weight-600 font-28 mt-0 mb-0">26</h4>
                  <span class="text-white">Dec</span>
                </div>
                <div class="post-right upcoming-event-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-clock-o mr-5"></i> At 6.30 pm |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam <a class="text-theme-colored font-weight-600 font-13 ml-5" href="#">→</a></p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>-->
  </div>
  <!-- end main-content -->
 
  


<?= $this->endSection(); ?> 