<?php function reqd_r($txt) { echo sprintf('%s: <span class="required">*</span>', $txt); } ?>
  <form method="post" action="" onsubmit="return ValidateContact(this);">
  <table class="content contact">
    <tr>
      <th class="head head-b">Contact Form</th>
      <td colspan="3" style="text-align: right"><?php reqd_r(''); ?> fields are mandatory</td>
    </tr>
    <tr>
      <th><?php reqd_r('Name'); ?></th>
      <td><input id="name" name="name" type="text" class="textbox" /></td>
      <th><?php reqd_r('Email'); ?></th>
      <td><input id="email" name="email" type="text" class="textbox" /></td>
    </tr>
    <tr>
      <th>Mobile</th>
      <td><input id="mobile" name="mobile" type="text" class="textbox" /></td>
      <th><?php reqd_r('Telephone'); ?></th>
      <td><input id="phone" name="phone" type="text" class="textbox" /></td>
    </tr>
    <tr>
      <th colspan="3"><?php reqd_r('How did you hear about The Last Resort'); ?></th>
      <td><input id="howdid" name="howdid" type="text" class="textbox" /></td>
    </tr>
    <tr>
      <th><?php reqd_r('Message'); ?></th>
      <td colspan="3"><textarea name="message" cols="45" rows="5" id="message"></textarea></td>
    </tr>
    <tr>
      <td colspan="4"><hr /></td>
    </tr>
    <tr>
      <th colspan="4" class="head head-b">If you have been to the resort :-</th>
    </tr>
    <tr>
      <th colspan="3">Would you recommend The Last Resort to others :</th>
      <td>
        <select id="wouldyou" name="wouldyou" class="textbox">
          <option value="Select">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </td>
    </tr>
    <tr>
      <th colspan="3">Have you recommended The Last Resort to others :</th>
      <td>
        <select id="haveyou" name="haveyou" class="textbox">
          <option value="Select">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Suggestions for The Last Resort :</th>
      <td colspan="3"><textarea name="suggestions" cols="45" rows="5" id="suggestions"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">
        <input name="Submit" type="submit" value="Submit" />
        <input name="Reset" type="reset" value="Reset" />
      </td>
    </tr>
    <tr>
      <td colspan="4"><hr /></td>
    </tr>
  </table>
  </form>
