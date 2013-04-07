<?php
function startsWith($haystack, $needle)
{
  $length = strlen($needle);
  return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
  $length = strlen($needle);
  if ($length == 0) {
    return true;
  }

  return (substr($haystack, -$length) === $needle);
}

function get_files($fol, $extension = '*', $extn = 0)
{
  $res = array();
  $dir  = opendir($fol);

  while (false !== ($item = readdir($dir)))
  {
    if ($item == "." || $item == "..") continue;
    if (is_dir($fol . $item)) continue;
    
    if ($extension != '*' && !endsWith($item, $extension)) continue;
    
    if (!$extn) $item = preg_replace("/\\.[^.\\s]{3,4}$/", "", $item);
    $res[] = $item;
  }

  return $res;
}

?>
