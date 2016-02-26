<?php
    $page = "event";
    $fName = basename(__FILE__);
    $title = "Bay Area Food Events";
    $metaD = "Welcome to event page";
    include 'header.php';
?>

<!-- Header -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 intro-text">
				<div class="intro-lead-in">
					<h1 class="header_text">This Week's Featured Events</h1>
				</div>
			</div>
		</div>
	</div>    
</header>

<!--events section  -->
<section id="events">
	<div class="container">
		<div class="row">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th><strong>Restaurants</strong></th>
						<th><strong>Food Crawling Event</strong></th>
						<th><strong>Date</strong></th>
					</tr>

					<tr>
						<td>
							<strong><a href="http://moonrakerpacifica.com/">Moonraker</a></strong>
							<br>
							<br>
							<strong><a href="http://www.parkchalet.com/">Park Chalet</a></strong>
							<br>
							<br>
							<strong><a href="http://cotognasf.com/">Cotogna</a></strong>
						</td>
						<td>
							<strong>Sunday Recovery Brunch</strong>
							<br>
							<p>Pacifica newcomer Moonraker, located coastside, has launched a Champagne Sunday brunch from 10:30 a.m.-2 p.m., wherein guests are treated to a complimentary glass of Champagne with their view of the sea. Next, we shall rest and recuperate at the Park Chalet's Recovery Brunch. The garden restaurant and microbrewery near the ocean at the foot of Golden Gate Park features outdoor seating on sunnier days and, in foggy weather, cozy indoor dining next to a roaring fire. A heaping brunch buffet of American mainstays such as french toast, carved meats, chilled shrimp, and biscuits and gravy is available from 10 a.m.-3 p.m. Finally, we will end the trip at Italian standout Cotogna’s rustic, four-course, family-style Sunday Suppers for between $20 and $25 per person.</p>
						</td>
						<td><strong>2/21/2016</strong></td>
					</tr>

					<tr>
						<td>
							<strong><a href="http://www.jdvhotels.com/restaurants/hotel-vitale/americano-restaurant-bar/">Americano Restaurant and Bar</a></strong>
							<br>
							<br>
							<strong><a href="http://www.viognierrestaurant.com/">Viognier</a></strong>
							<br>
							<br>
							<strong><a href="http://www.michaelmina.net/restaurants/san-francisco-bay-area/rn74/">RN74</a></strong>
						</td>
						<td>
							<strong>Midweek Happy Hour!</strong>
							<br>
							<p>Americano Restaurant and Bar has an outdoor happy hour on Thursday evening sponsored by Peroni, with a live DJ, drinks and grilled bites from executive chef Josua Perez on the patio from 5 p.m.-8 p.m., weather permitting. Viognier's happy hour features specialty cocktails in the lounge area of the restaurant for $7, and a dedicated menu includes house-made Kobe pastrami on rye with sauerkraut, Comté and truffled fries. We shall end our Happy Hour trip at RN47, where select drinks and bar snacks will all cost only $5 each.</p>
						</td>
						<td><strong>2/18/2016</strong></td>
					</tr>

					<tr>
						<td>
							<strong><a href="http://catheadsbbq.com/">CatHead’s BBQ</a></strong>
							<br>
							<br>
							<strong><a href="http://www.theboneyardtruck.com/">The Boneyard</a></strong>
							<br>
							<br>
							<strong><a href="http://www.thewholebeast.com/">The Whole Beast</a></strong>
						</td>
						<td>
							<strong>SoMa BBQ Tour</strong>
							<br>
							<p>We will explore a trio of BBQ restaurants in SoMa for our member’s meat void. We shall first stop at Cathead’s for their tender ribs falling off the bones. Next, we will try the portobello mushrooms, nachos, bruschetta and caprese skewers at the Boneyard truck that will satisfy vegetarians and meat lovers alike. We end our night at the Whole Beast for their Charcuterie plate.</p>
						</td>
						<td><strong>2/16/2016</strong></td>
					</tr>

				</tbody>
			</table>
		</div>

		<div class="main">
			<section class="event-grid">
				<h2 >Past Events</h2>
				<div class="events">
					<div class="row col col-3">
						<div class="block block-1">
							<img src="img/event1.jpg" alt="">
							<a href="event_one" class="overlay">
								<span class="copy-block">
									<span class="title">Taste of Asia Party</span>
								</span>
							</a>
						</div>
						<div class="block block-2">
							<img src="img/event2.jpg" alt="">
							<a href="event_two" class="overlay">
								<span class="copy-block">
									<span class="title">Breakfast of Champions</span>
								</span>
							</a>
						</div>
						<div class="block block-3">
							<img src="img/event3.jpg" alt="">
							<a href="event_three" class="overlay">
								<span class="copy-block">
									<span class="title">Italia Night</span>
								</span>
							</a>
						</div>
					</div>
					<div class="row col col-3">
						<div class="block block-1">
							<img src="img/event4.jpg" alt="">
							<a href="event_four" class="overlay">
								<span class="copy-block">
									<span class="title">San Jose Brewery Mash</span>
								</span>
							</a>
						</div>
						<div class="block block-2">
							<img src="img/event5.jpg" alt="">
							<a href="event_five" class="overlay">
								<span class="copy-block">
									<span class="title">Happy Hour for Wine Enthusiasts</span>
								</span>
							</a>
						</div>
						<div class="block block-3">
							<img src="img/event6.jpg" alt="">
							<a href="event_six" class="overlay">
								<span class="copy-block">
									<span class="title">Valentine's Special</span>
								</span>
							</a>
						</div>
					</div>
				</div>
				<br>
				<div class="center">
					<h2>Join Us</h2>
					<h4>Sign up as a member to view or to suggest new events.</h4>
					<br>
					<a href="signup.php" class="btn">Sign Up</a>
				</div>
			</section><!--/past-events-->
		</div>
	</div>
</section>
<!--end of events section  -->

<?php 
    include 'footer.php'; 
?>