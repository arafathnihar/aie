<?php
/* aiefin user mangement */

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

    <title>AIEFIN - Dashboard</title>

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

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

<style type="text/css">
    
#eventInfor i.glyphicon {
    top: 10px;
    right: 25px;
position: absolute;

display: block;
font-family: 'Glyphicons Halflings';
font-style: normal;
font-weight: normal;
line-height: 1;
-webkit-font-smoothing: antialiased;
}
    
.side-nav {
margin-left: -200px;
left: 200px;
width: 200px;
position: fixed;
top: 50px;
height: 1000px;
border-radius: 0;
border: none;
background-color: #222222;
overflow-y: auto;
}

</style>
   
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      </nav>

      <div id="page-wrapper">
       <!-- do All your html  here ARAFATH start-->


      <!-- do All your html  here ARAFATH start-->

      		<div class="row">

                

                

                <div class="col-xs-6">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Event Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="panel-body">

                                    <form id = 'eventInfor' class='form-horizontal' role='form' name='event' action='eventp.php' method='post'>


                                        <legend><b>Event Information</b>
                                        </legend>

                                        <div class="form-group">

                                            <label for="inputeventID" class="col-sm-4 control-label"> Event ID </label>

                                            <div class="col-sm-8">

                                                <input type='text' id="inputeventID" class="form-control" name='eventID' />

                                            </div>

                                        </div>

                                        <div class="form-group">

                                                <label for="com" class="col-sm-4 control-label">Committee</label>

                                                <div class="col-sm-8">

                                                    <select class="form-control" id="sel1" name="committee">
                                                        <option>CCLC</option>
                                                        <option>CNLC</option>
                                                        <option>JLC</option>
                                                        <option>CSLC</option>
                                                    </select>

                                                </div>

                                            </div>

                                        <div class="form-group">

                                            <label for="inputStartDate" class="col-sm-4 control-label"> Start Date</label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control" value="" id="dpd1" name="stdate">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label for="dur" class="col-sm-4 control-label">Duration</label>

                                            <div class="col-sm-8">

                                                <input type="text" class="form-control" value="" id="dpd2" name="duration">

                                            </div>

                                        </div>

                                        <legend><b>Financial Information</b>
                                        </legend>


                                        <div class="form-group">

                                            <label for="budExp" class="col-sm-4 control-label">Budgeted Expense(LKR)</label>

                                            <div class="col-sm-8">

                                                <input type='text' id="budExp" class="form-control" name='budgetexp' />

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label for="actExp" class="col-sm-4 control-label">Actual Expense(LKR)</label>

                                            <div class="col-sm-8">

                                                <input type='text' id="actExp" class="form-control" name='actualExp' />

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="actInc" class="col-sm-4 control-label">Actual Income(LKR)</label>

                                            <div class="col-sm-8">

                                                <input type='text' id="actInc" class="form-control" name='actualInc' />

                                            </div>

                                        </div>



                  <br>
                  <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

            </div>

     <!-- do All your html here ARAFATH end-->



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

         
    
    var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
    
$(document).ready(function() {
    $('#eventInfor').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            incomeID: {
                message: 'The income ID is not valid',
                validators: {
                    notEmpty: {
                        message: 'The income ID is required and cannot be empty'
                    },
                    integer: {
                        message: 'The value is not an id number'
                    },
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'The income ID must be 5 characters long'
                    }
                }
            },
            eventID: {
                message: 'The event ID is not valid',
                validators: {
                    notEmpty: {
                        message: 'The event ID is required and cannot be empty'
                    },
                    integer: {
                        message: 'The value is not an id number'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The event ID must be 4 characters long'
                    }
                }
            },
            projectID: {
                message: 'The project ID is not valid',
                validators: {
                    notEmpty: {
                        message: 'The project ID is required and cannot be empty'
                    },
                    integer: {
                        message: 'The project ID is must be a number'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The project ID must be 4 characters long'
                    }
                }
            },
            
            epCountry: {
                message: 'The Country is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Country is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Country name can only consist of alphabetical'
                    }
                }
            },
            
            epName: {
                message: 'The full name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'The full name must be more than 1 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The full name can only consist of alphabetical'
                    }/*,
                    different: {
                        field: 'password',
                        message: 'The full name and password cannot be the same as each other'
                    }*/
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
            stdate: {
                validators: {
                    notEmpty: {
                        message: 'The date Start Date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date of Start Date is not valid'
                    }
                }
            },
            duration: {
                validators: {
                    notEmpty: {
                        message: 'The date End Date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date of End Date is not valid'
                    }
                }
            },
            
            stat: {
                validators: {
                    notEmpty: {
                        message: 'The Status is required'
                    }
                }
            },
            
            budgetexp: {
                validators: {
                    notEmpty: {
                        message: 'The Budgeted Expense is required'
                    },
                    integer: {
                        message: 'invalid amount'
                    }
                }
            },
     
            actualExp: {
                validators: {
                    notEmpty: {
                        message: 'The Actual Expense is required'
                    },
                    integer: {
                        message: 'invalid amount'
                    }
                }
            },
            
            actualInc: {
                validators: {
                    notEmpty: {
                        message: 'The Actual Income is required'
                    },
                    integer: {
                        message: 'invalid amount'
                    }
                }
            }
            
        }
    });
});

	</script>
  </body>
</html>


