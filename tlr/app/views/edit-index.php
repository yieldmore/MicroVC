<h1>Edit Pages<h1>
<?php
foreach ($pages as $i)
{
  link_r(site_url('edit/' . $i, 1), $i);
  print_br();
}
?>
