<?php
function nav_link($url, $text, $page)
{
  $css = $url == $page || ($url == '' && $page == 'home') ? 'class="current"' : '';
  link_r(site_url($url, 1), $text, 0, $css);
  print_nl();
}

function nav_links($page)
{
  $links = array('' => 'Home', 'activities', 'gallery', 'location', 'contact');
  foreach ($links as $key=>$value)
  {
    if (is_numeric($key))
    {
      $key = $value;
      $value = ucfirst($value);
    }
     
    nav_link($key, $value, $page);
  }
}

?>
