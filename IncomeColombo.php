<?php
													//Revenue
													$dataCol['iGCDPS']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='iGCDP' AND Status='Received' AND UserID='Colombo'");
     $iGCDPSCol=$dataCol['iGCDPS']->fetch_assoc();
													$dataCol['iGIPS']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='iGIP' AND Status='Received' AND UserID='Colombo'");
     $iGIPSCol=$dataCol['iGIPS']->fetch_assoc();
													$dataCol['oGCDPS']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='oGCDP' AND Status='Received' AND UserID='Colombo'");
	$oGCDPSCol=$dataCol['oGCDPS']->fetch_assoc();
													$dataCol['oGIPS']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM income WHERE Function='oGIP' AND Status='Received' AND UserID='Colombo'");
	$oGIPSCol=$dataCol['oGIPS']->fetch_assoc();


													$dataCol['EPFee']=$conn->query("SELECT COALESCE(SUM(EP_Fee),0)  FROM exchangeperson WHERE Status='Realized' AND UserID='Colombo'");
	$EPFeeCol=$dataCol['EPFee']->fetch_assoc();

	
													$dataCol['ProjFee']=$conn->query("SELECT COALESCE(SUM(Proj_Fee),0)  FROM project WHERE UserID='Colombo'");
	$ProjFeeCol=$dataCol['ProjFee']->fetch_assoc();


													$RevenueCol=$iGCDPSCol['COALESCE(SUM(Amount),0)']+$iGIPSCol['COALESCE(SUM(Amount),0)']+$oGCDPSCol['COALESCE(SUM(Amount),0)']+$oGIPSCol['COALESCE(SUM(Amount),0)']+$EPFeeCol['COALESCE(SUM(EP_Fee),0)']+$ProjFeeCol['COALESCE(SUM(Proj_Fee),0)'];
													
													?>

<?php
													//CostOfSales
													$dataCol['iGCDPQ']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='iGCDP' AND Status='Paid' AND UserID='Colombo'");
	$iGCDPQCol=$dataCol['iGCDPQ']->fetch_assoc();
													$dataCol['iGIPQ']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='iGIP' AND Status='Paid' AND UserID='Colombo'");
	$iGIPQCol=$dataCol['iGIPQ']->fetch_assoc();

													$dataCol['oGCDPQ']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='oGCDP' AND Status='Paid' AND UserID='Colombo'");
	$oGCDPQCol=$dataCol['oGCDPQ']->fetch_assoc();

													$dataCol['oGIPQ']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='oGIP' AND Status='Paid' AND UserID='Colombo'");
	$oGIPQCol=$dataCol['oGIPQ']->fetch_assoc();



													$CostOfSalesCol=$iGCDPQCol['COALESCE(SUM(Amount),0)']+$iGIPQCol['COALESCE(SUM(Amount),0)']+$oGCDPQCol['COALESCE(SUM(Amount),0)']+$oGIPQCol['COALESCE(SUM(Amount),0)'];
													
													?>
<?php
													//GrossProfit
													$GrossProfitCol=$RevenueCol-$CostOfSalesCol;
													
													?>
<?php
													//DistributionCost
													$dataCol['DistributionCost']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='IM and COMM' AND Status='Paid' AND UserID='Colombo'");
	$DistributionCostCol=$dataCol['DistributionCost']->fetch_assoc();
													
													?>
<?php
													//AdminCost
													$dataCol['AdminCost']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='EB' AND Status='Paid' AND UserID='Colombo'");
	$AdminCostCol=$dataCol['AdminCost']->fetch_assoc();

													
													?>
<?php//Other Costs?>

<?php
													//TM&RNR
													$dataCol['TM_RNR']=$conn->query("SELECT COALESCE(SUM(Amount),0)  FROM expense WHERE Function='TM and RNR' AND Status='Paid' AND UserID='Colombo'");
	$TM_RNRCol=$dataCol['TM_RNR']->fetch_assoc();
													
													?>

<?php
													//Other
													$dataCol['Other']=$conn->query("SELECT COALESCE(SUM(ActualExpense),0)  FROM event WHERE UserID='Colombo'");
	$OtherCol=$dataCol['Other']->fetch_assoc();


													
													?>

<?php
													//TotalOtherCost
													$TotalOtherCostCol=$TM_RNRCol['COALESCE(SUM(Amount),0)']+$OtherCol['COALESCE(SUM(ActualExpense),0)'];
													
													?>
<?php
													//ProfitFromOperations
													$ProfitFromOperationCol=$GrossProfitCol-$TotalOtherCostCol;
													
													?>

<?php//Other Income?>

<?php
													//Sponsorship
													$dataCol['Sponsorship']=$conn->query("SELECT COALESCE(SUM(ActualIncome),0)  FROM event WHERE UserID='Colombo'");
	$SponsorshipCol=$dataCol['Sponsorship']->fetch_assoc();

													
													?>


<?php
													//ProfitBeforeTax
													$ProfitBeforeTaxCol=$ProfitFromOperationCol+$SponsorshipCol['COALESCE(SUM(ActualIncome),0)'];
													
													?>
<?php
													//Tax
													$TaxCol=5;
													
													?>
<?php
													//ProfitAfterTax
													$ProfitAfterTaxCol=$ProfitBeforeTaxCol*(100-$TaxCol)/100;
													
													?>