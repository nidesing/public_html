<script type="text/javascript">
	function submitform()
	{
	  document.kilep.submit();
	}
</script>

<nav>
    <form id="acc" name="kilep" enctype="multipart/form-data" action="login.php" method="POST">
    <input type="hidden" name="logingomb" value="1">
	<ul id="nav">
		<li class="i_cerka"><a href="form.php"><span>Question editor</span></a></li>
		<li class="i_valaszkerdes"><a href="index.php"><span>Questions and answers</span></a></li>
		<li class="i_jatekosok"><a href="datatable.php"><span>Players</span></a></li>
		<li class="i_szovegek"><a href="texts.php"><span>Text fields</span></a></li>
		<li class="i_bealitasok"><a href="settings.php"><span>Settings</span></a></li>
        
		  <?php 
          if ( $_SESSION['username'] ) 
          {
              $gomszoveg = "Logout";
          }
          else 
          {
              $gomszoveg="Login"; 
          }
          ?>
         <li class="i_kilep" ><a href="javascript: submitform()"><span><?=$gomszoveg?></span></a></li>
	</ul>
    </form>
</nav>