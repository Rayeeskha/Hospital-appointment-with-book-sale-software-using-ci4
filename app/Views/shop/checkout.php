<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<?php $validation =  \Config\Services::validation(); ?> 
<section>
    <div class="container">
        
    <div class="section-content">
            <div class="col-md-12">
                <div class="shipping-details">
                     <?php 
                        $cust_address =  fetchuser_address('shipping_address', session()->get('LOGIN_USER_ID'));
                        if($cust_address):
                     ?>
                      <div id="checkout-shipping-address">
                    <?php else: ?>
                    <div id="checkout-shipping-add">
                    <?php endif; ?>
                    <form  id="save_address"> 
                     
                       <div class="row mt-30">
                        <div class="col-md-12">
                            <div class="billing-details">
                              <h3 class="mb-30">Billing Details</h3>
                           <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="form_name">Name <small>*</small></label>
                                <input id="form_name" name="username" value="<?= set_value('username'); ?>" class="form-control" type="text" placeholder="Enter Name" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_email">Email <small>*</small></label>
                                <input id="form_email" name="email" value="<?= set_value('email'); ?>" class="form-control required email" type="email" placeholder="Enter Email" required>
                              </div>
                            </div>
                           
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_name">Mobile <small>*</small></label>
                                <input id="mobile" onkeyup="billingmobile()" name="mobile" value="<?= set_value('mobile'); ?>" class="form-control required" type="number" placeholder="Enter Mobile" required >
                               <span style="color:red;font-weight:500;display:none" id="mobile_error">Mobile Should be Eight Digit</span>
                               </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_phone">Alternative Mobile</label>
                                <input id="form_phone" name="alternative_mobile" value="<?= set_value('alternative_mobile'); ?>" class="form-control" type="number" placeholder="Alternative Mobile">
                              </div>
                            </div>
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="form_name">City Name <small>*</small></label>
                                <input id="form_subject" name="city" value="<?= set_value('city'); ?>" class="form-control required" type="text" placeholder="City Name" required>
                              </div>
                            </div>
                            
                          </div>
            
                          <div class="form-group">
                            <label for="form_name">Address</label>
                            <textarea id="form_message" name="address" value="<?= set_value('address'); ?>" class="form-control required" rows="5" placeholder="Enter Address" required></textarea>
                          </div>
                          <div class="form-group">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" id="billingnewadd_btn" data-loading-text="Please wait..."> Save Details</button>
                          </div>
                        </form>
                      </div>
                    </div>
             
          </div> 
          </div>
          <?php if($cust_address): ?>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="icon-box media bg-deep p-30 mb-20">
                   
                  <div class="row">
                      <?php foreach($cust_address as $add): ?>
                      <a class="media-left pull-left flip" href="#">
                          <i class="pe-7s-map-2 text-theme-colored"></i>
                      </a>
                    <div class="media-body">
                      <h5 class="mt-0">Address</h5>
                      <input type="radio" id="billing_add" name="billing_add" class="billing_add" value="<?= $add->id; ?>"checked>
                        <label for="male"><?= $add->address; ?></label><br>
                        <h6>City: <?= $add->city; ?></h6>
                        
                   </div>
                   </div>
                   <?php endforeach; ?>
                </div>
           </div>
          
          
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="icon-box media bg-deep p-30 mb-20">
                  <a class="media-left pull-left flip" href="#">
                      <i class="pe-7s-map-2 text-theme-colored"></i>
                  </a>
                  <div class="media-body">
                      <h5 class="mt-0">Shiping diffrent addresh</h5>
                      <button id="checkbox-ship-to-different-address" value="option1">Add New address</button>
                      
                  </div>
              </div>
          </div>
          <?php else: ?>
          <?php endif; ?>
          <!--<div class="form-group">
            <label>Order Notes</label>
            <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." rows="3"></textarea>
          </div>--->
        </div>
      </div>
              
           
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  
 <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped table-bordered tbl-shopping-cart">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Photo</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $total_amount = 0;
                      //$final_price = 0;
                      if($cartdetails):
                        count($cartdetails);
                        $cart_total= 0;
                        
                        foreach($cartdetails as $cart):
                            $pro = fetch_cate_rec('products', $cart->product_id);
                            $cart_total += $cart->qty * $cart->pro_price;
                            //$final_price +=$cart->qty * $cart->pro_price;
                      ?>
                        <tr class="cart_item">
                      <td class="product-remove"><a title="Remove this item" class="remove" href="javascript:void(0)" onclick="delete_item_in_carts(<?= $cart->id; ?>, 'load')">×</a></td>
                      <td class="product-thumbnail"><a href="#">
                          
                          <img alt="member" src="<?= base_url('public/uploads/productimg/'.$pro[0]->photo); ?>"></a>
                      </td>
                      <td class="product-name"><a href="#"><?= $pro[0]->productname; ?></a>
                    </td>
                      <td class="product-price">KWD<?= number_format($cart->pro_price); ?>
                      </td>
                      <td class="product-quantity"><div class="quantity buttons_added">
                          <input type="button" class="minus" value="-" onclick="update_quantity('sub', '<?= $cart->product_id; ?>')">
                          
                          <input type="number" size="4" class="input-text qty text" title="Qty" value="<?= $cart->qty; ?>" name="quantity_<?= $cart->product_id; ?>" min="1" step="1">
                          
                          <input type="button" class="plus" value="+" value="+" onclick="update_quantity('add', '<?= $cart->product_id; ?>')">
                        </div>
                    </td>
                      <td class="product-subtotal">KWD&nbsp;
                          <?php $total_amount = $cart->qty * $cart->pro_price;
                                echo number_format($total_amount);
                          ?>
                      </td>
                    </tr>
                    
                      <?php endforeach;?> 
                         
                    <tr class="cart_item">
                      <td colspan="3"><div class="coupon">
                          <label for="cart-coupon">Coupon: </label>
                          <input id="cart-coupon" type="text" placeholder="Coupon code" value="" name="coupon_code">
                          <button type="button" class="btn">Apply Coupon</button>
                        </div></td>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="2">KWD&nbsp; <?= number_format($cart_total); ?> </td>
                      
                    </tr>
                      <?php  else: ?>
                      <h6 style="color:red">Cart Empty</a>
                      <a href="<?= base_url('Shop'); ?>">Continue Shopping <span class="fa fa-shopping-cart"></span></a>
                  
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12 mt-30">
              <h4>Cart Totals</h4>
                  <table class="table table-bordered">
                    <tbody>
                      
                      <tr>
                        <td>Shipping and Handling</td>
                        <td>0.00</td>
                      </tr>
                      <tr>
                        <td>Order Total</td>
                        <td>KWD&nbsp;&nbsp;<?= number_format($cart_total); ?></td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <label class="radio-inline">
                  <input type="radio" name="payment_type" id="COD_PAYMENT" value="COD" checked>COD
                </label>
                <label class="radio-inline">
                  <input type="radio" name="payment_type" id="ONLINE_PAYMENT" value="ONLINE">Online
                </label>
                  <br><br>
                <a href="javascript:void(0)" onclick="purchase_cod_order()" class="btn btn-default">Place Order</a> </div>
                </div>
        
          </div>
        </div>
      </div>  
    
</section>
<br><br><br><br>
<script>
    
   function purchase_cod_order(){
        let address = $("input[name='billing_add']:checked").val();
        let payment_type = $("input[name='payment_type']:checked").val();
        if (payment_type == 'COD') {
            $.ajax({
              type:'ajax',
              method:'GET',
              url:'<?= base_url('Shop/placeorder/'); ?>',
              data:{address:address,payment_type:payment_type},
              success:function(data){
                alert('Success ! Order Purcahse Successfully');
                window.location.href = '<?= base_url('Shop'); ?>';
              },
              error:function(){
                  // alert('Error! Technical Issue Contact with Administrator');
              }
          });
          }else{
             window.location.href = '<?= base_url('Shop/onlinecheckout') ?>/'+address;
          }
    }


 
    
    function billingmobile(){
        var mobile_number = $('#mobile').val();
    	var mobile_number_len = $('#mobile').val().length;
    
    	if (mobile_number_len == 8) {
    	    $('#billingnewadd_btn').prop('disabled',false);
    	    $('#mobile_error').hide();
    	}else{
    	    $('#mobile_error').show();
    	    $('#billingnewadd_btn').prop('disabled',true);
    	}
    }
    
    $('#save_address').on('submit', function(e){
    	e.preventDefault();
    	$.ajax({
    		url:'<?= site_url('Shop/savecustaddress'); ?>',
    		method:'POST',
    		data:new FormData(this),
    		contentType:false,
    		cache:false,
    		processData:false,
    		success:function(result){
    		    console.log(result);
    		     let data = $.parseJSON(result);
    		    if (data.is_error == 'yes') {
                    /*$('#errormodal').modal('show');
                    $('#error_heading').text(data.dd);*/
                    alert(data.dd);
                }
                if (data.is_error== 'no') {
                    alert(data.dd);
                    /*$('#successmodal').modal('show');
                    $('#success_heading').text(data.dd);*/
                    location.reload();
                }
    		},
    		error:function(){
    			alert('Error!Appointment Booking');
    		}
    	});
    });
</script>

<?= $this->endSection(); ?> 