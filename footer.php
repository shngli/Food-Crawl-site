	<!-- footer  -->
	<footer class="text-center">
		<div class="footer-above">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="social-media-item">
							<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook-square fa-4x social social-fb"></i></a>
							<a target="_blank" href="https://twitter.com/"><i class="fa fa-twitter-square fa-4x social social-tw"></i></a>
							<a target="_blank" href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-4x social social-gp"></i></a>
							<a target="_blank" href="https://www.tumblr.com/"><i class="fa fa-tumblr-square fa-4x social social-tb"></i></a>
							<a target="_blank" href="https://www.instagram.com/"><i class="fa fa-instagram fa-4x social social-in"></i></a>
							<a target="_blank" href="https://www.meetup.com/"><i class="fa fa-envelope-square fa-4x social social-mp"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-below">
			<div class="container">
				<div class="row">
					<span class="copyright"><br>Copyright &copy; 2016 Shayne Li<br> All rights reserved.</span>
					<div><span><?php 
					    if (file_exists($fName)) {
					    	echo  "$page page was last modified: ". date ("F d Y H:i:s.",filemtime($fName));
					    }
					    ?></span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end of footer -->

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>

    <!-- Bootstrap Select -->
    <script src="./js/bootstrap-select.min.js"></script>
    <!-- Bootstrap Validation -->
    <script src="./js/jqBootstrapValidation.js"></script>
    <!-- Bootstrap form helper -->
    <script src="./js/bootstrap-formhelpers.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <!-- JQuery Validation -->
    <script src="./js/jquery.validate.js"></script>


    <!-- Google Map loading -->
    <?php
        // Only for Google Map on Contact page
    	if ($page == "about"){
    ?>
    	<script src="./js/mygooglemap.js"></script>
    <?php 
		}
    ?>

    <!-- Custom Theme JavaScript -->
    <script src="./js/agency.js"></script>

    <!-- Form validator JavaScript -->
    <script type="text/javascript" src="./js/myform-validator.js"></script>

 </body>
 </html>