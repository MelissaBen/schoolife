
<?php
 echo'<head> <title>  Liste des utilisateurs</title> </head>';
   if (isset($_GET["edit"])){
       if (isset($_GET["username"])){ 
         $username=$_GET["username"];
          #selecionner l'utilisateur a modifier
          $Sql = "SELECT * FROM utilisateur WHERE username = '".$username."'  ";
          $Req = mysqli_query($result, $Sql) or die ("Erreur requette : <br>".$Sql);
          $Resultat = mysqli_fetch_assoc($Req); 
          echo '<div class="container">
                 <h3> L\'UTILISATEUR A MODIFIER: </h3>
                  
                  <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead class="text-black">
                      <th>username</th>                   
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>grade</th>
                      <th>email</th>
					  <th>mot de passe</th>
                      
                      
                   </thead>

                   <tbody class="text-black">
    
                    <tr>
                    <form method="POST" action"index.php?page=listeutilisateur">
                      <td scope="row">'.$Resultat["username"].'</td>
                      <td>'.$Resultat["nom"].'</td>
                      <td>'.$Resultat["prenom"].'</td>
                      <td class="col-md-5"> <select class=" form-control selectpicker"  data-live-search="true"  name ="type_user" value="'.$Resultat["type_user"].'" id="type_user" required>
                       <option selected>admin</option>
                       <option>operateur</option>
                           </select> 
                      </td>                      
                      <td><input type="email" name="email" value="'.$Resultat["email"].'"> </td>
					<td class="col-md-5">  <input type="password"  class="form-control" id="password" name="password"value="'.$Resultat["email"].'"                                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=" Doit avoir  minimum 8 caractères, au moins                                       un chiffre, une lettre minuscule, une lettre majuscule. " > </td>
                      
                      <td class="col-md-3"><input class="btn btn-primary col-md-12" id="btn" type="submit" name="validedit" value="enregistrer " >  </td>
                      </form>
                      <td class="col-md-5"><a href="index.php?page=listeutilisateur"> <button id="btn-signup" class="btn btn-secondary " class="col-md-12">annuler </button> </a></td>
                      
                      </tr>
                      </tbody>
                      </table>

                 
                </div>';}
      }elseif(isset($_GET["delete"])){
                    
                      
                if (isset($_GET["username"])&&  $_SESSION["username"]!=$_GET["username"] ){
                         $username=$_GET["username"];

                             $Sql = "SELECT * FROM utilisateur WHERE username= '".$username."'  ";
                             $Req = mysqli_query($result, $Sql);
                             $Resultat = mysqli_fetch_assoc($Req);
      
                       echo'
                        <div class="container">
                         
                              <div class="text-black" class="col-md-12">
                                <table id="mytable" class="table table-bordred table-striped">

                                 <h3> VOULEZ-VOUS VRAIMENT SUPRIMMER CET UTILISATEUR ? </h3>

                                   <!-- l\'utilisateur a supprimer -->
                                     <thead class="text-black" > 
                                        <th>username</th>                   
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                       
                                        <th>date de naissance</th>
                                        <th>email</th>
                                        <th>grade</th>
                                     </thead>
                                     <tbody class="text-black" >
                                       <tr>
                                        <form method="POST" action"index.php?page=listeutilisateur">
                                         <td scope="row">'.$Resultat["username"].'</th>
                                         <td>'.$Resultat["nom"].'</td>
                                         <td>'.$Resultat["prenom"].'</td>
                                         
                                         <td>'.$Resultat["date_naissance"].'</td> 
                                         <td>'.$Resultat["email"].'</td>
                                         <td>'.$Resultat["type_user"].'</td>
                                         <td class="col-md-5"><input class="btn btn-primary col-md-12" id="btn" type="submit" name="validdelete" value="supprimer " >  </td>
                      </form>
                      <td class="col-md-5"><a href="index.php?page=listeutilisateur"> <button id="btn-signup" class="btn btn-secondary " class="col-md-12">annuler </button> </a></td>
                                       </tr>  
                                     </tbody>
                                 </tbody>
                            </table>
                            
                          
                           
                        </div>';
               }else 
                  echo'<div class="alert alert-danger" role="alert">vous ne pouvez pas supprimer votre propre compte.</div>';
             }
          

 #soumettre les modification
 if(isset($_POST["validedit"])){ 
      $username=$_GET["username"];
      $type_user=$_POST["type_user"];
      $email=$_POST["email"];
      
     #enregistrements des modifications
      $SQL= "UPDATE utilisateur SET email='".$email."', type_user='".$type_user."' WHERE username='".$username."'";
      mysqli_query($result,$SQL) or die ("Error SQL : <br>".$SQL);
      echo'<div class="alert alert-success" role="alert">Les informations ont étaient modifiés avec succès.</div>';
    }
 #annuler les modifs
    
    #confirmer la suppression
 if(isset($_POST["validdelete"])){
     $username=$_GET["username"];
     $SQL= "DELETE FROM utilisateur WHERE username='".$username."'";
     mysqli_query($result,$SQL) or die ("Error SQL : <br>".$SQL);
              
     echo'<div class="alert alert-success" role="alert">L\'utilisateur à été supprimé avec succès.</div>';
  } 
  
     echo'
         
         <!-- BARRE DE RECHERCHE -->

         
        
            <form name="frm" id="frm" class="form-inline" role="form" method="POST" action="index.php?page=listeutilisateur"> 

               <input type="texte" class="form-control text-uppercase"  name="ChampRech" placeholder="nom prenom" required> &nbsp;  

               <button type="submit" name="Valider" class="btn btn-outline-success">Recherche</button> 
               
           </form>
            <br/>   
          ';
          #RECHERCHE
          if (isset($_POST["ChampRech"])) {
                    $ChampRech=$_POST["ChampRech"];
                    $Req="SELECT username, nom, prenom,date_naissance,email,type_user , CONCAT(Nom, ' ', Prenom) AS NomComplet
                          FROM utilisateur
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
                                   
                                   <td>'.$data["date_naissance"].'</td>   
                                   <td>'.$data["email"].'</td>
                                   <td>'.$data["type_user"].'</td>
                           <td>  </a><a href="index.php?page=listeutilisateur&edit&username='.$data["username"].'"><i class="fas fa-user-edit"></i></a> </td></td> 
                           <td>  </a><a href="index.php?page=listeutilisateur&delete&username='.$data["username"].'"><i class="fas fa-user-minus"></i></a> </td> 
                                  </tr>';
                       }
                      }else{
                             echo ' <tr> <td colspan="7">Aucun utilisateur  trouvée </td>
                                     </tr>';
                           }  
                           echo "</tbody>
                              </table>
                           </div>";
          } #fin BARRE DE RECHERCHE

       echo' 

          <!-- Le tableau  de la  liste des utilisateurs -->
          <div class="card shadow mx-auto ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-black">Liste des utilisateurs</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <!-- Boutton ajouter un utilisateur -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
           
            <a href="index.php?page=ajouterunutilisateur" class="d-none d-sm-inline-block btn btn-sm bg-danger text-black shadow-sm"> ajouter un utilisateur </a>
          </div>
             <table id="mytable" class="table table-bordred table-striped" class="text-black">
                   
                <thead class="text-black" >
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
    #affichage des utilisateurs
	
    $Sql = "SELECT * FROM utilisateur      ";
    $Req = mysqli_query($result, $Sql);
    $countresult = mysqli_num_rows($Req);
    if ($countresult != 0){  
        while ($data = mysqli_fetch_array($Req)){
          echo'<td>'.$data["username"].'</td>
          <td>'.$data["nom"].'</td>
          <td>'.$data["prenom"].'</td>
           
          <td>'.$data["date_naissance"].'</td>
          <td>'.$data["email"].'</td>
          <td>'.$data["type_user"].'</td>
          <td> <a href="index.php?page=listeutilisateur&edit&username='.$data["username"].'"> <i class="fas fa-user-edit"></i> </a> </td></td> 
          <td></a><a href="index.php?page=listeutilisateur&delete&username='.$data["username"].'"> <i class="fas fa-user-minus" class="color-black"></i> </a> </td></td>
          </tr>';
        }
    }

    else{
        echo '
          <tr>
          <td colspan="7">Aucun utilisateur trouvée </td>
         </tr>';
  }
   echo' 
      </tbody>
        
            </table>
              </div>
            </div>
          </div>
          </td>
          </tr>
          </tbody>

        </div>'; #fin de la page

    
     ?>