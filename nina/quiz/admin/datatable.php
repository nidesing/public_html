<?php
include_once("head.php");
include_once("menu.php");

require_once("../config.inc.php");
require_once("../MODULES/Database.class.php");

$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect();
@mysql_query("SET NAMES utf8");

?>

<section id="content">
<div class="g12">
  <h1>
	Players
  </h1>
  <table class="datatable">
	<thead>
	  <tr>
		<th>
		  ID
		</th>
		<th>
		  Name
		</th>
		<th>
		  Email
		</th>
		<th>
		  Age
		</th>
		<th>
		  Genre
		</th>
		<th>
		  Date
		</th>
		<th>
		  Success
		</th>
		<th>
		  %
		</th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		  $select_SQL = "SELECT * FROM Player";
		  $rows_sz = $db->query($select_SQL);
		  while ($sor = $db->fetch_array($rows_sz)) 
		  {
				  $ID = $sor[player_id];
				  $name = $sor[player_name];
				  $email = $sor[player_email];
				  $age = $sor[player_age];
				  $sex = $sor[player_sex];
				  $date = $sor[player_date];
				  $siker = $sor[player_win];
				  $szazalek = $sor[player_percent];
				  
	  ?>
	  <tr class="left">
		<td>
		  <?php echo $ID; ?>
		</td>
		<td>
		  <?php echo $name; ?>
		</td>
		<td>
		  <?php echo $email; ?>
		</td>
		<td>
		  <?php echo $age; ?>
		</td>
		<td>
		  <?php if ($sex == 1) echo "Male"; else echo "Female"; ?>
		</td>
		<td>
		  <?php echo $date; ?>
		</td>
		<td>
		  <?php echo ($siker == 1) ? "Success" : "Fail"; ?>
		</td>
		<td>
		  <?php echo $szazalek; ?>
		</td>
	  </tr><?php
									  }
							  ?>
	</tbody>
  </table>
</div>

<?php

include_once("footer.php");

?>
