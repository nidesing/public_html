<?php

require_once("config.inc.php");
require_once("MODULES/Database.class.php");
include_once "MODULES/fbmain.php";
include_once "MODULES/main.php";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
    
	<title>
		<?=$title?>
	</title>
    
	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
	<meta name="description" content="<?=$description?>" />
	<meta name="keywords" content="<?=$keywords?>" />
	    
	<link href="CSS/style.css" rel="stylesheet" type="text/css"  />
	<link href="CSS/InstantQuiz.css" rel="stylesheet" type="text/css" />
	<link href="CSS/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    
	<script src="JS/1.js" type="text/javascript"></script>
	<script src="JS/facebox.js" type="text/javascript"></script>
    
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox({
				loadingImage : 'images/facebox/fb_loading.gif',
				closeImage   : 'images/facebox/cancel.png'
			})
		})
	</script>
    
	<?php include_once "MODULES/InstantQuiz.php"; ?>
    
	<script type="text/javascript">
		var elinditva = 0;
		var kerdesekValaszok = [
		<?php
			for ($i=0; $kerdval[$i]; $i++)
			{
				if ($i != 0)
                {
					echo ", ";
				}
                ?>
				{ ques: "<?=htmlkarakter($kerdval[$i][ques])?> ",
                ans: "<?=$kerdval[$i][ans]?>",
                ansSel: [ <?php
				for ($j=1; $kerdval[$i][$j]; $j++)
				{
					if ($j !=1 )
							echo ", ";
					echo "\"".$kerdval[$i][$j]."\"";
				}
				echo " ] ";
				echo " } \n";
			}
		?>
		];

		function inditas()
		{
			if(elinditva==0)
			{
				$(document).ready(function(){
				var quiz = {
						multiList: kerdesekValaszok,
				};
				var options = {
						title: "Quiz application",
						disableRestart: true,
						disableDelete: true,
						multiLen: 5,
						showAns: false,
						allRandom: false,
				};
				$('#quiz').jInstantQuiz(quiz, options);
				});
				elinditva = 1;
			}
		}
        
		function toggle() {
		if(elinditva >= 1)
		{
			var ele = document.getElementById("toggleText");
			var text = document.getElementById("displayText");
			
			if(ele.style.display == "block") {
				ele.style.display = "none";
				elinditva = 2;
			}
			else {
				if(elinditva!=2){
				ele.style.display = "block";
				}
			}
		}       
        } 
	</script>

<body style="background: #FFF">
	<div id="head" style="height:90px;">
		<div id="logo" style="float:left; margin-top:10px; padding-left:10px;">
			<img src="images/logo_with_text.png" alt="Logo" width="200" />
		</div>
      
		<!-- Nav start -->
		<div id="menusor" style="text-align:center;position: relative; text-align: center; top: 50%;">
			<a id="displayText" href="javascript:toggle();" onclick="inditas();" class="button green"><?=htmlkarakter($start)?> </a>
			<a rel="facebox" href="POPUPS/rules.php" class="button orange"><?=htmlkarakter($rules_label)?> </a>
			<a rel="facebox" href="POPUPS/winners.php" class="button orange"><?=htmlkarakter($winners_label)?> </a>
		   
			<!-- SHARE INFO new img: [images][0]=http://quizdemo.awnetwork.hu/images/logo_with_text.png ... -->
			<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?=htmlkarakter($share_title)?>&amp;p[summary]=<?=htmlkarakter($share)?>&amp;p[url]=http://<?=$ref?>&amp;p[images][0]=http://quizdemo.awnetwork.hu/images/logo_with_text.png"
			class="button blue" target="_blank"><?=htmlkarakter($share_label)?> </a>
		</div>
		<!-- Nav end -->
    </div>
	
	<div id="toggleText" style="display: block; text-align:center;">
		<img src="images/startimg.jpg" alt="sample" width="760" />
	</div>
	
	<div id="quiz"></div>
    
    <!-- Footer - You can use image or boxes fill by admin-->
	<div id="footer">
		<img src="images/footer.png" alt="sample" width="760" />
	</div>
</body>
</html>

<!--The main thing you cannot do is offer the item up for resale either on its own or as part of a project. So you can use the item in a free game, but not in a game that is on sale. You can use the item in a website, but not in a web template that you sell.-->