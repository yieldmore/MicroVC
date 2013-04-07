<?php
class Actions extends Controller
{

  function home()
  {
    $this->data['message'] = "<h2>Hello World!</h2>";
    $this->data['markdown'] = site_file("help/index.md", 1);
    //$this->set_head('description', "this is a test descr"); 
    //$this->ajax = true; $this->set_view("construction"); 
  }
}
?>
