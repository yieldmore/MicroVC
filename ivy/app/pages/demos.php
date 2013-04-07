<p class="p-dload">These videos are all planned, none are recorded yet</p>
<?php
$hr = 0;
foreach ($products as $key=>$p)
{
  if (!isset($p['videos'])) continue;
  $list = $p['videos'];
  if ($hr) print_nl('<hr />');
  $p = $products[$key];
  echo sprintf('<h2>%s</h2> <i>%s</i>', $p['name'], $p['desc']);
  foreach ($list as $name=>$desc)
  {
  	if (is_array($desc))
  	{
  		$vid = sprintf('<b>%s</b> - %s<br/><iframe src="http://www.screenr.com/embed/%s" width="650" height="396" frameborder="0"></iframe><br/><br/>', $name, $desc[0], $desc[1]);
  		$desc = '';
  	}
  	else
  	{
    	$vid = '#' . $key . '-' . str_replace(' ', '-', strtolower($name)) . '.flv';
    	$vid = link_r($vid, $name, 1);
    }
    //$vid = site_url('videos/' . $vid, 1);
    echo sprintf('<div>%s %s</div>', $vid, $desc);
  }
  $hr = 1;
}

?>
