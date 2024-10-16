<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsuid']==0)) {
  header('location:logout.php');
  }  else {
     ?>
  
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>دشبورد استادان</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <!-- Header-->

        <div dir="rtl" class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>دشبورد</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">دشبورد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            


         <div dir="rtl" style="text-align:right;" class="col-sm-6 col-lg-12">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                       
                     
                        </div>
                        <?php 
$eid=$_SESSION['trmsuid'];
$query=$dbh -> prepare("SELECT * from  tblteacher where ID=$eid");
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{ 
?>
                        <h3 dir="rtl" class="mb-0">
                            <span > خوش آمدی <?php echo htmlentities($row->Name);?></span>
                        </h3>
                        <hr />
 <?php if($row->isPublic=='1'):?>                       
                        <p class="text-light"> پروفایل شما عمومی است ، همه محصلین میتواند پروفایل شما را ببیند ومیتواند سوال بپرسد </p>
 <?php else: ?>  
 <p class="text-light">پروفایل شما عمومی نیست، محصلین نمیتواند پروفایل شما را ببیند</p>  
 <?php endif;?>                   
<?php } ?>
                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

  
<a href="queries.php">
            <div dir="rtl" style="text-align:right;" class="col-sm-12 col-lg-12">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
<?php 
$tid=$_SESSION['trmsuid'];
$sql1 ="SELECT ID from tblquery where teacherId='$tid' ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalquery=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($totalquery);?></span>
                        </h2>
                        <p class="text-light">مجموعه سوالات که دریافت شده</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
            
           
           

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
<?php } ?>
