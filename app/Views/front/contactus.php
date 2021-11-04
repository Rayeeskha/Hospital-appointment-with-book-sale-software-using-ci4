<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

  <!-- Divider: Contact -->
    <section class="divider">
      <div class="container">
        <div class="row pt-30">
          <div class="col-md-5">
            <h3 class="mt-0 mb-30"><?= lang("home.inttitle"); ?></h3>
            
            <!-- Contact Form -->
            <form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= lang("home.name"); ?> <small>*</small></label>
                    <input name="form_name" class="form-control" type="text" placeholder="<?= lang("home.lname"); ?>" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= lang("home.email"); ?> <small>*</small></label>
                    <input name="form_email" class="form-control required email" type="email" placeholder="<?= lang("home.email"); ?>">
                  </div>
                </div>
              </div>
                
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= lang("home.message"); ?> <small>*</small></label>
                    <input name="form_subject" class="form-control required" type="text" placeholder="<?= lang("home.message"); ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= lang("home.phone"); ?></label>
                    <input name="form_phone" class="form-control" type="text" placeholder="<?= lang("home.phone"); ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label><?= lang("home.message"); ?></label>
                <textarea name="form_message" class="form-control required" rows="5" placeholder="<?= lang("home.message"); ?>"></textarea>
              </div>
              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-dark btn-flat mr-5" data-loading-text="<?= lang("home.Pleasewait"); ?>" style="color:#eb7822 !important;"><?= lang("home.sendmessage"); ?></button>
                <button type="reset" class="btn btn-default btn-flat"><?= lang("home.reset"); ?></button>
              </div>
            </form>

            <!-- Contact Form Validation-->
            <script type="text/javascript">
              $("#contact_form").validate({
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
          </div>
          <div class="col-md-7">
            <div class="row">
              <h3 class="mt-0 mb-50 ml-15"><?= lang("home.ol"); ?></h3>
              <!--<div class="col-md-12">                
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque</p>
              </div>--->
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="icon-box media bg-deep p-30 mb-20"> <a class="" href="https://maps.google.com/?q=29.169167,48.099258"> <i class="pe-7s-map-2 media-left pull-left flip"style="color:#eb7822;"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0"><?= lang("home.olf"); ?></h5>
                    <p><?= lang("home.Kuwait"); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="icon-box media bg-deep p-30 mb-20"> <a class="" href="#"> <i class="pe-7s-call media-left pull-left flip" style="color:#eb7822;"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0"><?= lang("home.cn"); ?></h5>
                    <p>(+965) 90928555</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="icon-box media bg-deep p-30 mb-20"> <a class="" href="#"> <i class="pe-7s-mail media-left pull-left flip" style="color:#eb7822;"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0"><?= lang("home.ea"); ?></h5>
                    <p>info@topwinnerkw.com</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="icon-box media bg-deep p-30 mb-20"> <a class="" href="https://api.whatsapp.com/send?phone=96522204271"> <i class="fa fa-whatsapp media-left pull-left flip" style="color:#eb7822;"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0"><?= lang("home.wcl"); ?></h5>
                    <p>(+965)99141090</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  

<?= $this->endSection(); ?> 