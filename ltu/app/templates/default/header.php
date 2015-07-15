<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title><?php echo $head['title']; ?></title>
  <link rel="stylesheet" href="<?php site_url("css/styles.css"); ?>" />
  
  <!-- jQuery includes -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write("<script src='<?php site_url("js/jquery-1.7.1.min.js"); ?>'>\x3C/script>")
</script>
</head>
<body>

<div id="container">
<header>
  <h1><?php site_info('title'); ?></h1>
  <div id="nav">
  <?php
  link_r(site_url('', 1), 'Home');
  link_r(site_url('labs', 1), 'Labs');
  link_r(site_url('about', 1), 'About us');
  if (isset($_SESSION['username']))
    link_r(site_url('logout', 1), 'Logout (' . $_SESSION['username'] . ')');
  else
    link_r(site_url('login', 1), 'Login');
  ?>
  </div>
</header>
<div id="content">
