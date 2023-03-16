function validateForm() {
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    if (email.value =="" || password.value ==""){
        alert("No blank valus allowed");
        return false;
    }
    else {
        true;
    }
}