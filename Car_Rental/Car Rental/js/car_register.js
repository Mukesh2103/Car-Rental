	   function validating()
	   {
	    if(car_match(document.getElementById('car_name')))
	    {
	     if(company_match(document.getElementById('company_name')))
	     {     
	      if(seats_match(document.getElementById('seats')))
	      {
	       if(fuel_match(document.getElementById('fuel')))
	       {
	    	if(rent_day_match(document.getElementById('rent_day')))
	    	{
	    	 if(rent_km_match(document.getElementById('rent_km')))
	    	 {
	    	  if(no_cars_match(document.getElementById('no_cars')))
	    		  return true;
	    	 }
	    	}
	       }
	      }
	     }
	     return false; 
	    }
	    else
	     return false;
	   } 
	   function car_match(obj_car)
	   {
	    var car_format=/^[A-Za-z0-9 ]+$/;
	    var car_name=obj_car.value;
	    if(car_name.match(car_format))
	     return true;
	    else
	    {
	     alert("Enter character only in field");
	     obj_car.focus();
	     return false;
	    }
	   }
	   function company_match(obj_company)
	   {
	    var company_format=/^[A-Za-z0-9 ]+$/;
	    var company_name=obj_company.value;
	    if(company_name.match(company_format))
	     return true;
	    else
	    {
	     alert("Enter character only in field");
	     obj_company.focus();
	     return false;
	    }
	   }
	   function seats_match(obj_seats)
	   {
	    var seats_format=/^[0-9]+$/;
	    var seats=obj_seats.value;
	    if(seats.match(seats_format))
	     return true;
	    else
	    {
	     alert("Enter Integer no. only");
	     obj_seats.focus();
	     return false;
	    }
	   }
	   function fuel_match(obj_fuel)
	   {
		   var a="Petrol";
		   var b="Diesel";
		   var fuel=obj_fuel.value;
		   if(fuel.match(a)||fuel.match(b))
			 return true;
		   else
		   {
			alert("Choose correct option.");
			obj_fuel.focus();
			return false;
		   }
	   }
	   function rent_day_match(obj_rent_day)
	   {
	    var rent_day_format=/^[0-9]+$/;
	    var rent_day=obj_rent_day.value;
	    if(rent_day.match(rent_day_format))
	     return true;
	    else
	    {
	     alert("Enter Integer no. only");
	     obj_rent_day.focus();
	     return false;
	    }
	   }
	   function rent_km_match(obj_rent_km)
	   {
	    var rent_km_format=/^[0-9.]+$/;
	    var rent_km=obj_rent_km.value;
	    if(rent_km.match(rent_km_format))
	     return true;
	    else
	    {
	     alert("Enter Integer no. only");
	     obj_rent_km.focus();
	     return false;
	    }
	   }
	   function no_cars_match(obj_no_cars)
	   {
	    var no_cars_format=/^[0-9]+$/;
	    var no_cars=obj_no_cars.value;
	    if(no_cars.match(no_cars_format))
	     return true;
	    else
	    {
	     alert("Enter Integer no. only");
	     obj_no_cars.focus();
	     return false;
	    }
	   }