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


// const doneBtn = document.getElementById("doneBtn");
// const searchBtn = document.querySelector("id", "searchBtn");
// const input = document.querySelector("id", "search-input");
// const filter = input.value.toLowerCase();
// const nodes = document.getElementsByClassName('value-cell');

// function myFunction() {

//     for (i = 0; i < nodes.length; i++) {
//         if (nodes[i].innerText.toLowerCase().includes(filter)) {
//             nodes[i].style.display = "block";
//         } else {
//             nodes[i].style.display = "none";
//         }
//     }
// }

// myFunction();

// searchBtn.onkeyup = () => {
//     myFunction();
// }
