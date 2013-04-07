<?php
link_r(site_url("search", 1), "Search", 0, 'class="nav"');
include '_searchform.php';
print_nl('<hr>');

$table = new_table(array('Family Name', 'Head', 'Pages at'), 'id="family" class="grid"');
foreach ($items as $f)
{
  $head = link_person($f['headId'], $f['head'], 1);
  $ppl = array();
  foreach ($f['pages'] as $p) {
  	$ppl[] = link_person($p['id'], $p['name'], 1);
  }
  $pages = count($ppl) > 0 ? implode(", ", $ppl) : "None"; 
  
  $table->add_row(array($f['name'], $head, $pages ));
}
echo $table->generate();
?>
