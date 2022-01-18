function setActiveMenuListColor(){
    let menu_links = document.querySelectorAll(".menu_list a");
    let bodyID = document.querySelector("body").id;
    for(let i = 0; i<menu_links.length;i++){
        if(menu_links[i].id == bodyID)menu_links[i].style.color = "#35CABF";
    }
}

function passCheck(){
    let passInp = document.getElementById("user_password_reg").value;
    let divForPass = document.getElementById("passSymbols");
    if(passInp.length>=8){
        divForPass.style.backgroundColor = "green";
    }
    else{
        divForPass.style.backgroundColor = "red";
    }
}

function f1() {
    if ( document.getElementById('showPassword1').checked ) {
       document.getElementById('user_password').type = "text";
    } else {
       document.getElementById('user_password').type = "password";
    }
}

function f2() {
    if ( document.getElementById('showPassword').checked ) {
       document.getElementById('user_password_reg').type = "text";
    } else {
       document.getElementById('user_password_reg').type = "password";
    }
}

let formIndex = parseInt(document.getElementById("javascriptIndex").value);
let maxIndex = parseInt(document.getElementById("numOfRecords").value);
console.log(formIndex);
console.log(maxIndex);

var forms = document.querySelectorAll("div.userComments form");
forms[formIndex].style.display = "initial";

let rightArrowDiv = document.getElementsByClassName("rightArrow")[0];
let leftArrowDiv = document.getElementsByClassName("leftArrow")[0];

rightArrowDiv.addEventListener("click", function(){
    forms[formIndex].style.display = "none";
    if(formIndex == maxIndex) formIndex = 0;
    else formIndex = formIndex + 1;
    forms[formIndex].style.display = "initial";
});

leftArrowDiv.addEventListener("click", function(){
    forms[formIndex].style.display = "none";
    if(formIndex == 0) formIndex = maxIndex;
    else formIndex = formIndex - 1;
    forms[formIndex].style.display = "initial";
});

var btns = document.getElementsByClassName('commentbtn');

for(let i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var inds = document.getElementsByClassName('javascriptIndex');
    for(let j=0;j<inds.length;j++){
        inds[j].value=formIndex;
    }
  })
}

