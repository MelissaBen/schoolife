
<?php 
echo'<head> <title> Liste des cours</title> </head>';
 if (isset($_GET["edit"])){
                       if (isset($_GET["titre"])){
                          $titre=$_GET["titre"];
                          #selectionner l'etudiant a modifier
                          $Sql = "SELECT * FROM cours WHERE  titre = '".$titre."'  ";
                          $Req = mysqli_query($result, $Sql);
                          $Resultat = mysqli_fetch_assoc($Req);
                          #formulaire de modification
                           echo ' <h3> A modifier : </h3>
                          <div class="container" >
                              
                                 <table id="mytable" class="table table-bordred table-striped">
                   
                                      <thead class="text-black" >
                                         <th>titre du cours</th>
                                        <th>Nom de l\'enseignant </th>
                                        <th>Prenom de l\'enseignant </th>
                                        <th>resumer du cours</th>
                                       <th>date de mise en ligne </th>                
                                        <th>modifier</th>                      
                                        <th>supprimer</th>
                                      </thead>

                                     <tbody class="text-black">
    
                                      <tr>
                                      <form method="POST" action"index.php?page=listeCours">
                                      <td>'.$Resultat["titre"].'</td>
                                      <td>'.$Resultat["nomp"].'</td>
									                    <td>'.$Resultat["prenomp"].'</td>
                                      <td class="col-md-3"><input type="number" class="form-control" min="0" name="NbrAb" value="'.$Resultat["resumer"].'" class="text-black" class="form-control" required /></td>
                                     <td class="col-md-5"><input class="btn btn-primary col-md-12" id="btn" type="submit" name="validedit" value="enregistrer " >  </td>
                                   </form>
                                  <td class="col-md-5"><a href="index.php?page=listeCours"> <button id="btn-signup" class="btn btn-secondary " class="col-md-12">annuler </button> </a></td>
                                  </tr>
                                    </tbody>
                                </table>
                      
                          
                          </div>'; 
                        } 
            }elseif (isset($_GET["delete"])){
                       if (isset($_GET["titre"]))
                             $Sql = "SELECT * FROM cours WHERE  titre='".$_GET["titre"]."'";
                             $Req = mysqli_query($result, $Sql);
                             $Resultat = mysqli_fetch_assoc($Req);
      
                       echo'
                              <div class="text-black" class="col-md-12">
                                <table id="mytable" class="table table-bordred table-striped">

                                 <h3> VOULEZ-VOUS VRAIMENT SUPRIMMER CE COURS ? </h3>

                                   <!-- le cours a supprimer -->
                                     <thead class="text-black" > 

                                        <th>titre du cours</th>
                                         <th>Nom de l\'enseignant </th>
                                        <th>Prenom de l\'enseignant </th>
                                        <th>le fichier du cours</th>
                                        <th>date de mise en ligne </th>
                                                        
                                        </thead>
                                     <tbody class="text-black" >
                                       <tr>
                                   <form method="POST" action"index.php?page=listeCours>
								   
                                         <th scope="row">'.$Resultat["username"].'</th>
                                        <td>'.$data["titre"].'</td>
                                        <td>'.$data["nomp"].'</td>
                                        <td>'.$data["prenomp"].'</td> 
                                        <td>'.$data["resumer"].'</td>
                                        <td>'.$data["dat"].'</td> 
                                         <td class="col-md-3"> <input class="btn btn-primary col-md-12" id="btn" type="submit" name="validdelete" value="Supprimer le cours " > </td>
                                         </form>
                                          <td class="col-md-5"> <a href="index.php?page=listeGroupe3"> <button id="btn-signup"                                                class="btn btn-secondary " class="col-md-12">annuler </button> </a></td>
                                       </tr> </div> 
                                     </tbody>
                                </table> 

                              </div>';
               }
                 
         #confirmer la suppression
         if(isset($_POST["validdelete"])){
             $_GET["titre"];
               $SQL= "DELETE FROM cours WHERE titre='".$_GET["titre"]."'";
              
               mysqli_query($result,$SQL) or die ("Error SQL : <br>".$SQL);
               
              echo'<div class="alert alert-success" role="alert"> cours supprimé.</div>';
             } 
              #soumettre les modification
          if (isset($_POST['validedit']) ){
                 $resumer=$_POST['resumer'];
                 $SQL= "UPDATE cours SET   resumer='".$resumer."' and dat ='".date('d/m/Y')."' WHERE titre='".$titre."'";
                 mysqli_query($result,$SQL) or die ("Error SQL : <br>".$SQL);
                 echo'<div class="alert alert-success" role="alert"> modification effectuer avec succès.</div>';
          }  
 echo'        
      <!-- BARRE DE RECHERCHE -->       
            <form name="frm" id="frm" class="form-inline" role="form" method="POST" action="index.php?page=listeGroupe3"> 

               <input type="texte" class="form-control text-uppercase"  name="ChampRech" placeholder="titre du cours " > &nbsp;  

               <button type="submit" name="Valider" class="btn btn-outline-success">Recherche</button> 
               
           </form> <br/>';
          #RECHERCHE
          if (isset($_POST["ChampRech"])) {
                    $ChampRech=$_POST["ChampRech"];
                    $Req="SELECT * FROM cours   WHERE '".$ChampRech."'=titre ORDER BY Nom ASC"; 
                    $ResultReq = mysqli_query($result, $Req)or die ($Req);
                    $CountResultReq = mysqli_num_rows($ResultReq);

                    echo'<div class="text-black"> <h4>Résultat de la recherche</h4> </div>
                  <div class="text-black" class="col-md-12">
                     <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead class="text-black" > 

                    <th>titre du cours</th>
                    <th>Nom de l\'enseignant </th>
                    <th>Prenom de l\'enseignant </th>
                    <th>resumer du cours</th>
                     <th>date de mise en ligne </th>                
                    <th>modifier</th>                      
                    <th>supprimer</th>
                  
                  </thead>

                      <tbody class="text-black">
    
                      <tr>';

                      if ($CountResultReq  > 0){  
                        while ($data = mysqli_fetch_array($ResultReq)){
                               echo'<td>'.$data["titre"].'</td>
                                    <td>'.$data["nomp"].'</td>
                                    <td>'.$data["prenomp"].'</td> 
                                    <td>'.$data["resumer"].'</td>
                                    <td>'.$data["dat"].'</td>
                                   <td><a href="index.php?page=listeCours&edit&titre='.$data["titre"].'"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="index.php?page=listeCours&delete&titre='.$data["titre"].'"><i class="fas fa-trash"></i></a></td>
                                  </tr>';
                       }
                      }else{
                             echo '  <td colspan="7">Aucun cours trouvé </td>';
                           }  
                           echo " </tbody>
                              </table>
                           </div>";
          } #fin BARRE DE RECHERCHE       
          

     echo'     <!--Le tableau  de la  liste des cours-->
          <div class="card shadow mb-4">
            <div  class="card-header py-3">
              <h6 class="m-0  font-weight-bold text-black" >Liste des cours  </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

               <!-- Boutton ajouter un cours -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <a href="index.php?page=ajouterCours" class="d-none d-sm-inline-block btn btn-sm bg-danger text-black shadow-sm"> ajouter un cours </a>
            
               </div>
          
           <table id="mytable" class="table table-bordred table-striped" width="100%" cellspacing="0">
                   
                  <!-- les champs du tableau -->
                  <thead class="text-black" > 

                    <th>titre du cours</th>
				            <th>Nom de l\'enseignant </th>
				            <th>Prenom de l\'enseignant </th>
				          	<th>resumer du cours</th>
                     <th>date de mise en ligne </th>                
                    <th>modifier</th>                      
                    <th>supprimer</th>
                  
                  </thead>

            <!-- afficher liste des cours -->
            <tbody class="text-black">
              <tr>';
                $Sql = "SELECT * FROM e_groupe3  ";
                $Req = mysqli_query($result, $Sql);
                $countresult = mysqli_num_rows($Req);
                if ($countresult  > 0){  
                    while ($data = mysqli_fetch_array($Req)){
                      echo'<td>'.$data["titre"].'</td>
                       <td>'.$data["nomp"].'</td>
                       <td>'.$data["prenomp"].'</td> 
                       <td>'.$data["resumer"].'</td>
					             <td>'.$data["dat"].'</td>   
                       <td><a href="index.php?page=listeCours&edit&titre='.$data["titre"].'"><i class="fas fa-edit"></i></a></td>
                       <td><a href="index.php?page=listeCours&delete&titre='.$data["titre"].'"><i class="fas fa-trash"></i></a></td>
                       </tr>';
                    }
                 }
                    
       else{
        echo '
             <tr>
              <td colspan="7" >Aucun cours </td>
             </tr>';
          }
        echo'
                    </tbody>
        
                 </table>
              </div>
            </div>
          </div>';#fin de la page

    
?>