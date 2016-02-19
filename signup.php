<?php
    $page = "signup";
    $fName = basename(__FILE__);
    $title = "signup";
    $metaD = "Welcome to Sign Up page";
    include 'header.php';
?>

<!-- Header -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 intro-text">
				<div class="intro-lead-in">
					<h1>Sign Up Options</h1>
				</div>
				<div class="intro-heading">
					<h4 class="header_text">Please sign up an account to join Bay Area Food Crawl's community or to receive our newsletter so that you can stay in touch with your fellow food lovers.</h4>
				</div>
			</div>
		</div>
	</div>    
</header>
<!-- end of header -->

<!-- Sign Up PHP -->
<?php
    if(isset($_POST['name'])){
    	$filename = "signup.csv";
    	$Exists = (file_exists($filename));

    	$handle = fopen($filename, 'a');

    	$msg = "Thank you ". $_POST['name'] . " for submitting your information.\n Welcome to the community! \n";	
    	$stringToAdd="";

    	if (!$Exists){
    		foreach($_POST as $name => $value) {
    			$stringToAdd.="$name,";	
    		}
    		$stringToAdd.="\n";
    		fwrite($handle, $stringToAdd);
    	}

    	$stringToAdd="";

    	foreach($_POST as $name => $value) {
    		$msg .="$name: $value\n";
    		$stringToAdd.="$value,";
    	}

    	$stringToAdd.="\n";

    	echo '<style type="text/css">
    	#form {
    	    display: none;
    	}
    	</style>';

    	print "</br><center><h4>Thank you, ". $_POST["name"] . " for signing up for an account.</h4>\n";

    	fwrite($handle, $stringToAdd);

    	fclose($handle); 

    	$sendTo = $_POST["email1"]; 
    	$headers = "From: ". $_POST["name"] ."<".$_POST["email1"]. ">\r\n";
		
		mail($sendTo, 'Bay Area Food Crawl Account Confirmation', $msg, $headers);
		echo "<center>An email has been sent you to confirming your information.</br></br>";
	
	} else if(isset($_POST['news-name'])){

		$filename = "news.csv";
		$Exists = (file_exists($filename));

		$handle = fopen($filename, 'a');

		$msg = "Thank you ". $_POST['news-name'] . " for submitting your information.\n You shall begin receiving newsletters next week.\n\n";	
		$stringToAdd="";

		if (!$Exists){
			foreach($_POST as $name => $value) {
				$stringToAdd.="$name,";
			}
			$stringToAdd.="\n";

			fwrite($handle, $stringToAdd);
		}

		$stringToAdd=""; 

		foreach($_POST as $name => $value) {
			$msg .="$name : $value\n";
			$stringToAdd.="$value,";
		}

		$stringToAdd.="\n";

		echo '<style type="text/css">
		#form {
		    display: none;
		}
		</style>';

		print "</br><center><h4>Thank you, ". $_POST["news-name"] . " for signing up to receive our newsletter.</h4>\n\n";

		fwrite($handle, $stringToAdd);

		fclose($handle); 

		$sendTo = $_POST["news-email"]; 
		$headers = "From: ". $_POST["news-name"] ."<".$_POST["news-email"]. ">\r\n";

		mail($sendTo, 'Bay Area Food Crawl Confirmation', $msg, $headers);

		echo "<center>An email has been sent to confirm that you will be receiving the newsletter.</br></br>";	
	}
?>
<!--End of Sign Up PHP -->

<!-- Sign Up and Newsletter Form -->
<section id="form">
	<div class="row">
		<div class="col-lg-12 signup-item text-center">
			<br></br>
			<!-- Sign Up div -->
			<div class="col-md-6">
				<form name="creatAccount" action="signup.php" method="POST" class="form-horizontal" onsubmit="return matchPassword();">
					<fieldset>
						<legend>Create an Account</legend>
						<div class="col-md-12" id="mySignUp">
							<div class="form-group">
								<label for="name" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<input type="text" id="name" name="name" class="form-control" placeholder="Jane Doe" pattern="[a-zA-Z]+\s[a-zA-Z]+" required autofocus />
								</div>
							</div>
							<div class="form-group">
								<label for="address1" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<input type="text" id="address1" name="address1" class="form-control" placeholder="Address Line 1" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-3">
									<input type="text" id="address2" class="form-control" name="address2" placeholder="Address Line 2"/>
								</div>
							</div>	
							<div class="form-group">
								<label for="zipcode" class="col-sm-3 control-label">Zipcode</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="94102 *" pattern="[0-9]{5}" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="email1" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email1" name="email1" onblur="validateEmail(this)" placeholder="jane@mail.com *" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-3 control-label">Username</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="username" name="username" placeholder="Create Your Username *" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="password1" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="password1" name="password1" placeholder="Enter Your Password *" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="password2" class="col-sm-3 control-label">Confirm Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Your Password *" required/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="button" class="btn btn-primary" onclick="location.href='index.php'">Cancel</button>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- End of Sign Up div -->

			<!-- Newsletter div-->
			<div class="col-md-6">
				<form name= "receiveNewsletter" action="signup.php" method="POST" class="form-horizontal">
					<fieldset>
						<legend>Newsletter Sign Up</legend>
						<!--<input type="checkbox" id="myCheck" autofocus onclick="showSignUp()">--><p>Please complete the form below if you would like to receive Bay Area Food Crawl's monthly newsletter.</p>
						<div class="col-md-12" id="myNewsletter">
							<div class="form-group">
								<label for="news-name" class="col-sm-2 control-label sr-only">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="news-name" name="news-name" placeholder="First and Last Name"/>
								</div>
							</div>
							<div class="form-group">
								<label for="news-email" class="col-sm-2 control-label sr-only">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="news-email" name="news-email" placeholder="Email"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end of Sign up div -->
		</div>
	</div>
</section>
<!-- Sign Up and Log In Form -->

<?php  
    include 'footer.php'; 
?>
