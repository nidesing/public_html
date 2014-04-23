<?php
include_once "MODULES/fbmain.php";

require_once("MODULES/Database.class.php");
include_once "MODULES/endgame_functions.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
    
       
	<!-- You can change picture and actions, link to your own - this will post to users wall at the and of the game -->
	<script type="text/javascript">
        function postToWallUsingFBApi(name,message,caption,description,ref)
        {
			var data=
			{
			message: message,
			display: 'iframe',
			caption: caption,
			name: name,  
			picture: 'http://quizdemo.awnetwork.hu/images/post.jpg',
			source: '',  
			link: ref, 
			description: description,
			actions: [{ name: 'Facebook Quiz Demo', link: 'http://www.facebook.com/pages/AwTheme/201373699916708' }],                  
			}
			FB.api('feed', 'post', data, onPostToWallCompleted);
        }
                
        function onPostToWallCompleted(response)
        {
			// Just show error message if there's an error
			if (response)
			{
                if (response.id)
                {
					//alert("Posted as "+response.post_id);
                }
                else
                {
					//alert("Error");
                }
			}
        // user cancelled
        }
        
        function publishStream(name,message,caption,description,ref){
			postToWallUsingFBApi(name,message,caption,description,ref);
        }
	</script>
	
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox({
				loadingImage : 'images/facebox/fb_loading.gif',
				closeImage   : 'images/facebox/cancel.png'
			})
		})  
	</script>

</head>

<body style="background: #FFF;">
	
	<div id="fb-root"></div>
	
	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
	<script type="text/javascript">
		FB.init({
			appId  : '<?=$fbconfig['appid']?>',
			status : true, // check login status
			cookie : true, // enable cookies to allow the server to access the session
			xfbml  : true  // parse XFBML
		});
           
		FB.Canvas.setAutoResize();
           
		FB.Event.subscribe('edge.create', function() {
			$('#likeon').hide();
			$('#likeoff').show("slow");
		});
	</script>
    
	<div id="head" style="height:90px;">
		
		<div id="logo" style="float:left; margin-top:10px; padding-left:10px;">
			<img src="images/logo_with_text.png" alt="Logo" width="200" />
		</div>
		
		<!-- Menu -->
		<div id="menusor" style="text-align:center;position: relative; text-align: center; top: 50%;">
			<a id="displayText" href="javascript:toggle();" onclick="inditas();" class="button green" name="displayText"><?=htmlkarakter($start)?> </a>
			<a rel="facebox" href="POPUPS/rules.php" class="button orange"><?=htmlkarakter($rules_label)?> </a> 
			<a rel="facebox" href="POPUPS/winners.php" class="button orange"><?=htmlkarakter($winners_label)?>  </a>
			<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?=htmlkarakter($share_title)?>&amp;p[summary]=<?=htmlkarakter($share)?>&amp;p[url]=http://<?=$ref?>&amp;p[images][0]=http://quizdemo.awnetwork.hu/images/logo_with_text.png"
			class="button blue" target="_blank"><?=htmlkarakter($share_label)?> </a>
		</div><!-- End menu -->
    </div>
	
	<?php
		if($_GET['Result'] > -1)
		{
			if ( ($result = $_GET['Result']) >= $kuszob) 
			{
				$nev_nyert2 = str_replace("(name)", $neve, $nev_nyert);
				$nev_nyert3 = str_replace("(%)", $result, $nev_nyert2);

		?>
	<div id="jatekvege" class="greenvege" style="font-size:1.5em;">
		
		<div style="float:left; width:130px; top:20%; position:absolute;">
			<img src="images/tick.png" width="128" alt="" />
		</div>
		
		<div style="left:130px; margin-top: 60px; display:none; line-height: 23px;" id="likeoff">
			<p><?=htmlkarakter($win_text_like);?></p>
			<a id="displayText" href="http://<?=$fbfanpage?>" class="button blue" name="displayText" target="_blank">Go to the fanpage</a>
		</div>
      
		<div style="width: 70%; position:absolute; left:130px; top: 0%; line-height: 23px;" id="likeon">
        <!-- DO NOT EDIT PHP SECTIONS -->
        <?php
			$output  = str_replace("(like)", '<fb:like href="http://'.$fbfanpage.'" layout="big" send="false" width="60" show_faces="false" font="arial"></fb:like>', $win);
			$output2 = str_replace("(%)", $result, $output);
			echo htmlkarakter($output2);
									
			$player[player_win] = 1;
			$player[player_percent] = $result;
			echo "<script type='text/javascript'>publishStream('".$nev_nyert3."','".$uzenet."','".$alcim."','".$leiras."','".$ref."');</script>";
		?>
		</div>
		
    </div>
	
	<!-- DO NOT EDIT PHP SECTIONS -->
    	<?php
			}
			else
			{
		?>
		
	<div id="jatekvege" class="redvege" style="font-size: 1.4em;line-height: 23px;">
		
		<div style="float:left; width:130px; top:20%; position:absolute;">
			<img src="images/no.png" width="128" alt="" />
		</div>
		
		<div style="font-size:1.5em;">
		
		<!-- DO NOT EDIT PHP SECTIONS -->
        <?php
			$output  = str_replace("(%)", $result, $fail);
			$output2 = str_replace("(like)", '<fb:like href="http://'.$fbfanpage.'" layout="big" send="false" width="60" show_faces="false" font="arial"></fb:like>', $output);
			echo htmlkarakter($output2);
			$nev_vesztett2 = str_replace("(name)", $neve, $nev_vesztett);
		?>
		
			<a id="displayText" href="http://<?=$ref?>" onclick="inditas();" class="button green" name="displayText">I want to win, I'll try again.</a> 
		<?php
			$player[player_win] = 0;
			$player[player_percent] = $result;
			echo "<script type='text/javascript'>publishStream('".$nev_vesztett2."','".$uzenet."','".$alcim."','".$leiras."','".$ref."');</script>";
		?>
		</div>
		
    </div>
    
	<!-- DO NOT EDIT PHP SECTIONS -->
    	<?php
			}
			$db->query_insert(Player, $player);
		}
	?>
	
	<div id="footer" style="padding-top:20px;">
		<img src="images/footer.png" alt="sample" width="760" />
	</div>
</body>
</html>

<!--The main thing you cannot do is offer the item up for resale either on its own or as part of a project. So you can use the item in a free game, but not in a game that is on sale. You can use the item in a website, but not in a web template that you sell.-->