<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-UK">
<head>
  <title><?php echo $head['title']; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250" />
  <meta name="generator" content="PSPad editor, www.pspad.com" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="google" content="notranslate" />
  <meta http-equiv="keywords" content="<?php site_info("keywords"); ?>" />
  <meta http-equiv="description" content="<?php site_info("description"); ?>" />
  <link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css' />
<?php
  style_r(site_url("css/styles.css", 1));
  if (isset($contactForm))
    script_r(site_url("js/contact.js", 1));
  if ($page == 'gallery') {
    script_r("http://code.jquery.com/jquery.min.js");
    echo sprintf("  <script>window.jQuery || document.write('%s'); </script>
", str_replace('</', '\x3C/', script_r(site_url('js/jquery.min.js', 1), 1)));
    script_r(site_url("js/gallery.js", 1));
  }
?>
</head>
<body>
<div id="wrapper">
  <div id="header">
    <h2><a href="<?php site_url(""); ?>">
      <?php site_info('name'); ?>
    <span id="tagline"><?php site_info('byline'); ?></span>
    </a></h2>
    <div id="nav"><?php nav_links($page); ?></div>
  </div>
<div id="main">
<div id="content">
