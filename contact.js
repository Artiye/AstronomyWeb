var nameError = document.getElementById('name-error')
var emailError = document.getElementById('email-error')
var messageError = document.getElementById('message-error')
var submitError = document.getElementById('submit-error')

function validateName(){
   var name = document.getElementById('contact-name').value;

   if(name.length == 0){
    nameError.innerHTML = 'name is reuqired'
    return false;
   }
 
   if(!name.match(/^[a-zA-Z]+( [a-zA-Z]+)+$/)){
    nameError.innerHTML = 'write full name'
    return false;
   }

    nameError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}


function validateEmail(){
    var email = document.getElementById('contact-email').value

    if(email.length == 0){
        emailError.innerHTML = 'email is required '
        return false;
    }

    

    if(!email.match(/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/)){
      emailError.innerHTML = 'email is invalid'
      return false;
    }

    emailError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}


function validateMessage(){
    var message = document.getElementById('contact-message').value;


    if(message.length == 0){
        messageError.innerHTML = 'message cannot be empty'
        return false;
    }

    if(message.length < 30 ){
        messageError.innerHTML = 'message is too short'
        return false;
    }

    messageError.innerHTML = '<i class="check-symbol">&#10004;</i>'
    return true;
}

function validateForm (){
    if(!validateName() ||  !validateEmail() || !validateMessage()) {
        submitError.display = 'block'
      submitError.innerHTML = 'please fix errors before submiting'
      setTimeout(function(){submitError.display = 'none'}, 3000);
      return false; 
    }
}