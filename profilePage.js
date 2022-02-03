let nameFieldOnProfilePage;
let surnameFieldOnProfilePage;
let gmailFieldOnProfilePage;
let passwordFieldOnProfilePage;

document.getElementById("changeNameOnProfilePage").addEventListener("click", function(){
    var clickedBtn = document.getElementById("changeNameOnProfilePage");
    if(clickedBtn.innerHTML == "შეცვლა"){
        nameFieldOnProfilePage = document.getElementById("nameOnProfilePage").value;
        document.getElementById("submitNameOnProfilePage").style.display = "initial";
        document.getElementById("nameOnProfilePage").disabled = false;
        clickedBtn.innerHTML = "გაუქმება";
    }
    else{
        document.getElementById("nameOnProfilePage").value = nameFieldOnProfilePage;
        document.getElementById("submitNameOnProfilePage").style.display = "none";
        document.getElementById("nameOnProfilePage").disabled = true;
        clickedBtn.innerHTML = "შეცვლა";
    }
})

document.getElementById("changeSurnameOnProfilePage").addEventListener("click", function(){
    var clickedBtn = document.getElementById("changeSurnameOnProfilePage");
    if(clickedBtn.innerHTML == "შეცვლა"){
        surnameFieldOnProfilePage = document.getElementById("surnameOnProfilePage").value;
        document.getElementById("submitSurnameOnProfilePage").style.display = "initial";
        document.getElementById("surnameOnProfilePage").disabled = false;
        clickedBtn.innerHTML = "გაუქმება";
    }
    else{
        document.getElementById("surnameOnProfilePage").value = surnameFieldOnProfilePage;
        document.getElementById("submitSurnameOnProfilePage").style.display = "none";
        document.getElementById("surnameOnProfilePage").disabled = true;
        clickedBtn.innerHTML = "შეცვლა";
    }
})

document.getElementById("changeGmailOnProfilePage").addEventListener("click", function(){
    var clickedBtn = document.getElementById("changeGmailOnProfilePage");
    if(clickedBtn.innerHTML == "შეცვლა"){
        gmailFieldOnProfilePage = document.getElementById("gmailOnProfilePage").value;
        document.getElementById("submitGmailOnProfilePage").style.display = "initial";
        document.getElementById("gmailOnProfilePage").disabled = false;
        clickedBtn.innerHTML = "გაუქმება";
    }
    else{
        document.getElementById("gmailOnProfilePage").value = gmailFieldOnProfilePage;
        document.getElementById("submitGmailOnProfilePage").style.display = "none";
        document.getElementById("gmailOnProfilePage").disabled = true;
        clickedBtn.innerHTML = "შეცვლა";
    }
})

document.getElementById("changePasswordOnProfilePage").addEventListener("click", function(){
    var clickedBtn = document.getElementById("changePasswordOnProfilePage");
    if(clickedBtn.innerHTML == "შეცვლა"){
        passwordFieldOnProfilePage = document.getElementById("passwordOnProfilePage").value;
        document.getElementById("submitPasswordOnProfilePage").style.display = "initial";
        document.getElementById("passwordOnProfilePage").disabled = false;
        clickedBtn.innerHTML = "გაუქმება";
        
        document.getElementById("passwordOnProfilePageLabel").innerHTML = "ახალი პაროლი:";
        var para1 = document.createElement("label");
        var para2 = document.createElement("br");
        var para4 = document.createElement("br");
        var para3 = document.createElement("input");
        para1.innerHTML = "მოქმედი პაროლი:";

        para3.setAttribute("type", "password");
        para3.setAttribute("id", "oldPasswordOnProfilePage");
        para3.setAttribute("name", "oldPasswordOnProfilePage");

        para1.setAttribute("class", "tmpOnProfilePage");
        para2.setAttribute("class", "tmpOnProfilePage");
        para3.setAttribute("class", "tmpOnProfilePage");
        para4.setAttribute("class", "tmpOnProfilePage");
        
        var element = document.getElementById("bioOnProfilePageForm");
        var child = document.getElementById("passwordOnProfilePageLabel");
        element.insertBefore(para1, child);
        element.insertBefore(para2, child);
        element.insertBefore(para3, child);
        element.insertBefore(para4, child);
    }
    else{
        document.getElementById("passwordOnProfilePage").value = passwordFieldOnProfilePage;
        document.getElementById("submitPasswordOnProfilePage").style.display = "none";
        document.getElementById("passwordOnProfilePage").disabled = true;
        clickedBtn.innerHTML = "შეცვლა";

        document.getElementsByClassName("tmpOnProfilePage")[0].remove();
        document.getElementsByClassName("tmpOnProfilePage")[0].remove();
        document.getElementsByClassName("tmpOnProfilePage")[0].remove();
        document.getElementsByClassName("tmpOnProfilePage")[0].remove();

        document.getElementById("passwordOnProfilePageLabel").innerHTML = "პაროლი:";
    }
})

document.getElementById("changeProfilePictureOnProfilePage").addEventListener("click", function(){
    var clickedBtn = document.getElementById("changeProfilePictureOnProfilePage");
    if(clickedBtn.innerHTML == "ფოტოს შეცვლა"){
        
        var para = document.createElement("input");
        para.setAttribute("type", "file");
        para.setAttribute("id", "changedProfilePicture");
        para.setAttribute("name", "changedProfilePicture");
        para.style.marginBottom = "20px";
        para.style.color = "White";

        var element = document.getElementById("profilePictureOnProfilePageForm");
        var child = document.getElementById("changeProfilePictureOnProfilePage");
        element.insertBefore(para, child);

        document.getElementById("submitProfilePictureOnProfilePage").style.display = "initial";
        
        clickedBtn.innerHTML = "გაუქმება";
    }
    else{

        document.getElementById("changedProfilePicture").remove();
        document.getElementById("submitProfilePictureOnProfilePage").style.display = "none";
        
        clickedBtn.innerHTML = "ფოტოს შეცვლა";
    }
})