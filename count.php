<?php
include("connection.php");
require_once('ly_check.php');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Book Statistics</title>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table">
    <tr>
        <td height="27" colspan="2" align="left" bgcolor="#FFFFFF" class="bg_tr"> Back-End Management &gt;&gt; Book Statistics</td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" height="27">Book Category</td>
        <td align="center" bgcolor="#FFFFFF">Quantity</td>
    </tr>
    <?php
    $sql="select type, count(*) from tb_books group by type";
    $val=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_row($val)){
        echo "<tr height='30'>";
        echo "<td align='center' bgcolor='#FFFFFF'>".$arr[0]."</td>";
        echo "<td align='center' bgcolor='#FFFFFF'>".$arr[1]." different book(s).</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
