$(function() {
    ///////////////////////////////////////////////////////////////////////////
    //box shadow za objave na domači strani
    ///////////////////////////////////////////////////////////////////////////
    var link = $("a.main-content");
    //ko je uporabnikova miška v div.post dodaj box shadow za ta element
    link.on("mouseenter", function(){
        $(this).parent().css("box-shadow", "0px 2px 6px 0px rgb(181,181,181");
    });
    //ko uporabnik zapusti div.post zmanjšaj box shadow za ta element
    link.on("mouseleave", function(){
        $(this).parent().css("box-shadow", "0px 2px 2px -2px rgb(181,181,181)");
    });

    ///////////////////////////////////////////////////////////////////////////
    //validacija za novega uporabnika
    ///////////////////////////////////////////////////////////////////////////
    document.forms["userInsert"].onsubmit = function isInsertValid(){
        //validiranje username-a
        //pridobim formo, za dodajanje uporabnikov
        var form = document.forms["userInsert"];
        //pridobim prvi element v formi
        var username = form.elements["username"];
        //če ustvariš regex z constructorjem, potem nerabiš /
        //validacija uporabniškega imena s pomočjo regular expr
        //ustvarim regex za username
        var reg = new RegExp("^[a-zA-Z0-9]+$");
        //če je polje večje od 4 in manjše od 20 ter je test funkcija vrnila true -> vse je vredu
        if(username.value.length >= 4 && username.value.length <= 20 && reg.test(username.value) === true){
            username.style.backgroundColor = "rgb(148, 255, 143)";
            var span = form.querySelector(".add-err1");
            span.style.display = "none";
        } else {
            var span = form.querySelector(".add-err1");
            span.innerHTML = "Dovoljene so samo črke A-Z ter števila!";
            span.style.display = "initial";
            username.style.backgroundColor = "rgb(255, 111, 111)";
            return false;
        }

        //validacija emaila z regexi
        var email = form.elements["email"];
        //dodam regex za validacijo emaila
        var reg = new RegExp("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$");
        //če email ne vsebuje prepovedanih characterjev je email validen
        if(reg.test(email.value) === true){
            email.style.backgroundColor = "rgb(148, 255, 143)";
            var span = form.querySelector(".add-err2");
            span.style.display = "none";
        } else {
            email.style.backgroundColor = "rgb(255, 111, 111)";
            var span = form.querySelector(".add-err2");
            span.style.display = "initial";
            span.innerHTML = "Neveljaven email";
            return false;
        }

        //validacija gesla
        var password1 = form.elements["password1"];
        var password2 = form.elements["password2"];
        //če nista obe polja prazna
        if(!(password1.value === "" || password1.value === null) && !(password2.value === "" || password2.value === null)){
            //preveri če sta vrednosti 1. in 2. polja isti
            if(password1.value === password2.value){
                //dodam regex za gesli
                var reg = new RegExp("^[a-zA-Z0-9]+$");
                //če je geslo večje od 6 znakov ter krajše od 60 in test funkcija vrne true za regex -> je vse vredu
                if(password1.value.length >= 6 && password1.value.length <= 60 && reg.test(password1.value) === true){
                    password1.style.backgroundColor = "rgb(148, 255, 143)";
                    password2.style.backgroundColor = "rgb(148, 255, 143)";
                    var span = form.querySelector(".add-err3");
                    span.style.display = "none";
                } else{
                    password1.style.backgroundColor = "rgb(255, 111, 111)";
                    password2.style.backgroundColor = "rgb(255, 111, 111)";
                    var span = form.querySelector(".add-err3");
                    span.innerHTML = "Prekratko geslo/dovoljene so črke A-Z ter števila";
                    span.style.display = "initial";
                    return false;
                }
            } else{
                password1.style.backgroundColor = "rgb(255, 111, 111)";
                password2.style.backgroundColor = "rgb(255, 111, 111)";
                var span = form.querySelector(".add-err3");
                span.innerHTML = "Gesli se ne ujemata!";
                span.style.display = "initial";
                return false;
            }
        } else{
            password1.style.backgroundColor = "rgb(255, 111, 111)";
            password2.style.backgroundColor = "rgb(255, 111, 111)";
            var span = form.querySelector(".add-err3");
            span.innerHTML = "Vpišite gesli v obe polji!";
            span.style.display = "initial";
            return false;
        }
    return true;
    }

///////////////////////////////////////////////////////////////////////////////
});
