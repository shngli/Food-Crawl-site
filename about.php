<?php
    $page = "about";
    $fName = basename(__FILE__);
    $title = "About Us";
    $metaD = "Welcome to About page";
    include 'header.php';
?>

<!-- Header -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 intro-text">
				<div class="intro-lead-in">
					<h1 class="header_text">About Us</h1>
				</div>
				<div class="intro-heading">
					<h4 class="header_text">Learn more about Bay Area Food Crawl Here</h4>
				</div>
			</div>
		</div>
	</div>    
</header>

<!-- About me Section -->
<section id="about-us">
	<div class="container">
	<br></br>	
		<div class="row content-text">
			<div class="col-sm-6">
				<div class="about-item-head">
					<h3>Why Food Crawling in the Bay Area?</h3>
				</div>
				<div class="about-item-text">
					<p>Ever want to try Thai, Peruvian, and Gastropub food in the same night? Give the food lover inside you a delightful year of culinary possibilities. There are many awesome restaurants and pubs in Bay Area, and we aim to inspire people to embark on a journey together and to discover all the culinary wonders that the Bay has to offer.</p>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="about-item-head">
					<h3>Support Bay Area Food Crawlers</h3>
				</div>
				<div class="about-item-text">
					<p>Feel free to connect with us through the social networks below. We look forward to build a vibrant community where people from different backgrounds can come together to share their Bay Area culinary experiences. We would love to hear from you about how we can improve this website or plan better food crawling events in future.</p>
				</div>
			</div>				
		</div>
		<hr class="soften hr-rule"/>			
	</div>
</section>
<!-- end of about me section -->

<!-- Contact section -->
<section id="contact">
	<div class="container contact-container">
	<div class="row">
		<div class="col-lg-12 text-center ">
			<h2 class="section-heading">Contact Us</h2>
		</div>
		<br>
	</div>
	<div class="row">
		<div class="col-lg-12 contact-item">
			<form id="contact_form" name="sentMessage" method="get" class="form-horizontal">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name" class="col-xs-2 control-label">Name</label>
						<div class="col-xs-10">
							<input id="name" type="text" class="form-control" name="name" placeholder="Jane Doe" pattern="[a-zA-Z]+\s[a-zA-Z]+" data-validation-required-message="Please enter your name." required/>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-xs-2 control-label">Email</label>
						<div class="col-xs-10">
							<input id="email" type="email" class="form-control" name="email" placeholder="Jane@mail.com" data-validation-required-message="Please enter your email." onblur="validateEmail(this)" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-xs-2 control-label">Message</label>
						<div class="col-xs-10">
							<textarea id="message" class="form-control" name="message" placeholder="Comments? Questions?" data-validation-reuqired-message="Please enter your message." required></textarea>	
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-2">
							<button type="submit" name="submit" class="btn btn-lg btn-primary">Send</button>
						</div>
					</div>
				</div>
			</form>
			<!-- Google map container -->
			<div class="col-md-6">
				<div class="form-group">
					<div id="map-container"></div>
				</div>
			</div>
			<!-- Google map container -->
		</div>	
	</div>
</div>
</section>


<?php
    include 'footer.php'; 
?>