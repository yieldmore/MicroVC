<form method="post">

<label for="username">UserName</label>
<input type="text" id="username" name="username" value="<?php echo $name; ?>" /><br/>
<?php if ($error == 'name') echo 'Username not found<br/>'; ?>

<label for="password">PassWord</label>
<input type="password" id="password" name="password" /><br/>
<?php if ($error == 'pass') echo 'Password incorrect<br/>'; ?>

<input type="submit" value="Login" />

</form>
