<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Management - Staff - Profile</title>
  </head>
  <body>
    <h1>Management - Staff - Profile</h1>
    <nav>
      <a href="/"><button type="button"><== Back Index</button></a>
      <a href="/<?=LINK_VIEWS; ?>"><button type="button"><== Back</button></a>
      <a href="/<?=LINK_VIEWS; ?>/role"><button type="button">Role</button></a>
      <a href="/<?=LINK_VIEWS; ?>/salary"><button type="button">Salary</button></a>
      <a href="/<?=LINK_VIEWS; ?>/pole"><button type="button">Pole</button></a>
      <br>
    </nav>
    <hr>
    <main>
      <p>
        <a href="/<?=LINK_VIEWS; ?>/new"><button type="button">New Profile</button></a>
      <table width="750">
        <thead>
        <tr>
          <th align="left" width="50">N°</th>
          <th align="left">Email Staff</th>
          <th align="left" width="120">Lastname</th>
          <th align="left" width="120">Firstname</th>
          <th align="left" width="100">Sex</th>
          <th align="left" width="100">Birthdate</th>
          <th align="left" width="100">Age</th>
          <th align="left" width="100"></th>
        </tr>
        </thead>
        <tbody>
          <?php
//        $staff = $this->getApp("params","staff");
//        $staffProfile = $this->getApp("params","staffProfile");
//        $listStaffProfile = $this->getApp("params","listStaffProfile");
//		    foreach ($listStaffProfile as $key => $value){
//			    $staffProfile->setDatas($value);
//			    echo "<tr>";
//			    echo "<td>" . $staffProfile->getId() . "</td>";
//			    echo "<td>" . $staff->getEmail() . "</td>";
//			    echo "<td>" . $staffProfile->getLastname() . "</td>";
//			    echo "<td>" . $staffProfile->getFirstname() . "</td>";
//			    echo "<td>" . ($staffProfile->getSex() ? "Woman" : "Man") . "</td>";
//			    echo "<td>" . ($staffProfile->dateUsToFr($staffProfile->getBirthdate())) . "</td>";
//			    echo "<td align='right'><a href='/" . LINK_VIEWS . "/profile/edit?id=" . $staffProfile->getId() . "'>Edit</a></td>";
//			    echo "<td align='right'><a href='/" . LINK_VIEWS . "/delete?id=" . $staff->getId() . "'>Delete Staff Member</a></td>";
//			    echo "</tr>";
//		    }?>
        </tbody>
      </table>
      </p>
    </main>
  </body>
</html>