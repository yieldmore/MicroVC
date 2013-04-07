<?php
link_r(site_url("", 1), "Back to Family List", 0, 'class="nav"');
print_nl('<hr>');
include '_searchform.php';
print_nl('<br>'); print_nl('<br>');
if (isset($results))
{
  $table = new_table(array('Person', 'Gender', 'Related To', 'How', 'Family'), 'id="results" class="grid"');
  foreach ($results as $i)
  {
    $p = link_person($i['id'], $i['name'], 1);
    $pa = $i['parent_id'] != 0 ? link_person($i['parent_id'], $i['parentName'], 1) : 'None';
    $table->add_row(array($p, person_info($i, 'gender'), $pa, person_info($i, 'relation'), $i['family']));
  }
  echo $table->generate();
}
?>
