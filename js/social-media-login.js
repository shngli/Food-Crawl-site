/**
 * Social Media Login
 * Google and Facebook Login
 *
 * Manages client interaction with Google and Facebook.
 *
 * Collects and passes login
 */


/**
 * Google SSO Helper
 *
 * @type {{onSignInCallback, renderProfile, disconnectServer, connectServer}}
 */
var helper = (function() {

    var authResult = undefined;
    var timesCalled = 0;

    //creates helper functions
    return {
        /**
         * Hides the sign-in button and connects the server-side app after
         * the user successfully signs in.
         *
         * @param {Object} authResult An Object which contains the access token and
         *   other authentication information.
         */
        onSignInCallback: function(authResult) {
            timesCalled++;
            //alert('calling onSignInCallback for the ' + timesCalled + ' time.');
            /*
             for (var field in authResult) {
             $('#authResult').append(' ' + field + ': ' + authResult[field] + '<br/>');
             }
             //*/
            if (authResult['access_token']) {
                access_token = authResult['access_token'];
                // The user is signed in
                this.authResult = authResult;
                helper.connectServer();
                // After we load the Google+ API, render the profile data from Google+.
                if (timesCalled >= 2) {
                    gapi.client.load('plus','v1',this.renderProfile);
                }
            } else if (authResult['error']) {
                // There was an error, which means the user is not signed in.
                // As an example, you can troubleshoot by writing to the console:
                //console.log('There was an error: ' + authResult['error']);
                $('#authResult').append('Logged out');
                $('#authOps').hide();
                $('#gConnect').show();
            }
            //console.log('authResult', authResult);
        },

        /**
         * Retrieves and renders the authenticated user's Google+ profile.
         */
        renderProfile: function() {
            //alert('calling renderProfile.');
            var request = gapi.client.plus.people.get({'userId' : 'me'});
            request.execute(function(profile) {
                var googleID = profile.id;
                var firstname = profile.name.givenName;
                var lastname = profile.name.familyName;

                //check if user gave us access to email
                if (!profile.emails) {
                    renderError('You must give Dinner Lab access to your Google email to continue.');
                    return;
                }

                var email = profile.emails[0].value;

                //alert(googleID + ' ' + firstname + ' ' + lastname + ' ' + email);
                $.ajax({
                    url: '/_/php/prepareDataGoogleSSO.php',
                    type: 'POST',
                    data: '&googleID=' + googleID + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&googleAccessToken=' + access_token,
                    dataType:'json',
                    success: function(response) {
                        if (response != null) {
                            var success = response.success;
                            var googleID = response.googleID;
                            var googleAccessToken = response.googleAccessToken;
                            var firstname = response.firstname;
                            var lastname = response.lastname;
                            var email = response.email;
                        }
                        if (success === true) {
                            //send data to login handler
                            performSSOLogin('google', {
                                id: googleID,
                                accessToken: googleAccessToken,
                                first_name: firstname,
                                last_name: lastname,
                                email: email
                            });
                        }
                    }
                });
            });
        },

        /**
         * Calls the server endpoint to disconnect the app for the user.
         */
        disconnectServer: function() {
            var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + access_token;
            // Perform an asynchronous GET request.
            $.ajax({
                type: 'GET',
                url: revokeUrl,
                async: false,
                contentType: "application/json",
                dataType: 'jsonp',
                success: function(nullResponse) {
                    // Do something now that user is disconnected
                    // The response is always undefined.
                    /*
                     $('#authOps').hide();
                     $('#profile').empty();
                     $('#visiblePeople').empty();
                     $('#authResult').empty();
                     $('#gConnect').show();
                     //*/
                    window.location = '/';
                },
                error: function(e) {
                    // Handle the error
                    // console.log(e);
                    // You could point users to manually disconnect if unsuccessful
                    // https://plus.google.com/apps
                }
            });
        },

        /**
         * Calls the server endpoint to connect the app for the user. The client
         * sends the one-time authorization code to the server and the server
         * exchanges the code for its own tokens to use for offline API access.
         * For more information, see:
         *   https://developers.google.com/+/web/signin/server-side-flow
         */
        connectServer: function() {
            //console.log(this.authResult.code);
            $.ajax({
                type: 'POST',
                url: window.location.href,
                contentType: 'application/octet-stream; charset=utf-8',
                success: function(result) {
                    //console.log(result);
                },
                processData: false,
                data: this.authResult.code
            });
        }
    };
})();

/**
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
    helper.onSignInCallback(authResult);
}

/**
 * Renders google signin button.
 * Sets client ID and callback function.
 */
function render() {
    gapi.signin.render('google-signin', {
        'callback': 'onSignInCallback',
        'clientid': '730677522337-8n6fnh6d9l9fcjto3p9lis1a6rrjpuqh.apps.googleusercontent.com',
        'cookiepolicy': 'single_host_origin',
        'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email'
    });
}

/**
 * Facebook Login Helper.
 *
 * @type {{run: Function}}
 * @author Christian Burck
 */
var facebookSigninHelper = {

    /**
     * This method is run when script is loaded.
     *
     * - Sets up Facebook SDK
     * - Blinds click event to Facebook signup button.
     */
    run: function(){
        var self = this;

        //Count how many times we've asked user for access
        self.reAuthCounter = 0;
        self.reAuthCounterEmail = 0;

        //Load Facebook JS SJK
        $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
            FB.init({
                appId: '458282201040009',
                cookie: true,   // enable cookies to allow the server to access the session
                xfbml: true,    // parse social plugins on this page
                version: 'v2.2' // use version 2.2
            });
        });

        //bind click event to FB signin button
        $('#fb-signin').click(function(){

            //reset reauth counter
            self.reAuthCounter = 0;
            self.reAuthCounterEmail = 0;

            //check login state
            self.checkLoginState();
        });
    },

    /**
     * Trigger Facebook Login Window, only once per login button click.
     */
    login: function(){
        if (facebookSigninHelper.reAuthCounter < 1) {
            //increment auth counter
            facebookSigninHelper.reAuthCounter++;

            FB.login(function(response){
                facebookSigninHelper.checkLoginState();
            }, {scope: 'public_profile,email', return_scopes: true});
        }
    },

    /**
     * Trigger check of user's logged in status.
     */
    checkLoginState: function(){
        FB.getLoginStatus(function(response){
            facebookSigninHelper.loginStatusCallback(response);
        });
    },

    /**
     * Trigger Facebook to ask user permission to access profile.
     */
    askForEmail: function(){
        //increment auth counter
        facebookSigninHelper.reAuthCounterEmail++;

        FB.login(function(response){
            facebookSigninHelper.checkLoginState();
        }, {scope:'public_profile,email', return_scopes:true, auth_type:'rerequest'});
    },

    /**
     * Handles Facebook login status.
     * This will POST form if all variables check out.
     *
     * @param response
     */
    loginStatusCallback: function(response){
        //USER IS LOGGED IN TO FACEBOOK AND CONNECTED TO DINNER LAB
        if (response.status === 'connected') {
            //check that user gave us permission to use their email
            FB.api('/me/permissions', function(response) {
                if (response && !response.error) {
                    //determine if user allowed us access to email
                    var emailAllowed = false;
                    $.each(response.data, function(i, permission) {
                        if (permission.permission == 'email' && permission.status == 'granted') {
                            emailAllowed = true;
                        }
                    });
                    //if user hasn't given us access to email, prompt user for new permission
                    if (!emailAllowed) {
                        //catch if we've asked for email permission more than once
                        if (facebookSigninHelper.reAuthCounterEmail > 0) {
                            renderError('You must provide Dinner Lab access to your email to continue.');
                        } else {
                            //ask user for email
                            facebookSigninHelper.askForEmail();
                        }
                    } else {
                        //get user details and perform SSO login
                        facebookSigninHelper.getFacebookUserDetails();
                    }
                }
            });
        //USER IS LOGGED INTO FACEBOOK, BUT HAS NOT CONNECTED TO DINNER LAB
        } else if (response.status === 'not_authorized') {
            //ask user permission to connect to dinner lab
            facebookSigninHelper.login();
        //USER IS NOT LOGGED INTO FACEBOOK
        } else {
            //show facebook login window
            facebookSigninHelper.login();
        }
    },

    /**
     * Get user details from Facebook, update form, validate, and submit.
     */
    getFacebookUserDetails: function(){
        //ask FB for user's details
        FB.api('/me', {fields: 'id,first_name,last_name,email'}, function(response){
            if (response && !response.error) {
               //send data to login handler
               performSSOLogin('facebook', {
                   id: response.id,
                   accessToken: null,
                   first_name: response.first_name,
                   last_name: response.last_name,
                   email: response.email
               });
            }
        });
    }
};

/**
 * Handles Login and Signup form validation and and submission.
 *
 * Takes in SSO type (facebook or google) and ssoData object, defined as:
 * - id (user ID in Facebook for Google)
 * - accessToken (access token)
 * - first_name (first name of user)
 * - last_name (last name of user)
 * - email (email address of user)
 *
 * @param type
 * @param ssoData
 */
function performSSOLogin(type, ssoData){
    //login and signup forms
    var loginForm = $("#login-sso");
    var signupForm = $('#sign-up');

    //disable login form
    if (loginForm.length > 0) {
        //disable login button
        $('#login-submit').attr('disabled', 'disabled');

        //set login form-specific email hidden field
        $('#login-sso #email').val(ssoData.email);
    }

    //populate SSO hidden fields
    $('#ssoType').val(type);
    $('#ssoID').val(ssoData.id);
    $('#ssoAccessToken').val(ssoData.accessToken);
    $('#firstname').val(ssoData.first_name);
    $('#lastname').val(ssoData.last_name);

    //validate and submit signup form
    if (signupForm.length > 0) {
        //email should only be populated in signup form
        $('#email').val(ssoData.email);

        //reset validation error message
        signupForm.validate().resetForm();

        //only validate these elements for SSO
        var cityIdValidate = signupForm.validate().element('#cityID');

        //if cityOtherAutocomplete is hidden, bypass its validation
        var cityOtherValidate = true;
        if ($('#cityOtherAutocomplete').length > 0) {
            cityOtherValidate = signupForm.validate().element('#cityOtherAutocomplete');
        }

        //if telephone is missing, bypass its validation
        var telephoneValidate = true;
        if ($('#telephone').length > 0) {
            telephoneValidate = signupForm.validate().element('#telephone');
        }

        //if userTypeID is hidden, bypass its validation
        var userTypeIDValidate = true;
        if ($('select#usertypeID').length > 0) {
            userTypeIDValidate = signupForm.validate().element('#usertypeID');
        }

        //validate city and user type is set (if userType is hidden, bypass)
        if (cityIdValidate && cityOtherValidate && userTypeIDValidate && telephoneValidate) {
            //submit form from DOM (skips validation)
            signupForm[0].submit();
        }
    }

    //submit login form
    if (loginForm.length > 0) {
        loginForm.submit();
    }
}

/**
 * Renders error message in form.
 *
 * @param error
 */
function renderError(error){
    if (error) {
        $('.alert-message').html(error).show();
    }
}

/**
 * jQuery initialization.
 */
$(function(){
    //init facebook
    facebookSigninHelper.run();

    //init google
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);

    $('#disconnect').off('click');
    $('#disconnect').click(helper.disconnectServer);

    //reset SSO form values when submit button pressed
    $('#signup-submit').click(function(){
        $('#ssoType').val('');
        $('#ssoID').val('');
        $('#ssoAccessToken').val('');
    });
});
