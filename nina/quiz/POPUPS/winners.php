<?php
include_once("../MODULES/winners_functions.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id="pop_content" class="pop_content"> 
		<h2 class="dialog_title"><span><?=htmlkarakter($winners_label)?></span></h2>
		<div class="dialog_content">
			<div  style="padding:10px; margin-top:0px; text-align: justify; width: 620px;">
			
            			<?=htmlkarakter($winners)?>
						<div style="width:400px;">		
						                        <?php while ($top = $db->fetch_array($rows)) { ?>
						<div style="width:60px; height:60px; font-size:10px;text-align:center;">
						<img  style="border: 1px solid #680041;" src="http://graph.facebook.com/<?=$top[player_uid]?>/picture?>" alt="<?=$top[player_name]?>" /><br />
						<?=$top[player_percent]?> points
						
						                        <?php } ?>

						</div>
			</div>
			<div style="clear:both;">&nbsp;</div>
		</div>
	</div>
</body>
</html>
