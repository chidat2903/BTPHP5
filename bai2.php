<?php error_reporting(0); ?>
<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Transitional//EN" "html://www.w3.org/TR/xhtml11/DTD/xhtml11-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tạo - ghi và đọc file</title>
    <style type="text/css">
    .style1{
        color: #FFFFFF;
        font-family: LucidaHandwriting. LucidaCalligraphy;
    }
    .style6{
        font-family: Verdana, Arial, Helvetica, sans-serif; font-size: smaller;
    }
    </style>
</head>
<body>
    <form id="form1" name="form1" method="post" action="bai2.php">
        <table width="500" border="0" align="center" cellpadding="2" bgcolor="#DB95B8">
            <tr bgcolor="BDBAE7">
                <td colspan="2" bgcolor=#CC3366><h2 align="center" class="style1">TẠO - GHI VÀ ĐỌC FILE VỪA TẠO</h2></td>
            </tr>
            <tr>
                <td width="93"><span class="style6">Tên File:</span></td>
                <td width="393"><label>
                    <input name="ten_file" type="text" id="ten_file" value="<?php echo $_POST["ten_file"];?>"/>
                </label></td>
            </tr>
            <tr>
                <td valign="top"><span class="style6">Nội dung:</span></td>
                <td>
                    <textarea name="noi_dung" id="noi_dung" cols="50" rows="4"><?php echo $_POST["noi_dung"];?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="Submit" value="Ghi va doc file">
                </td>
            </tr>    
        </table>
    </form>
    <?php
        if(isset($_POST["ten_file"]) && isset($_POST["noi_dung"]))
        {
            $ten_file = $_POST["ten_file"];
            $noi_dung = $_POST["noi_dung"];
            //bl: ghi file
                $file = fopen("$ten_file","w",1);
                fwrite($file,$noi_dung);
                echo "<p align='center' class='style6'><b>Đã ghi file thành công!</b></p>";
                fclose($file);
            //b2: xuất file vừa ghi ra màn hình
                $file = fopen("$ten_file","r");
                echo "<table width='500' align='center' bgcolor='#DB95B8' class='style6'>";
                echo "<b>Nội dung của file:</b><br>";
                while(!feof($file))
                {
                    $noi_dung = fgets($file,1000);
                    echo nl2br($noi_dung);
                }
                echo "<br><b>Đọc file thành công!</b></br>";
                echo "</td></tr></table>";
            fclose($file);
        }
        else 
            echo "<p align='center'>Hãy nhập đủ tên file và nội dung!</p>"
    ?>
</body>
</html>