<?php
    $page = "home";
    $fName = basename(__FILE__);
    $title = "Home Page";
    $metaD = "Welcome to Home Page";
    include 'header.php';
?>

<!--photo gallery  -->
<section id="photo-gallary-sec">
	<div class="row">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Carousel items -->
			<div class="carousel-inner">

				<div class="active item">
					<img src="img/1.jpg" alt="Waterfront">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="titles">The Waterfront</h3>
							<p class="contents">A mile from the Fisherman’s Wharf, the Waterfront is a favorite where locals and foreign visitors are drawn to the breathtaking bayscape and excellent seafood.</p>
						</div>
					</div>
				</div>

				<div class="item">
					<img src="img/2.jpg" alt="The Lounge">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="titles">The Lounge at The Ritz-Carlton</h3>
							<p class="contents">With a sophisticated and relaxed setting, The Lounge serves a casual menu paired with signature and classic cocktails featuring locally-made spirits.</p>
						</div>
					</div>
				</div>

				<div class="item">
					<img src="img/3.jpg" alt="Foreign Cinema">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="titles">Foreign Cinema</h3>
							<p class="contents">Foreign Cinema provides an industrial chic setting with a warm yet lively vibe, and independent films are screened against the white wall in the outdoor patio.</p>
						</div>
					</div>
				</div>

				<div class="item">
					<img src="img/4.jpg" alt="Yuzuki">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="titles">Yuzuki</h3>
							<p class="contents">Yuzuki offers authentic Japanese cuisine, served with gracious hospitality with the hope to provide the same nurturing effect as the healing moon.</p>
						</div>
					</div>
				</div>

				<div class="item">
					<img src="img/5.jpg" alt="Tosca Cafe">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="titles">Tosca Cafe</h3>
							<p class="contents">A piece of San Francisco bar lore, Tosca Cafe is a place of many stories and memories, accompanied by innovative Italian cuisine and incredible craft cocktails.</p>
						</div>
					</div>
				</div>

			</div>
			<!-- Carousel nav -->
			<!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> -->
			<!-- <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
		</div>
	</div>
</section>
<!--end of photo gallery  -->

<section id="mycontent">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>Welcome</h1>
				<p>A Food Crawl is a self-guided tasting experience of restaurants in and surrounding a particular neighborhood. Bay Area Food Crawl is a place for food lovers to try new cuisines around the Bay together and to give feedback. The company is diverse and adventurous, and the food journey is delightful. There is never a chance to be bored in the Bay Area! Explore this site to discover this week's featured Bay Area restaurants and food events, or sign up to be a member of our community.</p>
			</div>
			
			<div class="col-md-4">
				<iframe width="640" height="300" src="https://www.youtube.com/embed/upYrpWC8v7M" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>

<?php  
    include 'footer.php'; 
?>
