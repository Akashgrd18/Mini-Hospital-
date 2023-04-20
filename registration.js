function validate()
{
    var name = (document.getElementById('name').value).trim();
    var age = (document.getElementById('age').value).trim();
    var gender = (document.getElementById('gender').value).trim();
    var phone = (document.getElementById('phone').value).trim();
    var address = (document.getElementById('address').value).trim();

    
    var exp = /^[a-zA-Z]+$/;
    if(name=="")
    {
        document.getElementById("nameErr").innerHTML = "Name Cannot be empty";
        return false;
    }
    
    else if(!name.match(exp))
    {
        document.getElementById("nameErr").innerHTML = "Invalid Name";
        return false;
    }
    else if(name.length<2)
    {
        document.getElementById("nameErr").innerHTML = "Invalid Name";
        return false;
    }
    else 
    {
        document.getElementById("nameErr").innerHTML = "";
    }



    if(age=="")
    {
        document.getElementById("ageErr").innerHTML = "Age Cannot be empty";
        return false;
    }
    else
    {
        document.getElementById("ageErr").innerHTML = "";
    }

    if(gender=="")
    {
        document.getElementById("genderErr").innerHTML = "Gender Cannot be empty";
        return false;
    }
    else
    {
        document.getElementById("genderErr").innerHTML = "";
    }

    if(phone=="")
    {
        document.getElementById("phoneErr").innerHTML = "Phone Cannot be empty";
        return false;
    }

    else if(phone.length<10 || phone.length>10)
    {
        document.getElementById("phoneErr").innerHTML = "Please enter valid Number";
        return false;
    }
    else
    {
        document.getElementById("phoneErr").innerHTML = "";
    }

    if(address=="" )
    {
        document.getElementById("addressErr").innerHTML = "Address Cannot be empty";
        return false;
    }

    else if(!address.match(exp) )
    {
        document.getElementById("addressErr").innerHTML = "Please Enter Valid Address";
        return false;
    }
    else{
        document.getElementById("addressErr").innerHTML = "";
    }

}
    
