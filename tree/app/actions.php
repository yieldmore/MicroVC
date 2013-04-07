<?php
class Actions extends Controller
{
  function home()
  {
    $m = new Model();
    
    $items = $m->families();
    foreach ($items as $k=>$i) $items[$k]['pages'] = $m->breaks($i, $i);
    $this->data['items'] = $items;
    $this->set_view("family");
  }
  
  function people($id)
  {
    $m = new Model();
    $f = $m->family($id);
    $this->data['person'] = $p = $m->person($id);
    $this->data['ancestors'] = $ancestors = $m->ancestors($p, $f);
    $last = count($ancestors) > 0 ? $ancestors[count($ancestors) - 1] : null;
    $this->data['siblings'] = $last == null || $p['isSpouse'] ? array() : $m->siblings($p, $last, $f);
    
    $gen = $p['isSpouse'] ? 0 : 1;
    $headSpouse = count($ancestors) == 1 && $p['isSpouse'];
    if ($last != null && !$headSpouse)
      foreach ($ancestors as $a) if (!$a['isSpouse']) $gen++;
    if ($gen > 1) $this->data['person']['generation'] = $gen - 1;
    
    $list = $m->breaks($p, $f, 'calc');
    foreach ($list as $i) $breaks .= sprintf(' and lft not between %s and %s', $i['lft'] + 1, $i['rgt'] - 1);
    $this->data['children'] = $m->people($p, $f, $breaks);
    
    global $settings;
    if (isset($settings['family' . $f['id']])) $this->data['familylinks'] = $settings['family' . $f['id']];

    $this->set_view("people");
    $this->set_head('title', sprintf('%s (Family %s)', $p['name'], $f['name']));
    
    // https://github.com/wesnolte/jOrgChart/
    // http://dl.dropbox.com/u/4151695/html/jOrgChart/example/example.html
    // http://th3silverlining.com/2011/12/01/jquery-org-chart-a-plugin-for-visualising-data-in-a-tree-like-structure/
  }
  
  function search($name = null)
  {
    if (isset($_POST['name'])) $name = $_POST['name'];

    $this->data['name'] = $name;
    
    if ($name == null) return;
    $m = new Model();
    $this->data['results'] = $m->search($name);
  }
}
?>
