<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/BloodBank.php';
require_once BASE_DIR . '/app/config/config.php';

class BloodBankController extends BaseController
{
    public function category($queryParams)
    {
        $this->render(
            'project/category.php',
            []
        );
    }

    public function list($queryParams)
    {
        $selectedBloodGroupId = empty($queryParams['group_id']) || $queryParams['group_id'] == 10 ? 0 : $queryParams['group_id'];
        $bloodGroupInfo = BloodBank::getAllBloodGroups();
        $bloodBankList = BloodBank::getBloodBankListByGroupId($selectedBloodGroupId);

        $data = compact('bloodGroupInfo', 'bloodBankList', 'selectedBloodGroupId');
        $this->render(
            'blood_bank/list.php',
            $data
        );
    }

}
