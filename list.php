<?php
include("connection.php");
require_once('ly_check.php');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Book Management</title>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<?php
$pagesize = 8; // nubmer of items per page
$sql = "select * from tb_books";
$rs = mysqli_query($link,$sql);
$recordnum = mysqli_num_rows($rs);
//'mysql_num_rows()'' return to number of rows in the result, only work with 'SELECT'.
$pagecount = ($recordnum-1)/$pagesize+1;  // caculate the total number of pages
$pagecount = (int)$pagecount;
if (isset($_GET['pagenum'])) {
    $pagenum = $_GET['pagenum'];   // get current page number
}
if($pagenum == "")
{
    $pagenum=1;   // display the first page if pagenum is null
}
if($pagenum<1)
{
    $pagenum=1;    // display the first page if pagenum is less than 1
}
if($pagenum>$pagecount)  // display the last page if pagenum is greater than the total number of pages
{
    $pagenum=$pagecount;
}
$startnum=($pagenum-1)*$pagesize;  // starting index of current page
$sql="select * from tb_books order by id desc limit $startnum,$pagesize";
$rs=mysqli_query($link,$sql);
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
    <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr"> Back-End Management &gt;&gt; Book Management</td>
    </tr>
    <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">Title</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">Price</td>
        <td width="16%" align="center" bgcolor="#FFFFFF">Date added</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">Category</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">Quantity</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">Operation</td>
    </tr>
    <?php
    $rs=mysqli_query($link,$sql);
    if ($rs) {
    while($rows=mysqli_fetch_assoc($rs))
      {
          ?>
          <tr align="center">
              <td class="td_bg" width="6%"><?php echo $rows["id"]?></td>
              <td class="td_bg" width="25%" height="26"><?php echo $rows["name"]?></td>
              <td class="td_bg" width="11%" height="26"><?php echo $rows["price"]?></td>
              <td class="td_bg" width="16%" height="26"><?php echo $rows["addeddate"]?></td>
              <td width="11%" height="26" class="td_bg"><?php echo $rows["type"]?></td>
              <td width="11%" height="26" class="td_bg"><?php echo $rows["total"]?></td>
              <td class="td_bg" width="20%">
                  <a href="update.php?id=<?php echo $rows['id'] ?>" class="trlink">Modify</a>
                  <a href="del.php?id=<?php echo $rows['id'] ?>" class="trlink">Remove</a>
              </td>
          </tr>
          <?php
      }
    }
    ?>
    <tr>
        <th height="25" colspan="7" align="center" class="bg_tr">
            <?php
            if($pagenum==1)
            {
                ?>
                << | < | <a href="?pagenum=<?php echo $pagenum+1?>&id=<?php echo $id?>">></a> |
                <a href="?pagenum=<?php echo $pagecount?>&id=<?php echo $id?>">>></a>
                <?php
            }
            else if($pagenum==$pagecount)
            {
                ?>
                <a href="?pagenum=1&id=<?php echo $id?>"><<</a> |
                <a href="?pagenum=<?php echo $pagenum-1?>&id=<?php echo $id?>"><</a> | Next Page | >>
                <?php
            }
            else
            {
                ?>
                <a href="?pagenum=1&id=<?php echo $id?>"><<</a> |
                <a href="?pagenum=<?php echo $pagenum-1?>&id=<?php echo $id?>"><</a> |
                <a href="?pagenum=<?php echo $pagenum+1?>&id=<?php echo $id?>" class="forumRowHighlight">></a> |
                <a href="?pagenum=<?php echo $pagecount?>&id=<?php echo $id?>">>></a>
                <?php
            }
            ?>
            Page: <?php echo $pagenum ?>/<?php echo $pagecount ?>  Number of book(s): <?php echo $recordnum?> in total
        </th>
    </tr>
</table>
</body>
</html>
