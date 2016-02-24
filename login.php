<?php
    $page = "login";
    $fName = basename(__FILE__);
    $title = "Log In";
    $metaD = "Welcome to Log In page";
    include 'header.php';
?>

<!-- Header -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 intro-text">
				<div class="intro-lead-in">
					<h1>Log In</h1>
				</div>
			</div>
		</div>
	</div>    
</header>
<!-- end of header -->

<section id="form">
	<div class="row">
		<div class="col-lg-12 signup-item text-center">
			<br></br>
			<!-- Sign Up div -->
			<div class="col-md-6">
				<form>
					<fieldset>
						<legend>Log In to Your Account</legend>
						<div class="col-md-12" id="mySignUp">
							<div class="form-group">
								<label for="username" class="col-sm-3 control-label">Username</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username *" required/>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="form-group">
								<label for="password1" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="password1" name="password1" placeholder="Enter Your Password *" required/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-9">
									<label class="my-check-box"><input type="checkbox" checked=""> Remember me</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Log In</button>
									<button type="button" class="btn btn-primary" onclick="location.href='index.php'">Cancel</button>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
					</fieldset>
				</form>
			</div>
			<!-- End of Sign Up div -->
			
			<!-- Social Media div-->
			<div class="col-md-6">
				<fieldset>
					<legend>Log In with Your Social Media Account</legend>
					<!-- Socal Media Account Create Buttons -->
					<div class="form-group" id="social-signup">
						<div class="social-signup-btn google" id="google-signin">Log In With Google</div>
						<div class="social-signup-btn facebook" id="fb-signin">Log In with Facebook</div>
					</div>
				</fieldset>
			</div>
			<!-- end of Sign up div -->
		</div>
	</div>
</section>

<?php  
    include 'footer.php'; 
?>