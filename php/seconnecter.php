
<?php 

         
        if(isset($_POST['username'])){

           $username =$_POST['username'];
           $motdepasse = md5($_POST['motdepasse']);  /* md5 c'est une methode ( système de chiffrement ) */ 
		   
           $Sql= "SELECT *, count(*) as nbr_utilisateur FROM utilisateur where motdepasse = '".$motdepasse."'  and username = '".$username."'";
           $Req = mysqli_query($result,$Sql) or die ("Erreur requette : <br>".$Sql);  /* exécution de la requete */
           $Data = mysqli_fetch_assoc($Req); /* extraire les données */
           $row = $Data["nbr_utilisateur"];
		   
           if($row==0){
			 
              echo'<div class="alert alert-danger" role="alert"> Username ou mot de passe inccorect  </div>';
			
           }else{ 
              $_SESSION["UserLogged"] = 'true';
              $_SESSION["username"] = $Data["username"];
              $_SESSION["nom"] =  $Data["nom"];
              $_SESSION["prenom"] =  $Data["prenom"];
              $_SESSION["type_user"]=$Data["type_user"]; 
              if (($_SESSION["type_user"] == "admin") || ($_SESSION["type_user"] == "enseignant") ){           
                 header("location: index.php?page=listeutilisateur");
              }else{ 
                 header("location: index.php?page=Etudiant_Retard");
              }                             
           }
        }      
#debut de la page
  echo' <div class="card card-register mx-auto   ">
                 <div class=" card-header bg-danger text-white col-md-12" >AUTHENTIFICATION </div>
                            <div class="card-body">   
                            
                            <form id="signupform" class="form-horizontal" role="form" method="POST" action="index.php?page=seconnecter">

                                <div class="form-group">
                                    <label for="username" class="text-black"  class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="username" name="username"  required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="register_password" class="text-black"  class="col-md-3 control-label">Mot de passe:</label>
                                    <div class=" container-fuild col-md-9 ">
                                       <input type="password" id="motdepasse" class="form-control" name="motdepasse"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=" Doit avoir au moins un chiffre, une lettre minuscule, une lettre majuscule, et 8 caractères ou plus "  required>                                      
                                        
                                    </div>
                                    
                                </div>

                                <div class="form-group" >
                                    <!-- Boutton -->                                        
                                    <div class="col-md-offset-3 col-md-5" style=" margin-top:20px;">
                                        <button id="btn-signup" type="submit" class="btn btn-danger col-md-12">   CONNEXION </button>
                                  
                                    </div>
                           
                                </div>
                              
                                
                            </form>
                         </div>
                    </div> 
           </div>
    ';#fin de la page
                            
  ?>
