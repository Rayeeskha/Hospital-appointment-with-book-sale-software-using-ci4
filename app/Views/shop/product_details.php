<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>


    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="product">
              <div class="col-md-5">
                <div class="product-image">
                  <div class="zoom-gallery">
                    <a href="<?= base_url('public/uploads/productimg/'.$product[0]->photo); ?>" title="<?= $product[0]->productname; ?>"><img src="<?= base_url('public/uploads/productimg/'.$product[0]->photo); ?>" alt="<?= $product[0]->productname; ?>"></a>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="product-summary">
                  <h2 class="product-title"><?= $product[0]->productname; ?></h2>
                  <div class="product_review">
                    <ul class="review_text list-inline">
                      <!---<li>
                        <div title="Rated 4.50 out of 5" class="star-rating"><span style="width: 90%;">4.50</span></div>
                      </li>--->
                      <li><a href="#"><span>2</span>Reviews</a></li>
                      <li><a href="#">Add reviews</a></li>
                    </ul>
                  </div>
                  <div class="price"> <del><span class="amount">KWD<?= number_format($product[0]->mrpprice); ?></span></del> <ins><span class="amount">KWD<?= number_format($product[0]->price); ?></span></ins> </div>
                  <div class="short-description">
                    <p>
                    <?php 
                        if($product[0]->desctiption){
                            echo word_limiter($product[0]->desctiption, 6);
                        }
                    ?>
                   
                    </p>
                  </div>
                  <div class="category"><strong>Category:</strong> <a href="#">
                      <?php 
                        $cate = fetch_cate_rec('category',$product[0]->category_id);
                        if($cate){
                          echo $cate[0]->categoryname; 
                        }
                      ?>
                      </a></div>
                  <div class="cart-form-wrapper mt-30">
                    <form enctype="multipart/form-data" method="post" class="cart">
                      <input type="hidden" value="productID" name="add-to-cart">
                      <table class="table variations no-border">
                        <tbody>
                          <?php $check_cart =  check_cart_product('cart', $product[0]->id); ?>
                          <tr>
                            <td class="name">Quantity</td>
                            <td class="value">
                              <div class="quantity buttons_added">
                                <input type="button" class="minus" value="-" onclick="update_quantity('sub', '<?= $product[0]->id; ?>')">
                                <?php if($check_cart): ?>
                                <input type="number" size="4" class="input-text qty text" title="Qty" value="<?= $check_cart[0]->qty; ?>" name="quantity_<?= $product[0]->id; ?>" min="1" step="1" >
                                <?php else: ?>
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity_<?= $product[0]->id; ?>" min="1" step="1" >
                                <?php endif; ?>
                                
                                <input type="button" class="plus" value="+" onclick="update_quantity('add', '<?= $product[0]->id; ?>')">
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <a href="javascript:void(0)" class="single_add_to_cart_button btn" onclick="add_to_Cart(<?= $product[0]->id ?>);"style="background-color:#eb7822; color:white;">Add to cart</a>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="horizontal-tab product-tab">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
                    <li><a href="#tab2" data-toggle="tab">Additional Information</a></li>
                    <li><a href="#tab3" data-toggle="tab">Reviews</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                      <h3>Product Description</h3>
                      <p>
                      <?php 
                        if($product[0]->longdesc){
                            echo $product[0]->longdesc;
                        }
                    ?>
                    </p>
                     
                    </div>
                    <div class="tab-pane fade" id="tab2">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Brand</th>
                            <td><p>Envato</p></td>
                          </tr>
                          <tr>
                            <th>Color</th>
                            <td><p>Brown</p></td>
                          </tr>
                          <tr>
                            <th>Size</th>
                            <td><p>Large, Medium</p></td>
                          </tr>
                          <tr>
                            <th>Weight</th>
                            <td>27 kg</td>
                          </tr>
                          <tr>
                            <th>Dimensions</th>
                            <td>16 x 22 x 123 cm</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                      <div class="reviews">
                        <ol class="commentlist">
                          <li class="comment">
                            <div class="media"> <a href="#" class="media-left"><img class="img-circle" alt="" src="https://placehold.it/75x75" width="75"></a>
                              <div class="media-body">
                                <ul class="review_text list-inline">
                                  <li>
                                    <div title="Rated 5.00 out of 5" class="star-rating"><span style="width: 100%;">5.00</span></div>
                                  </li>
                                  <li>
                                    <h5 class="media-heading meta"><span class="author">Tom Joe</span> – Mar 15, 2015:</h5>
                                  </li>
                                </ul>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                            </div>
                          </li>
                          <li class="comment">
                            <div class="media"> <a href="#" class="media-left"><img class="img-circle" alt="" src="https://placehold.it/75x75" width="75"></a>
                              <div class="media-body">
                                <ul class="review_text list-inline">
                                  <li>
                                    <div title="Rated 4.00 out of 5" class="star-rating"><span style="width: 80%;">4.00</span></div>
                                  </li>
                                  <li>
                                    <h5 class="media-heading meta"><span class="author">Mark Doe</span> – Jan 23, 2015:</h5>
                                  </li>
                                </ul>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                            </div>
                          </li>
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
      </div>
    </section>
  <!-- end main-content -->

<?= $this->endSection(); ?> 