<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Gestion Personnel - Ajouter</title>
  </head>
  <body>
    <h1>Gestion Personnel - Ajouter</h1>
    <nav>
      <a href="/<?=LINK_VIEWS; ?>"><button type="button"><== Retour</button></a>
      <br>
    </nav>
    <hr>
    <main>
      <form method="POST">
        <h4>Profile</h4>
        <p>
          <label for="sex">Sexe :</label>
          <select name="sex" id="sex">
            <option selected="selected"></option>
            <option value="0">Homme</option>
            <option value="1">Femme</option>
          </select>
        </p>
        <p>
          <label for="birthdate">Date Anniversaire :</label>
          <input type="date" name="birthdate" id="birthdate">
        </p>
        <p>
          <label for="lastname">Nom* :</label>
          <input required type="text" name="lastname" id="lastname">
        </p>
        <p>
          <label for="firstname">Prenom* :</label>
          <input type="text" name="firstname" id="firstname">
        </p>
        <h4>Role</h4>
        <p>
          <label for="roleName">Nom :</label>
          <select name="roleName" id="roleName">
            <option value="" selected="selected"></option>
            <option value="Directeur">Directeur</option>
            <option value="Secretaire">Secretaire</option>
            <option value="Comptable">Comptable</option>
            <option value="Developpeur Full Stack">Developpeur Full Stack</option>
            <option value="Developpeur Backend">Developpeur Backend</option>
            <option value="Developpeur Frontend">Developpeur Frontend</option>
            <option value="Commercial">Commercial</option>
            <option value="Apprenti">Apprenti</option>
            <option value="Autre">Autre</option>
          </select>
        </p>
        <p>
          <label for="rolePriority">Priorité :</label>
          <input type="text" name="rolePriority" id="rolePriority">
        </p>
        <h4>Salaire</h4>
        <p>
          <label for="salaryDateEntry">Date d'entrée* :</label>
          <input required type="date"  name="salaryDateEntry" id="salaryDateEntry" value="<?=date("Y-m-d"); ?>">
        </p>
        <p>
          <label for="salarySalaryBase">Base* :</label>
          <input required type="text" name="salarySalaryBase" id="salarySalaryBase" placeholder="1450.00">
        </p>
        <p>
          <label for="salaryBonus">Bonus :</label>
          <input type="text" name="salaryBonus" id="salaryBonus" placeholder="0.000">
        </p>
        <p>
          <label for="salaryPenalty">Malus :</label>
          <input type="text" name="salaryPenalty" id="salaryPenalty" placeholder="0.000">
        </p>
        <p>
          <label for="salarySeniorityRate">Taux ancienneté* :</label>
          <input required type="text" name="salarySeniorityRate" id="salarySeniorityRate" placeholder="0.025">
        </p>
        <p>
          <button type="submit">Enregistrer</button>
        </p>
      </form>
      </p>
    </main>
  </body>
</html>