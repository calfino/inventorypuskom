<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cek PC - FTUI</title>

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
<?php include 'navbar.php' ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Inventory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah record inventaris
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action=" <?php echo site_url().'barang/addItemGudang'; ?>" method="POST">
                                        <div class="form-group">
                                            <label>Id Barang</label>
                                            <select class="form-control" name="id_barang">
                                            <?php foreach ($barang as $bar) {?>
                                                <option value="<?php echo $bar['id_barang'] ?>">
                                                    <?php echo $bar['id_barang'].' || '.$bar['jenis'] ?>
                                                </option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Gudang</label>
                                            <select class="form-control" name="gudang">
                                                <option value="1">Gudang Baru</option>
                                                <option value="2">Gudang Bekas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" placeholder="10" name="stok" type="int" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pembelian</label>
                                            <input class="form-control" placeholder="2019" name="tahun" type="int" required="required">
                                        </div>
                                        <input type="submit" class="btn btn-default" name="submit" value="Add">
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

