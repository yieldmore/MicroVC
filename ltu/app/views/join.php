<?php
if (isset($error))
{
  echo '<div class="error">' . $error . '</div>';
  return;
}

echo '<h2>Information about ' . $name . '</h2>';
$file = site_file('app/labs/' . $name . '.php');

$telnetRegister = 'You need to install a telnet client like Putty and <a href="http://www.terminally-incoherent.com/blog/2007/11/21/windows-change-your-default-telnet-handler/" target="_blank">register a telnet protocol
handler</a> before clicking this link:<br/>';

if (file_exists($file))
  include_once($file);
else
  echo 'No information available.';
?>
