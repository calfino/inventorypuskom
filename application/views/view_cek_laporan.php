<!DOCTYPE html>
<html lang="en">

<head>
<style>
    p{
        font-family: baskerville;
        font-size: 18px;
    }
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan</title>

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
<?php include 'navbar.php';
$l_id = $this->session->userdata('l_id');
$num = 0;
 ?>
</head>

<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Activity Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- <font size="5px"><b>Perkembangan Laporan</b></font> -->
                            <p>ID inventaris :
                            <?php 
                            if (empty($laporan[0]['id_inventaris'])) {
                                echo "-";
                            } else{
                                echo $laporan[0]['id_inventaris'];} ?>
                            </p>
                            <p>ID laporan : <?php echo $l_id; ?></p>
                            <a href="<?php echo site_url() . 'laporan/update/'.$l_id; ?>"><button class="btn btn-default">Update data Laporan</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aktivitas</th>
                                        <th>Handler</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($progress as $p) {
                                        $num++;
                                        ?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $p['aktivitas'] ?></td>
                                        <td><?php echo $p['nama_user'] ?></td>
                                        <td><?php echo $p['tanggal_progress'] ?></td>
                                    </tr>    
                                    <?php 
                                } ?>
                                </tbody>   
                            </table>
                            <!-- /.table-responsive -->

                            <a href="<?php echo site_url() . 'laporan/add_progress' ?>"><button class="btn btn-default">Tambah progress laporan</button></a>
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
