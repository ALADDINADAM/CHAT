const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector('.error-txt');

form.onsubmit = (e)=> {
    e.preventDefault();
}
continueBtn.onclick = ()=> {
    //start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/login-set.php",true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if(data == "success") {
                    console.log(data);
                    location.href = 'user.php';
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}