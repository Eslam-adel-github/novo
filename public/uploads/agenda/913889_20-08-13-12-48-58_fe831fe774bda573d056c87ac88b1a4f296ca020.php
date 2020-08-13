<?php
session_start();
include("config.php");
if(!isset($_SESSION['log_id'])){
header ("location:login.php");
}
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php
include "config.php"
?>
    <head>
        <meta charset="utf-8">

        <title> قائمة الطلاب </title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
    </head>
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available body classes:

        'page-loading'      enables page preloader
    -->
<body>


<div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
<?php include "right.php" ?>
            <!-- Main Container -->
            <div id="main-container">
                <?php include "header.php" ?>
                <div id="page-content">
                    <!-- Table Responsive Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1 style="font-family: 'Cairo', sans-serif;">
                                الطلاب </small>
							</h1>
                        </div>
                    </div>
                    <!-- END Table Responsive Header -->

                    <!-- Responsive Full Block -->
                    <div class="block">
                        <!-- Responsive Full Title -->
                        <div class="block-title">
                            <h2 style="font-family: 'Cairo', sans-serif;">قائمة الطلاب</h2>
                        </div>
                        <!-- END Responsive Full Title -->

                        <!-- Responsive Full Content -->
                        
                        
                        
                       <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered" style="font-family: 'Cairo', sans-serif;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;font-size: 12px">اسم الطالب</th>
                                        <th style="text-align:center;font-size: 12px"> الموبايل </th>
                                        <th style="text-align:center;font-size: 12px"> الكورس </th>
                                        <th style="text-align:center;font-size: 12px"> الرسوم </th>
                                        <th style="text-align:center;font-size: 12px"> المدفوع </th>
                                         <th style="text-align:center;font-size: 12px"> الباقى </th>
                                         <th style="text-align:center;font-size: 12px">فرع الدراسة </th>
                                         <th style="text-align:center;font-size: 12px">طريقة الحضور </th>
                                        <th style="text-align:center;font-size: 12px"> تاريخ حجز الكورس </th>
                                        <th style="text-align:center;font-size: 12px"> حالة الطالب  </th>
                                        <th style="text-align:center;font-size: 12px"> عرض  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                $namm = $_GET['name'];

                                $quary22="select * from bran_user WHERE user_id =  '".$_SESSION['log_id']."'";
                                $res22=mysql_query($quary22);
                                if(!$res22){die(mysql_error());}
                                while($rowbb=mysql_fetch_array($res22)){
                                $brann=$rowbb['bran'];



                              $quary99="select * from st_course WHERE stat = '".$namm."' && bran = '".$rowbb['bran']."' ";
                                $res99=mysql_query($quary99);
                                if(!$res99){die(mysql_error());}
                                while($rowqq=mysql_fetch_array($res99)){
                                  
                                    $course_id = $rowqq['course_id'];
                                    $price = $rowqq['price'];
                                    $dis   = $rowqq['dis'];
									$days  = $rowqq['days'];
									$times = $rowqq['times'];
									$user_id = $rowqq['user_id'];
                                    $date = $rowqq['date'];
                                    $stat = $rowqq['stat'];
                                    $code_st = $rowqq['code_st'];
                                    $typed = $rowqq['typed'];
                                    $bran =$rowqq['bran'];
                                error_reporting(0); 

									
									$query = "SELECT name FROM  tyst WHERE id ='".$rowqq['stat']."'";
                                $rest = mysql_query($query);
                                if(isset($rest))
                                $sha_sha = mysql_result($rest, 0); 	
								
								 $quary2="select * from student WHERE id = '".$code_st."' ";
                                $res2=mysql_query($quary2);
                                if(!$res2){die(mysql_error());}
                                while($rowz=mysql_fetch_array($res2)){
                                $ar_name = $rowz['ar_name'];
                                $mobile =$rowz['mobile'];
                                $code =$rowz['id'];

									
								
									
								 $query3 ="SELECT SUM(price) FROM exta_sha WHERE student_id ='".$code."' && course_id  =  '".$course_id."' ";
 $result3=mysql_query($query3);
 if(!$result3){die(mysql_error());}
 $count3=mysql_fetch_array($result3);
									
									
									$query4 ="SELECT SUM(cost) FROM ctwreed WHERE code ='".$code."' && course  =  '".$course_id."' ";
 $result4=mysql_query($query4);
 if(!$result4){die(mysql_error());}
 $count4=mysql_fetch_array($result4);
									
									 $total = $price + $count3[0] - $dis ;
									
									 $wait_payment = $total  - $count4[0];

                              
                                   

                               
                              
      
                                $query = "SELECT name FROM bran WHERE id ='".$rowqq['bran']."'";
                                $rest = mysql_query($query);
                                if(isset($rest))
                                $bran_name = mysql_result($rest, 0);  
                                error_reporting(0); 
                                
                                
                                 $query = "SELECT name FROM bran WHERE id ='".$rowqq['typed']."'";
                                $rest = mysql_query($query);
                                if(isset($rest))
                                $hdor = mysql_result($rest, 0);  
                                error_reporting(0); 
                                    
                                $query = "SELECT name FROM course WHERE id ='".$rowqq['course_id']."'";
                                $rest = mysql_query($query);
                                if(isset($rest))
                                $course_name = mysql_result($rest, 0); 
 
                                error_reporting(0);
 
 
                              
                                    
                        

                                    echo "<tr>
                                        <td  style='text-align:center;font-size:15px;'>$ar_name</td>
                                        <td   style='text-align:center;font-size:15px;'>$mobile</td>
                                        <td   style='text-align:center;font-size:15px;'>$course_name</td>
                                        <td   style='text-align:center;font-size:15px;'>$total</td>
                                        <td   style='text-align:center;font-size:15px;'>$count4[0]</td>
                                        <td   style='text-align:center;font-size:15px;'>$wait_payment</td>
                                        <td   style='text-align:center;font-size:15px;'>$bran_name</td>
                                        <td   style='text-align:center;font-size:15px;'>$hdor</td>
                                        <td   style='text-align:center;font-size:15px;'>$date</td>
                                        <td   style='text-align:center;font-size:15px;'>$sha_sha</td>
                                        <td  style='text-align:center;font-size:16px;'><a  style='font-size:16px;' href='anst3.php?code=".$rowz['mobile']."'>عرض</a></td>
                                        ";
                                    
                                    
                                   

                                    echo "</tr>";}}}
                                       ?>
                                </tbody>
                            </table>
 
                           <style>
                               .tot{
                                font-family: 'Cairo', sans-serif;
                               }
                           </style>
                        
                            <br /><br />
                                

                                       
                                </tbody>
                            </table>
                            
                            
                            <br />
                                     
                        </div>
                           
                        </form>
                        <!-- END Responsive Full Content -->
                    </div>
                    <!-- END Responsive Full Block -->
                    </div>
                    <!-- END Responsive Partial Block -->
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
           
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

    

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>

 <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>