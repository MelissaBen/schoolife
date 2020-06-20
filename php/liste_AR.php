<?php
  #RECHERCHE
echo'        
      <!-- BARRE DE RECHERCHE -->       
            <form name="frm" id="frm" class="form-inline" role="form" method="POST" action="index.php?page=listeAR"> 

               <input type="texte" class="form-control text-uppercase"  name="ChampRech" placeholder="nom prenom" > &nbsp;  

               <button type="submit" name="Valider" class="btn btn-outline-success">Recherche</button> 
               
           </form>  <br/>   ';
          if (isset($_POST["ChampRech"])) {
                    $ChampRech=$_POST["ChampRech"];
                    $Req=" SELECT *, CONCAT(Nom, ' ', Prenom) AS NomComplet
                          FROM e_absence_retard
                       WHERE dat='".date('d/m/Y')."' and CONCAT(Nom, ' ', Prenom) LIKE '%".$ChampRech."%' OR CONCAT(Prenom, ' ', Nom) LIKE '%".$ChampRech."%'
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
                          <th>specialité/groupe</th>  
                          <th>retard/absence</th>  
                          <th>motif</th>
                      
                       </thead>

                      <tbody class="text-black">
    
                      <tr>';

                      if ($CountResultReq  > 0){  
                        while ($data = mysqli_fetch_array($ResultReq)){
                               echo'<td>'.$data["username"].'</td>
                                   <td>'.$data["nom"].'</td> 
                                   <td>'.$data["prenom"].'</td> 
                                   <td>'.$data["specialite"].'</td>
                                   <td>'.$data["Ab_Rt"].'</td> 
                                    <td>'.$data["motif"].'</td> 
                                   

                                  </tr>
                                   ';
                       }
                      }else{
                             echo ' <tr> <td colspan="7">Aucun etudiant trouvé </td> </tr>';
                           }
                           echo "</tbody>
                              </table>
                           </div>";  
          } #fin BARRE DE RECHERCHE


         echo'
         
             

          <!--le tableau de la liste des retard/absence du jour -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-black">Liste des des retard/absence du jour</h6>
            </div>
             <div class="card-body">
              <div class="table-responsive">

              
              
                <table id="mytable" class="table table-bordered table-striped"  width="100%" cellspacing="0">

                 <!-- les champs du tableau -->
                  <thead class="text-black">
                
                      <th>username</th>
                      <th>nom</th>
                      <th>prenom</th>
                      <th>specialité/groupe</th>  
                      <th>retard/absence</th>  
                      <th>motif</th>                 
                    
                  </thead>  

                  <!-- afficher liste des etudiants -->
                   <tbody class="text-black">
    
                  <tr>';
                
                   $Sqlt = "SELECT * FROM e_absence_retard WHERE dat='".date('d/m/Y')."' ";
               
               $Reqt = mysqli_query($result, $Sqlt);
               $countresult = mysqli_num_rows($Reqt);

               if ($countresult> 0){  
                   while ($data = mysqli_fetch_array($Reqt)){
                       echo'<td>'.$data["username"].'</td>
                            <td>'.$data["nom"].'</td> 
                            <td>'.$data["prenom"].'</td> 
                            <td>'.$data["specialite"].'</td>   
                            <td>'.$data["Ab_Rt"].'</td> 
                            <td>'.$data["motif"].'</td>  
                       </tr>';
                   }
                }
             else{
               echo '<td colspan="7">Aucun etudiant en retard</td> </tr>';
             }
             echo' 
                </tbody>
              </table>
             </div>
            </div>
          </div>
          </div>';
       

       ?> 