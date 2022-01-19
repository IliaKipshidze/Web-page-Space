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

var forms = document.querySelectorAll("div.userComments form");
forms[formIndex].style.display = "initial";

let rightArrowDiv = document.getElementsByClassName("rightArrow")[0];
let leftArrowDiv = document.getElementsByClassName("leftArrow")[0];

rightArrowDiv.addEventListener("click", function(){
    var formId = forms[formIndex].id;
    var idNum = formId.substring(formId.indexOf('_')+1);
    var savebtnId = "accessUpdate_".concat(idNum);
    var el = document.getElementById(savebtnId);
    if(el.innerHTML=="გაუქმება"){
        el.click();
    }

    forms[formIndex].style.display = "none";
    if(formIndex == maxIndex) formIndex = 0;
    else formIndex = formIndex + 1;
    forms[formIndex].style.display = "initial";
});

leftArrowDiv.addEventListener("click", function(){
    var formId = forms[formIndex].id;
    var idNum = formId.substring(formId.indexOf('_')+1);
    var savebtnId = "accessUpdate_".concat(idNum);
    var el = document.getElementById(savebtnId);
    if(el.innerHTML=="გაუქმება"){
        el.click();
    }

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

var updateBtns = document.getElementsByClassName('accessUpdate');
let TextBeforeUpdate;

for(let i = 0; i < updateBtns.length; i++) {
    updateBtns[i].addEventListener("click", function() {
        var btnId = updateBtns[i].id;
        var idNum = btnId.substring(btnId.indexOf('_')+1);
        var txtAreaId = idNum.concat("textarea");
        var saveBtnId = idNum.concat("update");
        if(updateBtns[i].innerHTML == "განახლება"){
            TextBeforeUpdate = document.getElementById(txtAreaId).value;
            document.getElementById(txtAreaId).disabled = false;
            document.getElementById(saveBtnId).style.display="initial";
            updateBtns[i].innerHTML = "გაუქმება";
        }
        else{
            if(document.getElementById(txtAreaId).value!=TextBeforeUpdate){
                document.getElementById(txtAreaId).value = TextBeforeUpdate;
            }
            document.getElementById(txtAreaId).disabled = true;
            document.getElementById(saveBtnId).style.display="none";
            updateBtns[i].innerHTML = "განახლება";
        }
    })
}
