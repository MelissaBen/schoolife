<?php
include("ConnexionBDD.php");
session_start();
if (isset($_GET["page"]) && $_GET["page"] == 'deconnexion') {
  $_SESSION["UserLogged"] = false;
  session_destroy();
  session_unset();
}

if (isset($_GET["page"]) && $_GET["page"] != '') {
  $page = $_GET["page"];
}else{
  $page = "seconnecter";
} 
if (isset($_SESSION["UserLogged"]) && $_SESSION["UserLogged"] === 'true'){ 
        if ($_SESSION["type_user"] == "admin" && $_GET["page"] == 'seconnecter'){
            header("location: index.php?page=listeutilisateur");
        }elseif ($_SESSION["type_user"] != "admin" && $_SESSION["type_user"] != "enseignant" && $_GET["page"] == 'seconnecter'){ 
            header("location: index.php?page=Etudiant_Retard");
        }elseif ($_SESSION["type_user"] == "admin" && $_GET["page"] == ''){
            header("location: index.php?page=listeutilisateur");
        }elseif ($_SESSION["type_user"] != "admin" && $_SESSION["type_user"] != "enseignant" && $_GET["page"] == ''){
            header("location: index.php?page=Etudiant_Retard");
        }

}else{
  if ($_GET["page"] != 'seconnecter' && $_SESSION["UserLogged"] == false)  {
  header("location: index.php?page=seconnecter");
  }
} 
echo'<!DOCTYPE html>
<html lang="en">
   <head>
   <Link rel="icon" type="image/png" href="image/icon.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  
 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="fonts/font.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <script src="js/main.js"></script>
    <link src="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="js/main.js"></script>
     <script src="js/checkpasswords.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </head>

  
  <body>';
  if (isset($_GET["page"]) && ($_GET["page"] != "seconnecter" )){
    echo'  
  <div class="row align-items-left">
          
     <div class="col-12 col-xl-12">
      <h1> <img src="image/logo.png" class="img-fluid" alt="Responsive image" max-width: 100% height: auto></h1>
     </div>

   </div>
    
       <div class="row">
   <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <div class="sidebar-brand d-flex align-items-center justify-content-center">  <i class="fas fa-user"> </i> '.$_SESSION["nom"].'  '.$_SESSION["prenom"].'</div>
      
      <hr class="sidebar-divider my-0">
       <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=deconnexion"   data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
          <span> Se Déconnecter</span>
        </a>
      </li>
  <!--   liste  des cours -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=listeCours" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Liste des cours</span>
        </a>       
      </li>

      <!--   PLANNING -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=planning" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Le planning </span>
        </a>       
      </li>


      ';

       if (( $_SESSION["type_user"]=="admin") || ($_SESSION["type_user"] == "enseignant") ){
       
      echo'<hr class="sidebar-divider">
      <!-- titre 1-->
      <div class="sidebar-heading"> Les liste   </div>
            
     
          <!-- première année -->
	      <li class="nav-item">
        <a class="nav-link collapsed"  data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
          <i class="fas fa-fw fa-table"></i>
          <span>première année</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="index.php?page=listeGroupe1" >  PREPA A</a>
            <a class="collapse-item" href="index.php?page=listeGroupe2" >PREPA B</a>
            <a class="collapse-item" href="index.php?page=listeGroupe3" >PREPA C</a>
            
          </div>
        </div>
      </li>
      
      <!-- 2eme année -->
      <li class="nav-item">
        <a class="nav-link collapsed"   data-target="#collapseTwo" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>deusieme année</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=listeDev_web"> Développement web </a>		
		        <a class="collapse-item" href="index.php?page=listeCrD" >création digitale </a>
            <a class="collapse-item" href="index.php?page=listeComD" >communication digitale </a>
          </div>
        </div>
      </li>

       ';}

       if ( $_SESSION["type_user"]=="admin" ) {
     echo'
     <!--  liste utilisateur -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=listeutilisateur" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Liste des utilisateurs</span>
        </a>       
      </li>     

      <!-- separateur -->
      <hr class="sidebar-divider">

      <!-- titres 2 -->
      <div class="sidebar-heading">
        Nouveaux
      </div>
     <!-- ajouter un utilisateur-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=ajouterunutilisateur"  data-target="#collapseUtilities"                                 aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-plus"></i>
          <span>Ajouter un nouveau utilisateur</span> 
        </a>
      </li>';}
       if (( $_SESSION["type_user"]=="admin") || ($_SESSION["type_user"] == "enseignant") ){
echo'
      <!-- ajouter un etudiant-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=ajouterEtudiant"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-plus"></i>
          <span>Ajouter un nouveau étudiant</span>
        </a>
      </li>
       <!-- ajouter un cours-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=ajouterCours"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-plus"></i>
          <span>Ajouter un nouveau cours </span>
        </a>
      </li>  ';}
      }

   echo'</ul>
    </div>
    </nav> 
         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <!-- Begin Page Content -->';        
            if ($page == "seconnecter"){  
              include("php/seconnecter.php");
            }elseif ($page == "listeGroupe1"){
              include("php/liste_groupe1.php");
            }elseif ($page == "listeGroupe2"){
              include("php/liste_groupe2.php");
             }elseif ($page == "listeGroupe3"){
             include("php/liste_groupe3.php");
            }elseif($page == "listeCrD"){ 
             include("php/liste_CrD.php");
            }elseif($page=="listeutilisateur"){
             include("php/liste_utilisateur.php");
            }elseif($page == "listeComD"){ 
              include("php/liste_ComD.php");
            }elseif($page == "listeDev_web"){
             include("php/liste_dev_web.php");
            }elseif($page == "ajouterEtudiant"){
              include("php/ajouter_un_etudiant.php");
            }elseif($page == "deconnexion"){
              include("php/deconnexion.php");
            }elseif($page == "ajouterunutilisateur"){
              include("php/ajouter_un_utilisateur.php");
            }elseif($page == "Etudiant_Retard"){
              include("php/e_retard.php");
            }elseif($page == "listeAR"){
              include("php/liste_AR.php");
            }elseif($page == "planning"){
              include("php/planning.php");
            }elseif($page == "listeCours"){
              include("php/liste_cours.php");
            }elseif($page == "ajouterCours"){
              include("php/ajouter_un_cours.php");
            }elseif($page == "Ncours"){
              include("php/N_cours.php");
            }elseif($page == "calender"){
              include("php/calender.php");
            }
                            
echo' </main>
        </div>
      </body>
</html>';
?>