<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion Personnel - Edit</title>
</head>
<body>
  <h1>Gestion Personnel - Edit</h1>
  <nav>
    <a href="/<?=LINK_VIEWS; ?>"><button type="button"><== Retour</button></a>
    <br>
  </nav>
  <hr>
  <main>
    <?php
      $profile = $this->getApp("params", "profile");
	    $salary = $this->getApp("params", "salary");
      $role = $this->getApp("params", "role");
    ?>
    <h4>Profile</h4>
    <p>
      <label for="sexe">Sexe :</label>
      <strong><?=$profile->getSex() ? "Femme" : "Homme"; ?></strong>
    </p>
    <p>
      <label for="age">Date anniversaire :</label>
      <strong><?=$profile->dateUsToFr($profile->getBirthdate()); ?></strong>
    </p>
    <p>
      <label for="age">Age :</label>
      <strong><?=$profile->getAge(); ?> ans</strong>
    </p>
    <p>
      <label for="nom">Nom :</label>
      <strong><?=$profile->getLastname(); ?></strong>
    </p>
    <p>
      <label for="prenom">Prenom :</label>
      <strong><?=$profile->getFirstname(); ?></strong>
    </p>
    <h4>Role</h4>
    <p>
      <label for="roleNom">Nom :</label>
      <strong><?=$role->getName(); ?></strong>
    </p>
    <p>
      <label for="rolePriority">Priorité :</label>
      <strong><?=$role->getPriority(); ?></strong>
    </p>
    <?php
//      print_r()
    ?>
    <h4>Salaire</h4>
    <p>
      <label for="salaryDateEntry">Date d'entrée :</label>
      <strong><?=$salary->dateUsToFr($salary->getDateEntry()); ?></strong>
    </p>
    <p>
      <label for="salarySalaryBase">Base :</label>
      <strong><?=sprintf('%.2f',$salary->getSalaryBase()); ?> €</strong>
    </p>
    <p>
      <label for="salaryBonus">Bonus :</label>
      <strong><?=sprintf('%.3f',$salary->getBonus()); ?></strong>
    </p>
    <p>
      <label for="salaryPenalty">Malus :</label>
      <strong><?=sprintf('%.3f',$salary->getPenalty()); ?></strong>
    </p>
    <p>
      <label for="salarySeniorityRate">Coefficiant ancienté :</label>
      <strong><?=sprintf('%.3f',$salary->getSeniorityRate()); ?></strong>
      <span> (<?=sprintf('%.1f',$salary->getSeniorityRate() * 100); ?>% / an) </span>
    </p>
    <p>
      <label for="salaireNetSalary">Salaire Net :</label>
      <strong><?=sprintf('%.2f',$salary->getNetSalary()); ?> €</strong>
    </p>
  </main>
</body>
</html>