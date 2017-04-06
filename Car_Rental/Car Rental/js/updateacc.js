	   function validating()
	   {
	    if(name_match(document.getElementById('uname')))
	    {
	     if(mobile_match(document.getElementById('umobile')))
	     {     
	      if(email_match(document.getElementById('uemail')))
	      {
	       if(password_match(document.getElementById('uoldpassword')))
	       {
	        if(password_match(document.getElementById('upassword')))
	        {
	    	 if(password_match(document.getElementById('urepassword')))
	         {
	    	  if(password_compare(document.getElementById('password'),document.getElementById('uoldpassword')))
	    	  {
	    		if(password_compare(document.getElementById('upassword'),document.getElementById('urepassword')))
	    			   return true;
	    	  }
	         }
	        }
	       }
	      }
	      //return false;
	     }
	     return false; 
	    }
	    else
	     return false;
	   } 
	   function name_match(obj_name)
	   {
	    var name_format=/^[A-Za-z ]+$/;
	    var name=obj_name.value;
	    if(name.match(name_format))
	     return true;
	    else
	    {
	     alert("Enter character only in field");
	     obj_name.focus();
	     return false;
	    }
	   }
	   function mobile_match(obj_mobile)
	   {
	    var mobile_format=/^\d{10}$/;
	    var mobile=obj_mobile.value;
	    if(mobile.match(mobile_format))
	     return true;
	    else
	    {
	     alert("Enter 10 digit number only");
	     obj_mobile.focus();
	     return false;
	    }
	   }
	   function email_match(obj_email)
	   {
	    var email_format=/^[A-Za-z0-9._-]+@[A-Za-z0-9._-]+$/;
	    var email=obj_email.value;
	    if(email.match(email_format))
	     return true;
	    else
	    {
	     alert("Enter email only in email field");
	     obj_email.focus();
	     return false;
	    }
	   }
	   function password_match(obj_password)
	   {
	 	//var password_format=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,10}$/;
	 	//var password_format=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,10})+$/;
	 	//var password_format=/^[A-Za-z0-9]+$/;
		var password_format=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,15})/;
	 	var password=obj_password.value;
	    if(password.match(password_format))
	     return true;
	    else
	    {
	     alert("Enter valid password.Password contain Minimum 8 and Maximum 15 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character.");
	     obj_password.focus();
	     return false;
	    }
	   }
	   function password_compare(obj_password,obj_repassword)
	   {
		   var password=obj_password.value;
		   var repassword=obj_repassword.value;
		   if(password===repassword)
			   return true;
		   else
		   {
			   alert("Please retype password");
			   obj_repassword.focus();
			   return false;
		   }
	   }