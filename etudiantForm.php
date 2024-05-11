<!DOCTYPE html>
<html>
<head>
	<title>Inscription etudiant</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
    

</head>
<body>
	<h2> Enregistrement étudiant</h2>

	<form action="traitement.php" method="POST"/>
<?php   

     $link = mysqli_connect("localhost", "root", "","SAGNA_database") or

  die("Impossible de se connecter : " . mysqli_error()); //== echo puis exit

  echo '<br> Etat :Connexion au serveur et à la base de données reussies'; 
?>


    <div>
        <label for="name" class="italique">INE :</label>
        <input type="text" id="ine" name="ine_name"/>
    </div>
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="nom" name="nom_name"/>
    </div>
    <div>
        <label for="name">Prénom :</label>
        <input type="text" id="prenom" name="prenom_name"/>
    </div>

    <div>
        <label for="mail">e-mail:</label>
        <input type="email" id="mail" name="mail_name"/>
    </div>
    <div>
        <label for="name">Téléphone :</label>
        <input type="tel" id="tel" name="tel_name"/>
    </div>
    <div>
        <label for="name">Genre :</label>
        <select id="sexe" name="sexe_name">
           <option value="masculin">Masculin</option>
           <option value="feminin">Feminin</option>
        </select>
    </div>

    <div>
        <label for="filiere">FILIERE :</label>
        <select id="filiere" name="filiere_name">
           <option value="">Selectionner votre filiere</option>
           <?php
            $req="SELECT nomfiliere from filiere";
            $resultat=$link->query($req);
            if($resultat->num_rows> 0){
                    while($optionData1=$resultat->fetch_assoc()){
                    $filiere =$optionData1['nomfiliere'];
            ?>
            <option value="<?php echo $filiere; ?>" ><?php echo $filiere; ?></option>
            <?php
                }}
             ?>
        </select>
    </div>
     <div>
        <label for="eno">ENO :</label>
        <select id="eno" name="eno_name">
           <option value="">Selectionner votre ENO</option>
            <?php 
                $query ="SELECT nomEno FROM eno";
                $result = $link->query($query);
                if($result->num_rows> 0){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['nomEno'];
            ?>
            <option value="<?php echo $option; ?>" ><?php echo $option; ?></option>
            <?php
                }}
             ?>

        </select>
    </div>
    <div>
         <input type="submit" value="Inscrire" name="envoi"/>
    </div>       

</form>
</body>
</html>




