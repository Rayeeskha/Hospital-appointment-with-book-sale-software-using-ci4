<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<section>
    <div class="container">
        
    <div class="section-content">
            <div class="col-md-12">
                <div class="shipping-details">
                    <div id="checkout-shipping-add">
                    <form id="checkout-form" action="<?= base_url('Shop/updateaddress/'.$edit[0]->id); ?>" method="post"> 
                     
                       <div class="row mt-30">
                        <div class="col-md-12">
                            <div class="billing-details">
                              <h3 class="mb-30">Billing Details</h3>
                              <form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
            
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="form_name">Name <small>*</small></label>
                                <input id="form_name" name="username" class="form-control" type="text" value="<?= $edit[0]->username; ?>">
                                <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'username'); ?></span>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_email">Email <small>*</small></label>
                                <input id="form_email" name="email" class="form-control required email" type="email" value="<?= $edit[0]->email; ?>">
                                  <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'email'); ?></span>
                              
                              </div>
                            </div>
                           
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_name">Mobile <small>*</small></label>
                                <input id="form_subject" name="mobile" class="form-control required" type="text" value="<?= $edit[0]->mobile; ?>">
                                 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'mobile'); ?></span>
                              
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_phone">Alternative Mobile</label>
                                <input id="form_phone" name="alternative_mobile" class="form-control" type="text" value="<?= $edit[0]->alternative_mobile; ?>">
                              </div>
                            </div>
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_name">City Name <small>*</small></label>
                                <input id="form_subject" name="city" class="form-control required" type="text" value="<?= $edit[0]->city; ?>">
                                <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'city'); ?></span>
                              
                              </div>
                            </div>
                            
                          </div>
            
                          <div class="form-group">
                            <label for="form_name">Address</label>
                            <textarea id="form_message" name="address" class="form-control required" rows="5"><?= $edit[0]->address ?></textarea>
                              <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'address'); ?></span>
                                
                          </div>
                          <div class="form-group">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait..."> Update Details</button>
                          </div>
                        </form>
                      </div>
                    </div>
             
          </div> 
          </div>
         
          
        </div>
      </div>
              
           
          </div>
        </div>
      </div>
    </section>

<?= $this->endSection(); ?> 