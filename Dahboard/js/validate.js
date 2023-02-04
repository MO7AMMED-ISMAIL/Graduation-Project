let username = document.getElementById("username");
let email = document.getElementById("email");
let password = document.getElementById("password");
let phone = document.getElementById("phone");
let divError = document.getElementById("error");
let arrError = [];
divError.style.display = "none";
//function valid input
function valid() {
    let valid = true;
    let nameRegex = /^[A-Za-z-/\s/][A-Za-z0-9_]/;
    let mailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let phoneRegex = /^(00201|\+201|01)[0-2,5]{1}[0-9]{8}$/;
    let passRegex =  new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    //matching
    let name = username.value.match(nameRegex);
    let validemail = email.value.match(mailRegex);
    let validPhone = phone.value.match(phoneRegex);
    let validPass = password.value.match(passRegex);
    //validation
    if (name == null || name[0].length > 5) {
        arrError.push(`<p>username is must be consist of char[a-z]</p>`);
        valid = false;
    }
    if (validemail == null) {
        arrError.push(`<p>is not valid Email</p>`);
        valid = false;
    }
    if (validPass == null) {
        arrError.push(`<p>Password Must be strong</p>`);
        valid = false;
    }

    if (validPhone == null) {
        arrError.push(`<p>Phone is not valid</p>`);
        valid = false;
    }
    if (arrError.length > 0) {
        divError.style.display = "block";
        divError.innerHTML = arrError.join(" ");
        arrError.length = 0;
    }
    if (valid === false) {
        event.preventDefault();
    }
}
