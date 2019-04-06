<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventaris FTUI - View</title>

    <!-- Bootstrap Core CSS -->
    <link href= <?php echo base_url("vendor/bootstrap/css/bootstrap.min.css"); ?> rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href= <?php echo base_url("vendor/metisMenu/metisMenu.min.css"); ?> rel="stylesheet">

    <!-- DataTables CSS -->
    <link href= <?php echo base_url("vendor/datatables-plugins/dataTables.bootstrap.css"); ?> rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href= <?php echo base_url("vendor/datatables-responsive/dataTables.responsive.css"); ?> rel="stylesheet">

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
<?php 
$num=0; ?>
</head>

<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Inventaris
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Inventaris</th>
                                        <th>Kode Barang</th>
                                        <th>Item</th>
                                        <th>Ruang</th>
                                        <th>Kondisi</th>
                                        <th>Tahun Pembelian</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($inventaris as $inv) {
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num ?></td>
                                        <td><?php echo $inv['id_inventaris']; ?></td>
                                        <td><?php echo $inv['id_barang']; ?></td>
                                        <td><?php echo $inv['jenis']; ?></td>
                                        <td><?php echo $inv['nama_ruang']; ?></td>
                                        <td><?php echo $inv['kondisi']; ?></td>
                                        <td><?php echo $inv['tahun_pembelian']; ?></td>
                                        <!-- <td><a href="<?php echo site_url().'invtabel/Move/'.$inv['id_inventaris'];  ?>">Move</a></td> -->
                                        <td><a href="<?php echo site_url().'inventaris/remove/'.$inv['id_inventaris'];  ?>">remove</a></td>
                                    </tr>    
                                    <?php } ?>
                                </tbody>   
                            </table>
                            <!-- /.table-responsive -->
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

    <!-- DataTables JavaScript -->
    <script src= <?php echo base_url("vendor/datatables/js/jquery.dataTables.min.js"); ?>></script>
    <script src= <?php echo base_url("vendor/datatables-plugins/dataTables.bootstrap.min.js"); ?>></script>
    <script src= <?php echo base_url("vendor/datatables-responsive/dataTables.responsive.js"); ?>></script>

    <!-- Custom Theme JavaScript -->
    <script src= <?php echo base_url("dist/js/sb-admin-2.js"); ?>></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
