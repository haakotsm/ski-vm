var melding = "";

function nameValidation() {
    var form = $("#fornavnForm");
    var input = $("#fornavn");
    var value = input.val();

    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        form.removeClass('has-danger');
        form.addClass('has-success');
        return true;
    }
    form.removeClass('has-success');
    form.addClass('has-danger');
    melding += "Feil format gitt på fornavn./n";
    return false;
}
function lastnameValidation() {
    var form = $("#etternavnForm");

    var value = $("#etternavn").val();
    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        form.removeClass('has-danger');
        form.addClass('has-success');
        return true;
    }
    form.removeClass('has-success');
    form.addClass('has-danger');
    melding += "Feil format gitt på etternavn./n";
    return false;

}

function phoneValidation() {
    var form = $("#tlfForm");

    var value = $("#telefon").val();
    var regEx = /^((0047)?|(\+47)?|(47)?)\d{8}$/;
    var ok = regEx.test(value);
    if (ok) {
        form.removeClass('has-danger');
        form.addClass('has-success');
        return true;
    }
    form.removeClass('has-success');
    form.addClass('has-danger');
    melding += "Feil format gitt på telefonnummer./n";
    return false;

}

function adresseValidation() {
    var form = $("#adrForm");

    var value = $("#adresse").val();
    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)((,? ?)\d+([a-zA-z])?){1}$/;
    var ok = regEx.test(value);
    if (ok) {
        form.removeClass('has-danger');
        form.addClass('has-success');
        return true;
    }
    form.removeClass('has-success');
    form.addClass('has-danger');
    melding += "Feil format gitt på adresse./n";
    return false;

}

function postValidation() {
    var form = $("#postForm");
    var value = $("#poststed").val();
    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        form.removeClass('has-danger');
        form.addClass('has-success');
        return true;
    }
    form.removeClass('has-success');
    form.addClass('has-danger');
    melding += "Feil format gitt på poststed./n";
    return false;

}
function postnrValidation() {
    var form = $("#postForm");

    var value = $("#postnr").val();
    var regEx = /^(\d{4})$/;
    var ok = regEx.test(value);
    if (ok) {
        form.removeClass('has-danger');
        form.addClass('has-success');
        return true;
    }
    form.removeClass('has-success');
    form.addClass('has-danger');
    melding += "Feil format gitt på postnummer./n";
    return false;

}

function valAll() {
    var name = nameValidation();
    var lname = lastnameValidation();
    var phone = phoneValidation();
    var adresse = adresseValidation();
    var post = postValidation();
    var postnr = postnrValidation();

    if (name && lname && phone && adresse && post && postnr) {
        melding = "";
        return true;
    }
    alert(melding);
    melding = "";
    return false;
}

function usernameValidation() {
    var value = document.querySelector("#brukernavn").value;
    var regEx = /^([a-zA-Z]{3,25}[\ ][a-zA-Z]{3,25})|[a-zA-Z]{3,25}$/;
    var ok = regEx.test(value);

    if (ok) {
        return true
    }
    melding += "Feil format tastet på brukernavn, bare tall og bokstaver tillatt /n";
}

function passwordValidation() {
    var value = document.querySelector("#passord").value;
    var regEx = /^([a-zA-Z]{3,25}[\ ][a-zA-Z]{3,25})|[a-zA-Z]{3,25}$/;
    var ok = regEx.test(value);

    if (ok) {
        return true
    }
    melding += "Feil format tastet på passord, bare tall og bokstaver tillatt /n";
}

function validateUser() {
    var username = usernameValidation();
    var password = passwordValidation();

    if (username && password) {
        melding = "";
        return true;
    }

    alert(melding);
    melding = "";
    return false;


}