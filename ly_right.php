<?php
    date_default_timezone_set('America/New_York')
?>
<table align="center">
    <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
                <tr>
                    <td width="23%" height="20" align="left" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">PHP Version</span></div></td>
                    <td width="77%" height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo "PHP".PHP_VERSION; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Server Name</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER['SERVER_NAME']; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Server IP: </div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["HTTP_HOST"]; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Server Port: </div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["SERVER_PORT"]; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Server Time: </div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $showtime=date("Y-m-d H:i:s");?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Server OS: </div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo PHP_OS; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">Site Path</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">admin</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">System Administrator</div></td>
                </tr>
            </table>
        </td>
    </tr>
    <table>
