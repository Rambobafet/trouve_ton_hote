<?php
	session_start();
	include('includes/lang.config.php');
	
	if(!isset($_SESSION['lang']) || $_SESSION['lang'] != "fr" || $_SESSION['lang'] != "en"){
		$_SESSION['lang'] = 'fr';
	}
	
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>" ng-app="hebergement">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carambal - Trouve un hôte</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.27/angular.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script src="js/app.js" type="text/javascript"></script>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container theme-showcase">
		<header role="main">
			<div class="wrapper">
				<h1><?php echo $language[$_SESSION['lang']]['titre']; ?></h1>
				<div class="well">
					<?php echo $language[$_SESSION['lang']]['presentation_header']; ?>
				</div>
			</div>
		</header>
		
		<section class="col-md-7">
			<h2>Je cherche</h2>
		</section>
		
		<div class="col-md-1">
		</div>
		
		<section  class="col-md-5">
			<h2>Je propose</h2>
			<form role="form" name="addHosting" ng-controller="HostingController as hostingCtrl" ng-submit="addHosting.$valid && hostingCtrl.addHost()" class="form-signin" novalidate>
				<label class="col-md-6" for="nb_couchage">Nombre de couchages*</label>
				<div class="col-md-3 col-xs-6">
					<select id="nb_couchage" name="id_couchage" class="form-control col-md-2" ng-model="hostingCtrl.host.nb_couchage" required>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				
				<div class="clearfix"></div>
				
				<label class="sr-only" for="temps_trajet">Temps de trajet estimé jusqu'au bal</label>
				<input type="text" placeholder="Temps de trajet estimé jusqu'au bal" class="form-control" id="temps_trajet" ng-model="hostingCtrl.host.temps_trajet">
				
				<label class="sr-only" for="description">Description des conditions d'hébergement</label>
				<textarea name="description" ng-model="hostingCtrl.host.description" required id="description" placeholder="Faites une rapide description des conditions d'accueil, par exemple : J'ai un canapé lit deux places disponibles et je peux fournir les draps" class="form-control"></textarea>
				
				<section id="account" ng-controller="TabController as tab" class="ng-scope">
					<ul class="nav nav-pills">
						<li ng-class="{ active:tab.isSet(1) }">
							<a href="" ng-click="tab.setTab(1)">J'ai déjà un compte</a>
						</li>
						<li ng-class="{ active:tab.isSet(2) }">
							<a href="" ng-click="tab.setTab(2)">Je n'ai pas encore de compte</a>
						</li>
					</ul>
					
					<form-login ng-if="tab.isSet(1)"></form-login>
					
					<form-create-account ng-if="tab.isSet(2)"></form-create-account>
				</section>
				
				<button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
			</form>
		</section>
		
		 <div class="clearfix"></div>
		
		<footer role="main" class="footer">
			<div class="wrapper">
				<div class="well">
					<p class="text-muted"><?php echo $language[$_SESSION['lang']]['footer']; ?></p>
					<p class="text-muted"><?php echo $language[$_SESSION['lang']]['footer_contact']; ?></p>
				</div>
			</div>
		</footer>
	</div>
    
  </body>
</html>