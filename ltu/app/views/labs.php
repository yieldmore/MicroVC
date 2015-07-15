<?php
foreach ($items as $lab)
{
	link_r(site_url('lab/' . $lab, 1), $lab);
	echo ' ';
}
?>
