<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href= <?php echo base_url("vendor/bootstrap/css/bootstrap.min.css"); ?> rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href= <?php echo base_url("vendor/metisMenu/metisMenu.min.css"); ?> rel="stylesheet">

    <!-- Custom CSS -->
    <link href= <?php echo base_url("dist/css/sb-admin-2.css"); ?> rel="stylesheet">

    <!-- Custom Fonts -->
    <link href= <?php echo base_url("vendor/font-awesome/css/font-awesome.min.css"); ?> rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php include 'navbar.php'; ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="<?php echo site_url().'barang/createbarang' ?>" method="POST">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Id barang</label>
                                            <input class="form-control" name="id_barang" required="required">
                                            <p class="help-block">Id berada diatas barcode</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Barang</label>
                                            <input class="form-control" name="jenis" placeholder="pc / monitor / mouse" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Merk</label>
                                            <input class="form-control" name="merk" placeholder="Hp / LG / Acer" >
                                        </div>
                                        <div class="form-group">
                                            <label>Seri</label>
                                            <input class="form-control" name="seri" placeholder="HP LE1851" >
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h1>Kosongkan jika bukan PC</h1>
                                        <label>RAM</label>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="ram" placeholder="4">
                                            <span class="input-group-addon">GB</span>
                                        </div>
                                        <label>HDD</label>
                                        <div class="form-group input-group">
                                            <input class="form-control" name="hdd" placeholder="500">
                                            <span class="input-group-addon">GB</span>
                                        </div>
                                        <label>Processor</label>
                                        <div class="form-group input-group">
                                            <input class="form-control" name="processor" placeholder="3.2" >
                                            <span class="input-group-addon">GHz</span>
                                        </div>
                                        <input type="submit" name="submit" value="Create" class="btn btn-default">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </form>
                                
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
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
        </div>
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
