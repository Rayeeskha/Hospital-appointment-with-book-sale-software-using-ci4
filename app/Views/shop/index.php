<?= $this->extend('front/layout'); ?>

<?= $this->section('content'); ?>
<style>
    .star-rating
    {
        color:white !important;
    }
</style>
 <section class="">
      <div class="container mt-30 mb-30 p-30">
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="col-md-12 col-md-offset-1">
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
                          <a class="btn btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#" style="background-color:#eb7822 !important; color:white;" >Add To Cart</a>
                        </div>
                        <div class="btn-product-view-details">
                          <a class="btn btn-default btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="javascript:void(0)" style="color:#707070;">View detail</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                      <a href="#!"><h5 class="product-title mt-0"><?= $pro->productname; ?></h5></a>
                      
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
                    <!---<span class="tag-sale" style="background:orange">In Stock! <?= $pro->stock; ?></span>--->
                    <a href="<?= base_url('Shop/productdetails/'.$pro->id); ?>">
                    <div class="product-thumb"> 
                      <img alt="" src="<?= base_url('public/uploads/productimg/'.$pro->photo); ?>" class="img-responsive img-fullwidth" style="width:100%;height:200px">
                      <div class="overlay">
                        <div class="btn-add-to-cart-wrapper">
                          <a class="btn btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#" onclick="add_to_Cart(<?= $pro->id ?>);" style="background-color:#eb7822 !important; color:white;">Add To Cart</a>
                        </div>
                        <div class="btn-product-view-details">
                          <a class="btn btn-default btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?= base_url('Shop/productdetails/'.$pro->id); ?>" style="color:#707070;">View detail</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                      <a href="<?= base_url('Shop/productdetails/'.$pro->id); ?>"><h5 class="product-title mt-0"><?= $pro->productname; ?></h5></a>
                      
                      <!--<div class="star-rating" title="Rated 3.50 out of 5" ><span style="width: 67%;" style="color:white !important;">3.50</span></div>--->
                      
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
                          <a class="btn btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#" onclick="add_to_Cart(<?= $pro->id ?>);" style="background-color:#eb7822 !important; color:white;">Add To Cart</a>
                        </div>
                        <div class="btn-product-view-details">
                          <a class="btn btn-default btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?= base_url('Shop/productdetails/'.$pro->id); ?>" style="color:#707070;">View detail</a>
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
                  
                <?php endif; ?>
                  
                </div>
                <?php endforeach; else: ?>
                <h6 style="color:red">Records Not Found</h6>
                <?php endif; ?>
                
                <!---<div class="col-md-12">
                  <nav>
                    <ul class="pagination theme-colored mt-0">
                      <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">...</a></li>
                      <li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                    </ul>
                  </nav>
                </div>--->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->

<?= $this->endSection(); ?> 