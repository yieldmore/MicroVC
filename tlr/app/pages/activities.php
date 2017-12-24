    <p class="head head-b">ACTIVITIES</p>
    <p><strong>JUST OUTSIDE THE RESORT</strong></p>
    <p>
      Swimming, trekking, sight seeing are some of the activities in around The Last Resort<br />
      <br />
      <strong>The best part of The Last Resort is the river. The stretch adjoining the property is very private. This
      secluded river bank beach has very few rocks and safe for swimming. The water flows into a bay and there is no
      strong current.</strong>
    </p>

<div id="activities">
<ul>
<?php include "activity-data.php";


foreach ($data as $itm)
{
  $end = isset($itm[3]) ? sprintf('
</ul><strong class="contenttext2 line">%s</strong><ul>', $itm[3]) : '';

  echo sprintf(' <li>
  <img src="./img/a/%s" alt="%s" />
  <strong>%s -</strong>
  %s
 <span class="clear"></span></li>%s', $itm[0], $itm[0], $itm[1], $itm[2], $end);
}

?>
</ul>
</div>
