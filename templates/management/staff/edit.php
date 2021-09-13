<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Management - Staff - Edit</title>
</head>
<body>
  <h1>Management - Staff - Edit</h1>
  <nav>
    <a href="/"><button type="button"><== Back Index</button></a>
    <a href="/<?=LINK_VIEWS_FOLDER; ?>"><button type="button"><== Back</button></a>
    <br>
  </nav>
  <hr>
  <main>
	  <?php
		  $staff = $this->getApp("params","staff");
	  ?>
    <h2>Staff Member <?=$staff->getUsername(); ?></h2>
    <p>
      <a href="/<?=LINK_VIEWS_FOLDER; ?>/delete?id=<?=$staff->getId(); ?>"><button type="button">Delete Staff <?=$staff->getUsername(); ?></button></a>
    </p>
    <table width="700">
      <tr>
        <td valign="top" height="10">
          <h3>General Informations</h3>
          <p>
            <label for="email">Username :</label>
            <strong><?=$staff->getUsername(); ?></strong>
          </p>
          <p>
            <label for="email">Email :</label>
            <strong><?=$staff->getEmail() ?></strong>
          </p>
          <p>
            <label for="age">Right Access :</label>
            <strong><?=$staff->getRightAccess() ? "Open" : "Close"; ?></strong>
          </p>
          <p>
            <label for="age">Status :</label>
            <strong><?=$staff->getStatus() ? "Active" : "None"; ?></strong>
          </p>
        </td>
        <td valign="top" rowspan="2">
          <h3>Profile Informations</h3>
          <p>
            <label for="email">Lastname :</label>
            <strong><?=$staff->getStaffProfileId()->getLastname(); ?></strong>
          </p>
          <p>
            <label for="email">Firstname :</label>
            <strong><?=$staff->getStaffProfileId()->getFirstname(); ?></strong>
          </p>
          <p>
            <label for="age">Sex :</label>
            <strong><?=$staff->getStaffProfileId()->getSex() ? "Woman" : "Man"; ?></strong>
          </p>
          <p>
            <label for="age">Birthdate :</label>
            <strong><?=$staff->getStaffProfileId()->getBirthdate(); ?></strong>
          </p>
          <p>
            <label for="age">Age :</label>
            <strong><?=$staff->getStaffProfileId()->getAge(); ?> ans</strong>
          </p>
          <p>
            <label for="age">Address :</label>
            <p><strong><?=$staff->getStaffProfileId()->getAddress(); ?></strong></p>
          </p>
          <p>
            <label for="age">Postal Code:</label>
            <strong><?=$staff->getStaffProfileId()->getPostalCode(); ?></strong>
          </p>
          <p>
            <label for="age">City:</label>
            <strong><?=$staff->getStaffProfileId()->getCity(); ?></strong>
          </p>
          <p>
            <label for="age">Country:</label>
            <strong><?=$staff->getStaffProfileId()->getCountry(); ?></strong>
          </p>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <h3>Role Informations</h3>
          <p>
            <label for="email">Name :</label>
            <strong><?=$staff->getStaffRoleId()->getName(); ?></strong>
          </p>
          <p>
            <label for="email">Priority :</label>
            <strong><?=$staff->getStaffRoleId()->getPriority(); ?></strong>
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
            <label for="email">Date Entry :</label>
            <strong><?=$staff->getStaffSalaryId()->getDateEntry(); ?></strong>
          </p>
          <p>
            <label for="email">Salary Base :</label>
            <strong><?=$staff->getStaffSalaryId()->getSalaryBase(); ?></strong>
          </p>
          <p>
            <label for="email">Net Salary :</label>
            <strong><?=$staff->getStaffSalaryId()->getNetSalary(); ?></strong>
          </p>
          
        </td>
        <td valign="top" height="10">
          <p>
            <label for="email">Bonus :</label>
            <strong><?=$staff->getStaffSalaryId()->getBonus(); ?></strong>
          </p>
          <p>
            <label for="email">Penalty :</label>
            <strong><?=$staff->getStaffSalaryId()->getPenalty(); ?></strong>
          </p>
          <p>
            <label for="email">Seniority Rate :</label>
            <strong><?=$staff->getStaffSalaryId()->getSeniorityRate(); ?></strong>
          </p>
          
        </td>
      </tr>
    </table>
  </main>
</body>
</html>