
var melding = "";

function nameValidation(){

    var value = document.querySelector("#fornavn").value;
    var regEx = /^([a-zA-Z]{3,25}[\ ][a-zA-Z]{3,25})|[a-zA-Z]{3,25}$/;
    var ok = regEx.test(value);
    if (ok) {

        return true;

    }
    melding+="Feil format gitt på fornavn./n";
    return false;
}
function lastnameValidation() {

    var value =  document.querySelector("#etternavn").value;
    var regEx = /^([a-zA-Z]{3,25}[\ ][a-zA-Z]{3,25})|[a-zA-Z]{3,25}$/;
    var ok = regEx.test(value);
    if (ok) {
        return true;
    }
    melding+="Feil format gitt på etternavn./n";
    return false;

}

function phoneValidation() {

    var value =  document.querySelector("#telefon").value;
    var regEx = /$[0-9]{8}^/;
    var ok = regEx.test(value);
    if (ok) {
        return true;
    }
    melding+="Feil format gitt på telefonnummer./n";
    return false;

}

function adresseValidation() {

    var value =  document.querySelector("#adresse").value;
    var regEx = /^([a-zA-Z0-9]{3,25}[\ ][a-zA-Z0-9]{2,25})|[a-zA-Z0-9]{2,25}$/;
    var ok = regEx.test(value);
    if (ok) {
        return true;
    }
    melding+="Feil format gitt på adresse./n";
    return false;

}

function postValidation() {

    var value =  document.querySelector("#post").value;
    var regEx = /^[a-zA-Z]{3,25}$/;
    var ok = regEx.test(value);
    if (ok) {
        return true;
    }
    melding+="Feil format gitt på poststed./n";
    return false;

}
function postnrValidation() {

    var value =  document.querySelector("#post").value;
    var regEx = /^[0-9]{4}$/;
    var ok = regEx.test(value);
    if (ok) {
        return true;
    }
    melding+="Feil format gitt på postnummer./n";
    return false;

}

function valAll() {
    var name = nameValidation();
    var lname = lastnameValidation();
    var phone = phoneValidation();
    var adresse = adresseValidation();
    var post = postValidation();
    var postnr = postnrValidation();

    if(name && lname && phone && adresse && post && postnr)
    {
        return true;
    }
    alert(melding);
    return false;
}