<?php 
echo'<head> <title> Liste des étudiant  Développement web</title> </head>';

 if (isset($_GET["edit"])){
                       if (isset($_GET["username"])){
                          $username=$_GET["username"];
                          #selectionner l'etudiant a modifier
                          $Sql = "SELECT * FROM e_dev_web WHERE  username = '".$username."'  ";
                          $Req = mysqli_query($result, $Sql);
                          $Resultat = mysqli_fetch_assoc($Req);
                          #formulaire de modification
                           echo ' <h3> A modifier : </h3>
                          <div class="container" >
                              
                                 <table id="mytable" class="table table-bordred table-striped">
                   
                                      <thead class="text-black" >
                                         <th>identifiant de l\'etudiant</th>
                                         <th>Nom </th>
                                         <th>prenom</th>
                                         <th>nombre d\'absences</th>
										 <th>motife d\'absence</th>
                                         <th>nombre de retard</th>
                                       
                      
                                       </thead>

                                     <tbody class="text-black">
    
                                      <tr>
                                      <form method="POST" action"index.php?page=listeDev_web">
                                      <td>'.$Resultat["username"].'</td>
                                      <td>'.$Resultat["nom"].'</td>
									                    <td>'.$Resultat["prenom"].'</td>
                                      <td class="col-md-3"><input type="number" class="form-control" min="0" name="NbrAb" value="'.$Resultat["NbrAb"].'" class="text-black" class="form-control" required /></td>
									                    <td class="col-md-5"> <textarea   type="text" class="form-control" name="RaisonAb"  class="text-black"  required > "'.$Resultat["RaisonAb"].'"</textarea></td>
                            
                                 <td class="col-md-3"> <input type="number" class="form-control" min="0" name="NbrRt" value="'.$Resultat["NbrRt"].'" class="text-black" class="form-control" required />  </td>                    
                               <td class="col-md-5"><input class="btn btn-primary col-md-12" id="btn" type="submit" name="validedit" value="enregistrer " >  </td>
                                   </form>
                                  <td class="col-md-5"><a href="index.php?page=listeDev_web"> <button id="btn-signup" class="btn btn-secondary " class="col-md-12">annuler </button> </a></td>
                                  </tr>
                                    </tbody>
                                </table>
                      
                          
                          </div>'; 
                        } 
            }elseif (isset($_GET["delete"])){
                       if (isset($_GET["username"]))
                             $Sql = "SELECT * FROM e_dev_web WHERE  username='".$_GET["username"]."'";
                             $Req = mysqli_query($result, $Sql);
                             $Resultat = mysqli_fetch_assoc($Req);
      
                       echo'
                              <div class="text-black" class="col-md-12">
                                <table id="mytable" class="table table-bordred table-striped">

                                 <h3> VOULEZ-VOUS VRAIMENT SUPRIMMER CET ETUDIANT ? </h3>

                                   <!-- l\'etudiant a supprimer -->
                                     <thead class="text-black" > 
                                       <th>identifiant de l\'etudiant</th>
                                         <th>Nom </th>
                                         <th>prenom</th>
										                    <th>date de naissance</th>
								                         <th>email</th>
                                         <th>nombre d\'absences</th>
										                     <th>motife d\'absence</th>
                                         <th>nombre de retard</th>
                                       </thead>
                                     <tbody class="text-black" >
                                       <tr>
                                   <form method="POST" action"index.php?page=listeDev_web>
								   
                                         <th scope="row">'.$Resultat["username"].'</th>
                                         <td>'.$Resultat["nom"].'</td>
										                     <td>'.$Resultat["prenom"].'</td>
										                     <td>'.$Resultat["date_nais"].'</td>
										                     <td>'.$Resultat["email"].'</td>
                                         <td >'.$Resultat["NbrAb"].'</td>
                                         <td class="col-md-3">'.$Resultat["RaisonAb"].'</td> 
                                         <td>'.$Resultat["NbrRt"].'</td>
                                         <td class="col-md-3"> <input class="btn btn-primary col-md-12" id="btn" type="submit"                                                                 name="validdelete" value="Supprimer l\'étudiant" > </td>
                                         </form>
                                          <td class="col-md-5"> <a href="index.php?page=listeDev_web"> <button id="btn-signup"                                                class="btn btn-secondary " class="col-md-12">annuler </button> </a></td>
                                       </tr> </div> 
                                     </tbody>
                                </table> 

                              </div>';
               }
                 
         #confirmer la suppression
         if(isset($_POST["validdelete"])){
             $_GET["username"];
               $SQL= "DELETE FROM e_dev_web WHERE username='".$_GET["username"]."'";
              
               mysqli_query($result,$SQL) or die ("Error SQL : <br>".$SQL);
               
              echo'<div class="alert alert-success" role="alert"> étudiant supprimé.</div>';
             } 
              #soumettre les modification
          if (isset($_POST['validedit']) ){
                 $NbrAb=$_POST['NbrAb'];
                 $RaisonAb=$_POST['RaisonAb'];
                 $NbrRt=$_POST['NbrRt'];
				 $username=$_GET["username"];
				 
  $SQL= "UPDATE e_dev_web SET   RaisonAb='".$RaisonAb."' WHERE username='".$username."'";
                        mysqli_query($result,$SQL) or die ("Error SQL : <br>".$SQL);
                       echo'<div class="alert alert-success" role="alert"> modification effectuer avec succès.</div>';
                        
                           }  
 echo'        
      <!-- BARRE DE RECHERCHE -->       
            <form name="frm" id="frm" class="form-inline" role="form" method="POST" action="index.php?page=listeDev_web"> 

               <input type="texte" class="form-control text-uppercase"  name="ChampRech" placeholder="nom prenom" > &nbsp;  

               <button type="submit" name="Valider" class="btn btn-outline-success">Recherche</button> 
               
           </form>
            <br/>   
          ';
          #RECHERCHE
          if (isset($_POST["ChampRech"])) {
                    $ChampRech=$_POST["ChampRech"];
                    $Req="SELECT * , CONCAT(Nom, ' ', Prenom) AS NomComplet
                          FROM e_dev_web
                       WHERE CONCAT(Nom, ' ', Prenom) LIKE '%".$ChampRech."%' OR CONCAT(Prenom, ' ', Nom) LIKE '%".$ChampRech."%'
                                   ORDER BY Nom ASC"; 
                    $ResultReq = mysqli_query($result, $Req)or die ($Req);
                    $CountResultReq = mysqli_num_rows($ResultReq);

                    echo'<div class="text-black"> <h4>Résultat de la recherche</h4> </div>
                  <div class="text-black" class="col-md-12">
                     <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead class="text-black">
                         
                          <th>username</th>                   
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>date de naissance</th>
                          <th>email</th>
                          <th>grade</th>
                          <th>modfier</th>
                          <th>supprimer</th>
                      
                       </thead>

                      <tbody class="text-black">
    
                      <tr>';

                      if ($CountResultReq  > 0){  
                        while ($data = mysqli_fetch_array($ResultReq)){
                               echo'<td>'.$data["username"].'</td>
                                   <td>'.$data["nom"].'</td> 
                                   <td>'.$data["prenom"].'</td> 
                                  <td>'.$data["date_nais"].'</td>   
                                   <td>'.$data["email"].'</td>
                                   <td>'.$data["NbrAb"].'</td>
                                   <td>  </a><a href="index.php?page=listDev_web&edit&username='.$data["username"].'"><i class="fas fa-user-edit"></i></a> </td>
                                   <td>  </a><a href="index.php?page=listDev_web&delete&username='.$data["username"].'"><i class="fas fa-user-minus"></i></a> </td> 
                                  </tr> ';
                       }
                      }else{
                             echo ' <tr> <td colspan="7">Aucun utilisateur  trouvée </td>   </tr>
                                     ';
                           }
                           echo "  </tbody>
                              </table>
                           </div>";  
          } #fin BARRE DE RECHERCHE



            
          

     echo'     <!--Le tableau  de la  liste des etudiants-->
          <div class="card shadow mb-4">
            <div  class="card-header py-3">
              <h6 class="m-0  font-weight-bold text-black" >Liste des étudiant  Développement web </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

               <!-- Boutton ajouter un etudiant -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <a href="index.php?page=ajouterEtudiant" class="d-none d-sm-inline-block btn btn-sm bg-danger text-black shadow-sm"> ajouter un etudiant </a>
             <a href="index.php?page=listeAR" class="d-none d-sm-inline-block btn btn-sm bg-danger text-black shadow-sm"> voir la liste des retardataires et absents  </a>   
               </div>
          
           <table id="mytable" class="table table-bordred table-striped" width="100%" cellspacing="0">
                   
                  <!-- les champs du tableau -->
                  <thead class="text-black" > 

                    <th>identifiant de l\'etudiant</th>
				            <th>Nom </th>
                    <th>prenom</th>
					          <th>date de naissance</th>
                    <th>email</th>
                     <th>nombre d\'absences</th>
                    <th>motif d\'absence</th>
		     		        <th>nombre de retard</th>
                    <th>modifier</th>                      
                    <th>supprimer</th>
                  
                  </thead>

            <!-- afficher liste des etudiant -->
            <tbody class="text-black">
              <tr>';
                $Sql = "SELECT * FROM e_dev_web  ";
                $Req = mysqli_query($result, $Sql);
                $countresult = mysqli_num_rows($Req);
                if ($countresult  > 0){  
                    while ($data = mysqli_fetch_array($Req)){
                      echo'<td>'.$data["username"].'</td>
                       <td>'.$data["nom"].'</td>
                       <td>'.$data["prenom"].'</td> 
					             <td>'.$data["date_nais"].'</td>   
                       <td>'.$data["email"].'</td>
                       <td>'.$data["NbrAb"].'</td>
					               <td>'.$data["RaisonAb"].'</td>
					               <td>'.$data["NbrRt"].'</td>
                       <td><a href="index.php?page=listeDev_web&edit&username='.$data["username"].'"><i class="fas fa-edit"></i></a></td>
                       <td><a href="index.php?page=listeDev_web&delete&username='.$data["username"].'"><i class="fas fa-trash"></i></a></td>
                       </tr>';
                    }
                 }
                    
       else{
        echo '
             <tr>
              <td colspan="7">Aucun étudiant </td>
             </tr>';
          }
        echo'
                    </tbody>
        
                 </table>
              </div>
            </div>
          </div>';#fin de la page

            #donner un access pour modfier 
           
                            
                        

        
             #afficher le produit a supprimer
           
    
?>