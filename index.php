<?php include 'init.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Place A Pic</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> <!-- FOR cool ICONS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'><!-- For cool FONTS, for p TAGS-->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'><!-- For cool FONTS, for all h TAGS-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>

     <!--- BEGGINING OF HEADER-->
  <div class= "navbar navbar-default navbar-fixed-top" role = "navigation"> 
    <div class = "container">
      <div class = "navbar-header">
          <a class="navbar-brand" href="#">PlacePic</a> 
      </div>
     
    </div>
  </div> 
  <!-- END HERADER-->

<!-- JUMBOTRON BEGIN -->
<div class = "container">
  <div class="jumbotron text-center">
    <h1> Place Pic</h1>
    <p> Place a Pic anywhere on the PicMap! </p>
    <a href="#login" data-toggle="modal" class="btn btn-lg btn-primary">Login</a>
    <p>   </p>
     <a href="#register" data-toggle="modal" class="btn btn-lg btn-success">Register</a>

  </div>
</div>
<!-- JUMBOTRON END -->

<!-- BEGIN OF Fixed FOOTER -->
  <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation"> <!--- black footer with navbar-inverse -->
      <div class="container">
        <div class="navbar-text pull-left">
          <p> ©Copywrite Jesse Lurie 2014</p>
        </div>
        <div class="navbar-text pull-right">
            <a href="#"><i class="fa fa-facebook-square fa-2x"></i> <!-- include facebook square and makes size bigger -->
            <a href="#"><i class="fa fa-google-plus fa-2x"></i>
            <a href="#"><i class="fa fa-twitter fa-2x"></i>
        </div>
      </div>
  </div> 
  <!-- END FOOTER-->

<!-- Begin of Structure for Modal referencting to #CONTACT id -->
<div class ="modal fade" id="login" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
         <form class="form-horizontal" role="form" action="login.php" method="post"> 
              <div class="modal-header">
                <h4>Login</h4>
             </div>
              <div class="modal-body">
                <div class="form-group"> <!--row of contact form -->
                  <label for="USERNAME" class="col-sm-2 control-lable">Username</label> 
                  <div class="col-xs-3">
                    <input type="text" class="form-control" name="USERNAME" placeholder="username"> 
                  </div>
                </div> <!--end of row -->
                <div class="form-group"> 
                  <label for="PASSWORD" class="col-sm-2 control-lable">Password</label>  
                  <div class="col-xs-3">
                    <input type="password" class="form-control" name="PASSWORD" placeholder="password"> 
                  </div>
                </div> <!--end of row -->       
              </div>
               <div class="modal-footer">
               <div class= "btn btn-default" data-dismiss="modal">Close</div>
               <button type="submit" class="btn btn-primary">Send </button>
               </div>
      </form>
    </div>
  </div>
</div>  
<!-- End of Structure for Modal referencting to #login id -->

<!-- BEGIN OF structure for the Modal referencing #register id -->

<div class ="modal fade" id="register" role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
         <form class="form-horizontal" role="form" action="register.php" method="post"> 
              <div class="modal-header">
                <h4>Register</h4>
             </div>
              <div class="modal-body">
                <div class="form-group"> <!--row of contact form -->
                  <label for="USERNAME" class="col-sm-2 control-lable">Username</label> 
                  <div class="col-xs-3">
                    <input type="text" class="form-control" name="USERNAME" placeholder="username"> 
                  </div>
                </div> <!--end of row -->
                <div class="form-group"> 
                  <label for="PASSWORD" class="col-sm-2 control-lable">Password</label>  
                  <div class="col-xs-3">
                    <input type="password" class="form-control" name="PASSWORD" placeholder="password"> 
                  </div>
                </div> <!--end of row -->   
                 <div class="form-group"> 
                  <label for="REPEATPASSWORD" class="col-sm-2 control-lable">Repeat Password</label>  
                  <div class="col-xs-3">

                    <input type="password" class="form-control" name="REPEATPASSWORD" placeholder="repeat password"> 

                  </div>
                </div> <!--end of row -->         
              </div>
               <div class="modal-footer">
               <div class= "btn btn-default" data-dismiss="modal">Close</div>
               <button type="submit" class="btn btn-primary">Send </button>
               </div>
      </form>
    </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>