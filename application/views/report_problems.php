<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Report Problems</title>

    <!-- Bootstrap Core CSS -->
    <link href= <?php echo base_url("vendor/bootstrap/css/bootstrap.min.css"); ?> rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href= <?php echo base_url("vendor/metisMenu/metisMenu.min.css"); ?> rel="stylesheet">

    <!-- Custom CSS -->
    <link href= <?php echo base_url("dist/css/sb-admin-2.css"); ?> rel="stylesheet">

    <!-- Custom Fonts -->
    <link href= <?php echo base_url("vendor/font-awesome/css/font-awesome.min.css"); ?> rel="stylesheet" type="text/css">
 
    <!-- DataTables CSS -->
    <link href= <?php echo base_url("vendor/datatables-plugins/dataTables.bootstrap.css"); ?> rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href= <?php echo base_url("vendor/datatables-responsive/dataTables.responsive.css"); ?> rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        


            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">Report Problems</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Masukkan pesan mengenai masalah yang ada!
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action=" <?php echo site_url() . 'report_problems/create'; ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="pelapor" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Judul laporan</label>
                                            <input class="form-control" name="subject" required="required">
                                        </div>
                                        <div class="form-group">
                                        <label>Detail</label> Contoh : "PC ruang K.101, id PC 023,04.01.18968, etc"
                                            <textarea class="form-control" rows="3" name="detail" required="required"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-default" name="submit" value="Add">
                                        
                                    </form>
                                    <form action=" <?php echo site_url() . 'login'; ?>" method="POST">
                                            <!--input type="submit" class="btn btn-default" name="submit" value="Back to login">-->
                                            <br />
                                            <a href="login" class="fa fa-mail-reply"></a>
                                        </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src= <?php echo base_url("vendor/jquery/jquery.min.js"); ?>></script>

    <!-- Bootstrap Core JavaScript -->
    <script src= <?php echo base_url("vendor/bootstrap/js/bootstrap.min.js"); ?>></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src= <?php echo base_url("vendor/metisMenu/metisMenu.min.js"); ?>></script>

    <!-- Custom Theme JavaScript -->
    <script src= <?php echo base_url("dist/js/sb-admin-2.js"); ?>></script>

</body>

</html>

