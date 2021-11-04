<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

   <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1080">
      <div class="container pt-90 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-theme-colored">Shop Cart</h3>
              <ul class="list-inline text-white">
                <li>Home /</li>
                <li><span class="text-gray">Shop Cart</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


 <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped table-bordered tbl-shopping-cart">
                  <thead>
                    <tr>
                      <th>Delete</th>
                      <th>Photo</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if($cartdetails):
                        count($cartdetails);
                        $cart_total= 0;
                        foreach($cartdetails as $cart):
                            $pro = fetch_cate_rec('products', $cart->product_id);
                            $cart_total += $cart->qty * $cart->pro_price;
                      ?>
                        <tr class="cart_item">
                      <td class="product-remove"><a title="Remove this item" class="remove"   href="javascript:void(0)" onclick="delete_item_in_carts(<?= $cart->id; ?>)">×</a></td>
                      <td class="product-thumbnail"><a  href="<?= base_url('Shop/productdetails/'.$pro[0]->id); ?>">
                          
                          <img alt="member" src="<?= base_url('public/uploads/productimg/'.$pro[0]->photo); ?>"></a>
                      </td>
                      <td class="product-name"><a href="<?= base_url('Shop/productdetails/'.$pro[0]->id); ?>"><?= $pro[0]->productname; ?></a>
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
                        <td>Order Total</td>
                        <td>KWD&nbsp;&nbsp;<?= number_format($cart_total); ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="<?= base_url('Shop/checkout'); ?>" class="btn btn-default">Proceed to Checkout</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->


<?= $this->endSection(); ?> 