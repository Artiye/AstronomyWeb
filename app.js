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

