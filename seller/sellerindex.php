<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/9a06944c10.js" crossorigin="anonymous"></script>

	<!---Using Bootstrap 4.5 with stackpath cdn from bootstrap--->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/stylesell.css">
	
<body>

<div class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainavbar">
  <a class="navbar-brand text-center" href="#">
  	<img src="images/logo.png" width="70" height="60" class="d-inline-block align-top img-responsive" alt="logo" loading="lazy">
  	<div class="font-weight-bold">Maezoz Seller</div>
  </a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    	<li class="nav-item px-3">
    		<a href="#" class="text-light">
		     	<div id="logoreg">
		     		<i class="fas fa-users fa-2x"></i>
		     		
		     	</div>
		     	<div>Register</div>
		     	
	     	</a>
    	</li>
      
      <li class="nav-item dropdown px-3 my-2">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
       <li class="nav-item dropdown px-3 mt-2">
        <a class="nav-link dropdown-toggle text-light"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
       <li class="nav-item dropdown px-3 mt-2 ">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
       <li class="nav-item dropdown px-3 mt-2">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
     
      <li class="nav-item dropdown px-3 mt-2">
      	<form class="form-inline my-2 my-lg-0">
      		<input class="form-control" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0 font-weight-bold" type="submit">Search</button>
    	</form>
      </li>
      <li class="nav-item dropdown px-3">
      	 <a href="#" class="text-light">
	     	<div id="logologin">
	     		<i class="fas fa-user-tie fa-2x"></i>
	     	</div>
	     	<div class="">Login</div>
	    </a>
      </li>
      
    </ul>     	
	   
	  

     	
    <a href="sellercontactus.php" class="btn btn-outline-danger font-weight-bold">
      	Contact Us
    </a>
     
     
    
  </div>
</div>




	<div id="logindiv" class="">
		
		<div class="secondlogindiv container">
			<div class="row bg-light rounded-top">
				<div class="col-md-12 col-sm-12 col-lg-12  col-xl-12" style="padding-top:5px">
					<p><span class="font-weight-bold h3">Login</span>
				
				
					<button type="button" class="btn" style="float: right">
						<i class="fas fa-times fa-2x"></i>
					</button>
						
					</p>
				</div>
			</div>
			
			
				<hr>

			<div class="thirdlogindiv">

				<form method="post">
				  <div class="form-group">
				    <label for="TxtEmMn2" 
				    class="text-dark font-weight-bold">Email address</label>
				    <input type="email" class="form-control" name="TxtEmMn1" id="TxtEmMn2" aria-describedby="emailHelp">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>

				  <div class="form-group">
				    <label for="Txtpwd2" class="text-dark font-weight-bold">Password</label>
				    <input type="password" class="form-control" name="Txtpwd1" id="Txtpwd2">
				  </div>

				 	<div class="form-group">
				 		<a href="#">
				 			<h7>Forget Password</h7>
				 		</a>
				 	</div>

				  <button type="submit" class="btn btn-primary btn-block btn-xs btn-sm btn-md btn-lg btn-xl px-3 py-2 font-weight-bold">Login</button>
				</form>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
</body>

</html>