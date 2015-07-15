<h1><?php echo $name; ?></h1>
<h2>Upcoming Schedule</h2>
<?php
if ($schedules === false)
{
	echo 'The current lab is under construction.';
	return;
}

$nextWeek = $today->add(new DateInterval('P7D'));
$lastWeek = $today->sub(new DateInterval('P7D'));
print_r($nextWeek);
print_r($today->add(new DateInterval('P7D')));

echo '<div>' . link_r(site_url('lab/' . $name . '/' . $nextWeek->format('Y-m-d'), 1), $nextWeek->format('D d m y'), 0, 'class="right"');
echo '<div>' . link_r(site_url('lab/' . $name . '/' . $lastWeek->format('Y-m-d'), 1), $nextWeek->format('D d m y'));

echo '<table border="1">' . PHP_EOL;
echo ' <tr><th>Day</th>';
for ($hour = 0; $hour <= 23; $hour++)
  echo '<th>' . $hour . '</th>';
echo '</tr>' . PHP_EOL;
for ($day = 0; $day <=6; $day++)
{
  $date = $day == 0 ? $today : $today->add(new DateInterval('P1D'));
  echo ' <tr><td>'.$date->format('D d m y').'</td>';
  $dt = $date->format('Y-m-d');
  $url = 'book/' . $name . '/' . $dt . '/';
  for ($hour = 0; $hour <= 23; $hour++)
  {
    $key = "$dt-$hour";
    echo '  <td>';
    $count = isset($schedules[$key]) ? $schedules[$key] : false;
    $booked = isset($userSchedules[$key]);
    if ($count < model::$labCapacity || $booked)
      link_r(site_url($url . $hour . ($booked ? '/cancel' : ''), 1), $booked ? 'x' : '+');
    else if ($count == model::$labCapacity)
      echo 'full';
    if ($count && model::$labCapacity > 1) echo ' ' . $count;
    if ($booked) echo ' ' . link_r(site_url('join/' . $name . '/' . $dt . '/' . $hour, 1), 'join');
    echo '</td>' . PHP_EOL;
  }
  echo '</tr>' . PHP_EOL;
}
echo '</table>';
?>
