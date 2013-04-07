<?php
function link_person($id, $name, $return, $css = null)
{
	$url = site_url(sprintf("people/%s/%s/", $id, str_replace(' ', '-', $name)), 1);
	return link_r($url, $name, $return, $css);
}

function person_info($p, $what)
{
  if ($what == 'gender') return $p['isFemale'] ? 'Female' : 'Male';
  if ($what == 'relation')
  {
    if ($p['parent_id'] != 0)
    {
      if ($p['isSpouse'])
        return $p['isFemale'] ? 'Wife' : 'Husband';
      else
        return $p['isFemale'] ? 'Daughter' : 'Son';
    }
    else
    {
      return 'Head';
    }
  }
}

function person_css($p)
{
  $styles = array();
  if ($p['isFemale']) $styles[] = 'female';
  if ($p['isSpouse']) $styles[] = 'spouse';
  if ($p['isBroken']) $styles[] = 'broken';
  return count($styles) > 0 ? sprintf(' class="%s"', implode(" ", $styles)) : '';
}

?>
