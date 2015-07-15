<?php
class Controller
{
  //array that is extracted and passed to the view
  var $data = array();
  
  //path to the view. if not set, default will be based on the url
  var $view = null;
  
  //whether to use ajax templating (no header / footer etc)
  var $ajax = false;
  
  var $head = array();
  
  function set_view($view)
  {
    $view = site_file("app/views/" . $view . ".php");
    if (!file_exists($view)) die("View not found: " . $view);
    $this->view = $view;
  }
  
  function set_template($name)
  {
    global $settings;
    $settings['templatefol'] = sprintf('app/templates/%s/', $name);
  }
  
  function set_head($var, $val)
  {
    $this->head[$var] = $val;
  }
}
?>
