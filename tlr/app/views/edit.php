<?php link_r(site_url('edit', 1), 'See all Pages', 0, 'class="edit"'); ?>
<br />
<form method="POST">
<input type="submit" value="Save Page" />
<h1>Editing Page: <?php echo $page; ?></h1>

  <textarea name="pagecontent" class="htmledit">
  <?php echo $content; ?>
  </textarea>

</form>
