
function validateForm() {
    var weight = document.getElementById("weight").value;
    var length = document.getElementById("length").value;
    var width = document.getElementById("width").value;
    var height = document.getElementById("height").value;
    var isValid = true;

    if (weight.trim() === "") {
        document.getElementById("weightError").innerHTML = "Моля, въведете тегло.";
        isValid = false;
    } else {
        document.getElementById("weightError").innerHTML = "";
    }

    if (length.trim() === "") {
        document.getElementById("lengthError").innerHTML = "Моля, въведете дължина.";
        isValid = false;
    } else {
        document.getElementById("lengthError").innerHTML = "";
    }

    if (width.trim() === "") {
        document.getElementById("widthError").innerHTML = "Моля, въведете широчина.";
        isValid = false;
    } else {
        document.getElementById("widthError").innerHTML = "";
    }

    if (height.trim() === "") {
        document.getElementById("heightError").innerHTML = "Моля, въведете височина.";
        isValid = false;
    } else {
        document.getElementById("heightError").innerHTML = "";
    }

    return isValid;
}