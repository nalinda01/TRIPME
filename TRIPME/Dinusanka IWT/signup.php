<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
  <link rel="stylesheet" type="text/css" href="Styles/style.signup.css">
 
</head>
<body>
  <div class="container">
            <h1>Sign Up</h1>
            <div class="button"> 
           <script>
            function visitTouristPage(){
                window.location='Tindex.php';
            }
            function visitAccomodation_ProviderPage(){
                window.location='APindex.php';
            }
            function visitTour_GuidPage(){
                window.location='TGindex.php';
            }
            function visitTour_AgrntPage(){
                window.location='TAindex.php';
            }
        </script>
        <button onclick="visitTouristPage();">Tourist</button>
        <button onclick="visitAccomodation_ProviderPage();">Accomodation Provider</button>
        <button onclick="visitTour_GuidPage();">Tour Guid</button>
        <button onclick="visitTour_AgrntPage();">Tour Agent</button>
        </div>
        <div class="account">
                            <center><p>Already have an account       <a href ="log.php">Log in</a></p></center>
                </div>
  </div>         
        
        
        

 
</body>
</html>