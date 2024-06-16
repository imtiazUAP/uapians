<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class BloodBank {

    public static function getAllBloodGroups()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT Blood_Group_ID,Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $bloodGroupData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $bloodGroupData;
    }

    public static function getBloodBankListByGroupId($groupId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        if ($groupId) {
            $qry = "SELECT * FROM 
            (SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
            WHERE
            S.Blood_Group_ID = B.Blood_Group_ID
            ) A where blood_group_ID=?";
        } else {
            $qry = "SELECT * FROM 
            (SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
            WHERE
            S.Blood_Group_ID=B.Blood_Group_ID
            ) A WHERE blood_group_ID='1'
            OR blood_group_ID='2'
            OR blood_group_ID='3'
            OR blood_group_ID='4'
            OR blood_group_ID='5'
            OR blood_group_ID='6'
            OR blood_group_ID='7'
            OR blood_group_ID='8'
            ORDER BY blood_group_ID";
        }

        $stmt = $connection->prepare($qry);
        if ($stmt) {
            if ($groupId) {
                $stmt->bind_param("s", $groupId);
            }
            $stmt->execute();
            $bloodBankList = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $bloodBankList;
    }

    public static function getBloodDonorYesNo()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT donor_value,Blood_Donor FROM blood_donor_yes_no ORDER BY donor_value";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $bloodDonorYesNo = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $bloodDonorYesNo;
    }

}
