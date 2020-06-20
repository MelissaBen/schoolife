
<?php  
       echo'<head> <title> prevenir pour le retard  </title> </head>';
  
         if(isset($_POST['motif'])){
            $motif=$_POST['motif'];
            $AR=$_POST['AR'];      
            
            $username= $_SESSION["username"];
             $nom= $_SESSION["nom"];
             $prenom= $_SESSION["prenom"];

             $Req= "SELECT type_user FROM utilisateur where  username = '".$username."'";
              $RessultReq = mysqli_query($result,$Req) or die ($Req);
              $data = mysqli_fetch_assoc($RessultReq);

              $specialite= $data["type_user"];
			  $InsertAbsence="INSERT INTO e_absence_retard( username, nom , prenom , specialite, Ab_Rt,motif,dat,heur) 
              VALUES ('".$username."', '".$nom."', '".$prenom."', '".$specialite."', '".$AR."', '".$motif."','".date('d/m/Y')."','".date('H:i')."');";

			  $resul = mysqli_query($result,$InsertAbsence) or die ("Erreur requette : <br>".$InsertAbsence);
        echo '<div class="col-md-offset-3 col-md-3" > <div  class="alert alert-success" role="alert">   message envoyer ! </div> </div>';
			 
         }

  echo '    <div class="card card-register mx-auto ">
                 <div class="card-header bg-danger text-white">REMPLISSEZ LE FORMULAIRE  </div>
                            <div class="card-body">

        
        <form name="frm" id="frm" class="form-horizontal" role="form" method="POST"action="index.php?page=ERetard">
           
		                  
              <div class="form-group">
                  <label for="type_user" class="text-black"  class="col-md-3 control-label">absence/retard</label>
                         <div class="col-md-9">
                              <select class=" form-control selectpicker" data-live-search="true"  name="AR" id="AR" required>
                                     <option >absence</option>
                                     <option >retard</option>
                                                                              
                              </select>
                         </div>
             </div> 
            <div class="form-group">
                  <label for="adresse" class="text-black"  class="col-md-3 control-label">Motif de retard*</label>
                        <div class="col-md-9">
                           <textarea type="text" class="form-control" id="motif" name="motif" placeholder="votre motif" required> </textarea>
                        </div>
             </div>
                                
                                                           
                                      
              <!-- Boutton -->                                 
		      <div class="col-md-offset-3 col-md-5" style=" margin-top:20px;">                 
                <input class="btn btn-danger col-md-12" id="btn" type="submit" name="valider" value="Soumettre le formulaire"  >     </div>
              </div>
         </form>
    </div>
    </div>
    </div>';#fin de la page
 ?>
             
         
 