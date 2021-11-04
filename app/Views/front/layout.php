<?= view('front/css_file'); ?>
<?= view('front/header'); ?>
<?= view('front/custome_js'); ?>
<!------Website Wrapper ----->
    <div style="margin-left: 20px;margin-right: 10px">
          <?php  if(session()->getTempdata('success')): ?>
                <div class="card">
                  <div class="card-content" style="margin-left: 20px;margin-right: 20;padding: 10px; background: green;color: white;font-weight: 500">
                    <span class="fa fa-check"></span>&nbsp;&nbsp;<?= session()->getTempdata('success'); ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php  if(session()->getTempdata('error')): ?>
                <div class="card">
                  <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: red;color: white;font-weight: 500">
                    <span class="fa fa-times"></span>&nbsp;&nbsp;<?= session()->getTempdata('error'); ?>
                  </div>
                </div>
               
        <?php endif; ?>
         </div>
    <?= $this->renderSection("content"); ?>
<!------Website Wrapper ----->



<?= view('front/footer'); ?>
