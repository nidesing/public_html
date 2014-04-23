<?php 
include_once("head.php");
include_once("menu.php");

require_once("../config.inc.php");
require_once("../MODULES/Database.class.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	@mysql_query("SET NAMES utf8");
	
	$kerdesek_SQL = "SELECT * FROM  Questions order by question_id asc";
	$valaszok_SQL = "select * from Answers order by question_id asc, answer_correct desc";
	
	$kerd = $db->query($kerdesek_SQL);
	$val = $db->query($valaszok_SQL);
		
	$valasz = $db->fetch_array($val);
	
	for ($i=0; $sor = $db->fetch_array($kerd); $i++) 
	{
		$kerdval[$i][k_id] = $sor[question_id];
		$kerdval[$i][k_szov] = $sor[question_text];
		
		for ($j=0; $valasz[question_id] == $kerdval[$i][k_id]; $j++)
		{
			$kerdval[$i][$j] = $valasz[answer_text];
			$valasz = $db->fetch_array($val);
		}		
	}
?>

<section id="content">
            <div class="g12">
			<h1>Questions and answers</h1>
			<table class="datatable">
				<thead>
						<tr>
							<th>ID</th>
							<th>Question</th>
							<th>Correct answer</th>
							<th>Wrong answer</th>
							<th>Wrong answer</th>
							<th>Wrong answer</th>
							<th>Wrong answer</th>
							<th>Edit / Delete</th>
						</tr>
				</thead>
				<tbody>
					<?php 
					for ($i=0; $kerdval[$i]; $i++) 
					{
					?>
						<tr class="left">
							<td><?php echo $kerdval[$i][k_id]; ?></td>
							<td><?php echo $kerdval[$i][k_szov]; ?></td>
							<td><?php echo $kerdval[$i][0]; ?></td>
							<td><?php echo $kerdval[$i][1]; ?></td>
							<td><?php echo $kerdval[$i][2]; ?></td>
							<td><?php echo $kerdval[$i][3]; ?></td>
							<td><?php echo $kerdval[$i][4]; ?></td>
							<td style="text-align:center;">
								<a href="form.php?modid=<?=$kerdval[$i][k_id];?>">
									<img src="page_white_edit.png" width="16" height="16" alt="Edit" />
								</a>
								<a href="index.php?delid=<?=$kerdval[$i][k_id];?>">
									<img src="page_white_delete.png" width="16" height="16" alt="Delete" />
								</a>
							</td>
						</tr>
						<?php
					} 
					?>
				</tbody>
			</table>
			
			<?php	
				if ( $del = mysql_real_escape_string( htmlspecialchars($_GET["delid"] )))
				{
					$delkerd_SQL = "DELETE FROM Questions WHERE question_id = ".$del;
					$db->query($delkerd_SQL);
					$select_SQL = "DELETE FROM Answers WHERE question_id = ".$del;
					$db->query($select_SQL);
					echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';

				}
				
			?>
			
			</div> 
</section>
		
<?php 
	include_once("footer.php");
?>