<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>
<?= view('appointment/css_file'); ?>

<?php 
    $list=array();
    $month = date('m');
    $year = date('Y');
?>

<div class="container">
    <h1>Schedule List</h1>
    <div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      <?= date('M'); ?><br>
      <span style="font-size:18px"><?= $year; ?></span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days"> 

  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><a href="<?= base_url('Home/schedulelist/'.$schedule[0]->doctor_id); ?>"><span class="active">10</span></a></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>

</div>




<div style="margin-top:10%"></div></div>
<?= $this->endSection(); ?> 