<?php
$staffRole = $this->App("params","staffRole");
$listStaffRoleSelect = $this->App("params","listStaffRoleSelect");
$listStaffRoleAll = $this->App("params","listStaffRoleAll");
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Management Staff - New Staff Member</title>
  </head>
  <body>
    <h1>Management Staff - New Staff Member</h1>
    <hr>
    <nav>
      <a href="/"><button type="button">Index</button></a>
      <a href="?help=index"><button type="button">Help</button></a>
      <br>
    </nav>
    <hr>
    <main>
      <p>
        <a href="/<?=LINK_VIEWS_FOLDER; ?>"><button type="button"><== Back</button></a>
      </p>
      <form method="POST">
        <table width="700">
          <tr>
            <td valign="top" height="10">
              <h3>General Informations</h3>
              <p>
                <label for="staff_username">Username* :</label>
                <input required type="text" name="staff_username" id="staff_username">
              </p>
              <p>
                <label for="staff_password">Password* :</label>
                <input required type="password" name="staff_password" id="staff_password">
              </p>
              <p>
                <label for="staff_email">Email* :</label>
                <input required type="email" name="staff_email" id="staff_email">
              </p>
              <p>
                <label for="staff_rightAccess">Right Access :</label>
                <select name="staff_rightAccess" id="staff_rightAccess">
                  <option value="0" selected="selected">None</option>
                  <option value="1">Active</option>
                </select>
              </p>
              <p>
                <label for="staff_status">Status :</label>
                <select name="staff_status" id="staff_status">
                  <option value="0">None</option>
                  <option value="1" selected="selected">Active</option>
                  <option value="2">Bloque</option>
                </select>
              </p>
            </td>
            <td valign="top" rowspan="2">
              <h3>Profile Informations</h3>
              <p>
                <label for="staffProfile_lastname">Lastname* :</label>
                <input required type="text" name="staffProfile_lastname" id="staffProfile_lastname">
              </p>
              <p>
                <label for="staffProfile_firstname">Firstname* :</label>
                <input required type="text" name="staffProfile_firstname" id="staffProfile_firstname">
              </p>
              <p>
                <label for="staffProfile_sex">Sex :</label>
                <select name="staffProfile_sex" id="staffProfile_sex">
                  <option value="0" selected="selected">Man</option>
                  <option value="1">Woman</option>
                </select>
              </p>
              <p>
                <label for="staffProfile_birthdate">Birthdate :</label>
                <input type="date" name="staffProfile_birthdate" id="staffProfile_birthdate">
              </p>
              <p>
                <label for="staffProfile_address">Address :</label>
              </p>
              <p>
                <textarea name="staffProfile_address" id="staffProfile_address" maxlength="255" rows="6"></textarea>
              </p>
              <p>
                <label for="staffProfile_postalCode">Postal Code :</label>
                <input type="text" name="staffProfile_postalCode" id="staffProfile_postalCode">
              </p>
              <p>
                <label for="staffProfile_city">City :</label>
                <input type="text" name="staffProfile_city" id="staffProfile_city">
              </p>
              <p>
                <label for="staffProfile_country">Country:</label>
                <input type="text" name="staffProfile_country" id="staffProfile_country" value="FRANCE">
              </p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h3>Role Informations</h3>
              <p>
                <input type="radio" id="existing0" name="existingRole" value="0" checked>
                <label for="existing0">Existing Role</label>
              </p>
              <p>
                <label for="staffRole_staffRoleId">Name :</label>
                <select id="staffRole_staffRoleId" name="staffRole_staffRoleId">
                  <option disabled><strong>Fast Selection</strong></option>
	                <?php
		                foreach($listStaffRoleSelect as $key => $value){
			                $staffRole->setDatas($value);
			                if($staffRole->getFastSelection() === true){
				                echo '<option value="' . $staffRole->getId() . '">' . $staffRole->getName() . '</option>';
			                }
		                }
	                ?>
                  <option value="" selected="selected"></option>
                  <option disabled><strong>All Roles</strong></option>
	                <?php
		                foreach($listStaffRoleAll as $key => $value){
			                $staffRole->setDatas($value);
                      echo '<option value="' . $staffRole->getId() . '">' . $staffRole->getName() . '</option>';
		                }
	                ?>
                </select>
              </p>
              <p>
                <input type="radio" id="existing1" name="existingRole" value="1">
                <label for="existing1">New Role</label>
              </p>
              <p>
                <label for="staffRole_name">Name** :</label>
                <input type="text" name="staffRole_Name" id="staffRole_name">
              </p>
              <p>
                <label for="staffRole_priority">Priority** :</label>
                <input type="text" name="staffRole_priority" id="staffRole_priority" value="0">
              </p>
              <p>
                <label for="staffRole_fastSelection">Fast Selection :</label>
                <select id="staffRole_fastSelection" name="staffRole_fastSelection">
                  <option value="false" selected="selected">No</option>
                  <option value="true">Yes</option>
                </select>
              </p>
            </td>
          </tr>
        </table>
        <p>
          <button type="submit">Add New Staff Member</button>
        </p>
      </form>
    </main>
  </body>
</html>