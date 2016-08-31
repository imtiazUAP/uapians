<?php
session_start();
error_reporting(0);
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");
?>

<html>
    <head>
        <?php include("header.php"); ?>
    </head>
    <body>
        <br>
            <div align="center">
                <img src="images/tutorial.png"  style="height:100"/>
            </div>
        <div>
            <p style="padding-left: 10px; font-size:14px; color:#0000FF; font-weight:bold; text-align: center">Please log in to continue...</p>
            </br>
            <p style="font-size:14px; color:#0000FF; text-align: center">If you don't have an account yet, then please sign up...</p>
        </div>
        </br>

        <div align="right"; style="padding-right:25">
            <button class="button button_green" onclick="window.open('index.php','_top')"> Log In </button>
            <button class="button button_blue" onclick="window.open('sign_up.php','_top')"> Sign Up </button>
            <button class="button button_red" onClick="tb_remove()"> Cancel </button>
        </div>
    </body>
</html>