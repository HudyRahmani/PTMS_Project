<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  }  else {
     ?>
  
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>دشبورد مدیر</title>
   

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

        

        <div class="content mt-3">

            
<div class="bg-primary p-3 text-white" style="font-size:25px;text-align:center;">راپور همه مشخصات استادان هم از نظر رتبه علمی و درجه تحصیلی</div>   
           <hr> 
<a href="manage-subjects.php">
         <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-4" style="background-color:#00004d;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                       
                         
                        </div>
                        <?php 
						$sql ="SELECT ID from faculty ";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$faculty=$query->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($faculty);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:17px;">مجموعه پوهنځی های ثبت شده</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
       </div>
</a>

  
<a href="manage-department.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-2" style="background-color:#0000b3;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from department ";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$department=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($department);?></span>
                        </h2>
                        <p class="text-light" dir="rtl"  style="times new roman; font-size:17px;">مجموعه دیپارتمنت های ثبت شده</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
  
            <!--/.col-->
<a href="manage-teacher.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-2" style="background-color:#0000b3;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher ";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$totalteacher=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($totalteacher);?></span>
                        </h2>
                        <p class="text-light" dir="rtl"  style="times new roman; font-size:17px;">مجموعه استادان ثبت شده</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>

<a href="manage-notpublicprofileteacher.php">
            <div class="col-sm-6 col-lg-6" style="text-align:center;">
                <div class="card text-white bg-flat-color-3" style="background-color:#3333ff;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
							$sql1 ="SELECT ID from tblteacher where isPublic is null || isPublic='0'";
							$query1 = $dbh -> prepare($sql1);
							$query1->execute();
							$results1=$query1->fetchAll(PDO::FETCH_OBJ);
							$totalteacher=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($totalteacher);?></span>
                        </h2>
                        <p class="text-light"  style="times new roman; font-size:17px;">استادان ثبت شده(مشخصات آن عمومی نیست)</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
            
           
         <a href="manage-publicprofileteacher.php">
            <div class="col-sm-6 col-lg-6" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#800000;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where isPublic='1'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$totalteacher=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($totalteacher);?></span>
                        </h2>
                        <p class="text-light"  style="times new roman; font-size:17px;">استادان ثبت شده (مشخصات آن عمومی است)</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
		
           <hr> 
           <a href="poaand.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style=" background-color:#cc0000;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where sciencer='1'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$total=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($total);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">پوهاند</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  
  </a>
            
           
           <a href="poanwal.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style=" background-color:#ff3333;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where sciencer='2'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$total=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($total);?></span>
                        </h2>
                        <p class="text-light"  style="times new roman; font-size:18px;">پوهنوال</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
    </a>
            
           
  <a href="poandoy.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#008000;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where sciencer='3'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$total=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($total);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">پوهندوی</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
 <a href="poanmal.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#00cc00;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where sciencer='4'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$total=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($total);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">پوهنمل</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
   <a href="poanyar.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="color:black; background-color:#00e600;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where sciencer='5'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$total=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($total);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">پوهنیار</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
  <a href="npoanyar.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#050505;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql1 ="SELECT ID from tblteacher where sciencer='6'";
						$query1 = $dbh -> prepare($sql1);
						$query1->execute();
						$results1=$query1->fetchAll(PDO::FETCH_OBJ);
						$total=$query1->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($total);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">نامزد پوهنیار</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
  <a href="poyaly.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#232323;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql2 ="SELECT ID from tblteacher where sciencer='7'";
						$query2 = $dbh -> prepare($sql2);
						$query2->execute();
						$results2=$query2->fetchAll(PDO::FETCH_OBJ);
						$tota2=$query2->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($tota2);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">پوهیالی</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
  
   <a href="lisans.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#232323;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql2 ="SELECT ID from tblteacher where degree='1'";
						$query2 = $dbh -> prepare($sql2);
						$query2->execute();
						$results2=$query2->fetchAll(PDO::FETCH_OBJ);
						$degree=$query2->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($degree);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">لیسانس</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
  
    <a href="master.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#232323;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql2 ="SELECT ID from tblteacher where degree='2'";
						$query2 = $dbh -> prepare($sql2);
						$query2->execute();
						$results2=$query2->fetchAll(PDO::FETCH_OBJ);
						$degree=$query2->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($degree);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">ماستر</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
     <a href="doctor.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#232323;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql2 ="SELECT ID from tblteacher where degree='3'";
						$query2 = $dbh -> prepare($sql2);
						$query2->execute();
						$results2=$query2->fetchAll(PDO::FETCH_OBJ);
						$degree=$query2->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($degree);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;">دکتور</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
  </a>
  
      <a href="mdoctor.php">
            <div class="col-sm-4 col-lg-4" style="text-align:center;">
                <div class="card text-white bg-flat-color-5" style="background-color:#232323;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                        
                        </div>
                        <?php 
						$sql2 ="SELECT ID from tblteacher where degree='4'";
						$query2 = $dbh -> prepare($sql2);
						$query2->execute();
						$results2=$query2->fetchAll(PDO::FETCH_OBJ);
						$degree=$query2->rowCount();
?>
                        <h2 class="mb-0">
                            <span class="count"><?php echo htmlentities($degree);?></span>
                        </h2>
                        <p class="text-light" style="times new roman; font-size:18px;"> مافوق دکتور</p>

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
  <?php   } ?>
