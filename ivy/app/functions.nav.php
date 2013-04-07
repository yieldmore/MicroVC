<?php
function nav_link($url, $text, $page)
{
  $css = $url == $page || ($url == '' && $page == 'home') ? 'class="current"' : '';
  link_r(site_url($url, 1), $text, 0, $css);
  print_nl();
}

function nav_links($page, $data = 0)
{
  $links = array('' => 'Home', 'demos',
    'iviewer' => 'IViewer', 'ftp-sync' => 'FTP Sync', 'aio' => 'AIO', 'updater', 'win-xt' => 'Win XT', 
    /*'games', 'utils',*/ 
    'about', 'donate' => 'Donations', 'contact');
  if ($data) return $links;
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

function nav_title($page)
{
  global $settings;
  if ($page == 'home')
    return sprintf('%s - %s', $settings['site_title'], $settings['site_byline']);

  $links = nav_links(null, 1);
  foreach ($links as $key=>$value)
  {
    if ($page == (is_numeric($key) ? $value : $key))
    {
      $name = is_numeric($key) ? ucfirst($value) : $value;
      return sprintf('%s - %s', $name, $settings['site_title']);
    }
  }
}

?>
