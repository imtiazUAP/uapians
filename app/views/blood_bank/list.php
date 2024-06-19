<div>
  <img src="<?= BASE_URL . '/app/assets/images/Donate_Blood.jpg' ?>" alt="" width="350" height="200" class="image"
    align="left" />
  <h1 style="color:#FFFFFF">why donate Blood?</h1>
  <p align="right" style="text-align:left"> You don’t need a special reason to give blood.
    You just need your own reason.
    Some of us give blood because we were asked by a friend.
    Some know that a family member or a friend might need blood some day.
    Some believe it is the right thing we do.
    Whatever your reason, the need is constant and your contribution is important for a healthy and reliable
    blood supply. And you’ll feel good knowing you've helped change a life.
    You will receive a mini physical to check your:
    Pulse
    Blood pressure
    Body temperature
    Hemoglobin</p>
  <h1 style="color:#FFFFFF">Benefits of Donating</h1>
  <p align="right" style="text-align:left">You don’t need a special reason to give blood.
    You just need your own reason.
    Some of us give blood because we were asked by a friend.
    Some know that a family member or a friend might need blood some day.
    Some believe it is the right thing we do.
    Whatever your reason, the need is constant and your contribution is important for a healthy and reliable
    blood supply. And you’ll feel good knowing you've helped change a life.</p>
</div>
<form id="bloodGroupForm" method="post" action="<?= BASE_URL . '/blood-bank/list' ?>">
  <table>
    <tr>
      <td>Search Blood Group:</td>
      <td>
        <select name="Blood_Group_ID" id="Blood_Group_ID" onchange="updateBloodBankFormAction()">
          <option value="10">All Blood Group</option>
          <?php
          foreach ($bloodGroupInfo as $row) {
            $selected = ($row["Blood_Group_ID"] == $selectedBloodGroupId) ? 'selected="selected"' : '';
            echo "<option value=" . $row["Blood_Group_ID"] . " " . $selected . ">" . $row['Blood_Group_Name'] . "</option>";
          }
          ?>
        </select>
      </td>
      <td><input type="Submit" value="Search" /></td>
    </tr>
  </table>
</form>
<table id="itable" border="1">
  <tr>
    <td align="center" height="50" bgcolor="#006699">Registration No</td>
    <td align="center" bgcolor="#006699">Name</td>
    <td align="center" bgcolor="#006699">Phone Number</td>
    <td align="center" bgcolor="#006699">Blood Group Name</td>
  </tr>
  <?php foreach ($bloodBankList as $bloodBankGroup) { ?>
    <tr align="center">
      <td height="40"><?= $bloodBankGroup['SReg'] ?></td>
      <td><?= $bloodBankGroup['SName'] ?></td>
      <td><?= $bloodBankGroup['SPh_Number'] ?></td>
      <td><?= $bloodBankGroup['Blood_Group_Name'] ?></td>
    </tr>
    <?php } ?>
</table>

</div>