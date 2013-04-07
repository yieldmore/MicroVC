<div id="slideshow"><?php foreach ($products as $p=>$i) echo sprintf('
  <div><a href="%s"><img src="%s" alt="%s" height="300" width="800" /></a></div>', $p, site_url("img/" . $p . ".jpg", 1), $i['name']); ?>
</div>

<div id="inner-home">
 
<p class="head head-b">Welcome to Ivy Technologies</p>
<p>
  The free Windows Apps wing of cselian.com and Imran, Ivy Technologies intends to provide only 
  the best programs as evinced by
</p>
<ul>
<?php
foreach ($products as $k=>$i)
{
  $name = link_r($k, $i['name'], 1);
  $pic = site_url('img/icons/' . $k . '.png', 1);
  echo sprintf('<li><img src="%s" height="32" /><b>%s</b> - %s <br/>
  <u>Features</u>: %s<br/>
  <u>Intended for</u>: %s</li>', $pic, $name, $i['desc'], $i['feat'], $i['targets']);
}
?>

</ul>
</div>
