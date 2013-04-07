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
      <th colspan="3"><?php reqd_r('How did you hear about me'); ?></th>
      <td><input id="howdid" name="howdid" type="text" class="textbox" /></td>
    </tr>
    <tr>
      <th><?php reqd_r('Message'); ?></th>
      <td colspan="3"><textarea name="message" cols="45" rows="5" id="message"></textarea></td>
    </tr>
    <tr>
      <th>Which Program are you talking about?</th>
      <td colspan="3">
        <div class="select-editable">
          <select onchange="this.nextElementSibling.value=this.value">
            <option value=""></option><?php foreach ($products as $k=>$i) echo sprintf('
            <option value="%s">%s</option>', $i['name'], $i['name']); ?>
          </select>
          <input type="text" name="programName" value=""/>
        </div>
      </td>
    </tr>
    <tr>
      <th>Suggestions for "<?php site_info("title"); ?>" :</th>
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
