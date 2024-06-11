<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<html>

<head>
    <?php include ("header.php"); ?>
</head>

<body>
    <div id="canvas">
        <div class="body_wrapper" align="center">
            <?php include ("logo_for_index.php"); ?>
            <div class="body">
                <?php include ("menu_for_index.php"); ?>
                <div id="content_wrapper">
                    <div id="sidebar" align="left">
                        <?php include ("sidebar_for_index.php"); ?>
                    </div>
                    <br>
                    <br>
                    <div style="font-size:18px; font-weight:bold; color:#FFFFFF">Sign Up</div>
                    <div style="font-size:14px">
                        <p>After successful registration a email will be sent to your valid email account with username
                            and password. Use that user name and password to log in... </p>
                    </div>
                    <br>
                    <br>
                    <div align="center">
                        <form action="sign_up_save.php" method="post" enctype="multipart/form-data">
                            <table align="center">
                                <p>
                                    <tr>
                                        <td><label for="name" class="signup_field" data-icon="u">Your Registration:
                                            </label></td>
                                        <td><input id="lastnamesignup" name="reg" required="required" type="text"
                                                placeholder="11201099" /></td>
                                    </tr>
                                </p>
                                <p>
                                    <tr>
                                        <td><label for="name" class="signup_field" data-icon="u">Your Name: </label>
                                        </td>
                                        <td><input id="lastnamesignup" name="name" required="required" type="text"
                                                placeholder="Example Uddin" /></td>
                                    </tr>
                                </p>
                                <tr>
                                    <td>Semester: </td>
                                    <td><select name="SMID" id="SMID">
                                            <?php
                                            $dbconnect = new dbClass();
                                            $connection = $dbconnect->getConnection();
                                            $stmt = $connection->prepare("SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID");
                                            $stmt->execute();
                                            $results = $stmt->get_result();
                                            foreach ($results as $result) { ?>
                                                <option value="<?php echo $result["SMID"] ?>">
                                                    <?php echo $result["SMName"] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Blood Group: </td>
                                    <td><select name="Blood_Group_ID" id="Blood_Group_ID">
                                            <?php
                                            $bloodGroupStmt = $connection->prepare("SELECT DISTINCT Blood_Group_ID, Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID");
                                            $bloodGroupStmt->execute();
                                            $bloodGroupResults = $bloodGroupStmt->get_result();
                                            foreach ($bloodGroupResults as $result) { ?>
                                                <option value="<?php echo $result["Blood_Group_ID"] ?>">
                                                    <?php echo $result["Blood_Group_Name"] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Blood Donor: </td>
                                    <td><select name="donor_value" id="donor_value">
                                            <?php
                                            $bloodDonorStmt = $connection->prepare("SELECT DISTINCT donor_value,Blood_Donor FROM blood_donor_yes_no ORDER BY donor_value");
                                            $bloodDonorStmt->execute();
                                            $bloodDonorResults = $bloodDonorStmt->get_result();
                                            foreach ($bloodDonorResults as $result) { ?>
                                                <option value="<?php echo $result["donor_value"] ?>">
                                                    <?php echo $result["Blood_Donor"] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Home City: </td>
                                    <td><select name="district_id" id="district_id">
                                            <?php
                                            $districtStmt = $connection->prepare("SELECT DISTINCT district_id,district_name FROM districts ORDER BY district_id");
                                            $districtStmt->execute();
                                            $districtResults = $districtStmt->get_result();
                                            foreach ($districtResults as $result) { ?>
                                                <option value="<?php echo $result["district_id"] ?>">
                                                    <?php echo $result["district_name"] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <p>
                                    <tr>
                                        <td><label for="email" class="signup_field" data-icon="u">Your E Mail:</label>
                                        </td>
                                        <td><input id="lastnamesignup" name="email" required="required" type="text"
                                                placeholder="example@yahoo.com" /></td>
                                    </tr>
                                </p>
                                <p>
                                    <tr>
                                        <td><label for="Portrait" class="signup_field" data-icon="u">Upload
                                                Photo:</label></td>
                                        <td><input id="file" name="file" required="required" type="file"
                                                placeholder="required" /></td>
                                    </tr>
                                </p>
                                <p>
                                    <tr>
                                        <td><label for="Portrait" class="signup_field" data-icon="u">User Name:</label>
                                        </td>
                                        <td><input id="file" name="username" required="required" type="text"
                                                placeholder="your desired username" /></td>
                                    </tr>
                                </p>
                                <p>
                                    <tr>
                                        <td><label for="Portrait" class="signup_field" data-icon="u">Password:</label>
                                        </td>
                                        <td><input id="file" name="password" required="required" type="password"
                                                placeholder="your desired password" /></td>
                                    </tr>
                                </p>
                            </table>
                            <br>
                            <br>
                            <button type="Submit" class="button button_blue">Create an account</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer">
                <?php include ("footer.php"); ?>
            </div>
</body>

</html>