
<?php  
       echo'<head> <title> ajouter un étudiant </title> </head>';
  
         if(isset($_POST['username'])){
            $username=$_POST['username'];
            
            $reqsql= "SELECT count(username) as nbr_etudiants FROM utilisateur where username = '".$username."' ";
            $RessultReq = mysqli_query($result,$reqsql) or die ($reqsql);
            $CountRow = mysqli_fetch_assoc($RessultReq);
            $row = $CountRow['nbr_etudiants'];

            if($row!=0){
              echo '<div class="alert alert-danger" role="alert"> echec d\'inscription, l\'Username existe deja </div>';
        
            }
            else{          
              $nom=$_POST['nom'];      
              $prenom=$_POST['prenom'];
              $adresse=$_POST['adresse'];
              $dateness=$_POST['date_naiss'];
              $email=$_POST['email'];
              $specialite=$_POST['specialite'];
              $password = md5($_POST['password']);
			  $InsertUtilisateur="INSERT INTO utilisateur( username, nom , prenom , adresse, date_naissance, email, type_user,                                                           motdepasse ) 
              VALUES ('".$username."', '".$nom."', '".$prenom."', '".$adresse."', '".$dateness."', '".$email."', '".$specialite."','".$password."');";
			  $resul = mysqli_query($result,$InsertUtilisateur) or die ("Erreur requette : <br>".$InsertUtilisateur);
			  if($specialite=="Prepa A"){
				  
    $Insertuser="INSERT INTO e_groupe1( username, nom , prenom ,  date_nais, adresse, email,  motdepasse, NbrAb, RaisonAb, NbrRt ) 
                 VALUES ('".$username."', '".$nom."', '".$prenom."', '".$dateness."', '".$adresse."', '".$email."', '".$password."',0,'',0);";
			   }
		  elseif($specialite=='Prepa B'){        
	 $Insertuser="INSERT INTO e_groupe2( username, nom , prenom , date_nais,  adresse, email,  motdepasse, NbrAb,                                           RaisonAb, NbrRt  ) 
                   VALUES ('".$username."', '".$nom."', '".$prenom."', '".$dateness."', '".$adresse."', '".$email."', '".$password."',0,'',0);";
		      }
		 elseif($specialite=='Prepa C'){        
	 $Insertuser="INSERT INTO e_groupe3( username, nom , prenom ,  date_nais, adresse, email,  motdepasse, NbrAb, RaisonAb, NbrRt ) 
          VALUES ('".$username."', '".$nom."', '".$prenom."', '".$dateness."', '".$adresse."', '".$email."', '".$password."',0,'',0);";
		      }
		 elseif($specialite=='deuxième année Développement web'){        
	 $Insertuser="INSERT INTO e_dev_web( username, nom , prenom ,  date_nais, adresse, email,  motdepasse, NbrAb, RaisonAb, NbrRt ) 
          VALUES ('".$username."', '".$nom."', '".$prenom."', '".$dateness."', '".$adresse."', '".$email."', '".$password."',0,'',0);";
		      }
	     elseif($specialite=='deuxième année création digitale'){        
	 $Insertuser="INSERT INTO e_creation_d( username, nom , prenom ,  date_nais, adresse, email,  motdepasse, NbrAb, RaisonAb, NbrRt ) 
          VALUES ('".$username."', '".$nom."', '".$prenom."', '".$dateness."', '".$adresse."', '".$email."', '".$password."',0,'',0);";
		      }
	     elseif($specialite=='deuxième année communication digitale'){        
	 $Insertuser="INSERT INTO e_com_d( username, nom , prenom ,  date_nais, adresse,email, motdepasse, NbrAb, RaisonAb, NbrRt ) 
                  VALUES ('".$username."', '".$nom."', '".$prenom."', '".$dateness."', '".$adresse."', '".$email."', '".$password."',0,'',0);";
		      }

              $result = mysqli_query($result,$Insertuser) or die ("Erreur requette : <br>".$Insertuser);
              echo '<div class="alert alert-success" role="alert">  L\'inscription , l\'username était effectuer avec succes</div>';         
            }
         }

  echo '    <div class="card card-register mx-auto ">
                 <div class="card-header bg-danger text-black">FORMULAIRE D\'INSCRIPTION </div>
                            <div class="card-body">

        
        <form name="frm" id="frm" class="form-horizontal" role="form" method="POST"action="index.php?page=ajouterEtudiant">
           
		     <div class="form-group">
                  <label for="prenom" class="text-black"  class="col-md-3 control-label">Prenom*</label>
                          <div class="col-md-9">
                             <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" required>
                            </div>
            </div>
                                
             <div class="form-group">
                 <label for="nom" class="text-black"  class="col-md-3 control-label">Nom*</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                         </div>
             </div>
           
		     <div class="form-group">
                 <label class="col-md-3 text-black"  control-label" >Date de naissance*  </label>
                       <div class="col-md-9">
                           <input type="date" class="form-control" id="date_naiss" name="date_naiss" value="03-03-2019"                                     min="01-01-1950" max="31-12-1999" required >   
                         </div>
             </div>

             <div class="form-group">
                  <label for="adresse" class="text-black"  class="col-md-3 control-label">Adresse*</label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
                        </div>
             </div>
			 
			 
                                
             <div class="form-group">
                  <label for="type_user" class="text-black"  class="col-md-3 control-label">specialitée</label>
                         <div class="col-md-9">
                   <select class=" form-control selectpicker" data-live-search="true"  name="specialite" id="specialite" required>
                            <option >Prepa A</option>
						              	<option >Prepa B</option>
						              	<option >Prepa C</option>
                            <option>deuxième année Développement web</option>
							              <option>deuxième année création digitale</option>  
							              <option>deuxième année communication digitale</option>                                          
                     </select>
                          </div>
             </div>                           
  
             <div class="form-group">
                  <label for="email" class="text-black"  class="col-md-3 control-label">email</label>
                        <div class="col-md-9">
                          <input type="email" class="form-control"  id="email" name="email" placeholder="exmple@hotmail.fr" >
                        </div>
             </div>                              
              <div class="panel-heading">
                <div class="text-black" class="panel-title" style="font-weight:600; margin-top:50px">   IDENTIFICATION</div>
               </div>
                                
             <div class="form-group">
                 <label for="nsc" class="text-black"  class="col-md-3  control-label">username*</label>
                 <div class="col-md-9">
                     <input type="text" class="form-control" id="username" name="username"  required>
                  </div>
             </div>
                                    
            <div class="form-group">
                <label for="register_password" class="text-black"  class="col-md-3 control-label">Mot de passe*</label>
                      <div class="col-md-9">
                          <input type="password"  class="form-control" id="password" name="password" placeholder="mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=" Doit avoir  minimum 8 caractères, au moins un chiffre, une lettre minuscule, une lettre majuscule. " >
                      </div>
                                  
            </div>                      
            <div class="form-group" >
              <!-- Boutton -->                                 
		      <div class="col-md-offset-3 col-md-5" style=" margin-top:20px;">
                                       
                <input class="btn btn-danger col-md-12" id="btn" type="submit" name="valider" value="Soumettre le formulaire"  ></div>
              </div>
         </form>
    </div>
    </div>
    </div>';#fin de la page
 ?>
             
         
 