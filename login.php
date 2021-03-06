<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'head.php';?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="auth/ldap_connect.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="uname" type="String" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button input="submit" class="btn btn-lg btn-success btn-block">Log in</button>
                            </fieldset>
                        </form>
                        <br/>
                        <div id="gSignInWrapper">
                            <span>Or</span>
                            <a href="auth/google_auth.php" class="btn btn-block btn-social btn-google-plus">
                                <i class="fa fa-google-plus"></i> Sign in with Google
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
