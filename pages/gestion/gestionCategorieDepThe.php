<?php 
include("../../inc/fonction.php");
session_start();

$ceuilleurs = GetAllCatDepense($bdd);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Project the</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">
    
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../../assets/css/aos.css">

    <link rel="stylesheet" href="../../assets/css/ionicons.min.css">

    <link rel="stylesheet" href="../../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../assets/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/icomoon.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../../index.html">Tea<span>Time</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="salaire.php" class="nav-link">Salaire</a></li>
	          <li class="nav-item"><a href="gestionVarieteThe.php" class="nav-link">Variété</a></li>
	          <li class="nav-item"><a href="gestionParcelleThe.php" class="nav-link">Parcelle</a></li>
	          <li class="nav-item"><a href="gestionCueilleursThe.php" class="nav-link">Ceuilleur</a></li>
	          <li class="nav-item  active"><a href="gestionCategorieDepThe.php" class="nav-link">Depenses</a></li>
	          <li class="nav-item"><a href="../deconnexion.php" class="nav-link">Deconnexion</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../assets/images/the2.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="../../index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Dépense <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Dépenses</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th class="bg-primary heading">descriptif</th>
								<th class="bg-dark heading">Modify </th>
								<th class="bg-black heading">Delete </th>
						      </tr>
						    </thead>
							
							<p class="btn-custom" style="text-align: right;"><a href="../add/admin/addCategorieDep.php?num=0">Ajouter des Variétés</a></p>

						    <tbody>
                            <?php for($i = 0 ; $i < count($ceuilleurs) ; $i++){ ?>
						      <tr class="">
						        <td class="price">
							        	
							        	<span class="subheading"><?php echo $ceuilleurs[$i]['descriptif']; ?></span>
						        </td>
								<td class="price">
						        	<p class="btn-custom"><a href="../add/admin/addCategorieDep.php?num=1&&id=<?php echo $ceuilleurs[$i]['idCatDep']; ?>">Modify</a></p>
						        	<div class="price-rate">
							        	<h3>
							        		<span class="num"><small class="currency"></small> </span>
							        		<span class="per"></span>
							        	</h3>
							        	<span class="subheading">Do you want to Modify it ? </span>
						        	</div>
						        </td>
								
								<td class="price">
						        	<p class="btn-custom"><a href="../traitement/admin/traitementDelete?id=<?php echo $ceuilleurs[$i]['idCatDep'];?>&&nom=catDep">Delete </a></p>
						        	<div class="price-rate">
							        	<h3>
							        		<span class="num"><small class="currency"></small> </span>
							        		<span class="per"></span>
							        	</h3>
							        	<span class="subheading">Do you want to <i>delete</i> it ? </span>
						        	</div>
						        </td>
						        
						        
						      </tr><!-- END TR-->
                              <?php } ?>		      
					    </tbody>
					  </table>
    			</div>
    		</div>
			</div>
		</section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Tea<span>Time</span></a></h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          
         
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</script> ETU 002359 : Johanne --- ETU 002361 : Loic -- ETU 002523 Mahefa </a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery.easing.1.3.js"></script>
  <script src="../../assets/js/jquery.waypoints.min.js"></script>
  <script src="../../assets/js/jquery.stellar.min.js"></script>
  <script src="../../assets/js/owl.carousel.min.js"></script>
  <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/aos.js"></script>
  <script src="../../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../../assets/js/bootstrap-datepicker.js"></script>
  <script src="../../assets/js/jquery.timepicker.min.js"></script>
  <script src="../../assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../../assets/js/google-map.js"></script>
  <script src="../../assets/js/main.js"></script>
    
  </body>
</html>