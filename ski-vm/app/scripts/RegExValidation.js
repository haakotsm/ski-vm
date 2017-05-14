var melding = "";

function success(input, form) {
    input.addClass('form-control-success');
    input.removeClass('form-control-danger');
    form.removeClass('has-danger');
    form.addClass('has-success');
}

function danger(input, form) {
    input.removeClass('form-control-success');
    input.addClass('form-control-danger');
    form.removeClass('has-success');
    form.addClass('has-danger');
}


function nameValidation() {
    var form = $("#fornavnForm");
    var input = $("#fornavn");
    var value = input.val();

    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Fornavn kan kun inneholde bokstaver, mellonrom og bindestrek (-). \n";
    return false;
}
function lastnameValidation() {
    var form = $("#etternavnForm");
    var input = $("#etternavn");
    var value = input.val();
    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Etternavn kan kun inneholde bokstaver, mellonrom og bindestrek (-). \n";
    return false;

}

function phoneValidation() {
    var form = $("#tlfForm");
    var input = $("#telefon");
    var value = input.val();
    var regEx = /^((0047)?|(\+47)?|(47)?)\d{8}$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Telefonnumer: 8 siffer. Landskode er valgfritt. \n";
    return false;

}

function adresseValidation() {
    var form = $("#adrForm");
    var input = $("#adresse");
    var value = input.val();
    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)((,? ?)\d+[a-zA-z])?$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Adresse kan kun inneholde bokstaver, mellonrom og bindestrek (-), avslutt med husnummer og evt bokstav. \n";
    return false;

}

function postValidation() {
    var superForm = $("#postForm");
    var form = $("#pstedForm");
    var input = $("#poststed");
    var value = input.val();
    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, superForm);
        success(input, form);
        return true;
    }
    danger(input, form);
    danger(input, superForm);
    melding += "Poststed kan kun inneholde bokstaver, mellonrom og bindestrek (-). \n";
    return false;

}
function postnrValidation() {
    var superForm = $("#postForm");
    var form = $("#pnrForm");
    var input = $("#postnr");
    var value = input.val();
    var regEx = /^(\d{4})$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        success(input, superForm);
        return true;
    }
    danger(input, form);
    danger(input, superForm);
    melding += "Postnummer skal være 4 siffer. \n";
    return false;

}
function valSelect() {
    var events = $('#eventSelect');
    var form = $('#selectForm');
    if (events.val().length > 0) {
        success(events, form);
        return true;
    }
    danger(events, form);
    melding += "Du må velge minst en øvelse. \n";
    return false;
}

function valAthlete() {
    var fornavn = nameValidation();
    var etternavn = lastnameValidation();
    var select = valSelect();
    if (fornavn && etternavn && select) {
        melding = "";
        return true
    }
    return visAlert();
}

function visAlert() {
    alert(melding);
    melding = "";
    return false;
}

function valAll() {
    var name = nameValidation();
    var lname = lastnameValidation();
    var phone = phoneValidation();
    var adresse = adresseValidation();
    var post = postValidation();
    var postnr = postnrValidation();
    var select = valSelect();

    if (name && lname && phone && adresse && post && postnr && select) {
        melding = "";
        return true;
    }
    return visAlert();
}

function usernameValidation() {
    var regEx = /^([a-zA-Z]{3,25}[\ ][a-zA-Z]{3,25})|[a-zA-Z]{3,25}$/;
    var form = $("#brukernavn");
    var input =$("#brukernavnform");
    var value = input.val();
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        success(input, superForm);
        return true;
    }
    danger(input, form);
    danger(input, superForm);
    melding += "Feil format tastet på brukernavn, bare tall og bokstaver tillatt. \n";
    return false;


}

function passwordValidation() {
    var regEx = /^([a-zA-Z]{3,25}[\ ][a-zA-Z]{3,25})|[a-zA-Z]{3,25}$/;
    var form = $('passordform');
    var input= $('passord');
    var value = input.val();
    var ok = regEx.test(value);

    if (ok) {
        success(input, form);
        success(input, superForm);
        return true;
    }
    danger(input, form);
    danger(input, superForm);
    melding += "Feil format tastet på brukernavn, bare tall og bokstaver tillatt. \n";
    return false;

}

function validateUser() {
    var username = usernameValidation();
    var password = passwordValidation();

    if (username && password) {
        melding = "";
        return true;
    }
    return visAlert();
}

function valOvelse() {
    var form = $("#nameForm");
    var input = $("#name");
    var value = input.val();

    var regEx = /^([a-zA-zæøåÆØÅ\- ]+)$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Øvelsens navn kan kun inneholde bokstaver, mellonrom og bindestrek (-). \n";
    return false;
}

function valRekord() {
    var form = $("#recordForm");
    var input = $("#record");
    var value = input.val();

    var ok = value !== "";
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Rekorden kan ikke være tom!. \n";
    return false;
}

function valRekordHolder() {
    var form = $("#recordHolderForm");
    var input = $("#recordHolder");
    var value = input.val();

    var regEx = /^([a-zA-zæøåÆØÅ\- ]+).$/;
    var ok = regEx.test(value);
    if (ok) {
        success(input, form);
        return true;
    }
    danger(input, form);
    melding += "Rekordholders navn kan kun inneholde bokstaver, mellonrom og bindestrek (-). \n";
    return false;
}

function valAddOvelse() {
    var ovelse = valOvelse();
    var tid = valRekord();
    var holder = valRekordHolder();
    if (ovelse && tid && holder) {
        melding = "";
        return true;
    }
    return visAlert();
}