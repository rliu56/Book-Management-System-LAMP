<?php
include("connection.php");
require_once('ly_check.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Book Search</title>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
        <td width="80%" height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr"> Back-End Management &gt;&gt; Book Search</td>
    <tr>
        <td height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr">
            <form id="form1" name="form1" method="post" action="" style="margin:0px; padding:0px;">
                <table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
                    <tr>
                        <td width="36%" align="center">
                            <select name="seltype" id="seltype">
                                <option value="name">Book Title</option>
                                <option value="price">Book Price</option>
                                <option value="time">Date Added</option>
                                <option value="type">Book Category</option>
                                <option value="id">Book ID</option>
                            </select>
                        </td>
                        <td width="31%" align="center">
                            <input type="text" name="coun" id="coun" />
                        </td>
                        <td width="33%" align="center">
                            <input type="submit" name="button" id="button" value="Search" />
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
    <tr>
        <td width="7%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="28%" align="center" bgcolor="#FFFFFF">Title</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">Price</td>
        <td width="24%" align="center" bgcolor="#FFFFFF">Date Added</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">Category</td>
        <td width="24%" align="center" bgcolor="#FFFFFF">Operation</td>
    </tr>
    <?php
    $pagesize = 8;  // // nubmer of items per page
    $sql = "select * from tb_books where ".$_POST["seltype"]." like ('%".$_POST["coun"]."%')";
    $rs=mysqli_query($link,$sql);
    if ($rs) {
      $recordnum=mysqli_num_rows($rs);
    }
    //'mysql_num_rows()'' return to number of rows in the result, only work with 'SELECT'.
    $pagecount=($recordnum-1)/$pagesize+1;  // caculate the total number of pages
    $pagecount=(int)$pagecount;
    $pagenum = $_GET["pagenum"];  // get current page number
    if($pagenum=="")
    {
        $pagenum=1;   // display the first page if pagenum is null
    }
    if($pagenum<1)
    {
        $pagenum=1;  // display the first page if pagenum is less than 1
    }
    if($pagenum>$pagecount)
    {
        $pagenum=$pagecount;  // display the last page if pagenum is greater than the total number of pages
    }
    $startnum=($pagenum-1)*$pagesize;  // starting index of current page
    $sql="select * from tb_books where ".$_POST['seltype']." like ('%".$_POST['coun']."%') order by id desc limit $startnum,$pagesize";
    $rs=mysqli_query($link,$sql);
    ?>
    <?php
    $rs=mysqli_query($link,$sql);
    if ($rs) {
      while($rows=mysqli_fetch_assoc($rs))
      {
          ?>
          <tr align="center">
              <td class="td_bg" width="7%"><?php echo $rows["id"]?></td>
              <td class="td_bg" width="28%" height="26"><?php echo $rows["name"]?></td>
              <td class="td_bg" width="12%" height="26"><?php echo $rows["price"]?></td>
              <td class="td_bg" width="24%" height="26"><?php echo $rows["addeddate"]?></td>
              <td class="td_bg" width="12%" height="26"><?php echo $rows["type"]?></td>
              <td class="td_bg" width="24%">
                  <a href="update.php?id=<?php echo $rows['id'] ?>" class="trlink">Modify</a>
                  <a href="del.php?id=<?php echo $rows['id'] ?>" class="trlink">Remove</a>
              </td>
          </tr>
          <?php
      }
    }
    ?>
    <tr>
        <th height="25" colspan="6" align="center" class="bg_tr">
            <?php
            if($pagenum==1)
            {
                ?>
                << | < | <a href="?pagenum=<?php echo $pagenum+1?>">></a> |
                <a href="?pagenum=<?php echo $_POST['seltype']?>">>></a>
                <?php
            }
            else if($pagenum==$pagecount)
            {
                ?>
                <a href="?pagenum=1"><<</a> | <a href="?pagenum=<?php echo $pagenum-1?>"><</a> | > | >>
                <?php
            }
            else
            {
                ?>
                <a href="?pagenum=1"><<</a> | <a href="?pagenum=<?php echo $pagenum-1?>"><</a> |
                <a href="?pagenum=<?php echo $pagenum+1?>" class="forumRowHighlight">></a> |
                <a href="?pagenum=<?php echo $pagecount?>">>></a>
                <?php
            }
            ?>
            Page: <?php echo $pagenum ?>/<?php echo $pagecount ?>  Number of book(s): <?php echo $recordnum?> in total </th>
    </tr>
</table>
</body>
</html>
