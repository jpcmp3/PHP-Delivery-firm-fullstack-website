function checkEmailValidity(input) {
    var email = input.value;
    if (email.length > 0 && !email.includes("@")) {
        input.setCustomValidity("Невалиден имейл адрес");
    } else {
        input.setCustomValidity("");
    }
}

function checkPasswordValidity(input) {
    var password = input.value;
    if (password.length < 2) {
        input.setCustomValidity("Паролата трябва да съдържа поне 2 символа");
    } else {
        input.setCustomValidity("");
    }
}

function checkPasswordMatch() {
    var password = document.getElementsByName("pwd")[0].value;
    var confirmPassword = document.getElementsByName("pwdrepeat")[0].value;
    if (password !== confirmPassword) {
        document.getElementsByName("pwdrepeat")[0].setCustomValidity("Паролите не съвпадат");
    } else {
        document.getElementsByName("pwdrepeat")[0].setCustomValidity("");
    }
}