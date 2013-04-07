<head>
  <meta charset="utf-8">
  <title><?php echo $head['title']; ?></title>
  <meta name="description" content="<?php echo $head['description']; ?>" />
  <meta name="keywords" content="<?php echo $head['keywords']; ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?php root_url("css/style.css"); ?>">
  <link rel="stylesheet" href="<?php root_url("css/content.css"); ?>"><?php 
  if (isset($head['map'])) echo '
  <script src="http://maps.google.com/maps/api/js?sensor=false"type="text/javascript"></script>'; ?>
</head>

<div class="container">
<header class="clearfix">
	<h1><a href="<?php echo site_url("home"); ?>" accesskey="1"><?php echo WEBSITE_NAME; ?></a></h1>
	<?php echo '<div class="info">' . ($loggedIn ? $this->data['userInfo'] : "&nbsp;") . '</div>'; ?>
	<nav>
		<ul>
		  <li><a href="<?php site_url("plan"); ?>" class="current"><span>View Plan</span></a></li>
		  <li><a href="#"><span>link 2</span></a></li>
		  <li><a href="#"><span>link 3</span></a></li>
		</ul>
	</nav>
</header>
<div id="main">
