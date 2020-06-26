<?php    
    include('includes/db.php');
?>



    
   
    
   

    
<!--<html>  
    <head>

        <title>E Commerce Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/9a06944c10.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/customerfloderonly.css">
-->
    <!-- jQuery library -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
   <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
   <!--<html>-->
    <head>
        
        <style>

            #hidediv
            {
                
            }
            #hidediv .container
            {
               border: solid  1px #e6e6e6; 
               box-shadow: 0 10px 5px rgba(0,0,0,0.1);
               background-color: #fefefe;                
            }
            #login
            {
                padding: 10px;
                margin: 10px 0;
            }
            #register
            {
                padding: 10px;
                margin: 10px 0;
            }
            #hidediv .boxtext
            {
                background: #f7f7f7f7;
                margin: -20px -20px 20px;
                padding: 20px;
                border-bottom: solid 1px #eeeeee;
            }
            .buttonmove
            {
                padding: 2px;
                
            }
            
            .icon
            {
                display: flex;
                justify-content: center;
                align-items: center;
                padding-top: 80px;
                box-sizing: border-box;
                color: blue;

            }



        </style>


    </head>
   <!-- </head>-->
    <!--<body class="customerfloder">-->
        <body>

        
        <div class="customerfloder">
        <div id="hidediv">            
            <div class="container">
                <div class="row">
                    <button type="button" class="btn btn-primary col-md-4  buttonmove col-sm-5 col-xs-5" onclick="hide1()">
                        <h5>Sign In</h5>
                    </button>

                    <button type="button" class="btn btn-primary col-md-4  buttonmove col-sm-5 col-xs-5" onclick="hide()">
                        <h5>Sign Up</h5>
                    </button>

                    <a href="index.php" class="btn btn-primary  pull-right col-md-4 col-sm-2 col-xs-2">
                        <i class="fas fa-window-close fa-2x"></i>
                    </a>
                
                </div>
                <div class="row" id="login">
                    <div class="col-md-8 col-sm-12 ">
                        <div class="boxtext">
                            <center> 
                                <h2>Login</h2>
                                <p class="lead">Already our customers</p>
                            </center>
                        </div>
                        <form action="checkout.php" method="post" onsubmit="return validation()">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="c_email" id="c_email2" class="form-control" autocomplete="off">
                                <span id="c_email3" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="c_password" class="form-control" id="c_password2" autocomplete="off">
                                <span id="c_password3" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="">
                                <label></label>
                                
                                <button type="submit" name="Login" class="btn btn-primary btn-lg btn-sm btn-xs btn-block" value="Login" style="padding: 5px 0">
                                    <i class="fas fa-sign-in-alt"></i> Log in 
                                </button>
                            </div>
                            
                        </form>
                        <center>       
                            <h3 onclick="hide()" style="cursor: pointer;">      New ? Register Now
                            </h3>
                        </center>

                    </div>
                    <div class="col-md-4 icon hidden-sm hidden-xs">
                        <i class="fas fa-user-tie fa-8x"></i>
                    </div>
                </div>

                <div class="row" id="register">
                    <div class="col-md-8 col-sm-12 ">
                        <div class="boxtext">
                            <center> 
                                <h2>Register</h2>
                                <p class="lead">New Users</p>
                            </center>
                        </div>
                        <form action="#" method="post" 
                        onsubmit="return validationg()">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="mcust_full_name"  id="mcust_full_name2" class="form-control" autocomplete="off">

                                <span id="mcust_full_name3" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" name="mcust_mobile"  class="form-control" id="mcust_mobile2" autocomplete="off">
                                <span id="mcust_mobile3" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="email" name="mcust_email" class="form-control" id="mcust_email2" autocomplete="off">
                                <span id="mcust_email3" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label></label>
                                <button type="submit" name="Register" class="form-control btn btn-success btn-lg btn-sm btn-xs btn-block" value="Register" style="padding: 5px 0">
                                    Register
                                    </button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-4 icon hidden-sm hidden-xs">
                        <i class="fas fa-users fa-8x"></i>
                    </div>


                </div>
            </div>
            
        </div>


    </div>
       <script type="text/javascript">
            document.write("hi everyone");
            
            function validation()
            {
                var c_email4=document.getElementById("c_email2").value;
                var c_password4=document.getElementById("c_password2").value;
                alert('alert');
                
               
                if(c_email4=="")
                {
                    document.getElementById("c_email3").innerHTML="**Please  Fill the username field";
                    return false;
                }
                if((c_email4.length <= 2) || (c_email4.length > 20))
                {
                    document.getElementById('c_email3').innerHTML =" ** Username length must be between 2 and 20";
                    return false;   
                }
                if(!isNaN(c_email4))
                {
                    document.getElementById('c_email3').innerHTML =" ** only characters are allowed";
                    return false;
                }            
            
                if(c_password4=="")
                {
                    document.getElementById("c_password3").innerHTML="**Please  Fill the Password field";
                    return false;
                }
                if((c_password4.length <=5) || (c_password4.length>15)) 
                {
                    document.getElementById('c_password3').innerHTML =" ** Passwords lenght must be between  5 and 15";
                    return false;   
                }
            }
        

            function validationg()
            {
                var mcust_full_name4=document.getElementById("mcust_full_name2").value;
                var mcust_mobile4=document.getElementById("mcust_mobile2").value;
                var mcust_email4=document.getElementById("mcust_email2").value;
               
                
                if(mcust_full_name4=="")
                {
                    document.getElementById("mcust_full_name3").innerHTML="**Please  Fill the username field";
                    return false;
                }
                
                if((mcust_full_name4.lenth <= 2) || (mcust_full_name4.length > 20)) 
                {
                    document.getElementById('mcust_full_name3').innerHTML =" ** Username lenght must be between 2 and 20";
                    return false;   
                }
                


                if(mcust_mobile4 == "")
                {
                document.getElementById('mcust_mobile3').innerHTML =" ** Please fill the mobile NUmber field";
                return false;
                }
                if(isNaN(mcust_mobile4))
                {
                    document.getElementById('mcust_mobile3').innerHTML =" ** user must write digits only not characters";
                    return false;
                }
                if(mcust_mobile4.length!=10)
                {
                    document.getElementById('mcust_mobile3').innerHTML =" ** Mobile Number must be 10 digits only";
                    return false;
                }

                if(mcust_email4 == "")
                {
                    document.getElementById('mcust_email3').innerHTML =" ** Please fill the email idx field";
                    return false;
                }
                if(mcust_email4.indexOf('@') <= 0 )
                {
                    document.getElementById('mcust_email3').innerHTML =" ** @ Invalid Position";
                    return false;
                }

                if((mcust_email4.charAt(mcust_email4.length-4)!='.') && (mcust_email4.charAt(mcust_email4.length-3)!='.'))
                {
                    document.getElementById('mcust_email3').innerHTML =" ** . Invalid Position";
                    return false;
                }
            }
                
            document.write("hi im select second");
        </script>
    
    </body>
    
    <!--</body>-->
<!--</html>-->
<?php
    if(isset($_POST['Login']))
    {
        $customer_email=$_POST['c_email'];
        $customer_pass=$_POST['c_password'];
        $select_customers="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
        $run_cust=mysqli_query($conn,$select_customers);

    /*    function getUserIp()
    {
        switch (true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];

            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];

            case(!empty ($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

            default: return $_SERVER['REMOTE_ADDR'];
        }
    }*/
        $get_ip=getUserIp();
         //echo "<script>alert($get_ip.'session_start')</script>";
        $check_customer=mysqli_num_rows($run_cust);
        $select_cart="select * from cart where ip_add='$get_ip'";
        $run_cart=mysqli_query($conn,$select_cart);
        $check_cart=mysqli_num_rows($run_cart);
        if($check_customer==0)
        {
            echo "<script>alert('Password/Email wrong ')</script>";
            exit();
        } 
        if($check_customer==1 AND $check_cart==0)
        {
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('You are logged in hell0')</script>";
            // echo "<script>window.open('customer/my_account.php','_self')</script>";
             echo "<script>
             window.open('customer/my_account.php','_self')</script>";
            echo"<script>alert('hi')</script>";

        }
        else
        {
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('You are logged in hi')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
            // if(isset($_GET['check']))
            // {
                // echo"<script>window.open('index.php','_self')</script>";
            // }

        }
    }
?>  
<?php
    if(isset($_POST['Register']))
    {
        $cust_full=$_POST['mcust_full_name'];
        $cust_mobile=$_POST['mcust_mobile'];
        $customer_email=$_POST['mcust_email'];

$insert_mcust="insert into main_cust(mcust_name,mcust_mobile,mcust_email)values('$cust_full','$cust_mobile','$customer_email')";

        $run_mcust=mysqli_query($conn,$insert_mcust);

        if($run_mcust)
        {
            $latest_id=mysqli_insert_id($conn);
            echo "<script>alert($latest_id)</script>";
        }
        else
        {
            echo "<script>mysqli_error($conn)</script>";
        }


        
       


        if($run_mcust)
        {
            echo"<script>
                    alert('Pls Fill Full Registation for better Supports');

                window.open('customer_registration.php?id=$latest_id','_self');
                </script>";

        }
    }

?>