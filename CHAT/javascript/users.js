////\
const searchBar = document.querySelector('.users .search input'),
searchBtn = document.querySelector('.users .search button'),
userlist = document.querySelector('.users .user-list');



searchBtn.onclick = () => {
    searchBar.classList.toggle('active');
    searchBar.focus();
    searchBtn.classList.toggle('active');
    searchBar.value = "";
}
searchBar.onkeyup = ()=> {
    let searchTerm = searchBar.value;
    if(searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/search.php",true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                userlist.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("searchTerm=" + searchTerm);

} 
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./users.php",true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if(!searchBar.classList.contains('active')) {
                    userlist.innerHTML = data;
                } else {
                }
            }
        }
    }
    xhr.send();
}, 1000);