function SignUpFieldCheck(){
    var username = document.forms["SignUp"]["UserName"];  
    var email = document.forms["SignUp"]["Email"];  
    var password = document.forms["SignUp"]["Password"];  
    if (username.value == ""){ 
        window.alert("Please Enter Your Name"); 
        username.focus(); 
        return false; 
    } 
    if (email.value == ""){ 
        window.alert("Please Enter Your Email"); 
        email.focus(); 
        return false; 
    } 
    if (password.value == ""){ 
        window.alert("Please Enter Strong Password"); 
        password.focus(); 
        return false; 
    }
    if (password.value.length <4){ 
        window.alert("Password length must be > 3 "); 
        password.focus(); 
        return false; 
    } 
    return true; 
}