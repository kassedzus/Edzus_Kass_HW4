console.log("Starting my to-do app!");
const regBut = document.getElementById("regBut");
const regForm = document.getElementById("regForm");
const loginForm = document.getElementById("logForm");
const backBtn = document.getElementById("backBtn");

regBut.onclick = () => {
    console.log("Trying to register");
    regForm.style.display = "block";
    loginForm.style.display = "none";
}

backBtn.onclick = () => {
    console.log("Going back to login page");
    regForm.style.display = "none";
    loginForm.style.display = "block";
}