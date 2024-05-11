<?php
//
if( isset($_POST['envoi']))
{

	$ine=$_POST['ine_name'];
	$nom=$_POST['nom_name'];
	$prenom=$_POST['prenom_name'];
	$mail=$_POST['mail_name'];
	$tel=$_POST['tel_name'];
	$sexe=$_POST['sexe_name'];
	$filiere=$_POST['filiere_name'];
	$eno=$_POST['eno_name'];

	echo 'Affichage des valeurs saisies dans le formulaire';
	echo '<br> INE :'  . $ine . '<br> Nom : '  . $nom . '<br> Prenom : '  . $prenom . '<br> Email : ' .$mail. '<br> Telephone : '.$tel . '<br> Sexe : ' . $sexe . '<br> Filiere : ' .$filiere. '<br> Eno : ' .$eno;
}
//On etablit la connexion avec le serveur et la base de données

$link = mysqli_connect("localhost","root","","SAGNA_database") or
die("Impossible de se connecter:" .mysqli_error());
echo '<br> Etat: Connexion au serveur et à la base de données reussies';

//requete insertion dans la base
$sql=" INSERT INTO etudiant (ine, nom, prenom, email, telephone, sexe, filiere, eno)
VALUES ('$ine','$nom','$prenom','$mail','$tel','$sexe','$filiere','$eno') ";

if (!mysqli_query($link,$sql)) 
{
	die("Impossible d'ajouter cet enregistrement:" .mysqli_error($link));
}
echo  "<br> L'enregistrement est ajouté";
echo'<br>';

    // requete affichage données de la base

  $res1="SELECT * FROM etudiant";

  $res = mysqli_query($link,$res1);
$row=mysqli_fetch_row($res);
echo " Vous venez d'enregistrer l'etudiant:";
echo "&nbsp;".$row[0]; // l'INE
echo "&nbsp;".$row[1]; // le NOM
echo "&nbsp;".$row[2];
echo "&nbsp;".$row[3];
echo "&nbsp;".$row[4];
echo "&nbsp;".$row[5];
echo "&nbsp;".$row[6];
echo "&nbsp;".$row[7];


//requete affichage toutes les enreistrements 
$result = mysqli_query($link,"SELECT * FROM etudiant");

echo " <br> Et voici la liste des étudiants :";

echo "<table border='1'>
<tr>
<th>INE</th>
<th>NOM</th>
<th>PRENOM</th>
<th>EMAIL</th>
<th>TELEPHONE</th>
<th>SEXE</th>
<th>FILIERE</th>
<th>ENO</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ine'] . "</td>";
echo "<td>" . $row['nom'] . "</td>";
echo "<td>" . $row['prenom'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['telephone'] . "</td>";
echo "<td>" . $row['sexe'] . "</td>";
echo "<td>" . $row['filiere'] . "</td>";
echo "<td>" . $row['eno'] . "</td>";
echo "</tr>";
}
echo "</table>";

// fermeture de la connexion
mysqli_close($link);

?>