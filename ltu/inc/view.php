<?php
//Prints / returns the site info provided in the settings.
function site_info($what = 'name', $return = 0)
{
  global $settings;
  $name = 'site_' . $what;
  
  if (!isset($settings[$name])) return '';
  if ($what == 'copy') {
    $res = sprintf($settings[$name], date('Y'));
  }
  else {
    $res = $settings[$name];
  }
  
  if ($return) return $res;
  echo $res;
}

function get_head($head)
{
  if (!isset($head['title'])) $head['title'] = site_info('title', 1);
  
  return $head;
}

function root_url($rel, $timestamp = 1, $return = 0)
{
  $rel = "_/" . $rel;
  $res = site_url($rel, $return);
  if ($timestamp)
  {
    $fil = site_file($rel);
    if (file_exists($fil)) $res .= "?" . print_r(filemtime($fil), 1);
  }
  if ($return) return $res;
  echo $res;
}

function fld_null($itm, $fld, $alt)
{
  return $itm[$fld] != null ? $itm[$fld] : $itm[$alt];
}

function tsv_to_array($data, &$cols = null)
{
  $r = array();
  $lines = explode(PHP_EOL, $data);
  foreach ($lines as $lin)
  {
    if ($lin == '' || $lin[0] == '#')
    {
      if ($cols != null && !is_object($cols) && $lin != '')
        tsv_set_cols($lin, $cols);
      continue;
    }
    $r[] = explode("	", $lin);
  }
  return $r;
}

function tsv_set_cols($lin, &$c)
{
	$lin = substr($lin, 1);
	$r = explode("	", $lin);
	$c = new stdClass();
	foreach ($r as $key => $value)
	{
		$value = trim($value);
		$c->$value = trim($key);
	}
}

function array_group_by($array, $index)
{
  $r = array();
  foreach ($array as $i)
  {
    if (!isset($r[$i[$index]])) $r[$i[$index]] = array();
    $r[$i[$index]][] = $i;
  }
  return $r;
}

function link_r($url, $text, $return = 0, $css = null)
{
  if ($css != null) $css .= ' ';
  $res = sprintf('<a %shref="%s">%s</a>', $css, $url, $text);
  if ($return) return $res;
  echo $res;
}

function script_r($url, $return = 0)
{
  $res = sprintf('<script src="%s" type="text/javascript"></script>', $url);
  if ($return) return $res;
  echo '  ' . $res . '
';
}

function style_r($url, $return = 0)
{
  $res = sprintf('<link rel="stylesheet" type="text/css" href="%s" />', $url);
  if ($return) return $res;
  echo '  ' . $res . '
';
}

function img_r($file, $alt = 0, $wd = 0, $ht = 0)
{
  $res = '<img src="'.site_url('img/' . $file, 1).'"';
  
  if ($alt) $res .= ' alt="' . $alt . '"';
  if ($wd) $res .= ' width="' . $wd . '"';
  if ($ht) $res .= ' height="' . $ht . '"';
  $res .= ' />';
  return $res;
}

function img_p($file, $alt = 0, $height = 0, $width = 0)
{
  echo img_r($file, $alt, $height, $width);
}


function print_nl($txt = null)
{
  if ($txt != null) echo $txt;
  echo '
';
}

function print_br()
{
  print_nl('<br />');
}

function new_table($headings, $atts = null)
{
  include_once '3p/Table.php';
  $t = new CI_Table();
  $t->set_heading($headings);
  $t->set_template(array(
    'table_open' => '<table border="1"'. ($atts != null ? ' ' . $atts : '') .'>',
    'row_alt_start' => '<tr class="alt">',
  ));
  return $t;
}

?>
