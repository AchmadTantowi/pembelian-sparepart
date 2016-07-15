<?php include 'head.php';?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><img src="../images/logo_tuntex.jpg" width="50px" height="50px"> <span></span></a>
                    </div>
                    <div class="clearfix"></div>
                        <?php include 'sidebar.php';?>
                </div>
            </div>
            <?php include 'navbar.php';?>  
            <!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Laporan Request Barang</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" target="_blank" action="cetak_lap_request.php" method="POST">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Dari tanggal <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="tgl_awal" required="required" type="date">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Sampai tanggal <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="date" name="tgl_akhir" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Status Request <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select name="status_request" class="form-control">
                                                <option value="all">
                                                  All
                                                </option>
                                                <option value="awaiting">
                                                  Awaiting
                                                </option>
                                                <option value="accept">
                                                  Accept
                                                </option>
                                                <option value="canceled">
                                                  Canceled
                                                </option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" name="simpan" class="btn btn-success">Cetak</button>
                                            </div>
                                        </div>
                                     </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php include 'footer.php'; ?>