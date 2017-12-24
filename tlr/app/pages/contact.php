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
      <td>Hariharan</td>
      <th>Bangalore Office :</th>
      <td>#81, Mosque Road, Fraser Town, <br />Bangalore - 560 005</td>
    </tr>
    <tr>
      <th>Mobile :</th>
      <td>+91 98807 42726</td>
      <th rowspan="4">Resort :</th>
      <td rowspan="4">
        S.No. 24, Hosapatna Village,<br />
        Nanjarayapatna Post,<br />
        Kushalnagar, Somwarpet Taluk,<br />
        Kodagu District&nbsp; - 571 234
      </td>
    </tr>
    <tr>
      <th>Phone :</th>
      <td>+91 80 25485705</td>
    </tr>
    <tr>
      <th>Email :</th>
      <td><a href="mailto:info@thelastresort.co.in">info@lastresort.co.in</a></td>
    </tr>
    <tr>
      <th>Visit us at :</th>
      <td><a href="http://www.lastresort.co.in">www.lastresort.co.in</a></td>
    </tr>
  </table>
