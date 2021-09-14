<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Management Staff</title>
  </head>
  <body>
    <h1>Management Staff</h1>
    <hr>
    <nav>
      <a href="/"><button type="button">Index</button></a>
      <a href="?help=index"><button type="button">Help</button></a>
    </nav>
    <hr>
    <main>
      <p>
        <a href="/<?=LINK_VIEWS_FOLDER; ?>/new-staff"><button type="button">New Staff Member</button></a>
      </p>
      <table width="900">
        <thead>
        <tr>
          <th align="left" width="50">N°</th>
          <th align="left">Email</th>
          <th align="left" width="120">Role</th>
          <th align="left" width="120">Right Access</th>
          <th align="left" width="100">Status</th>
          <th align="left" width="100"></th>
          <th align="left" width="100"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $staff = $this->App("params","staff");
        $listStaff = $this->App("params","listStaff");
        foreach ($listStaff as $key => $value){
          $staff->setDatas($value);
          echo "<tr>";
          echo "<td>" . $staff->getId() . "</td>";
          echo "<td>" . $staff->getEmail() . "</td>";
          echo "<td>" . ($staff->getStaffRoleId() ? $staff->getStaffRoleId()->getName() : null) . "</td>";
          echo "<td>" . ($staff->getRightAccess() ? "Open" : "Close") . "</td>";
          echo "<td>" . ($staff->getStatus() ? "Active" : "None") . "</td>";
          echo "<td align='right'><a href='/" . LINK_VIEWS_FOLDER . "/edit?id=" . $staff->getId() . "'>Edit</a></td>";
          echo "<td align='right'><a href='/" . LINK_VIEWS_FOLDER . "/delete?id=" . $staff->getId() . "'>Delete</a></td>";
          echo "</tr>";
        }
        ?>
        </tbody>
      </table>
    </main>
  </body>
</html>