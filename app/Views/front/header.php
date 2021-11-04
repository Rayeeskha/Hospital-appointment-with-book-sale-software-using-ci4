<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <style>
      .active a { background-color:#eb7822 !important;  }
      a:hover { background-color: #eb7822 !important; }
      option:hover { background-color: yellow; }
    #preloadermodel, #successmodal,#errormodal{margin-top: 10%;}
    .element { display: flex; }
    @media screen and (max-width: 600px) {
    .element {display: block;}
  </style>
  <div id="preloader">
    <!--<div id="spinner">
      <img class="floating ml-5 mb-5" src="<?= base_url('public/front_assets/images/preloaders/13.png'); ?>" alt="">
      <h5 class="line-height-50 font-18">Loading...</h5>
    </div>--->
    <!--<div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>--->
  </div>
  
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-black-333 sm-text-center border-top-theme-color-3px p-0">
      <div class="container">


        <div class="row">
          <div class="col-md-4">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-flat icon-sm sm-text-center mt-sm-15">
                <li><a href="https://www.facebook.com/topwinner.kw/"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="https://www.instagram.com/Topwinnerkw/"><i class="fa fa-instagram text-white"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-linkedin text-white"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 pr-0">
            <div class="widget no-border">
              <ul class="list-inline pull-right flip sm-pull-none xs-text-center text-white mt-5">
                <li class="m-0 pl-10 pr-10"> <a href="https://api.whatsapp.com/send?phone=96522204271" target="_blank" class="text-white"><i class="fa fa-whatsapp"style="color:#eb7822;"></i> (+965)99141090</a> </li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-clock-o" style="color:#eb7822;"></i> Mon-Fri 8:00 to 2:00 </li>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="#" class="text-white"><i class="fa fa-envelope-o" style="color:#eb7822;"></i>info@topwinnerkw.com</a> 
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <a class="btn btn-colored btn-flat pb-10" href="#appointmentformbox" style="background-color: #6AB43E !important; color:white !important; margin-top:1px;"><?= lang("home.Appointment") ?></a>
          </div>
        </div>
      </div>
    </div>

      <?php 
          if (session()->get('lang') == "" || session()->get('lang') == "en") {
            $defaultlanguage= 'en';
            $position = "right";
            $logopostion = "left";
            $dir="ltr";
          }else{
              $defaultlanguage= 'ar';
              $position = "left";
              $logopostion = "right";
              $dir="rtl";
          }
      ?>

    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default" >
            <a class="menuzord-brand pull-<?= $logopostion; ?> flip xs-pull-center mt-20" href="<?= base_url('Home'); ?>">
              <img src="<?= base_url('public/front_assets/images/1.png'); ?>" width="250" height="200" alt="">
            </a>
            <ul class="menuzord-menu element" dir="<?= $dir; ?>">
              <li><a href="<?= base_url('Home') ?>"><?= lang("home.home") ?></a> </li>
            <li><a href="<?= base_url('Home/aboutus'); ?>"><?= lang("home.aboutus") ?></a> </li>
            <li><a href="javascript:void(0)"><?= lang("home.Services") ?></a>
                <ul class="dropdown" style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif">
                  <li><a href="<?= base_url('Home/depression'); ?>"style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif"><?= lang("home.DepressionConsultation"); ?></a></li>
                  <li><a href="<?= base_url('Home/familyissue') ?>" style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif"><?= lang("home.FamilyIssues"); ?></a></li>
                  <li><a href="<?= base_url('Home/anxiety'); ?>" style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif"><?= lang("home.AnxietyConsultation"); ?></a></li>
                  <li><a href="<?= base_url('Home/Behaviour'); ?>" style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif"><?= lang("home.BehaviourManagement"); ?></a></li>
                  
                </ul>
            </li>
              <li><a href="<?= base_url('Shop'); ?>"><?= lang("home.Shop") ?></a>  </li>
              
              <li><a href="<?= base_url('Home/contactus'); ?>"><?= lang("home.Contactus") ?></a>
                
              </li>
              <!--<li><a href="<?= base_url('Home/appointment'); ?>"  style="border:1px solid;background-color:#b3e6ff;">Appointment </a>
                
              </li>--->
              <li>
                  <a href="<?= base_url('Shop/viewcartdetails'); ?>"><span id="total_products" style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif"></span><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;<?= lang("home.KWD") ?>&nbsp;&nbsp;<span class="" id="total_amount">0</span></a>
              </li>
              
              <?php if (!(session()->has('LOGIN_USER'))): ?>
              
              <li><a href="javascript:void(0)"><?= lang("home.Account") ?></a>
                <ul class="dropdown">
                  <li><a href="<?= base_url('Login/userloginregister'); ?>" style="text-decoration:none;font-size:13px;color:#333333;font-weight:600;font-family:'Open Sans', sans-serif""><?= lang("home.Loginregister") ?></a></li>
                </ul>
            </li>
            <?php else: ?>
            <li><a href="javascript:void(0)"><?= lang("home.ManageOrder") ?></a>
                <ul class="dropdown">
                  <li><a href="<?= base_url('Shop/vieworder'); ?>"><?= lang("home.ViewOrder") ?></a></li>
                  <li><a href="<?= base_url('Shop/viewaddress'); ?>"><?= lang("home.ViewAddress") ?></a></li>
                  <li><a href="<?= base_url('Login/customerlogout'); ?>"><?= lang("home.Logout") ?></a></li>
                </ul>
            </li>
            <?php endif; ?>
              
              <li><a href="javascript:void(0)">
                    <?php if($defaultlanguage == 'en'): ?>
                    <?= lang("home.English") ?>
                    <?php else: ?>
                    <?= lang("home.Arbic") ?>
                    <?php endif; ?>
                </a>
                <ul class="dropdown">
                    <?php if($defaultlanguage == "en"): ?>
                    <li><a href="<?= site_url('lang/ar') ?>"><?= lang("home.Arbic") ?></a></li>
                    <?php else: ?>
                  <li><a href="<?= site_url('lang/en') ?>"><?= lang("home.English") ?></a></li>
                  <?php endif; ?>
                  
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  
  
  
  
  <div class="container">
    <div class="modal" id="preloadermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 0px;">
        <h5 style="padding: 5px;font-size: 22px;font-weight: 500">Please Wait...</h5>
        <center>
            <img src="<?= base_url('public/images/spinner.gif'); ?>" style="width: 100%;height: 150px;">
        </center>
            
        </div>
      <div class="modal-content" style="padding: 10px;">
        <h6 id="preloader_heading" style="margin-top: 0px;font-weight: 500"></h6>
        
    </div>
    </div>
  </div>
</div>

 <div class="modal" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 0px;">
        <h5 style="padding: 5px;font-size: 22px;font-weight: 500">Successfully</h5>
        <center>
            <img src="<?= base_url('public/images/success.gif'); ?>" style="width: 100%;height: 180px;">
        </center>
        <h6 id="success_heading" style="margin-top: 0px;font-weight: 800"></h6>
        
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>


 <div class="modal" id="errormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 0px;">
        <h4 style="padding: 5px;font-size: 22px;font-weight: 500">Error</h4>
        <center>
            <img src="<?= base_url('public/images/error.gif'); ?>" style="width: 100%;height: 180px;">
        </center>
            
        <h6 id="error_heading" style="margin-top: 0px;font-weight: 800;"></h6>
            
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>


</div>
<!-----Preloder Modal Section End ---->