let email = document.getElementById("email");
let password = document.getElementById("password");

function validateForm() {
    // Checking if email is emppty
    if (email.value.trim() ===""){
       onError(email,"Email cannot be empty");
    }
    else {
        onSuccess(email);
    }
}

document.querySelector("button")
document.addEventListener("click", (event)=>{
    event.preventDefault();
    validateForm();
});

function onSuccess(input){
    let parent = email.parentElement;
        let messageEle = parent.querySelector("small");
        if (messageEle) { // check if messageEle is not null
            messageEle.style.visibility = "hidden";
            messageEle.innerText = "";
          }
}

function onError(input, errorMessage){
    let parent = email.parentElement;
        let messageEle = parent.querySelector("small");
        if (messageEle) { // check if messageEle is not null
            messageEle.style.visibility = "visible";
            messageEle.innerText = errorMessage;
          }
}