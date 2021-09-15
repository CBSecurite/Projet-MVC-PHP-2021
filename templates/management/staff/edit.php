<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Management Staff - Edit</title>
</head>
<body>
  <h1>Management Staff - Edit</h1>
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
	  <?php
		  $staff = $this->App("params","staff");
		  $staffProfile = $this->App("params","staffProfile");
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
            <strong><?=($staffProfile ? $staffProfile->getLastname() : ""); ?></strong>
          </p>
          <p>
            <label for="email">Firstname :</label>
            <strong><?=$staffProfile?->getFirstname(); ?></strong>
          </p>
          <p>
            <label for="age">Sex :</label>
            <strong><?=$staffProfile?->getSex() ? "Woman" : "Man"; ?></strong>
          </p>
          <p>
            <label for="age">Birthdate :</label>
            <strong><?=$staffProfile?->getBirthdate(); ?></strong>
          </p>
          <p>
            <label for="age">Age :</label>
            <strong><?=$staffProfile?->getAge(); ?> ans</strong>
          </p>
          <p>
            <label for="age">Address :</label>
            <p><strong><?=$staffProfile?->getAddress(); ?></strong></p>
          </p>
          <p>
            <label for="age">Postal Code:</label>
            <strong><?=$staffProfile?->getPostalCode(); ?></strong>
          </p>
          <p>
            <label for="age">City:</label>
            <strong><?=$staffProfile?->getCity(); ?></strong>
          </p>
          <p>
            <label for="age">Country:</label>
            <strong><?=$staffProfile?->getCountry(); ?></strong>
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
          <p>
            <label for="email">Fast Selection :</label>
            <strong><?=($staff->getStaffRoleId()->getFastSelection() ? "Yes" : "No"); ?></strong>
          </p>
        </td>
      </tr>
    </table>
  </main>
</body>
</html>