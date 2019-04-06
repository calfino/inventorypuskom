<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Inventaris<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . 'inventaris' . '/createinventaris'; ?>">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'inventaris' . '/view'; ?>">View/Edit</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Barang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . 'barang' . '/createbarang'; ?>">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'barang' . '/viewbarang'; ?>">View/Edit</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'barang' . '/gudang'; ?>">Lihat Gudang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> User Tabel<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="<?php echo base_url() . 'usertabel' . '/add_user'; ?>"> Add</a>
                                </li>
                                <li>
                                <a href="<?php echo base_url() . 'usertabel' . '/user'; ?>">View/Edit</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Ruang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="<?php echo base_url() . 'ruang/add_ruang'; ?>"> Add</a>
                                </li>
                                <li>
                                <a href="<?php echo base_url() . 'ruang/view'; ?>">View/Edit</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="<?php echo base_url() . 'laporan' . '/view'; ?>"><i class="fa fa-table fa-fw"></i> Laporan</a>
                        </li>
                        <li>
                        <a href="<?php echo base_url() . 'maintenance' . '/view'; ?>"><i class="fa fa-edit fa-fw"></i> Maintenance</a>
                        </li>                
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->