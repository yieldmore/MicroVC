<?php
$fields = array(
  'Name' => 'name',
  'E-mail ID' => 'email',
  'Phone No' => 'phone',
  'Mobile' => 'mobile',
  'How did you hear about us' => 'howdid',
  'Message' => 'message',
  'Would you recommend us' => 'wouldyou',
  'Have you recommended us' => 'haveyou',
  'Which Program(s)' => 'programName',
  'Suggestions for us' => 'suggestions',
  );

foreach ($fields as $caption=>$fldname)
{
  if (!isset($_POST[$fldname])) $val = 'no';
  else if ($_POST[$fldname] == '1') $val = 'yes';
  else $val = $_POST[$fldname];

  $message .= sprintf('%s: %s
', $caption, $val);
}

global $settings;
//die($settings['contactemail']);
//echo $message;
  mail($settings['contactemail'],
    sprintf("message from %s for %s", $_POST['name'], $settings['site_name']),
    $message);
?>
