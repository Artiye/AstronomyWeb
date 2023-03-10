var userError = document.getElementById('user-error')
var passwordError = document.getElementById('pass-error')
var submitError = document.getElementById('submit-error2')

function validateUser(){
    var user = document.getElementById('username').value

    if(user.length == 0){
        userError.innerHTML = 'user email is required '
        return false;
    }

    if(!user.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)){
      userError.innerHTML = 'email is invalid'
      return false;
    }

    userError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}
//

function validatePassword(){
 var password = document.getElementById('password').value
 const minLength = 8

 if(password.length == 0 ){
    passwordError.innerHTML = 'password is required'
    return false;
 }

 if(password.length < minLength){
    passwordError.innerHTML = 'password should be at least 8 characters'
    return false; 
 }
 passwordError.innerHTML = '<i class="check-symbol">&#10004;</i>'
 return true;
}

function validateForm(){

    if(!validateUser() ||!validatePassword()) {
        submitError.display = 'block'
      submitError.innerHTML = 'please fix errors before submiting'
      setTimeout(function(){submitError.display = 'none'}, 3000);
      return false; 
    }
    // if(validateFirstName() && validateEmail() && validateLastName()) {
       
    //   submitError.innerHTML = ''
      return true; 
   // }
}