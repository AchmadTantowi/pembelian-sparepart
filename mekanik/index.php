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
<?php 
include 'navbar.php';

$totalRequest = mysql_query("select COUNT(kode_part) as total from form_request where nik='$_SESSION[id]'");
$getTotalRequest = mysql_fetch_array($totalRequest);
$totalHistory = $getTotalRequest['total'];

$totalRequestAccept = mysql_query("select COUNT(kode_part) as total from form_request where nik='$_SESSION[id]' and status_request='accept'");
$getTotalRequestAccept = mysql_fetch_array($totalRequestAccept);
$totalHistoryAccept = $getTotalRequestAccept['total'];

$totalRequestAwaiting = mysql_query("select COUNT(kode_part) as total from form_request where nik='$_SESSION[id]' and status_request='awaiting'");
$getTotalRequestAwaiting = mysql_fetch_array($totalRequestAwaiting);
$totalHistoryAwaiting = $getTotalRequestAwaiting['total'];

$totalRequestCanceled = mysql_query("select COUNT(kode_part) as total from form_request where nik='$_SESSION[id]' and status_request='canceled'");
$getTotalRequestCanceled = mysql_fetch_array($totalRequestCanceled);
$totalHistoryCanceled = $getTotalRequestCanceled['total'];
?>  
            <!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row top_tiles">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-database"></i>
                                </div>
                                <div class="count"><?php echo $totalHistory;?></div>
                                <h5>History Peminjaman</h5>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-check"></i>
                                </div>
                                <div class="count"><?php echo $totalHistoryAccept;?></div>
                                <h5>History Peminjaman <i>Accept</i></h5>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-question-circle"></i>
                                </div>
                                <div class="count"><?php echo $totalHistoryAwaiting;?></div>
                                <h5>History Peminjaman <i>Awaiting</i></h5>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-close"></i>
                                </div>
                                <div class="count"><?php echo $totalHistoryCanceled;?></div>
                                <h5>History Peminjaman <i>Canceled</i></h5>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'footer.php'; ?>