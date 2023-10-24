// 2205667
const navToggle = document.getElementById("nav-toggle")
const nav = document.getElementById("nav__list")

navToggle.addEventListener('click', () => {
    nav.classList.toggle("nav__list--hidden")
})

// function item_added() {
//     const alert = document.querySelector(".cart-alert");
//     alert.play()
// }