<?php if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}

$cekheadline = $akdb->dbobject("SELECT COUNT(*) as num FROM " . _TBBERITA . " WHERE headline='1'");

if ($cekheadline->num <= 0) {

  echo "";
} else {

  $sqlheadline = $akdb->dbquery("SELECT * FROM " . _TBBERITA . " WHERE headline='1' ORDER BY tgl_jam DESC LIMIT 0,5");
?>

  <!-- <div id="box-headline">
<div style="float:left;width: 15%;">
Headline &raquo;
</div>
<div style="float:right;width: 85%;">
<marquee behavior="scroll" direction="left" scrollamount="5" scrolldelay="150">
 <?php
  while ($rowheadline = mysql_fetch_object($sqlheadline)) {

    $judul4 = str_replace(" ", "-", $rowheadline->judul);
    $judul41 = str_replace("/", "-", $judul4);

    echo "<a href=\"" . _URLWEB . "berita/detil/$rowheadline->id_br/" . strtolower(str_replace(" ", "-", $judul41)) . ".html\">" . strtoupper($rowheadline->judul) . "</a>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;";
  }
  ?>
</marquee>
</div>
<div class="clear"></div>
</div> -->

<?php
}
?>