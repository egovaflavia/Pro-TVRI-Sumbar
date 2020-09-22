<?php if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}  ?>
<!-- box home info covid -->
<div id="box-home-a">
  <h4 class="text-danger mb-2 text-center"><b>Info Covid-19</b></h4>
  <?php include_once "bmkg/covid.php"; ?>
</div>
<div class="jarak">&nbsp;</div </div> <!-- box home pu -->
<div id="box-home-a">
  <div class=""><span class=""></span></div>
  <?php include_once "bmkg/pu.php"; ?>
</div>
<div id="">
  <h4 class="text-black mb-2 text-center"><b>Sosial Media</b></h4>
  <p class="text-black" style="margin-bottom: 0px;margin-top: 15px;">Instagram</p>
  <?php include_once "bmkg/insta.php"; ?>
  <p class="text-black" style="margin-bottom: 0px;margin-top: 15px;">Youtube</p>
  <?php include_once "bmkg/youtube.php"; ?>
  <p class="text-black" style="margin-bottom: 0px;margin-top: 15px;">Facebook</p>
  <?php include_once "bmkg/fb.php"; ?>
  <!-- <p class="text-black" style="margin-bottom: 0px;margin-top: 15px;">Twitter</p>
  <?php include_once "bmkg/tweet.php"; ?> -->
</div>
<div class="jarak">&nbsp;</div </div> <!-- box home sosmed -->