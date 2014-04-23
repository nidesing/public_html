<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"> </script>
    <script type="text/javascript">
//<![CDATA[
        tinyMCE.init({  
          // General options
                        mode : "textareas",
                        theme : "simple",
                        remove_script_host : false,
                        convert_urls : false,
                        force_br_newlines : true,
                        force_p_newlines : false,
                        forced_root_block : ''
        });
    //]]>
    </script><?php   
    require_once("../config.inc.php");
    require_once("../MODULES/Database.class.php");
    include_once("head.php");
    include_once("menu.php");

    $db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    $db->connect();
    @mysql_query("SET NAMES utf8");

            $ques =  $_POST["textarea_auto"];
            $ques = str_replace('<p>', '', $ques); // Remove the start <p> or <p attr="">
            $ques = str_replace('</p>', '<br />', $ques); // Replace the end
            $ans = mysql_real_escape_string( htmlspecialchars( $_POST["text0"]));
            $ansSel[1] = mysql_real_escape_string( htmlspecialchars( $_POST["text1"]));
            $ansSel[2] = mysql_real_escape_string( htmlspecialchars( $_POST["text2"]));
            $ansSel[3] = mysql_real_escape_string( htmlspecialchars( $_POST["text3"]));
            $ansSel[4] = mysql_real_escape_string( htmlspecialchars( $_POST["text4"]));
            

            if ($_POST)
            {
                    if ( !($ques and $ans) )
                    {
                            ?>
    <script type="text/javascript">
//<![CDATA[
    alert(
                        <center>Fields Question and Correct answer are required!<\/center> );    
    //]]>
    </script><?php
                    }
                    else if( $get = mysql_real_escape_string( htmlspecialchars($_POST[get])) )
                    {
                            $delkerd_SQL = "DELETE FROM Questions WHERE question_id = ".$get;
                            $db->query($delkerd_SQL);
                            $select_SQL = "DELETE FROM Answers WHERE question_id = ".$get;
                            $db->query($select_SQL);
                            
                            $k[question_id] = $get;
                            $k[question_text] = $ques;
                            $db->query_insert(Questions, $k);
                            
                            $v[answer_text] = $ans;
                            $v[question_id] = $get;
                            $v[answer_correct] = 1;
                            $db->query_insert(Answers, $v);
                            
                            for($i = 1; $i<=4; $i++)
                            {
                                    if( $ansSel[$i] )
                                    {
                                            $v[answer_text] = $ansSel[$i];
                                            $v[question_id] = $get;
                                            $v[answer_correct] = 0;
                                            $insertOK = $db->query_insert(Answers, $v);
                                    }
                            }
                    }
                    else
                    {
                            $k[question_text] = $ques;
                            $db->query_insert(Questions, $k);
                            $k_id = mysql_insert_id();
                            
                            $v[answer_text] = $ans;
                            $v[answer_correct] = 1;
                            $v[question_id] = $k_id;
                            $db->query_insert(Answers, $v);
                            
                            for($i = 1; $i<=4; $i++)
                            {
                                    if( $ansSel[$i] )
                                    {
                                            $v[answer_text] = $ansSel[$i];
                                            $v[question_id] = $k_id;
                                            $v[answer_correct] = 0;
                                            $insertOK = $db->query_insert(Answers, $v);
                                    }
                            }               
                    }

            }
                    
            if($mod = mysql_real_escape_string( htmlspecialchars($_GET[modid])))
            {
                    $kerdes_SQL = "SELECT question_text FROM  Questions where question_id =".$mod;
                    $valaszok_SQL = "select answer_text from Answers  where question_id =".$mod." order by answer_correct desc";
                    
                    $kerd = $db->query($kerdes_SQL);
                    $val = $db->query($valaszok_SQL);
                    
                    while ($sor = $db->fetch_array($kerd)) 
                    {
                            $k_mod = rn_replace($sor[question_text]);
                    }
                    
                    $mmm=0;
                    while ($sor2 = $db->fetch_array($val)) 
                    {
                            $v_mod[$mmm] = $sor2[answer_text];
                            $mmm++;
                    }
            }

            

            
    ?>
<section id="content">
	<?php
		if ( $insertOK ) 
		{
    ?>
  <!-- Clean HTML generated by http://www.cleanuphtml.com/ -->
	<meta name="Generator" content="Cleanup HTML">

    <div class="g12 sortable alert success">
      Question and answers uploaded successfully.
    </div><?php
                                    }
                            ?>
    <div class="g12">
      <h1>
        Question editor
      </h1>
      <form id="form" enctype="multipart/form-data" action="form.php" method="post">
        <fieldset>
          <label for="textarea_auto"><img src="css/images/icon/error_button.png" class="textmiddle" alt="" /> Question<br /></label>
          <div>
            <textarea id="textarea_auto" name="textarea_auto" rows="12">
<?=$k_mod?>
</textarea>
          </div><label for="text0"><img src="css/images/icon/lightbulb_32.png" class="textmiddle" alt="" /> Correct answer<br /></label>
          <div>
            <input type="text" id="text0" name="text0" value="<?=$v_mod[0]?>" />
          </div><label for="text_field"><img src="css/images/icon/lightbulb_off_32.png" class="textmiddle" alt="" /> Wrong answer</label>
          <div>
            <input type="text" id="text1" name="text1" value="<?=$v_mod[1]?>" />
          </div><label for="text_field"><img src="css/images/icon/lightbulb_off_32.png" class="textmiddle" alt="" /> Wrong answer</label>
          <div>
            <input type="text" id="text2" name="text2" value="<?=$v_mod[2]?>" />
          </div><label for="text_field"><img src="css/images/icon/lightbulb_off_32.png" class="textmiddle" alt="" /> Wrong answer</label>
          <div>
            <input type="text" id="text3" name="text3" value="<?=$v_mod[3]?>" />
          </div><label for="text_field"><img src="css/images/icon/lightbulb_off_32.png" class="textmiddle" alt="" /> Wrong answer</label>
          <div>
            <input type="text" id="text4" name="text4" value="<?=$v_mod[4]?>" />
          </div>
		  <input type="hidden" id="get" name="get" value="<?=$_GET[modid]?>" />
          <div>
            <button name="feltolt_gomb" type="submit" method="post">Upload</button>
          </div>
        </fieldset>
      </form>
    </div><!-- end div #content -->
	</section>
	
<?php 
	include_once("footer.php");
?>