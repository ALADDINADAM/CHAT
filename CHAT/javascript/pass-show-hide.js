////


const passfiled = document.querySelector(".form  input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = () => {
    if(passfiled.type == "password") {
        // setTimeout(() => {
        //     passfiled.type = "password";
        // }, 3000);
        passfiled.type = "text";
        toggleBtn.classList.add('active');
    } else {
        passfiled.type = "password";
        toggleBtn.classList.remove('active');
    }
} 