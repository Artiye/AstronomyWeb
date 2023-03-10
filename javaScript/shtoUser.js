var firstNameError = document.getElementById('firstname-error')
var lastNameError = document.getElementById('lastname-error')
var emailError = document.getElementById('email-error')
var passwordError = document.getElementById('password-error')
var userTypeError = document.getElementById('usertype-error')
var addUserError = document.getElementById('submit-error')

function validateFirstName(){
    var firstname = document.getElementById('name').value;

    if(firstname.length == 0){
        firstNameError.innerHTML = 'name required'
        return false;
    }

    if(firstname.length == 1){
        firstNameError.innerHTML = 'invalid name'
        return false;
    }

    if(!firstname.match(/^[a-zA-Z]+$/)){
        firstNameError.innerHTML = 'invalid name given.'
        return false;
    }
    
    firstNameError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}

function validateLastName(){
    var lastname = document.getElementById('lastname').value;

    if(lastname.length == 0){
        lastNameError.innerHTML = 'lastname required'
        return false;
    }

    if(lastname.length == 1){
        lastNameError.innerHTML = 'invalid lastname'
        return false;
    }

    if(!lastname.match(/^[a-zA-Z]+$/)){
        lastNameError.innerHTML = 'invalid lastname given.'
        return false;
    }
    
    lastNameError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}

function validateEmail(){
    var email = document.getElementById('email').value

    if(email.length == 0){
        emailError.innerHTML = 'email is required '
        return false;
    }

    if(!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)){
      emailError.innerHTML = 'email is invalid'
      return false;
    }

    emailError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}

  function validatePassword() {
    var password = document.getElementById('password').value

    const minLength = 8;
    const mustContainUppercase = true;
    const mustContainLowercase = true;
    const mustContainNumber = true;
    const mustContainSpecialCharacter = true;
    //const allowedCharacters = /^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+$/;
  
    if (password.length == 0) {
        passwordError.innerHTML = 'password is required'
       return false;
     }
   
    if (password.length < minLength) {
        passwordError.innerHTML = 'password must be at least 8 characters'
        return false;
    }
    if (mustContainUppercase && !password.match(/[A-Z]/)) {
        passwordError.innerHTML = 'must contain uppercase character'
      return false;
    }
    if (mustContainLowercase && !password.match(/[a-z]/)) {
        passwordError.innerHTML = 'must contain lowercase character'
      return false;
    }
    if (mustContainNumber && !password.match(/\d/)) {
        passwordError.innerHTML = 'must contain number'
      return false;
    }
    if (mustContainSpecialCharacter && !password.match(/[\W_]+/)) {
        passwordError.innerHTML = 'must contain special character'
      return false;
    }

    passwordError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
  }

// function validateUserType(){
// var userType = document.getElementById('userType').value


// if(userType.length == 0 ){
//     userTypeError.innerHTML = 'user type is required'
//     return false;
// }

// if(userType.value === 'user' || userType.value === 'admin'){
//     userTypeError.innerHTML = '<i class="check-symbol">&#10004;</i>'
// return true;
   
// }else{
//     userTypeError.innerHTML = 'user type is invalid'
//     return false;
// }



    const userType = document.getElementById('userType');
    function validateUserType(){
        if(userType.value != 'admin' && userType.value != 'user'){
        userTypeError.innerHTML = 'Please only select user or admin!';
        } else {
            userTypeError.innerHTML = '<i class="check-symbol">&#10004;</i>'
             return true;
        }
    } 



  function validateAddUser (){

    if(!validateFirstName() ||!validateLastName() || !validateEmail() || !validatePassword()  || !validateUserType()) {
        addUserError.display = 'block'
      addUserError.innerHTML = 'please fix errors before submiting'
      setTimeout(function(){addUserError.display = 'none'}, 3000);
      return false; 
    }
      return true; 
   
}




  
  