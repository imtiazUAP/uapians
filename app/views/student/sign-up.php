<?php if (isset($_GET['message'])) { ?>
    <div class="message">
        <p><?php echo htmlspecialchars($_GET['message']); ?></p>
    </div>
<?php } else { ?>
    <div style="font-size:18px; font-weight:bold; color:#FFFFFF">Sign Up</div>
    <div style="font-size:14px">
        <p>After successful registration a email will be sent to your valid email account with email
            and password. Use that user name and password to log in... </p>
    </div>
    <br>
    <br>
    <div align="center">
        <form action="<?= BASE_URL . '/student/sign-up/save' ?>" method="post" enctype="multipart/form-data">
            <table align="center">
                <p>
                    <tr>
                        <td><label for="name" class="signup_field" data-icon="u">Your Registration:
                            </label></td>
                        <td><input id="lastnamesignup" name="reg" required="required" type="text" placeholder="11201099" />
                        </td>
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
                            foreach ($semesters as $semester) { ?>
                                <option value="<?php echo $semester["SMID"] ?>">
                                    <?php echo $semester["SMName"] ?>
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
                            foreach ($bloodGroups as $bloodGroup) { ?>
                                <option value="<?php echo $bloodGroup["Blood_Group_ID"] ?>">
                                    <?php echo $bloodGroup["Blood_Group_Name"] ?>
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
                            foreach ($bloodDonorYesNo as $donor) { ?>
                                <option value="<?php echo $donor["donor_value"] ?>">
                                    <?php echo $donor["Blood_Donor"] ?>
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
                            foreach ($districts as $district) { ?>
                                <option value="<?php echo $district["district_id"] ?>">
                                    <?php echo $district["district_name"] ?>
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
                        <td><input id="file" name="file" required="required" type="file" placeholder="required" /></td>
                    </tr>
                </p>
                <p>
                    <tr>
                        <td><label for="Portrait" class="signup_field" data-icon="u">User Name:</label>
                        </td>
                        <td><input id="file" name="email" required="required" type="text"
                                placeholder="your desired email" /></td>
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
<?php } ?>