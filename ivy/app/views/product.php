<?php
$data = $products[$page];
//print_r($data);

?>

<div><img src="<?php site_url("img/".$page.".jpg"); ?>" alt="<?php echo $data['name']; ?>" height="300" width="800" /></div>

<div id="inner-home"><?php if ($page != 'aio') { ?>
<div class="p-dload">
<?php
$ver = sprintf('%s.zip', $data['name']);
link_r(site_url('downloads/' . $page . '.zip', 1), $ver, 0, 'class=""'); echo ' ver: ' . $data['ver']; ?><br>
Steps:
<span title="Right click <?php echo $page; ?>.zip in Browser > Save As">Download</span>,
<span title="Right click in Windows Explorer > Extract Here">Extract</span>,
<span title="Open the '<?php echo $data['name']; ?>' folder">Open Folder</span><?php if ($page != 'updater') { ?>,
<span title="Run <?php echo $data['exe']; ?>.exe">Run</span><?php } ?>

<?php if ($page != 'ftp-sync') { ?><br>
See: <?php if ($page == 'iviewer') echo 'Getting Started.txt / ' ?> Readme.txt
<?php } ?>

<br>
Prerequisites: <?php link_r(site_url('downloads/dotNetFx40_Client_setup.exe', 1), '.Net 4.0 Client Profile') ?> 
</div><?php }
if ($demos = demo_links($page)) echo '<div class="p-demos"> <b>Videos</b><br/>' . $demos . '</div>';
 ?>
<?php echo img_r('icons/' . $page . '.png', $data['name'] . ' Icon" class="p-icon', 32); ?>
<h2><?php echo $data['name']; ?></h2>
<i><?php echo $data['desc']; ?></i><br />
For <?php echo $data['targets']; ?><br />
<u>Features</u>: <?php echo $data['feat']; ?><br />
<u>Roadmap</u>: <?php echo $data['rmap']; ?><br />
<u>Effort</u>: <?php echo $data['time']; ?><br />

<div class="clear"></div>
<hr />
<?php include $content; ?>

</div>
