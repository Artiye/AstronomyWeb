const navbutton = document.getElementsByClassName('nav-button')[0]
const links = document.getElementsByClassName('links')[0]

navbutton.addEventListener('click' , () => {
links.classList.toggle('active')
});