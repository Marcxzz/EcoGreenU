let darkmode = localStorage.getItem('darkmode')
const themeSwitch = document.getElementById('theme-switch')
let logo = document.getElementById("logo")

const enableDarkmode = () => {
    document.body.classList.add('darkmode')
    localStorage.setItem('darkmode', 'active')
    logo ? logo.src = "../assets/logo/logo-dark.svg" : ''
}

const disableDarkmode = () => {
    document.body.classList.remove('darkmode')
    localStorage.setItem('darkmode', null)
    logo ? logo.src = "../assets/logo/logo-light.svg" : ''
}

if (darkmode === "active") enableDarkmode()

themeSwitch.addEventListener("click", () => {
    darkmode = localStorage.getItem('darkmode')
    darkmode !== "active" ? enableDarkmode() : disableDarkmode()
})