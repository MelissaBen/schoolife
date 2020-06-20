<title>Ajouter un utilisateur</title>
<?php  
      echo'<head> <title> ajouter un utilisateur</title> </head>';
   
         if(isset($_POST['titre'])){
            $titre=$_POST['titre'];
            
            $reqsql= "SELECT count(titre) as nbr_titre FROM cours where titre = '".$titre."' ";
            $RessultReq = mysqli_query($result,$reqsql) or die ($reqsql);
            $CountRow = mysqli_fetch_assoc($RessultReq);
            $row = $CountRow['nbr_titre'];

            if($row!=0){
              echo '<div class="alert alert-danger" role="alert"> echec ce titre  existe deja </div>';
        
            }
            else{          
             
              $titre=$_POST['titre'];
              $resumer=$_POST['resumer'];
             

              $Insertuser="INSERT INTO utilisateur(  titre, nomp, , prenomp,resumer, heur, dat) 
              VALUES ('".$titre."', '".$_SESSION["nom"]."','".$_SESSION["prenom"]."','".$resumer."', '".$_SESSION["prenom"]."','".date('d/m/Y')."' );";    

              $result = mysqli_query($result,$Insertuser) or die ("Erreur requette : <br>".$Insertuser);
              echo '<div class="alert alert-success" role="alert">  L"inscription a était effectuer avec succes</div>';         
            }
         }

  echo '    <div class="card card-register mx-auto ">
                 <div class="card-header bg-danger text-black">AJOUTER UN NOUVEAU COURS</div>
                            <div class="card-body">

        
                            <form name="frm" id="frm" class="form-horizontal" role="form" method="POST" action="index.php?page=ajouterCours">
                                
                                     
                            
                                <div class="form-group">
                                    <label for="titre" class="text-black"  class="col-md-3 control-label">titre du cours*</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="titre" name="titre"  required>
                                    </div>
                                </div>
                                
                                <div class="form-group text-black">
                                   <label for="resumer" class="text-black ">Rédigez un résumé du cours:</label>

                                  <textarea  id="resumer" name="resumer" cols="310" rows="2" class="form-control" required></textarea>
                                   
                                </div>
                                                              
                             <div class="form-group" >
                                    <!-- Boutton -->                                        
                                    <div class="col-md-offset-3 col-md-5" style=" margin-top:20px;">
                                        
                                    <input class="btn btn-danger col-md-12" id="btn" type="submit" name="valider" value="Soumettre le formulaire"  >

                                    
                                    </div>
                                </div>
                                                                
                            </form>
                            </div>
                             </div>
                             </div>';#fin de la page
                    

 ?>
             
         
 