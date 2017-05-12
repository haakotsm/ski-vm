<script>
    $(document).ready(function () {
        console.log("TEST");
        $.get("app/resources/event-resources/methods/getEvents.php", function (resultat) {
            console.log(resultat);
            $.each(JSON.parse(resultat), function (index, element) {
                $('#eventSelect').append('<option value="' + element.id + '">' + element.navn + '</option>');
            });
        });
    });

    $('#SubmitBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'app/resources/person-resources/methods/addPerson.php' +
            '?fornavn=' + $('#fornavn').val() + '&etternavn=' +$('#etternavn').val() +
            '&telefon=' +$('#telefon').val() + '&adresse=' +$('#adresse').val() +
            '&poststed=' +$('#poststed').val() +  '&postnr=' +$('#postnr').val() +
            '&ovelseid=' + $('#eventSelect').val(),

            type: "POST",
            data: 'json',
            success: function (data) {
                alert(JSON.stringify(data));
            },
            error: function (error) {
                alert(error);
            }
        })
    });

</script>
<script type="text/javascript" src="../scripts/RegExValidation.js"></script>
<div id="registration">
    <h2 class="col-8 ml-auto mr-auto px-0">Registrer til øvelse</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row">
                <label for="fornavn" class="col-2 col-form-label">Fornavn</label>
                <div class="col-10">
                    <input class="form-control" name="fornavn" type="text" value="Ola Nordmann" id="fornavn"
                           onchange="nameValidation()">
                </div>
            </div>
            <div class="form-group row">
                <label for="etternavn" class="col-2 col-form-label">Etternavn</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="etternavn" value="Artisanal kale" id="etternavn"
                           onchange="lastnameValidation()">
                </div>
            </div>
            <div class="form-group row">
                <label for="telefon" class="col-2 col-form-label">Telefon</label>
                <div class="col-10">
                    <input class="form-control" name="telefon" type="tel" value="xx xx xx xx" id="telefon"
                           onchange="phoneValidation()">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-2 col-form-label">Adresse</label>
                <div class="col-10">
                    <input class="form-control" name="adresse" type="text" value="oslo veien, 3c" id="adresse"
                           onchange="adresseValidation()">
                </div>
            </div>
            <div class="form-inline row">
                <label class="col-2 justify-content-start">Post</label>
                <div id="post" class="col-10">
                    <input class="form-control" name="poststed" type="text" value="OSLO" id="poststed"
                           onchange="postValidation()">
                    <input class="form-control" name="postnr" value="0188" id="postnr" onchange="postnrValidation()">
                </div>
            </div>
            <div class="form-inline row mt-5">
                <label class="col-2 justify-content-start" for="eventSelect">Velg Øvelse(r)</label>
                <select multiple class="form-control col-10" id="eventSelect"></select>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5" onsubmit="valAll()"> Send Inn <i
                        class="fa-pencil"></i></button>
            <button id="HentKunde" class="btn btn-outline-info mt-5">Hent shit</button>
        </div>
    </div>
</div>