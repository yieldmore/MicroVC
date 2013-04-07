<?php
if (isset($contactForm))
  include 'contact-form.php';
else if (isset($contactDone))
  echo '<div id="thanks">Thank you for your enquiry, <br />We will get in touch with you very soon.</div><hr />';
else
  link_r(site_url('contact/form', 1), 'Fill our Contact Form', 0, 'class="action-link"');
?>
  <p class="head head-b">Contact Details</p>
  <table class="content">
    <tr>
      <th>Contact Person :</th>
      <td><?php site_var('contactperson', 1); ?></td>
    </tr><?php if (site_var('contactphone')) { ?>
    <tr>
      <th>Mobile :</th>
      <td><?php site_var('contactphone', 1); ?></td>
    </tr><?php } ?>
    <tr>
      <th>Email :</th>
      <td><?php echo sprintf('<a href="mailto:%s">%s</a>', site_var('contactemail'), site_var('contactemail')); ?></td>
    </tr>
    <tr>
      <th>Visit us at :</th>
      <td><?php link_r('http://' . site_var('contacturl'), site_var('contacturl')); ?></td>
    </tr>
  </table>
