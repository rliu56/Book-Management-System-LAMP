<?php
require_once("connection.php"); // connection config
?>
<?php
if($_POST["Submit"])
{
   $username=$_POST["username"];
   $pwd=$_POST["pwd"];
   $code=$_POST["code"];
   if($code<>$_SESSION["auth"])
   {
      echo "<script language=javascript>alert('Verification code is wrong! ');window.location='login.php'</script>";
      ?>
      <?php
      die();
   }
   $sql ="SELECT * FROM admin where username='$username' and password='$pwd'";
   $rs=mysqli_query($link,$sql);
   if(mysqli_num_rows($rs)==1)
   {
      $_SESSION["pwd"]=$_POST["pwd"];
      $_SESSION["admin"]=session_id();
      echo "<script language=javascript>window.location='admin_index.php'</script>";
   }
   else
   {
      echo "<script language=javascript>alert('Wrong credentials! ');window.location='login.php'</script>";
      ?>
      <?php
      die();
   }
}
?>
<?php
if($_GET['tj'] == 'out'){
   session_destroy();
   echo "<script language=javascript>alert('Successfully logged out! ');window.location='login.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Book Management System Log In</title>
   <!-- use CSS -->
   <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="top"> </div>
<center>
<form id="frm" name="frm" method="post" action="" onSubmit="return check()">
  <div style="width:100%;align:center">
   <div id="center">
      <div id="center_left"></div>
      <div id="center_middle">
         <div class="user">
            <label>Username:
               <input type="text" name="username" id="username" />
            </label>
         </div>
         <div class="user">
            <label>Password:
               <input type="password" name="pwd" id="pwd" />
            </label>
         </div>
         <div class="check_number">
            <label>Verification Code:
               <input name="code" type="text" id="code" maxlength="4" class="check_num_input" />
            </label>
            <img src="verify.php" style="vertical-align:middle" />
         </div>
      </div>
      <div id="center_middle_right"></div>
      <div id="center_submit">
         <div class="button"> <input type="submit" name="Submit" class="submit" value=" ">
         </div>
         <div class="button"><input type="reset" name="Submit" class="reset" value=""> </div>
      </div>
      <div id="center_middle_right"></div>
   </div>
  </div>
</form>
</center>
<div id="footer"></div>
</body>
</html>
