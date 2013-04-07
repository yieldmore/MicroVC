<?php
link_r(site_url("", 1), "Back to Family List", 0, 'class="nav"');
if (isset($familylinks)) foreach ($familylinks as $text=>$url) link_r($url, $text, 0, 'class="nav" target="new"');
include '_searchform.php';
print_nl('<hr>');

function person_link($p, $r = 0)
{
  $css = person_css($p);
  return link_person($p['id'] , $p['name'], $r, $css);
}

?>
<div id="ancestors">
<strong>Lineage</strong>:
<?php
$cnt = count($ancestors);
foreach ($ancestors as $ix=>$a)
{
  person_link($a);
  echo sprintf(' <span%s>(%s)</span>', $ix == $cnt - 1 ? ' class="last"' : '', person_info($a, 'relation'));
  print_nl();
}
if ($cnt == 0) print_nl("Family Head");
?>
</div>

<div id="info">
<strong>Info</strong>:
<?php
echo person_info($person, 'relation');
if (isset($person['generation'])) echo ', Generation: ' . $person['generation'];
?>
</div>

<?php if ($cnt> 0 && !$person['isSpouse']) { ?>
<div id="siblings">
<strong>Siblings</strong>:
<?php
$cnt = count($siblings);
foreach ($siblings as $ix=>$a)
{
  person_link($a);
  if ($ix != $cnt - 1) echo ', ';
  print_nl();
}
if ($cnt == 0) print_nl("None");
?> 
</div>
<?php } ?>

<div id="chart" class="orgChart"></div>
<div style="display:none">
<ul id="family">
<?php
// http://www.planetkodiak.com/code/hierarchical-data-in-mysql/
$current_depth;
$last_depth	= -1;
$start_depth = $children[0]['level'];
$startId = $children[0]['id'];
foreach ($children as $p) {
  $current_depth = $p['level'];
  
  if ($last_depth > $current_depth)
    print_nl(str_repeat('</ul></li>',($last_depth-$current_depth)));
  
  echo '<li>' . person_link($p, 1);
  
  if ($startId != $p['id'] && $p['isBroken'] == 1)
    print_nl('</li>');
  else if ($p['rgt'] - 1 != $p['lft'])
		print_nl('<ul>');
	else
		print_nl('</li>');
	
	$last_depth = $current_depth;
  
  print_nl();
}
while($last_depth >= ($start_depth+1)) { print_nl('</ul></li>'); $last_depth--; }
?>
</ul>
</div>
