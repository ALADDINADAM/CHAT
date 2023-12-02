const form = document.querySelector('.typeing-area'),
inputFiled = form.querySelector('.input-filed'),
sendBtn = form.querySelector('button'),
chatBox = document.querySelector('.chat-box');

form.onsubmit = (e)=> {
    e.preventDefault();
}
sendBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/insert-chat.php",true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                inputFiled.value = "";
                scrroll();
                // console.log(xhr.response);
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}

chatBox.onmouseenter = ()=> {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=> {
    chatBox.classList.remove("active");
}
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/get-chat.php",true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")) {
                    scrroll();
                }
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}, 1000);

function scrroll() {
    chatBox.scrollTop = chatBox.scrollHeight;
}