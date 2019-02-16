<?php require_once('ly_check.php');
// check if admin is logged in
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Change Admin Password</title>
    <!-- use CSS -->
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$password = $_SESSION["pwd"];
$sql = "SELECT * FROM admin where password='$password'";
$rs = mysqli_query($link,$sql);
$rows = mysqli_fetch_assoc($rs);
$submit = isset($_POST["Submit"])?$_POST["Submit"]:"";
if($submit)
{
    if($rows["password"]==$_POST["password"])
    {
        $newpassword2=$_POST["newpassword2"];
        $sql = "UPDATE admin SET password='$newpassword2'";
        mysqli_query($link,$sql);
        echo "<script>alert('Password changed, log in again!');
        top.location.href='login.php'</script>";
        exit();
    }
    else
        ?>
        <?php
    {
        ?>
        <script>
            alert("The old password is wrong, enter again")
            //location.href="li_pwd.php";
        </script>
        <?php
    }
}
?>

<table cellpadding="3" cellspacing="1" border="0" width="100%" class="table" align=center>
    <form name="changepassword" method="post" action="">
        <tr>
            <th height=25 colspan=4 align="center" class="bg_tr">Change Admin Password</th>
        </tr>
        <tr>
            <td width="40%" align="right" class="td_bg">Username: </td>
            <td width="60%" class="td_bg"><?php echo $rows["username"] ?></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Old Password: </td>
            <td class="td_bg"><input name="password" type="password" id="password" size="20"></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">New Password: </td>
            <td class="td_bg"><input name="newpassword1" type="password" id="newpassword1" size="20"></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Confirm New Password</td>
            <td class="td_bg"><input  name="newpassword2" type="password" id="newpassword2" size="20"></td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="td_bg">
                <input class="button" onClick="return check();" type="submit" name="Submit" value="Change it!">
            </td>
        </tr>
    </form>
</table>
</body>
</html>
<script type="text/javascript">
    <!--
    function checkspace(checkstr) {
        var str = '';
        for(i = 0; i < checkstr.length; i++) {
            str = str + ' ';
        }
        return (str == checkstr);
    }
    function check()
    {
        if(checkspace(document.changepassword.password.value)) {
            document.changepassword.password.focus();
            alert("Empty old password!");
            return false;
        }
        if(checkspace(document.changepassword.newpassword1.value)) {
            document.changepassword.newpassword1.focus();
            alert("Empty new password!");
            return false;
        }
        if(checkspace(document.changepassword.newpassword2.value)) {
            document.changepassword.newpassword2.focus();
            alert("Empty confirming password!");
            return false;
        }
        if(document.changepassword.newpassword1.value != document.changepassword.newpassword2.value) {
            document.changepassword.newpassword1.focus();
            document.changepassword.newpassword1.value = '';
            document.changepassword.newpassword2.value = '';
            alert("Passwords don't match, enter again");
            return false;
        }
        document.admininfo.submit();
    }
    //-->
</script>
