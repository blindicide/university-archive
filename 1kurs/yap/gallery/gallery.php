<link href="gallery.css" rel="stylesheet">
<script src="gallery.js"></script>
 
<div class="gallery">
<?php
  $dir = __DIR__ . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR;
  $images = glob("$dir*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);
 
  // (C) OUTPUT IMAGES
  foreach ($images as $i) {
    printf("<img src='files/%s'>", rawurlencode(basename($i)));
  }
?>
</div>