<?php
class Actions extends Controller
{
  function pages($page)
  {
    //if ($page == 'home') $page = 'about';
    $this->data['page'] = $page;
    $this->data['content'] = self::pageFile($page, 0);
    $this->set_view('page');
  }
  
  function contact($action = null)
  {
    if ($action == 'form')
    {
      if (isset($_POST['name']))
      {
        include 'mailus.php';
        $this->data['contactDone'] = 1;
      }
      else
        $this->data['contactForm'] = 1;
    }
    $this->pages('contact');
  }

  function edit($page = null)
  {
    // TODO: Must be logged in
    if ($page == null)
    {
      $this->data['pages'] = get_files('app/pages', '.php'); //array('home');
      $this->set_view('edit-index');
    }
    else
    {
      if (isset($_POST['pagecontent']))
      {
        $fil = self::pageFile($page, 0);
        //die($_POST['pagecontent']);
        // does not work with ; (see contact us)
        file_put_contents($fil, $_POST['pagecontent']);
      }

      $this->set_head('jseditor', 1);
      $this->data['page'] = $page;
      $this->data['content'] = self::pageFile($page);
    }
  }
  
  private static function pageFile($name, $content = 1)
  {
    return site_file('app/pages/'.$name.'.php', $content);
  }
}
?>
