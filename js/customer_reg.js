
	document.write('hi custimer');
	alert("hello");
		function validation()
		{
			alert("hi");
			var c_name4=document.getElementById("c_name2").value;
			var cu_password4=document.getElementById("cu_password2").value;
			var c_password4=document.getElementById("c_password2").value;
			var c_address4=document.getElementById("c_address2").value;
			var c_city4=document.getElementById("c_city2").value;
			var c_country4=document.getElementById("c_country2").value;

			
			if(c_name4 == ""){
				document.getElementById('c_name3').innerHTML =" ** Please fill the username field";
				return false;
			}
			if((c_name4.length <= 2) || (c_name4.length > 20)) {
				document.getElementById('c_name3').innerHTML =" ** Username lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(c_name4))
			{
				document.getElementById('c_name3').innerHTML =" ** only characters are allowed";
				return false;
			}

			if(cu_password4 == "")
			{
				document.getElementById('cu_password3').innerHTML =" ** Please fill the password field";
				return false;
			}
			if((cu_password4.length <= 5) || (cu_password4.length > 20))
			{
				document.getElementById('cu_password3').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}


			if(cu_password4!=c_password4)
			{
				document.getElementById('c_password3').innerHTML =" ** Password does not match the confirm password";
				return false;
			}
			if(c_password4 == "")
			{
				document.getElementById('c_password3').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}

			if(c_address4=="")
			{
				document.getElementById('c_address3').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(c_address4.length<= 20) || (c_address4.length > 150)
			{
				document.getElementById('c_address3').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(!isNaN(c_address4))
			{
				document.getElementById('c_address3').innerHTML =" ** only characters are allowed";
				return false;
			}

			if(c_city4=="")
			{
				document.getElementById('c_city3').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(c_city4.length<= 5) || (c_city4.length > 25)
			{
				document.getElementById('c_city3').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(!isNaN(c_city4))
			{
				document.getElementById('c_city3').innerHTML =" ** only characters are allowed";
				return false;
			}

			if(c_country4=="")
			{
				document.getElementById('c_country3').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(c_country4.length<= 2) || (c_country4.length > 25)
			{
				document.getElementById('c_country4').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(!isNaN(c_country4))
			{
				document.getElementById('c_country4').innerHTML =" ** only characters are allowed";
				return false;
			}

		}
	
	