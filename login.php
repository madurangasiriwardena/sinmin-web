`<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'head.php';?>
</head>

<style type="text/css">
    #customBtn {
      display: inline-block;
      background: #dd4b39;
      color: white;
      width: 165px;
      border-radius: 5px;
      white-space: nowrap;
    }
    #customBtn:hover {
      background: #e74b37;
      cursor: hand;
    }
    span.label {
      font-weight: bold;
      color: black; 
    }
    span.icon {
      background: url('/+/images/branding/btn_red_32.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 35px;
      height: 35px;
      border-right: #bb3f30 1px solid;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 35px;
      padding-right: 35px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto',arial,sans-serif;
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.php" class="btn btn-lg btn-success btn-block">Login</a>



                            </fieldset>
                        </form>
                        <br/>
                        <div id="gSignInWrapper">
                            <span class="label">Sign in with:</span>
                            <div id="customBtn" class="customGPlusSignIn">
                                <span class="icon"></span>
                                <a class="label" href="auth/google_auth.php"><span class="buttonText" onclick="">Google</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
