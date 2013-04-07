<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title><?php echo $head['title']; ?></title>
  <link rel="stylesheet" href="<?php root_url("css/styles.css"); ?>" />
  
  <!-- jQuery includes -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='<?php echo "/aikon/_/js/libs/jquery-1.7.1.min.js" ?>'>\x3C/script>")
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
  
  <script src="<?php root_url("js/jquery.jOrgChart.js"); ?>"></script>
  <link rel="stylesheet" href="<?php root_url("css/jquery.jOrgChart.css"); ?>" />

  <script>
  jQuery(document).ready(function() {
      $("#family").jOrgChart({
          chartElement : '#chart',
          dragAndDrop  : true
      });
  });
  </script>
  
</head>
<body>
