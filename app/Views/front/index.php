<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!------Include Slider File ------>
<style type="text/css">
  .markholiday .ui-state-default{color: red}
</style>
<?= view('front/slider'); ?>
<!------Include Slider File ------>
 <!-- Divider: Call To Action -->
    <section class="bg-theme-colored" style="background-color: #eb7822 !important;">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="call-to-action pt-20 pb-15">
            <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
              <i class="fa fa-certificate text-black-222 font-36 pull-left flip mt-15 mr-20"></i>
              <h4 class="font-16 font-weight-600 text-white"><?= lang("home.wcls") ?>  <?= lang("home.wsp") ?></h4>
              <h6 class="text-white"><?= lang("home.wtitle") ?></h6>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
              <i class="fa fa-envelope text-black-222 font-36 pull-left flip mt-15 mr-20"></i>
              <h4 class="font-16 font-weight-600 text-white"><?= lang("home.emailus") ?></h4>
              <h6 class="text-white">info@topwinnerkw.com</h6>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <i class="fa fa-phone text-black-222 font-36 pull-left flip mt-15 mr-20" style=""></i>
              <h4 class="font-16 font-weight-600 text-white"><?= lang("home.contactus") ?> : (+965) 90928555</h4>
              <h6 class="text-white"><?= lang("home.cont_title") ?></h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About Us  -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title mt-0"><span><?= lang("home.about") ?> <span class="text-theme-colored" style="color:#eb7822 !important;"><?= lang("home.topwinner") ?></span></span></h2>
            <?= lang("home.about_title") ?>
            <a href="https://topwinnerkw.com/Home/aboutus" class="btn-read-more" style="color:#707070;"><b><?= lang("home.readmore") ?></b></a>
            <div class="row" style="padding-top:20px;">
              <div class="col-sm-6 col-md-4">
                  <a href="<?= base_url('Home/aboutus'); ?>">
                <img class="img-fullwidth mb-sm-30" src="public/assets/images/con/cont1.png" alt=""></a>
              </div>
               <div class="col-sm-6 col-md-4">
                   <a href="<?= base_url('Home/aboutus'); ?>">
                <img class="img-fullwidth mb-sm-30" src="public/assets/images/con/cont2.png" alt=""></a>
              </div>
               <div class="col-sm-6 col-md-4">
                   <a href="<?= base_url('Home/aboutus'); ?>">
                <img class="img-fullwidth mb-sm-30" src="public/assets/images/con/cont3.png" alt=""></a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    
    
    <section class="">
        <div class="container">
            <h2 class="title mt-0"><span><?= lang("home.Book"); ?> <span class="text-theme-colored" style="color:#eb7822 !important;"><?= lang("home.Shop") ?></span></span></h2>
      <div class="container mt-30 mb-30 p-30">
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="col-md-12" style="margin-left:-15px;">
              <div class="products">
                  <?php if($product):
                    count($product);
                    foreach($product as $pro):
                  ?>
                <div class="col-sm-12 col-md-3 col-lg-3 mb-30">
                    
                    <?php if($pro->stock ==0): ?>
                    
                
                    <div class="product pb-0">
                    <span class="tag-sale" style="background-color:#eb7822">Out Of Stock!</span>
                    <div class="product-thumb"> 
                      <img alt="" src="<?= base_url('public/uploads/productimg/'.$pro->photo); ?>" class="img-responsive img-fullwidth" style="width:100%;height:200px">
                      <div class="overlay">
                        <div class="btn-add-to-cart-wrapper">
                          <a class="btn btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="javascript:void(0)"style="background-color:#eb7822 !important; color:white;">Add To Cart</a>
                        </div>
                        <div class="btn-product-view-details">
                          <a class="btn btn-default btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="javascript:void(0)"style="color:#707070;">View detail</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                      <a href="#!"><h5 class="product-title mt-0 mt-20"><?= $pro->productname; ?></h5></a>
                      
                      <!---<div class="star-rating" title="Rated 3.50 out of 5"><span style="width: 67%;">3.50</span></div>--->
                      
                     <div class="price">
                          <?php if($pro->price != 0 && $pro->price != null): ?>
                          <del><span class="amount">KWD&nbsp;<?= number_format($pro->mrpprice, 1); ?></span></del>
                          <ins><span class="amount">KWD&nbsp;<?= number_format($pro->price, 1); ?></span></ins>
                        <?php else: ?>
                          <ins><span class="amount">KWD&nbsp;<?= number_format($pro->mrpprice, 1); ?></span></ins>
                        <?php endif; ?>
                      </div>
                      
                    </div>
                    </a>
                  </div>
                  
                  <?php elseif($pro->stock <=5): ?>
                    <div class="product pb-0">
                    <!--<span class="tag-sale" style="background:orange">In Stock! <?= $pro->stock; ?></span>--->
                    <a href="<?= base_url('Shop/productdetails/'.$pro->id); ?>">
                    <div class="product-thumb"> 
                      <img alt="" src="<?= base_url('public/uploads/productimg/'.$pro->photo); ?>" class="img-responsive img-fullwidth" style="width:100%;height:200px">
                      <div class="overlay">
                        <div class="btn-add-to-cart-wrapper">
                          <a class="btn  btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="javascript:void(0)" onclick="add_to_Cart(<?= $pro->id ?>);"style="background-color:#eb7822 !important; color:white;">Add To Cart</a>
                        </div>
                        <div class="btn-product-view-details">
                          <a class="btn btn-default  btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?= base_url('Shop/productdetails/'.$pro->id); ?>" style="color:#707070;">View detail</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                      <a href="<?= base_url('Shop/productdetails/'.$pro->id); ?>"><h5 class="product-title mt-0"><?= $pro->productname; ?></h5></a>
                      
                      <!--<div class="star-rating" title="Rated 3.50 out of 5"><span style="width: 67%;">3.50</span></div>--->
                      
                      <div class="price">
                          <?php if($pro->price != 0 && $pro->price != null): ?>
                          <del><span class="amount">KWD&nbsp;<?= number_format($pro->mrpprice, 1); ?></span></del>
                          <ins><span class="amount">KWD&nbsp;<?= number_format($pro->price, 1); ?></span></ins>
                        <?php else: ?>
                          <ins><span class="amount">KWD&nbsp;<?= number_format($pro->mrpprice, 1); ?></span></ins>
                        <?php endif; ?>
                      </div>
                      
                    </div>
                    </a>
                  </div>
                  
                <?php else: ?>
                
                     <div class="product pb-0">
                    <?php if($pro->price != 0): ?>
                    <span class="tag-sale" style="background-color:#eb7822;">Sale!</span>
                    <?php endif; ?>
                    <a href="<?= base_url('Shop/productdetails/'.$pro->id); ?>">
                    <div class="product-thumb"> 
                      <img alt="" src="<?= base_url('public/uploads/productimg/'.$pro->photo); ?>" class="img-responsive img-fullwidth" style="width:100%;height:200px">
                      <div class="overlay">
                        <div class="btn-add-to-cart-wrapper">
                          <a class="btn btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="javascript:void(0)" onclick="add_to_Cart(<?= $pro->id ?>);" style="background-color:#eb7822 !important; color:white;">Add To Cart</a>
                        </div>
                        <div class="btn-product-view-details">
                          <a class="btn btn-default  btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?= base_url('Shop/productdetails/'.$pro->id); ?>" style="color:#707070;">View detail</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                      <a href="<?= base_url('Shop/productdetails/'.$pro->id); ?>"><h5 class="product-title mt-0"><?= $pro->productname; ?></h5></a>
                      
                      <!--<div class="star-rating" title="Rated 3.50 out of 5"><span style="width: 67%;">3.50</span></div>-->
                      
                      <div class="price">
                          <?php if($pro->price != 0 && $pro->price != null): ?>
                          <del><span class="amount">KWD&nbsp;<?= number_format($pro->mrpprice, 1); ?></span></del>
                          <ins><span class="amount">KWD&nbsp;<?= number_format($pro->price, 1); ?></span></ins>
                        <?php else: ?>
                          <ins><span class="amount">KWD&nbsp;<?= number_format($pro->mrpprice, 1); ?></span></ins>
                        <?php endif; ?>
                      </div>
                      
                    </div>
                    </a>
                  </div>  
                  
                <?php endif; ?>
                  
                </div>
                <?php endforeach; else: ?>
                <h6 style="color:red">Records Not Found</h6>
                <?php endif; ?>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  <!-- end main-content -->
  
   <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-dark-6" data-bg-img="public/assets/images/service/bg2.jpg" data-parallax-ratio="0.7">
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
              <h5 class="text-white text-uppercase font-weight-600"> <?= lang("home.OurCounselor"); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-global mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="24" class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0" style="color:#eb7822 !important;">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"> <?= lang("home.ServicePoints"); ?></h5>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <!-- Section: Services -->
    <section class="bg-silver-light">
      <div class="container pt-50">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0"><?= lang("home.Our"); ?> <span class="text-theme-colored" style="color:#eb7822 !important;"><?= lang("home.Services"); ?></span></h2>
              <p><?= lang("home.Services_title"); ?></p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="feturead mb-30 mb-sm-30">
                <div class="thumb"> <img src="public/assets/images/service/k1.jpg" class="img-fullwidth" alt=""> </div>
                <div class="bg-white p-20">
                  <h4 class="text-uppercase font-weight-600 mt-0 mb-15"><?= lang("home.Services_heading"); ?></h4>
                  <p><?= lang("home.Services_title"); ?> </p>
                  <a class="btn btn-sm btn-flat" href="https://topwinnerkw.com/Home/depression" style="background-color: #eb7822 !important;color:#ffffff;"><?= lang("home.readmore"); ?></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="feturead mb-30 mb-sm-30">
                <div class="thumb"> <img src="public/assets/images/service/k2.jpg" class="img-fullwidth" alt=""> </div>
                <div class="bg-white p-20">
                  <h4 class="text-uppercase font-weight-600 mt-0 mb-15"><?= lang("home.family_issue"); ?></h4>
                  <p><?= lang("home.family_issue_title"); ?></p>
                  <a class="btn btn-sm btn-flat" href="https://topwinnerkw.com/Home/familyissue" style="background-color: #eb7822 !important;color:#ffffff;"><?= lang("home.readmore"); ?></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="feturead mb-30 mb-sm-30">
                <div class="thumb"> <img src="public/assets/images/service/k3.jpg" class="img-fullwidth" alt=""> </div>
                <div class="bg-white p-20">
                  <h4 class="text-uppercase font-weight-600 mt-0 mb-15"><?= lang("home.AnxietyConsultation"); ?></h4>
                  <p><?= lang("home.AnxietyConsultation_title"); ?></p>
                  <a class="btn btn-sm btn-flat" href="https://topwinnerkw.com/Home/anxiety" style="background-color: #eb7822 !important;color:#ffffff;"><?= lang("home.readmore"); ?></a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>

   

    
    <!-- Divider: Divider -->
    <section class="divider parallax layer-overlay ooverlay-dark-6" id="appointmentformbox" data-bg-img="public/assets/images/slider/bg2.jpg" data-parallax-ratio="0.7">
      <div class="container pt-90 pb-90">
        <div class="row">
          <div class="col-md-12">
            <div class="" style="background:white;border:1px solid silver">
                <div class="card-header"><br>
                    <center><h3 class="text-uppercase title mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i><?= lang("home.book_an"); ?><span class="text-theme-colored" style="color:#eb7822 !important;"><?= lang("home.appointment"); ?></span></h3></center>
                    <!---<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</h6>-->
                </div>
                  <div class="card-body">
                    <!---<blockquote class="blockquote mb-0">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Integer posuere erat a ante.</p>
                    </blockquote>-->
                    <div class="row" style="align:center">
                        <div class="col-md-1"></div>
                        <div class="col-md-10"  style="padding-top:30px; padding-bottom:60px;">
                           <div class="p-30 bg-theme-colored" style="background-color: #eb7822 !important;color:#6a6a6a;">
                            <center><h3 class="title-pattern mt-0"><span class="text-white"><?= lang("home.appointment_frm"); ?></span></h3></center>
                            <!-- Appilication Form Start-->
                            <form class="row g-3"  id="bookappointment" method="post" enctype="multipart/form-data">
			
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group mb-20">
                                    <input placeholder="<?= lang("home.fname"); ?>" type="text" id="reservation_name" name="name" value="<?= set_value('name'); ?>" class="form-control" required="">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group mb-20">
                                    <input placeholder="<?= lang("home.lname"); ?>" type="text" id="reservation_lastname" name="lastname" value="<?= set_value('lastname'); ?>" class="form-control" required="">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group mb-20">
                                    <input placeholder="<?= lang("home.email"); ?>" type="email" id="email" name="email" value="<?= set_value('email'); ?>" class="form-control" required="">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group mb-20">
                                    <input placeholder="<?= lang("home.phone"); ?>" type="number" id="mobile" name="mobile" class="form-control" required="">
                                  </div>
                                 </div>
                                <div class="col-sm-6">
                                  <div class="form-group mb-20">
                                    <div class="styled-select">
                                      <select id="doctor" name="doctor" class="form-control" required="">
                                        <option value="">Select Your Doctor</option>
                                        <?php if($doctors):
                                            count($doctors);
                                            foreach($doctors as $doc):
                                                if($doc->top_doc == "admin"):
                                        ?>
                                        <option value="<?= $doc->id; ?>" selected><?= lang("home.dradminname"); ?></option>
                                        <?php else: ?>
                                        <option value="<?= $doc->id; ?>"><?= $doc->name; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <h6 style="color:red">Records Not Found</h6>
                                        <?php endif; ?>
                                       
                                      </select>
                                    </div>
                                  </div>
                                 </div>
                                
                                <div class="col-sm-6">
                                  <div class="form-group mb-20">
                                    <input name="bookingdate" id="bookingdate" value="<?= set_value('bookingdate'); ?>" class="form-control" type="text" placeholder="Appointment Date" required>
                                    
                                  </div>
                                 </div>
                                  <div class="col-sm-6"  id="">
                                      <div class="form-group mb-20">
                                          <?php 
                                                $adminfee = "";
                                                $doc_id  = "";
                                                if($doctors){
                                                    if($doctors[0]->top_doc == "admin"){
                                                        $adminfee = $doctors[0]->fee;
                                                        $doc_id = $doctors[0]->id;
                                                    }
                                                }
                                          ?>
                                        <input type="text" id="doctor_fee_box" value="<?= lang("home.Consultancyfee"); ?>: <?= $adminfee; ?>" class="form-control" readonly>
                                      <input type="hidden" id="doctorschid" value="<?= $doc_id; ?>">  
                                      </div>
                                    </div>
                                    <div class="col-sm-6"  id="shcdatebox">
                                      <div class="form-group mb-20">
                                        <select id="schdatethrowshow" name="scheduletime" class="form-control" required>
                                        </select>
                                      </div>
                                    </div>
                                 <div class="col-sm-12">
                                  <div class="form-group mb-20">
                                    <input placeholder="" type="file" id="avatar" name="avatar" class="form-control">
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <textarea placeholder="<?= lang("home.message"); ?>" rows="3" class="form-control required" name="message" value="<?= set_value('message'); ?>" id="form_message" aria-required="true"></textarea>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group mb-0 mt-10">
                                    <button type="submit" class="btn btn-colored text-black btn-lg btn-block" data-loading-text="<?= lang("home.Pleasewait"); ?>..." style="background-color:#6AB43E; color:white !important;"><b><?= lang("home.BookAppointment"); ?></b></button>
                                  </div>
                                </div>
                              </div>
                            </form>
            <!-- Application Form End-->

            <!-- Application Form Validation Start-->
            <script type="text/javascript">
              $("#reservation_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
            <!-- Application Form Validation Start -->
            </div>
          </div>
                    </div>
                  </div>
                </div>
            
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Gallery -->
    <section id="gallery">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-7 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase title mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i><?= lang("home.photo"); ?> <span class="text-theme-colored" style="color:#eb7822 !important;"><?= lang("home.gallary"); ?></span></h3>
              <!-- Portfolio Gallery Grid -->

              <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl1.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl1.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl2.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl2.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl3.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl3.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl4.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl4.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl5.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl5.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl6.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl6.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl7.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl7.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl8.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl8.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl9.png') ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl9.png') ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl10.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl10.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl11.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl11.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="<?= base_url('public/front_assets/images/gallery/gl12.png'); ?>" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?= base_url('public/front_assets/images/gallery/gl12.png'); ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
              </div>
              <!-- End Portfolio Gallery Grid -->
            </div>
            <div class="col-md-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="mt-0 mt-sm-30 mb-30"><?= lang("home.obj_title") ?></h3>
              <div id="accordion1" class="panel-group accordion">
                <div class="panel">
                  <div class="panel-title"> <a class="active" data-parent="#accordion1" data-toggle="collapse" href="#accordion11" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span><?= lang("home.obj_heading") ?></a> </div>
                  <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.obj_subtitle") ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span> <?= lang("home.spead_heading"); ?></a> </div>
                  <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.spead_title"); ?> </p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span> <?= lang("home.ptitle"); ?> </a> </div>
                  <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.ptheading"); ?> </p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion14" class="" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span><?= lang("home.dheading"); ?></a> </div>
                  <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.dtitle"); ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion15" class="" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span><?= lang("home.theading"); ?> </a> </div>
                  <div id="accordion15" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.ttitle"); ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion16" class="" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span><?= lang("home.hheading"); ?>  </a> </div>
                  <div id="accordion16" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.htitle"); ?> </p>
                    </div>
                  </div>
                </div>
                 <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion17" class="" aria-expanded="true" style="background-color: #eb7822 !important;color:white;"> <span class="open-sub"></span><?= lang("home.ptitle"); ?> </a> </div>
                  <div id="accordion17" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p><?= lang("home.pheading"); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Client Say -->
    <section class="divider parallax layer-overlay overlay-dark-6" data-background-ratio="0.5" data-bg-img="public/assets/images/con/bg4.jpg">
      <div class="container pt-60 pb-60">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="line-bottom-center text-theme-colored text-center mt-0 mb-30" style="color:#eb7822 !important;"><?= lang("home.ocls"); ?></h2>
            <div class="owl-carousel-1col" data-dots="true">
              <div class="item">
                <div class="testimonial-wrapper text-center">
                  <div class="thumb"><img class="img-circle" alt="" src="http://placehold.it/100x100"></div>
                  <div class="content pt-10">
                    <p class="font-15 text-white"><em><?= lang("home.ocls_title"); ?></em></p>
                    <i class="fa fa-quote-right font-36 mt-10 text-gray-lightgray"></i>
                    <h4 class="author text-theme-colored mb-0"style="color:#eb7822 !important;"><?= lang("home.zuhair"); ?></h4>
                    <!--<h6 class="title text-white mt-0 mb-15">Designer</h6>--->
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-wrapper text-center">
                  <div class="thumb"><img class="img-circle" alt="" src="http://placehold.it/100x100"></div>
                  <div class="content pt-10">
                    <p class="font-15 text-white"><em><?= lang("home.ocls_title"); ?></em></p>
                    <i class="fa fa-quote-right font-36 mt-10 text-gray-lightgray"></i>
                    <h4 class="author text-theme-colored mb-0"style="color:#eb7822 !important;"><?= lang("home.abdullah"); ?></h4>
                    <!--<h6 class="title text-white mt-0 mb-15">Designer</h6>--->
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-wrapper text-center">
                  <div class="thumb"><img class="img-circle" alt="" src="http://placehold.it/100x100"></div>
                  <div class="content pt-10">
                    <p class="font-15 text-white"><em><?= lang("home.ocls_title"); ?></em></p>
                    <i class="fa fa-quote-right font-36 mt-10 text-gray-lightgray"></i>
                    <h4 class="author text-theme-colored mb-0"style="color:#eb7822 !important;"><?= lang("home.ttleee"); ?></h4>
                    <!--<h6 class="title text-white mt-0 mb-15">Designer</h6>--->
                  </div>
                </div>
              </div>
               <div class="item">
                <div class="testimonial-wrapper text-center">
                  <div class="thumb"><img class="img-circle" alt="" src="http://placehold.it/100x100"></div>
                  <div class="content pt-10">
                    <p class="font-15 text-white"><em><?= lang("home.ocls_title"); ?></em></p>
                    <i class="fa fa-quote-right font-36 mt-10 text-gray-lightgray"></i>
                    <h4 class="author text-theme-colored mb-0"style="color:#eb7822 !important;"><?= lang("home.rtttt"); ?></h4>
                    <!--<h6 class="title text-white mt-0 mb-15">Designer</h6>--->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 

<?=  view('front/custome_js'); ?>

<script type="text/javascript">

 

  $(document).ready(function(){
    $.ajax({
          type:'ajax',
          method:'GET',
          url:'<?= base_url('Home/getevents/'); ?>',
          success:function(holidays){
            console.log(holidays);
            //var holidays = ["2021-06-22","2021-06-25","2021-06-28"];
            $('#bookingdate').datepicker({
               minDate:0,
               showButtonPanel: true,
              dateFormat: 'yy-mm-dd',
            beforeShowDay:function(date){

              var day = date.getDay();
              if (day == 0) {
                return [false, "markholiday" ];
              }else{
                var formattedDate = $.datepicker.formatDate("yy-mm-dd", date);
                if (holidays.indexOf(formattedDate)== -1) {
                  return [true];
                }else{
                  return [false,"markholiday"];
                }
                //return [true,  (holidays.indexOf(formattedDate)== -1)?"":"markholiday[false]"];
              }
            }
          });
            
          },
          
      });
    //$('#bookingdate').datepicker({minDate:0});
    //var holidays = ["2021-06-22","2021-06-25","2021-06-28"];

    
     
  });
</script>

<?= $this->endSection(); ?> 