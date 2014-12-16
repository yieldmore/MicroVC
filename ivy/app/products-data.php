<?php
$products = array(
  'iviewer' => array(
    'name' => 'IViewer', 'ver' => '5.5.540', 'date' => '05 Dec 2014', 'exe' => 'Cselian.IViewer',
    'desc' => 'A media player and organizer',
    'targets' => 'music enthusiasts, students and general public',
    'feat' => 'search as you type, file / playlist panes, lyrics display.',
    'rmap' => 'a vocals/guitar/piano trainer',
    'time' => 'VB6 - 5 years, VB.net - 2 weeks, C#.net - 3 weeks',
    'videos' => array(
      'Playlist' => 'dual view, add to playlist, fix broken links in playlist',
      'Search' => 'scan library, search as you type, search in current folder',
      'Lyrics' => 'view lyrics + trainer (looping paragraphs) - sample Vishnu Sahasranamam',
      'History' => 'add from History to Favorites',
      'Organizer' => 'view all Library folders (minified view)',
    ),
  ),
  'ftp-sync' => array(
    'name' => 'FTP Sync', 'ver' => '2.1.173', 'date' => '30 Jan 2013', 'exe' => 'Cselian.FTPSync',
    'desc' => 'Watch folder and upload changes to website',
    'targets' => 'web developers',
    'feat' => 'Drag-drop, add files by path, stop watching, have a list of projects and encrypt passwords.',
    'rmap' => 'exclusion list, open containing folder',
    'time' => 'Init - 1 day, 2012-13 - 2 days',
    'videos' => array(
      'Overview' => 'configure, listen and sync',
      'Grabber' => array('Grab your blog offline and build a nav page for use in a frameset', 'tYb7')
    ),
  ),
  'aio' => array(
    'name' => 'AIO', 'ver' => '1.8.75', 'date' => '1 May 2010', 'exe' => 'Cselian.AIO',
    'desc' => 'Quick Generator, Multi Replace, File Finder etc',
    'targets' => 'developers, entity generation',
    'feat' => 'Skip lines with certain columns, merge output, generate entities etc',
    'rmap' => 'associate with .gen files and dont require a Gen Library folder',
    'time' => 'Init - 12 days',
    'aio' => array(
      'QGen' => 'entity generation, html etc',
      'Multi Replace' => 'data sanitizer (verbose html to tsv / php array)',
      'Folder Compare' => 'configure diff tool',
      'Sequence Diagrams' => 'Manage your sequence diagrams as plain text and calls 3rd party service',
    ),
  ),
  'win-xt' => array(
    'name' => 'Win XT', 'ver' => '1.5.50', 'date' => '16 Dec 2014', 'exe' => 'Cselian.WinXT',
    'desc' => 'Windows Extensions',
    'targets' => 'general and power users',
    'feat' => 'Folder Shortcuts, Explore From',
    'rmap' => 'Win + G, Index Folders for subfolders / files, Text organizer etc',
    'time' => 'Init - 4 hours, 2013 - 10 hours',
    'videos' => array(
      'Overview' => 'Win + G, Dashboard view, Explore from Here',
      'Configure' => 'Organize, Drag Drop, Paste, import, toolbar folder',
      'Indexing' => 'Index files and folders of common locations, OLE-drag'
    ),
  ),
  'updater' => array(
    'name' => 'Ivy Updater', 'ver' => '1.1.29', 'date' => '20 Feb 2013', 'exe' => 'Cselian.IvyUpdater',
    'desc' => 'Publish changes to your desktop application',
    'targets' => 'Windows apps developers',
    'feat' => 'User setting for frequency, postpone. Very small footprint',
    'rmap' => 'Auto Extract and detect locked files',
    'time' => '1 day',
  ),
  /*
  '' => array(
    'name' => '', 'ver' => '1.1.xx', 'date' => ' 2013', 'exe' => 'Cselian.',
    'desc' => '',
    'targets' => '',
    'feat' => '',
    'rmap' => '',
    'videos' => array(
      '' => '',
  ),
  */
);

function is_product($name)
{
  global $products;
  return isset($products[$name]);
}

function demo_links($name)
{
  global $products;
  if (!isset($products[$name]['videos'])) return false;
  $demos = $products[$name]['videos'];
  $links = array();
  foreach ($demos as $name=>$desc)
  {
    if (!is_array($desc)) continue;
    $links[] = sprintf('<a href="http://www.screenr.com/%s">%s</a> - %s<br/>', $desc[1], $name, $desc[0]);
  }
  return count($links) == 0 ? false : implode('<br/>', $links);
}

?>
