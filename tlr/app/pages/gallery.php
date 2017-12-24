<?php
$gallery = array('title' => 'Gallery', 'fol' => 'g', 'msg' => 'Pictures of our place');

$dir = './img/' . $gallery['fol'];
$imgs = get_files($dir, '*', 1);
$fol = site_url(substr($dir, 2), 1) . '/';
$tnFol = $fol . 'tn/';
$imgSize = 450;
?>

<!-- gallery starts here -->
<script type="text/javascript">
  var curFol = "<?php echo $fol; ?>";
  var curSize = <?php echo $imgSize; ?>;
</script>

<div class="gallery" style="margin-top: 20px;">
<div class="picture" style="<?php echo sprintf('height: %spx; width: %spx;', $imgSize + 10, $imgSize + 10); ?>">
  <?php $file = $dir . '/' . $imgs[0];
  $s = getimagesize($file);
  $sizeName = $s[1] > $s[0] ? 'height' : 'width';
  echo sprintf('<img id="img-current" src="%s%s" alt="%s" %s="%s" />', $fol, $imgs[0], $imgs[0], $sizeName, $imgSize); ?>
</div>
<div class="thumbs" style="<?php echo sprintf('height: %spx;', $imgSize - 40); ?>">
<?php
$ix = 0;
foreach ($imgs as $img) {
  $file = $dir . '/' . $img;
  if (is_dir($file)) continue;
  $s = getimagesize($file); $wd = $s[0]; $ht = $s[1];
  $port = $ht > $wd ? 1 : 0;
  //echo sprintf('w: %s / h:%s / port:%s', $wd, $ht, $port);
  $or = $port ? "h" :  "w";
  $size = $port ? $wd : $ht;
  $sizeName = $port ? "height" : "width";
  echo sprintf('  <img src="%s%s" alt="%s" %s="100" data-size="%s" data-orient="%s" />
', $tnFol, $img, $img, $sizeName, $size, $or);
  if (++$ix % 2 == 0) echo '<br />';
}
?>
	</div>
<div class="clear"></div>
</div>
<!-- gallery ends here -->
