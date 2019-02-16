<?php
include("connection.php");
require_once('ly_check.php');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Updating Book</title>
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
$sql="select * from tb_books where id='".$_GET['id']."'";
$arr=mysqli_query($link,$sql);
$rows=mysqli_fetch_row($arr);
?>
<?php
if($_POST['action']=="modify"){
    $sqlstr = "update tb_books set name = '".$_POST['name']."', price = '".$_POST['price']."', addeddate = '".$_POST['addeddate']."', type = '".$_POST['type']."', total = '".$_POST['total']."' where id='".$_GET['id']."'";
    $arry=mysqli_query($link,$sqlstr);
    if ($arry){
        echo "<script> alert('Successfully updated');location='list.php';</script>";
    }
    else{
        echo "<script>alert('Failed to update');history.go(-1);</script>";
    }
}
?>
<body>
<form id="myform" name="myform" method="post" action="" onSubmit="return myform_Validator(this)">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
            <td colspan="2" align="left" class="bg_tr"> Back-End Management &gt;&gt; Updating Book</td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">Title: </td>
            <td width="69%" class="td_bg">
                <input name="name" type="text" id="name" value="<?php echo $rows[1] ?>" size="15" maxlength="30" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Price: </td>
            <td class="td_bg">
                <input name="price" type="text" id="price" value="<?php echo  $rows[2]; ?>" size="5" maxlength="15" />
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Date added:
            </td>
            <td class="td_bg">
                <label>
                    <input name="addeddate" type="text" id="addeddate" value="<?php echo $rows[3] ; ?>" size="17" />
                </label>
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Category:
            </td>
            <td class="td_bg"><label>
                    <input name="type" type="text" id="type" value="<?php echo $rows[4]; ?>" size="6" maxlength="19" />
                </label></td>
        </tr>
        <tr>
            <td align="right" class="td_bg">Quantity: </td>
            <td class="td_bg"><input name="total" type="text" id="total" value="<?php echo  $rows[5]; ?>" size="5" maxlength="15" />
                </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="modify">
                <input type="submit" name="button" id="button" value="Submit"/></td>
            <td class="td_bg">　　
                <input type="reset" name="button2" id="button2" value="Reset"/></td>
        </tr>
    </table>
</form>
</body>
</html>
