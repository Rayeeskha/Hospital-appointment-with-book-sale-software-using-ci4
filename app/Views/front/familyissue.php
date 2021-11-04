<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">

     <section>
      <div class="container">
        <div class="row mtli-row-clearfix">
          <div class="col-sm-10 col-md-12 col-lg-12">
            <div class="campaign bg-silver-light maxwidth500 mb-30">
              <!---<div class="thumb">
                <img src="http://placehold.it/750x565" alt="" class="img-fullwidth">
                <div class="campaign-overlay"></div>
              </div>--->
              <div class="campaign-details clearfix p-15 pt-10 pb-10">
                <!--<h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>--->
                <h4 class="font-weight-700 mt-0"><a href="#"><?= lang("home.FamilyIssues") ?></a></h4>
                <!--<p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                <!---<div class="campaign-bottom border-top clearfix mt-20">
                  <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                    <li class="text-gray pr-0 mr-5">Price: <span class="text-theme-colored">$890</span> |</li>
                    <li>
                      <div class="star-rating" title="Rated 4.50 out of 5"><span style="width: 90%;">4.50</span></div>
                    </li>
                  </ul>
                  <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="#">Apply Now</a>
                </div>--->
              </div>
            </div>
            <div class="event-details">
              <p class="mb-20 mt-20"><?= lang("home.ftitle1"); ?></p>
              <div class="pull-left flip mr-15">
                <img alt="" src="<?= base_url("public/assets/images/ab/sr9.png"); ?>">
              </div>
              <div class="">
                <p class="font-14 text-black-light"><?= lang("home.ftitle2"); ?></p>
                <p class="mt-10"><?= lang("home.ftitle3"); ?></p>
              </div>
              <p class="mt-20"><b><?= lang("home.fwk"); ?></b> &nbsp;&nbsp;&nbsp;<?= lang("home.fwkttl"); ?>
              </p>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="sidebar sidebar-right mt-sm-30">
              <!---<div class="widget">
                <h5 class="widget-title line-bottom">All Services</h5>
                <ul class="list-divider list-border list check">
                  <li><a href="page-services-relationship-problems.html">Relationship Problems</a></li>
                  <li><a href="page-services-depression-treatment.html">Depression Treatment</a></li>
                  <li><a class="text-theme-colored" href="page-services-sexual-counselling.html">Sexual Counselling</a></li>
                  <li><a href="page-services-personal-development.html">Personal Development</a></li>
                  <li><a href="page-services-couples-counselling.html">Couples Counselling</a></li>
                  <li><a href="page-services-anxiety-counselling.html">Anxiety Counselling</a></li>
                </ul>
              </div>--->
              
              <!---<div class="widget">
                <h5 class="widget-title line-bottom">Image gallery with text</h5>
                <div class="owl-carousel-1col">
                  <div class="item">
                    <img src="https://placehold.it/365x230" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div>
                  <div class="item">
                    <img src="https://placehold.it/365x230" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div>
                  <div class="item">
                    <img src="https://placehold.it/365x230" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div>
                </div>
              </div>--->
              <!--<div class="widget">
                <h5 class="widget-title line-bottom">Tags</h5>
                <div class="tags">
                  <a href="#">travel</a>
                  <a href="#">blog</a>
                  <a href="#">lifestyle</a>
                  <a href="#">feature</a>
                  <a href="#">mountain</a>
                  <a href="#">design</a>
                  <a href="#">restaurant</a>
                  <a href="#">journey</a>
                  <a href="#">classic</a>
                  <a href="#">sunset</a>
                </div>
              </div>--->
            </div>
          </div>
        </div>
      </div>
    </section>

<?= $this->endSection(); ?> 