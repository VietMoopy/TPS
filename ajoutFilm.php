<!DOCTYPE html>
<html>
 
	<head>
		<meta charset="latin1">
		<title>Films</title>
		<style>
			label
				{
					display: block;
					width: 90px;
					float: left;
				}
			table
				{
 					border-width:1px; 
 					border-style:solid; 
 					border-color:black;
 					width:50%;
 				}
			
			td
				{ 
 					border-width:1px;
 					border-style:solid; 
 					border-color:#000080;
 					width:50%;
 				}
			legend
			{
				
			}
		</style>
	</head>
 
	<body>
		<thead>
    	<?php
    
    	$link=mysqli_connect("dwarves.iut-fbleau.fr", "philippe", "quentinphpmyadmin", "philippe");
				if(!$link){
					die("<p>connexion impossible</p>");
				}
    
    	$genre=mysqli_query($link, "SELECT DISTINCT genre FROM Film");
    	$pays=mysqli_query($link, "SELECT DISTINCT codePays FROM Film");
    	$rea=mysqli_query($link, "SELECT DISTINCT A.nom,F.idMes FROM Artiste A JOIN Film F ON (F.idMes = A.idArtiste)");
			?>
			
		<fieldset>
			<legend>Ajouter un Film</legend>
			
    <form method='GET' action='ajoutFilm.php'> 
    
		<label>Nom :</label>
    <input type='text' name='titre'><br><br>	
			
    <label for='genre'>Genre :</label>
    <select name='genre' size='1' id='genre'>
			
     	<?php 
      	foreach($genre as $res){
       	echo "<option>" . $res['genre'];
      	}
			?>
			
     </option>
     </select><br><br>
    
      <label for='pays'>Pays :</label>
     	<select name='pays' size='1' id='pays'>
			 
      <?php
      	foreach($pays as $res){
       	echo "<option selected='selected'>" . $res['codePays'];
      	}
			?>
			 
      </option>
      </select><br><br>
    
    	<label for='realisateur'>Realisateur :</label>
     	<select name='realisateur' size='1' id='realisateur'>
			 
      <?php
      	foreach($rea as $res){
       	echo "<option>" . $res['nom'];	
      	}
			?>
			 
      </option>
     	</select>
			<br><br>
    
    	<label for='resume'>Resume :</label>
      <textarea rows='8' cols='30' name='resume' id='resume'></textarea> <br><br>  
      
      <label for='annee'>Annee :</label>
      <input type='number' name='annee' id='annee'><br><br>
     
   		<input type='submit' value='Ajoutez'><br><br>
      
			</fieldset>    
   		
			</form>
    
  	</thead> 
		<tbody>
			<table>
	
				<tr>
		  		<th>Titre</th>
					<th>Genre</th>
				</tr>
			
		<?php
    	$requete=mysqli_query($link,"SELECT titre,genre FROM Film");
  
    	if($requete){
     		extract($_GET);
    
   		if(isset($titre) && ($genre) && ($annee)){
     		$query = "INSERT INTO Film(titre,annee,genre,resume,codePays) values (?,?,?,?,?)";
     		$stmt = mysqli_prepare($link, $query);
     		mysqli_stmt_bind_param($stmt, "sssss", $titre, $annee, $genre, $resume, $pays);
				mysqli_stmt_execute($stmt);
				
     		$requete=mysqli_query($link,"SELECT titre,genre FROM Film");
    		}
			}
    ?>
								
   		<h1>Listes des Films</h1>
    
		<?php		
      if($requete){
        foreach($requete as $Film){
          echo "<tr>";
			    echo "<td>" . $Film['titre'] . "</td>" . "<td>" . $Film['genre'] . "</td>";
					echo "</tr>";
       }
     }
	?>
			
			</table>
  	</tbody>
	</body>
</html>