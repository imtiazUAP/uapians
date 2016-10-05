<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include("classes/Authentication.php");
include_once("page.inc.php");
?>
<html>
    <head>
        <?php
            include("header.php");
        ?>
    </head>

<body>
<?php
if ($isLoggedIn && $isAdmin) {
?>
<form action="mark_save.php" method="post">
<table>
<tr>
<td>Teacher's Name:</td>
<td><select name="EID" id="EID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT EID,EName FROM e_info ORDER BY EID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["EID"] . "\">" . $row["EName"] . "</option>");
}
?>
</select>
</td>
</tr>




<tr>
<td>Course_Code:</td>
<td><select name="CID" id="CID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT CID,CCode FROM c_info ORDER BY CID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["CID"] . "\">" . $row["CCode"] . "</option>");
}
?>
</select>
</td>
</tr>

<tr>
<td>X_Type:</td>
<td><select name="XID" id="XID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT XID,X_Type FROM x_info ORDER BY XID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["XID"] . "\">" . $row["X_Type"] . "</option>");
}
?>
</select>
</td>
</tr>
<tr>
<td>Date:</td>
<td><input type"text" name="Date"/></td>
</tr>
<tr>
<td>Semester:</td>
<td><select name="SEMID" id="SEMID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SEMID,SEMName FROM sem_info ORDER BY SEMID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SEMID"] . "\">" . $row["SEMName"] . "</option>");
}
?>
</select>
</td>
</tr>


<tr>
<td>Year:</td>
<td><input type"text" name="Year"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID1" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark1"/></td>
</tr>

<tr>
<td>Reg Number:</td>
<td><select name="SID2" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark2"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID3" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark3"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID4" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark4"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID5" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark5"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID6" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark6"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID7" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark7"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID8" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark8"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID9" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark9"/></td>
</tr>
<tr>
<td>Reg Number:</td>
<td><select name="SID10" id="SID">
<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("uapians");

$query="SELECT DISTINCT SID,SReg FROM s_info ORDER BY SID";
$rs = mysql_query($query) or die ('Error submitting');
while ($row = mysql_fetch_assoc($rs)) {
    print("<option value=\"" . $row["SID"] . "\">" . $row["SReg"] . "</option>");
}
?>
</select>
</td>
<td>Mark:</td>
<td><input type"text" name="Mark10"/></td>
</tr>

</table>
<br><br>

<input type="Submit"/>
<a href="#" onClick="tb_remove();">Close</a>
</form>
<?php }else {
    include("permission_error.php");
}
?>
</body>
</html>