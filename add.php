<?php
date_default_timezone_set('America/New_York');
include("connection.php");
require_once('ly_check.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add New Book</title>
    <link rel="stylesheet" href="css.css" type="text/css">
    <script type="text/javascript">
        <!--
        function myform_Validator(theForm)
        {

            if (theForm.name.value == "")
            {
                alert("Enter the title.");
                theForm.name.focus();
                return (false);
            }
            if (theForm.price.value == "")
            {
                alert("Enter the price.");
                theForm.price.focus();
                return (false);
            }
            if (theForm.type.value == "")
            {
                alert("Enter the catagory.");
                theForm.type.focus();
                return (false);
            }
            return (true);
        }

        //--></script>
</head>
<?php
if(isset($_POST['action']) && $_POST['action']=="insert"){
    $sql = "INSERT INTO tb_books (name,price,addeddate,type,total)
          values('".$_POST['name']."','".$_POST['price']."','".$_POST['addeddate']."','".$_POST['type']."','".$_POST['total']."')";
    $arr=mysqli_query($link,$sql);
    if ($arr){
        echo "<script language=javascript>alert('Successfully added!');window.location='add.php'</script>";
    }
    else{
        echo "<script>alert('Failed.');history.go(-1);</script>";
    }
    echo "1231231", $name, $price, $addeddate, $type;
}
?>
<body>
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
            <td colspan="2" align="left" class="bg_tr"> Back-End Management &gt;&gt; Add New Book</td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">Title: </td>
            <td width="69%" class="td_bg">
                <input name="name" type="text" id="name" size="15" maxlength="30" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Price: </td>
            <td class="td_bg">
                <input name="price" type="text" id="price" size="5" maxlength="15" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Date added: </td>
            <td class="td_bg">
                <input name="addeddate" type="text" id="addeddate" value="<?php echo date("Y-m-d h:i:s"); ?>" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Category: </td>
            <td class="td_bg">
                <input name="type" type="text" id="type" size="6" maxlength="19" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Quantity: </td>
            <td class="td_bg"><input name="total" type="text" id="total" size="5" maxlength="15" />
                </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="insert">
                <input type="submit" name="button" id="button" value="Submit" />
            </td>
            <td class="td_bg">　　
                <input type="reset" name="button2" id="button2" value="Reset" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>
