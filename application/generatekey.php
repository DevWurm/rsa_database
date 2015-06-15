<?php
include_once 'includes/rsa_keys.php';

if (isset($_POST['generate'])){
        $key_files = generate_key_files();
}

?>
<!DOCTYPE HTML>
<html>
        <head>
                <title>Generator</title>
                <link rel="stylesheet" href="css/style.css" />
        </head>

        <body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000" style="margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;height:100vh">



                 <?php
                        echo "<table width=100% height=100% class='menu' cellspacing='0'><tr><td class='hmenu_title' style='width:302px;'>Key-RSA</td>";
                        echo "<td align='right' class='hmenu_title'>";
                        echo "<form method='post' action='generatekey.php' height='50px'>";
                        echo "<button class='btn_upload' style='height:80px;font-size:30px'  name='generate' type='submit'>Generate</button> ";
                        echo "</form>";
                        echo "</td></tr><tr><th height=100% style='padding-top: 0px;padding-left: 0px;padding-bottom: 0px;'>";
                        echo "<div class='sitebar' style='height:100%;'><a class='akey' style='font-size:20px;' href='index.php'>Back to main page</a></div></th>";
                        if (isset($_POST['generate'])) {
                                //echo "<p>";
                                echo "<td valign='top'><table>";
                                echo "<tr><td style='text-align:right; background-color:#34495e;color: #FFFFFF;'>Private Key: <a class='adownload' download href='".$key_files['key_priv']."'>Download</a></td>";
                                //echo "</p>";
                                //echo "<p>";
                                echo "<tr><td style='text-align:right;background-color:#34495e;color: #FFFFFF;'>Public Key: <a class='adownload' download href='".$key_files['key_pub']."'>Download</a></td></tr>";
                                echo "</table></td>";
                        }
                        echo "</tr></table>";
                ?>
        </body>

</html>