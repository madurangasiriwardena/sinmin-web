<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require 'head.php'; ?>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php require 'header.php' ?>
                <?php require 'sidebar.php' ?>
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Compare</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>





                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form role="form" id="myForm" onsubmit="return false;">

                                                <div class="col-lg-6">
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Word-1</label>
                                                        <input class="sinmin-form-control" id="word1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Word-2</label>
                                                        <input class="sinmin-form-control" id="word2">
                                                    </div>
                                                </div>

                                                <br/>
                                                <br/>

                                                <div class="col-lg-12">
                                                    <div class="sinmin-form-group" style="margin-top:20px">
                                                        <label  class="sinmin-label"><input type="checkbox" id="enable-category" checked="true" ></label>
                                                        <label  class="sinmin-label">Category</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div>
                                                            <table width="100%">
                                                                <tr width="33.3%">
                                                                    <td>
                                                                        <div class="sinmin-checkbox">
                                                                            <label>
                                                                                <input class="checkbox-category" type="checkbox" id="category-1" checked="true" style="position: absolute;">News
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="sinmin-checkbox">
                                                                            <label>
                                                                                <input class="checkbox-category" type="checkbox" id="category-2" checked="true" style="position: absolute;">Academic
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr width="33.3%">
                                                                    <td>
                                                                        <div class="sinmin-checkbox">
                                                                            <label>
                                                                                <input class="checkbox-category" type="checkbox" id="category-3" checked="true" style="position: absolute;">Creative Writing
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="sinmin-checkbox">
                                                                            <label>
                                                                                <input class="checkbox-category" type="checkbox" id="category-4" checked="true" style="position: absolute;">Spoken
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr width="33.%">
                                                                    <td>
                                                                        <div class="sinmin-checkbox">
                                                                            <label>
                                                                                <input class="checkbox-category" type="checkbox"  id="category-5" checked="true" style="position: absolute;">Gazette
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>

                                                            </table>





                                                        </div>
                                                    </div>
                                                    <button input="submit" class="btn btn-outline btn-primary">Search</button>
                                                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>





                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table width="100%">
                                <tbody>
                                    <tr>


                                        <td width="50%" valign="top">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Word-1
                                                </div>
                                                <h5 style="text-align: center">Word-1 (w1) : ශ්‍රී ලංකා</h5>
                                                <h5 style="text-align: center">Ratio = 0.5</h5>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Word</th>
                                                                    <th>W1</th>
                                                                    <th>W2</th>
                                                                    <th>W1 / W2</th>
                                                                    <th>Score</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->					                    
                                            </div>



                                        <td width="50%" valign="top">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Word-2
                                                </div>
                                                <h5 style="text-align: center">Word-1 (w1) : ශ්‍රී ලංකා</h5>
                                                <h5 style="text-align: center">Ratio = 0.5</h5>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Word</th>
                                                                    <th>W1</th>
                                                                    <th>W2</th>
                                                                    <th>W1 / W2</th>
                                                                    <th>Score</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ශ්‍රී ලංකා</td>
                                                                    <td>11</td>
                                                                    <td>22</td>
                                                                    <td>0.5</td>
                                                                    <td>300</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->					                    
                                            </div>



                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/sb-admin-2.js"></script>

        <script type="text/javascript">
                                                $('#enable-category').change(function () {
                                                    if ($('#enable-category').is(':checked')) {
                                                        var categories = document.getElementsByClassName("checkbox-category");
                                                        for (i = 0; i < categories.length; i++) {
                                                            categories[i].disabled = false;
                                                        }
                                                    } else {
                                                        var categories = document.getElementsByClassName("checkbox-category");

                                                        for (i = 0; i < categories.length; i++) {
                                                            categories[i].disabled = true;
                                                        }
                                                    }
                                                });

        </script>

    </body>

</html>
