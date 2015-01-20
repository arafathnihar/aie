<?php
# include this file at the very top of your script
require_once('preheader.php');

# the code for the class
include ('ajaxCRUD.class.php');

# this one line of code is how you implement the class
$tblCustomer = new ajaxCRUD("Customer","tblCustomer", "pkCustomerID");

# don't show the primary key in the table
$tblCustomer->omitPrimaryKey();

# my db fields all have prefixes;
# display headers as reasonable titles
$tblCustomer->displayAs("fldFName", "First");
$tblCustomer->displayAs("fldLName", "Last");
$tblCustomer->displayAs("fldPaysBy", "Pays By");
$tblCustomer->displayAs("fldPhone", "Phone");
$tblCustomer->displayAs("fldZip", "Zip");

# define allowable fields for my dropdown fields
# (this can also be done for a pk/fk relationship)
$values = array("Cash", "Credit Card", "Paypal");
$tblCustomer->defineAllowableValues("fldPaysBy", $values);

# add the filter box (above the table)
$tblCustomer->addAjaxFilterBox("fldFName");

# add validation to certain fields (via jquery in validation.js)
#$tblCustomer->modifyFieldWithClass("fldPhone", "phone");
#$tblCustomer->modifyFieldWithClass("fldZip", "zip");

# actually show to the table
$tblCustomer->showTable();
?>