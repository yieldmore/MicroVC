<?php
class Actions extends Controller
{
  function pages($page = 'home')
  {
    $this->set_view('pages/' . $page);
  }

  function labs()
  {
    $items = Model::labs();
    $this->data['items'] = $items;
  }

  function lab($id, $date = false)
  {
    if ($this->needsLogOn()) return;
    $this->data['name'] = $id;
    $this->data['today'] = $date ? new DateTime($date) : new DateTime();
    $this->data['schedules'] = Model::get_schedule($id);
    $this->data['userSchedules'] = Model::get_schedule($id, $_SESSION['username']);
  }

  function book($lab, $day, $hour, $cancel = false)
  {
    if ($this->needsLogOn()) return;
    $user = $_SESSION['username'];
    Model::book($user, $lab, $day, $hour, $cancel);
    die('done');
  }

  function join($lab, $day, $hour)
  {
    if ($this->needsLogOn()) return;

    $user = $_SESSION['username'];
    $booking = Model::hasBooking($user, $lab, $day, $hour);

    include_once(dirname(__FILE__) . '/../inc/view.php');
    if ($booking === false)
    {
      $this->data['error'] = 'You do not have a booking for this lab, Go back to the ' . link_r(site_url('lab/' . $lab, 1), 'lab page', 1);
      return;
    }

    $this->data['name'] = $lab;
    $this->data['onTime'] = date('Y-m-d') == $day && date('H') == $hour;

    if (!$this->data['onTime'])
    {
      if (new DateTime($day . ' ' . $hour . ':0:0') > new DateTime)
        $this->data['error'] = 'Please come again / refresh this page at the correct time';
      else
        $this->data['error'] = 'This booking has passed. Please go back to the ' . link_r(site_url('lab/' . $lab, 1), 'lab page', 1) . ' and book again';
    }
  }

  function login()
  {
    $this->data['name'] = '';
    $err = false;
    if (isset($_POST['username']))
    {
      $this->data['name'] = $_POST['username'];
      $u = Model::get_user($_POST['username']);
      if ($u == false) {
        $err = 'name';
      } else if ($u['password']  != $_POST['password']) {
        $err = 'pass';
      } else {
        $_SESSION['username'] = $_POST['username'];
        header('Location: ' . site_url('labs', 1));
      }
    }
    echo $err;
    $this->data['error'] = $err;
  }

  function logout()
  {
    unset($_SESSION['username']);
    header('Location: ' . site_url('', 1));
    die();
  }

  private function needsLogOn()
  {
    if (isset($_SESSION['username']))
      return false;
    header('Location: ' . site_url('login', 1));
    return true;
  }
}
?>
