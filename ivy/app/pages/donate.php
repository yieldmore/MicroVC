<?php $sandbox = 1; $target = 720; $received = 234; ?>
<p>
  Thank you for choosing to contribute to the "Ivy Development Support and Endorsement", to support our
  "paying forward" for all the wonderful things being made free today on the internet. 
</p>
<p>
  Please take a moment to fill in the form below. Your enthusiasm shows how much you would like to donate.
</p><?php if ($sandbox) { ?>
<p class="p-dload" style="float: none; text-align: center;">
  This page is still under development, and hence uses the paypal sandbox.
</p><?php } ?>
<p>
  We have so far collected <span class="hilite">$ <?php echo $received; ?></span> (<?php echo round($received / $target * 100); ?>%)
  of our goal of <span class="hilite">$ <?php echo $target; ?></span>.
</p>

<form target="paypal" action="https://www.<?php if ($sandbox) echo 'sandbox.'; ?>paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="imran@cselian.com">
<input type="hidden" name="lc" value="IN">
<input type="hidden" name="item_name" value="Ivy Development Support and Endorsement">
<input type="hidden" name="item_number" value="cs-ivy">
<input type="hidden" name="button_subtype" value="products">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="add" value="1">
<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHosted">
<table>
<tr><td><input type="hidden" name="on0" value="Enthusiasm">Enthusiasm</td></tr><tr><td><select name="os0">
	<option value="Token">Token $8.00 USD</option>
	<option value="Pleased">Pleased $16.00 USD</option>
	<option value="XX Pleased">XX Pleased $24.00 USD</option>
	<option value="Ardent Supporter">Ardent Supporter $32.00 USD</option>
</select> </td></tr>
<tr><td><input type="hidden" name="on1" value="Product">Product</td></tr><tr><td><select name="os1">
	<option value="IViewer">IViewer </option>
	<option value="IViewer + FTP">IViewer + FTP </option>
	<option value="FTP Sync">FTP Sync </option>
	<option value="Ivy Updater">Ivy Updater </option>
</select> </td></tr>
<tr><td><input type="hidden" name="on2" value="Reason / Decider">Reason / Decider</td></tr><tr><td><input type="text" name="os2" maxlength="200"></td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="option_select0" value="Token">
<input type="hidden" name="option_amount0" value="8.00">
<input type="hidden" name="option_select1" value="Pleased">
<input type="hidden" name="option_amount1" value="16.00">
<input type="hidden" name="option_select2" value="XX Pleased">
<input type="hidden" name="option_amount2" value="24.00">
<input type="hidden" name="option_select3" value="Ardent Supporter">
<input type="hidden" name="option_amount3" value="32.00">
<input type="hidden" name="option_index" value="0">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online." style="margin: 10px 0 0 16px;">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

