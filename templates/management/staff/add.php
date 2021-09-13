<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Management - Staff - New Staff Member</title>
  </head>
  <body>
    <h1>Management - Staff - New Staff Member</h1>
    <nav>
      <a href="/<?=LINK_VIEWS; ?>"><button type="button"><== Back</button></a>
      <br>
    </nav>
    <hr>
    <main>
      <form method="POST">
        <table width="700">
          <tr>
            <td valign="top" height="10">
              <h3>General Informations</h3>
              <p>
                <label for="staff_Username">Username* :</label>
                <input required type="text" name="staff_Username" id="staff_Username">
              </p>
              <p>
                <label for="staff_Password">Password* :</label>
                <input required type="password" name="staff_Password" id="staff_Password">
              </p>
              <p>
                <label for="staff_Email">Email* :</label>
                <input required type="email" name="staff_Email" id="staff_Email">
              </p>
              <p>
                <label for="staff_RightAccess">Right Access :</label>
                <select name="staff_RightAccess" id="staff_RightAccess">
                  <option value="0" selected="selected">None</option>
                  <option value="1">Active</option>
                </select>
              </p>
              <p>
                <label for="staff_Status">Status :</label>
                <select name="staff_Status" id="staff_Status">
                  <option value="0">None</option>
                  <option value="1" selected="selected">Active</option>
                  <option value="2">Bloque</option>
                </select>
              </p>
            </td>
            <td valign="top" rowspan="2">
              <h3>Profile Informations</h3>
              <p>
                <label for="staffProfile_Lastname">Lastname* :</label>
                <input required type="text" name="staffProfile_Lastname" id="staffProfile_Lastname">
              </p>
              <p>
                <label for="staffProfile_Firstname">Firstname* :</label>
                <input required type="text" name="profileFirstname" id="profileFirstname">
              </p>
              <p>
                <label for="staffProfile_Sex">Sex :</label>
                <select name="staffProfile_Sex" id="staffProfile_Sex">
                  <option value="0" selected="selected">Man</option>
                  <option value="1">Woman</option>
                </select>
              </p>
              <p>
                <label for="staffProfile_Birthdate">Birthdate :</label>
                <input type="date" name="staffProfile_Birthdate" id="staffProfile_Birthdate">
              </p>
              <p>
                <label for="staffProfile_Address">Address :</label>
              </p>
              <p>
                <textarea name="staffProfile_Address" id="staffProfile_Address" maxlength="255" rows="6"></textarea>
              </p>
              <p>
                <label for="staffProfile_PostalCode">Postal Code :</label>
                <input type="text" name="staffProfile_PostalCode" id="staffProfile_PostalCode">
              </p>
              <p>
                <label for="staffProfile_City">City :</label>
                <input type="text" name="staffProfile_City" id="staffProfile_City">
              </p>
              <p>
                <label for="staffProfile_Country">Country:</label>
                <input type="text" name="staffProfile_Country" id="staffProfile_Country" value="FRANCE">
              </p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h3>Role Informations</h3>
              <p>
                <input type="radio" id="staffRole_existing0" name="staffRole_ExistingRole" value="0" checked>
                <label for="staffRole_existing0">Existing Role</label>
              </p>
              <p>
                <label for="staffRole_Id">Name :</label>
                <select id="staffRole_Id" name="staffRole_Id">
                  <option disabled><strong>Fast Selection</strong></option>
                  <option value="0">Super Admin</option>
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                  <option value="" selected="selected"></option>
                  <option disabled><strong>All Roles</strong></option>
                  <?php
                  $staffRole = $this->getApp("params","staffRole");
                  $listStaffRole = $this->getApp("params","listStaffRole");
                  foreach($listStaffRole as $key => $value){
                    $staffRole->setDatas($value);
                    echo '<option value="' . $staffRole->getId() . '">' . $staffRole->getName() . '</option>';
                  }
                  ?>
                </select>
              </p>
              <p>
                <input type="radio" id="staffRole_existing1" name="staffRole_ExistingRole" value="1">
                <label for="staffRole_existing1">New Role</label>
              </p>
              <p>
                <label for="staffRole_Name">Name** :</label>
                <input type="text" name="staffRole_Name" id="staffRole_Name">
              </p>
              <p>
                <label for="staffRole_Priority">Priority** :</label>
                <input type="text" name="staffRole_Priority" id="staffRole_Priority" value="0">
              </p>
            </td>
          </tr>
          <tr>
            <td valign="top" height="10" colspan="2">
              <h3>Salary Informations</h3>
            </td>
          </tr>
          <tr>
            <td valign="top" height="10">
              <p>
                <label for="staffSalary_DateEntry">Date Entry* :</label>
                <input type="date" name="staffSalary_DateEntry" id="staffSalary_DateEntry" value="<?=date("Y-m-d"); ?>">
              </p>
              <p>
                <label for="staffSalary_SalaryBase">Salary Base :</label>
                <input type="text" name="staffSalary_SalaryBase" id="staffSalary_SalaryBase">
              </p>
            </td>
            <td valign="top" height="10">
              <p>
                <label for="staffSalary_Bonus">Bonus :</label>
                <input type="text" name="staffSalary_Bonus" id="staffSalary_Bonus" value="0.000">
              </p>
              <p>
                <label for="staffSalary_Penalty">Penalty :</label>
                <input type="text" name="staffSalary_Penalty" id="staffSalary_Penalty" value="0.22">
              </p>
              <p>
                <label for="staffSalary_SeniorityRate">Seniority Rate :</label>
                <input type="text" name="staffSalary_SeniorityRate" id="staffSalary_SeniorityRate" value="0.025">
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