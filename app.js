var username = document.getElementById("username");
var usernameError = document.getElementById("username-error");

username.addEventListener('input', function (e){

var userpattern = /^[A-Za-z][A-Za-z0-9_]{7,29}$/;
var currentValue = e.target.value;
var vlera = userpattern.test(currentValue);

if(vlera){
    usernameError.style.display = 'none';
}else{
    usernameError.style.display  = 'block';
}
})

var password = document.getElementById("password");
var passwordError = document.getElementById("password-error");

password.addEventListener('input', function (e){

var userpattern1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
var currentValue1 = e.target.value;
var vlera1 = userpattern1.test(currentValue1);


if(vlera1){
    passwordError.style.display = 'none';
}else{
    passwordError.style.display  = 'block';
}
})