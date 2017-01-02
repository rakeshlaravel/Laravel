<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="http://cdn.jsdelivr.net/fontawesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://formvalidation.io/vendor/formvalidation/css/formValidation.min.css">
   
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .navbar-default .navbar-nav>li>a {
            float: left !important;
        }

        /****************************
        Css for add employee
        ****************************/
        .modal-body .form-horizontal .col-sm-2,
        .modal-body .form-horizontal .col-sm-10 {
            width: 100%
        }

        .modal-body .form-horizontal .control-label {
            text-align: left;
        }
        .modal-body .form-horizontal .col-sm-offset-2 {
            margin-left: 15px;
        }
        /****************************
        Css for add employee
        ****************************/

    </style>    
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        
                        <li class="dropdown">
                           
                            <a style="float:left;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-btn"></i>Employees</a>                          
                          
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/employee') }}"><i class="fa fa-btn fa-sign-out"></i>Show Employees</a></li>
                                <li><a href="javascript:;" data-toggle="modal" data-target="#addEmployeeModal"><i class="fa fa-btn fa-sign-out"></i>Add Employees</a></li>
                            </ul>
                        </li>

                        <li>
                            <a style="float:left;" href="{{ url('/curd') }}"><i class="fa fa-btn"></i>Index</a>
                        </li>
                    @if(Auth::check())
                        <li>
                            <a style="float:left;" href="{{ url('/profile') }}" id="showProfile"><i class="fa fa-btn"></i>Profile</a>
                        </li>
                    @endif    
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Model to add employee -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="Add" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Add Employee</h5>
                </div>

                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    <form id="addEmpForm" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Name</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="nameInput" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Employee Id</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="emp_idInput" />
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-xs-3 control-label">Address</label>
                            <div class="col-xs-5">
                                <textarea class="form-control" name="addressInput" ></textarea>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-xs-3 control-label">Phone</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="phoneInput" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary" id="addEmpSubmitButton">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to add employee -->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ URL::asset('/js/common.js') }}"></script>

    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>    
    

    <script>    
        $(document).ready(function() {
            $('#addEmpForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nameInput: {
                        validators: {
                            notEmpty: {
                                message: 'The name is required'
                            }
                        }
                    },
                    phoneInput: {
                        validators: {
                            notEmpty: {
                                message: 'The phone is required'
                            }
                        }
                    },
                    emp_idInput: {
                        validators: {
                            notEmpty: {
                                message: 'The employee id is required'
                            }
                        }
                    },
                    addressInput: {
                        validators: {
                            notEmpty: {
                                message: 'The address is required'
                            }
                        }
                    }
                }
            });

            $('#addEmpForm').validator().on('submit', function (e) {
                
                if (e.isDefaultPrevented()) {
                                      
                } else {  
                    e.preventDefault();                  
                    var name = $("input[ name = 'nameInput']").val();
                    var phone = $("input[ name = 'phoneInput']").val();
                    var emp_id = $("input[ name = 'emp_idInput']").val();
                    var address = $("input[ name = 'addressInput']").val();
                    $.ajax({
                        url: '/employee/add',
                        type: 'POST', 
                        data: { name: name, phone: phone, emp_id: emp_id, address: address },
                        success: function(){
                            alert("Record has been added successfully");
                            window.location.href= '/employee';
                        },
                        error: function(){
                            alert("Oops! Something went wrong");
                        }
                    });                    
                }
                //e.stopImmediatePropagation();
            });

        });

            
    </script>

</body>
</html>
