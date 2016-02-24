<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php 
        if(isset($metaD) && !empty($metaD)) { 
            echo $metaD;
        }
        else { 
            echo "Some meta description"; 
        } 
    ?>">
    <title><?php 
        if(isset($title) && !empty($title)) { 
            echo $title; 
        } 
        else { 
            echo "Default title tag"; 
        } 
    ?></title>
    <meta name="author" content="Shayne Li">

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >

    <!-- Google Font CSS, use Work Sans and Fjalla One-->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>

    <!-- php for contact -->
    <?php
        if ($page == "about"){
            ?>
            <!-- Google Map API -->
            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>   
            <?php 
        }
    ?>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Select validation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css" />

    <!-- Custom CSS -->
    <!-- Header and footer CSS -->
    <link rel="stylesheet" type="text/css" href="./css/head-foot.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">

    <!-- social media css -->
    <link rel="stylesheet" type="text/css" href="./css/social.css">
   	
    <!-- php for home -->
    <?php
        if ($page == "home"){
            ?>
            <link rel="stylesheet" type="text/css" href="css/index.css">
            <?php 
        }
    ?>

    <!-- php for restaurant -->
    <?php
        if ($page == "restaurant"){
            ?>  
            <link rel="stylesheet" type="text/css" href="css/restaurants.css">
            <?php 
        }
    ?>

    <!-- php for event -->
    <?php
        if ($page == "event"){
            ?> 
            <link rel="stylesheet" type="text/css" href="css/events.css">
            <?php 
        }
    ?>

    <!-- php for about -->
    <?php
        if ($page == "about"){
            ?>
            <link rel="stylesheet" type="text/css" href="css/about.css">
            <?php 
        }
    ?>

    <!-- php for signup -->
    <?php
        if ($page == "signup"){
            ?>
            <link rel="stylesheet" type="text/css" href="css/signup.css">
            <?php 
        }
    ?>

    <!-- php for privacy -->
    <?php
        if ($page == "privacy"){
            ?>
            <link rel="stylesheet" type="text/css" href="css/privacy.css">
            <?php 
        }
    ?>

    <!-- php for login -->
    <?php
        if ($page == "login"){
            ?>
            <link rel="stylesheet" type="text/css" href="css/login.css">
            <?php 
        }
    ?>
</head>

<body id="page-top" class="index">
	<!-- Navigation -->
	<nav class="navbar navbar-inverse">
		<div class="container">
			<!-- Brand -->
			<div class="logo-div">
				<a class="navbar-brand page-scroll" href="index.php">
					<img id="logo-img" src="img/logo.png" alt="BAFC's logo"/>
				</a>
				<a class="navbar-brand page-scroll" id="logo-text" href="index.php">Bay Area Food Crawl</a>
			</div>
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scoll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navHeaderCollapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Get the nav links for taggling -->
			<div class="collapse navbar-collapse" id="navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li>
			            <a class="page-scroll <?php
                            if($page == "home"){
                                echo " current";
                            }
                        ?>"
                        href="index.php">Home</a>	
					</li>
					<li>
			            <a class="page-scroll <?php
			                if($page == "restaurant"){
                                echo " current";
                            }
                        ?>" 
						href="restaurants.php">Restaurants</a>
					</li>
					<li>
			            <a class="page-scroll <?php
                            if($page == "event"){
                                echo " current";
                            }
                        ?>"
                        href="events.php">Events</a>
					</li>
					<li>
			            <a class="page-scroll <?php
                            if($page == "about"){
                                echo " current";
                            }
                        ?>" 
                        href="about.php">About Us</a>
					</li>
                    <li>
                        <a class="page-scroll <?php
                            if($page == "signup"){
                                echo " current";
                            }
                        ?>" 
                        href="signup.php">Sign Up</a>
                    </li>
                    <li>
                        <a class="page-scroll <?php
                            if($page == "login"){
                                echo " current";
                            }
                        ?>" 
                        href="login.php">Log In</a>
                    </li>					
				</ul>
			</div>
		<!-- end of container -->
		</div>
    <!-- end of navbar-collapse -->
	</nav>