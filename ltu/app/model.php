<?php
class Model
{
  public static $labCapacity = 1;
  public static function labs()
  {
    return array('Network lab', 'HPC lab' , 'Biometrics lab' , 'Hardware lab');
  }
  
  public static function get_schedule($lab, $user = false)
  {
    $labs = self::labs();
    $key = array_search($lab, $labs);
    if ($key === 2 || $key === 3) return false;
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $to = new DateTime($date); $to = $to->add(new DateInterval('P7D'))->format('Y-m-d');
    $rows = db_select('select day,hour' . ($user ? '' : ',count(*) as cnt') . " from bookings where lab = '$lab' and day between '$date' and '$to' " . ($user ? "and user = '$user'" : 'group by lab,day,hour'), 'array');
    $op = array();
    foreach($rows as $r) $op[$r['day'] . '-' . $r['hour']] = $user ? '' : $r['cnt'];
    return $op;
  }

  public static function get_user($name)
  {
    return db_select("select * from users where username = '" . $name . "'", 'arraysingle');
  }

  public static function book($user, $lab, $day, $hour, $cancel)
  {
    $sql = $cancel ? "delete from bookings where user='$user' and lab='$lab' and day='$day' and hour=$hour" : 'insert into bookings (user, lab, day, hour) values (' . "'$user', '$lab', '$day', $hour)";
    db_select($sql);
  }

  public static function hasBooking($user, $lab, $day, $hour)
  {
    $sql = "select * from bookings where user='$user' and lab='$lab' and day='$day' and hour=$hour";
    return db_select($sql, 'arraysingle');
  }
}
?>
