<?php
class Model
{
  // http://www.sitepoint.com/hierarchical-data-database-2/

  // private  
  function _family($f)
  {
    return 'family_id = ' . $f['id'] . ' and ';
  }
  
  // across families
  function search($name)
  {
    $sql = sprintf("select p.id, p.name, f.name as family, p.isSpouse, p.isFemale, p.parent_id, pa.name as parentName from people p
join families f on f.id = p.family_id
join people pa on p.parent_id = pa.id
where p.name like '%s'", '%' . $name . '%');
    return db_select($sql, 'array');
  }
  
  function families()
  {
    return db_select('select f.id, f.name, p.id as headId, p.name as head, lft, rgt from families f join people p on f.person_id = p.id where f.id != 3', 'array');
  }
  
  // per person / family
  function family($id)
  {
    return db_select('select f.id, f.name from people p join families f on f.id = p.family_id where p.id = ' . $id, 'arraysingle');
  }
  
  function breaks($below, $f, $for = 'display')
  {
    $fc = $this->_family($f);
    $cols = $for == 'display' ? 'id, name' : 'id, lft, rgt';
    $sql = sprintf('select ' . $cols . ' from people p where %s lft between %s and %s and isBroken = 1 order by lft', $fc, $below['lft'] + 1, $below['rgt'] - 1);
    return db_select($sql, 'array');
  }
  
  function person($id)
  {
    return db_select('select id, name, lft, rgt, parent_id, isFemale, isSpouse from people p where p.id = ' . $id, 'arraysingle');
  }
  
  function ancestors($person, $f)
  {
    $fc = $this->_family($f);
    $sql = sprintf('select id, name, parent_id, isFemale, isSpouse, level, lft, rgt from people p where %s lft < %s and rgt > %s order by lft', $fc, $person['lft'], $person['rgt']);
    return db_select($sql, 'array');
  }
  
  function siblings($person, $parent, $f)
  {
    $fc = $this->_family($f);
    $sql = sprintf('select id, name, isFemale from people p where %s lft between %s and %s ' .
      'and level = %s and id != %s order by lft', 
      $fc, $parent['lft'], $parent['rgt'], $parent['level'] + 1, $person['id']);
    return db_select($sql, 'array');
  }
  
  function people($p, $f, $conditions)
  {
    $fc = $this->_family($f);
    $sql = sprintf('select id, name, isFemale, isSpouse, isBroken, level, lft, rgt from people p where %s lft between %s and %s %s order by lft', $fc, $p['lft'], $p['rgt'], $conditions);
    return db_select($sql, 'array');
  }
}
?>
