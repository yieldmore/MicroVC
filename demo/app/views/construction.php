<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php site_info(); ?></title>
    <style type="text/css">
    <!--
      body { text-align: center; background-color: #6699ff; font-family: verdana; }
      #content { width: 600px; border: 3px solid #999; padding: 20px; background-color: whitesmoke; margin: 50px auto 20px auto }
    //-->
    </style>
  </head>
  <body>
    <div id="content">
      Welcome to <strong><?php site_info(); ?></strong>
      
      <br /><br /><br />This website is under construction.
    </div>
    <?php site_info('copy'); ?>
  </body>
</html>
