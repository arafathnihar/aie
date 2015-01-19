<?php
/*

UserFrosting Version: 0.1
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UserFrosting - Dashboard</title>

    <link rel="icon" type="image/x-icon" href="css/favicon.ico" />
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>   
    <script src="js/userfrosting.js"></script>    
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      </nav>

      <div id="page-wrapper">

      <!-- do All your html  here ARAFATH start-->
      		<div class="row">

                <div class="col-xs-6">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                       Income Statement as at <?php
echo date("d F Y")." in Rs."; 
?>
                                </a>
                            </h4>
                        </div>


                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="panel-body">

                                    <form id = 'incomeFormColombo' class='form-horizontal' role='form' name='incomestatC'>  
                    <table class="table table-bordered">  
                      <tr>
                        <td>Revenue</td>
                        <td><?php
                          //Revenue
                          $data['iGCDPS']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='iGCDP' AND Status='Received' AND UserID='Colombo'");
     $iGCDPS=$data['iGCDPS']->fetch_assoc();
                          $data['iGIPS']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='iGIP' AND Status='Received' AND UserID='Colombo'");
     $iGIPS=$data['iGIPS']->fetch_assoc();
                          $data['oGCDPS']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='oGCDP' AND Status='Received' AND UserID='Colombo'");
  $oGCDPS=$data['oGCDPS']->fetch_assoc();
                          $data['oGIPS']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='oGIP' AND Status='Received' AND UserID='Colombo'");
  $oGIPS=$data['oGIPS']->fetch_assoc();


                          $data['EPFee']=$mysqli->query("SELECT COALESCE(SUM(EP_Fee),0)  FROM exchangeperson WHERE Status='Realized' AND UserID='Colombo'");
  $EPFee=$data['EPFee']->fetch_assoc();

  
                          $data['ProjFee']=$mysqli->query("SELECT COALESCE(SUM(Proj_Fee),0)  FROM project WHERE UserID='Colombo'");
  $ProjFee=$data['ProjFee']->fetch_assoc();


                          $Revenue=$iGCDPS['COALESCE(SUM(Amount),0)']+$iGIPS['COALESCE(SUM(Amount),0)']+$oGCDPS['COALESCE(SUM(Amount),0)']+$oGIPS['COALESCE(SUM(Amount),0)']+$EPFee['COALESCE(SUM(EP_Fee),0)']+$ProjFee['COALESCE(SUM(Proj_Fee),0)'];
                          echo $Revenue;
                          ?></td>
                        <td rowspan=2></td>
                      </tr>
                      <tr>
                        <td>Cost of Sales</td>
                        <td><?php
                          //CostOfSales
                          $data['iGCDPQ']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='iGCDP' AND Status='Paid' AND UserID='Colombo'");
  $iGCDPQ=$data['iGCDPQ']->fetch_assoc();
                          $data['iGIPQ']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='iGIP' AND Status='Paid' AND UserID='Colombo'");
  $iGIPQ=$data['iGIPQ']->fetch_assoc();

                          $data['oGCDPQ']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='oGCDP' AND Status='Paid' AND UserID='Colombo'");
  $oGCDPQ=$data['oGCDPQ']->fetch_assoc();

                          $data['oGIPQ']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='oGIP' AND Status='Paid' AND UserID='Colombo'");
  $oGIPQ=$data['oGIPQ']->fetch_assoc();



                          $CostOfSales=$iGCDPQ['COALESCE(SUM(Amount),0)']+$iGIPQ['COALESCE(SUM(Amount),0)']+$oGCDPQ['COALESCE(SUM(Amount),0)']+$oGIPQ['COALESCE(SUM(Amount),0)'];
                          echo $CostOfSales;
                          ?></td>  
                      </tr>
                      <tr>
                        <td colspan=2 class="info">Gross Profit</td>
                                                <td><?php
                          //GrossProfit
                          $GrossProfit=$Revenue-$CostOfSales;
                          echo $GrossProfit;
                          ?></td>
                      </tr>
                      <tr>
                        <td>Distribution Cost</td>
                        <td><?php
                          //DistributionCost
                          $data['DistributionCost']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='IM and COMM' AND Status='Paid' AND UserID='Colombo'");
  $DistributionCost=$data['DistributionCost']->fetch_assoc();
                          echo $DistributionCost['COALESCE(SUM(Amount),0)'];
                          ?></td>
                                                <td rowspan=4></td> 
                      </tr>
                      <tr>
                        <td>Administration Cost</td>
                        <td><?php
                          //AdminCost
                          $data['AdminCost']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='EB' AND Status='Paid' AND UserID='Colombo'");
  $AdminCost=$data['AdminCost']->fetch_assoc();

                          echo $AdminCost['COALESCE(SUM(Amount),0)'];
                          ?></td>  
                      </tr>
                      <tr>
                        <td colspan=2>Other Costs</td> 
                      </tr>
                          <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TM and RNR</td>
                        <td><?php
                          //TM&RNR
                          $data['TM_RNR']=$mysqli->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='TM and RNR' AND Status='Paid' AND UserID='Colombo'");
  $TM_RNR=$data['TM_RNR']->fetch_assoc();
                          echo $TM_RNR['COALESCE(SUM(Amount),0)'];
                          ?></td> 
                      </tr>
                          <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other</td>
                        <td><?php
                          //Other
                          $data['Other']=$mysqli->query("SELECT COALESCE(SUM(ActualExpense),0)  FROM event WHERE UserID='Colombo'");
  $Other=$data['Other']->fetch_assoc();


                          echo $Other['COALESCE(SUM(ActualExpense),0)'];
                          ?></td>
                                                <td><?php
                          //TotalOtherCost
                          $TotalOtherCost=$TM_RNR['COALESCE(SUM(Amount),0)']+$Other['COALESCE(SUM(ActualExpense),0)'];
                          echo $TotalOtherCost;
                          ?></td>  
                      </tr>
                          <tr>
                        <td colspan=2 class="info">Profit from Operations</td>
                                                <td><?php
                          //ProfitFromOperations
                          $ProfitFromOperation=$GrossProfit-$TotalOtherCost;
                          echo $ProfitFromOperation;
                          ?></td>
                      </tr>
                          <tr>
                        <td>Sponsorships</td>
                        <td><?php
                          //Sponsorship
                          $data['Sponsorship']=$mysqli->query("SELECT COALESCE(SUM(ActualIncome),0)  FROM event WHERE UserID='Colombo'");
  $Sponsorship=$data['Sponsorship']->fetch_assoc();

                          echo $Sponsorship['COALESCE(SUM(ActualIncome),0)'];
                          ?></td>
                                                <td></td>
                      </tr>
                          <tr>
                        <td colspan=2 class="info">Profit Before Tax</td>
                                                <td><?php
                          //ProfitBeforeTax
                          $ProfitBeforeTax=$ProfitFromOperation+$Sponsorship['COALESCE(SUM(ActualIncome),0)'];
                          echo $ProfitBeforeTax;
                          ?>
                          </td>
                      </tr>
                          <tr>
                        <td>Tax</td>
                                                <td><?php
                          //Tax
                          $Tax=5;
                          echo $Tax."%";
                          ?></td>
                                                <td></td>
                      </tr>
                      <tr>
                        <td colspan=2 class="danger">Profit After Tax</td>
                                                <td><?php
                          //ProfitAfterTax
                          $ProfitAfterTax=$ProfitBeforeTax*(100-$Tax)/100;
                          echo $ProfitAfterTax;
                          ?></td>
                      </tr>

                      
                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

     <!-- do All your html here ARAFATH end-->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

	<script>
        $(document).ready(function() {
          // Get id of the logged in user to determine how to render this page.
          var user = loadCurrentUser();
          var user_id = user['id'];
          var admin_flag = user['admin'];
          
          // Load the header
          $('.navbar').load('header.php', function() {
            $('#user_logged_in_name').html('<i class="fa fa-user"></i> ' + user['user_name'] + ' <b class="caret"></b>');
			$('.navitem-dashboard').addClass('active');
          });
		});
	</script>
  </body>
</html>


