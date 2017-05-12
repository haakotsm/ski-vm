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
        if (valAll()) {
            $.ajax({
                url: 'app/resources/person-resources/methods/addPerson.php' +
                '?fornavn=' + $('#fornavn').val() + '&etternavn=' + $('#etternavn').val() +
                '&telefon=' + $('#telefon').val() + '&adresse=' + $('#adresse').val() +
                '&poststed=' + $('#poststed').val() + '&postnr=' + $('#postnr').val() +
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
        }
    });
</script>
<div id="registration">
    <h2 class="col-8 ml-auto mr-auto px-0">Registrer til øvelse</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row" id="fornavnForm">
                <label for="fornavn" class="col-2 col-form-label">Fornavn</label>
                <div class="col-10">
                    <input class="form-control" name="fornavn" type="text"
                           placeholder="Ola Nordmann" id="fornavn" oninput="nameValidation()">
                    <div class="form-control-feedback">You've done it! Well done!</div>
                    <small class="form-text text-muted">Fyll inn navn</small>
                </div>
            </div>
            <div class="form-group row" id="etternavnForm">
                <label for="etternavn" class="col-2 col-form-label">Etternavn</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="etternavn" placeholder="Artisanal kale" id="etternavn"
                           oninput="lastnameValidation()">
                </div>
            </div>
            <div class="form-group row" id="tlfForm">
                <label for="telefon" class="col-2 col-form-label">Telefon</label>
                <div class="col-10">
                    <input class="form-control" name="telefon" type="tel" placeholder="xx xx xx xx" id="telefon"
                           oninput="phoneValidation()">
                </div>
            </div>
            <div class="form-group row" id="adrForm">
                <label for="adresse" class="col-2 col-form-label">Adresse</label>
                <div class="col-10">
                    <input class="form-control" name="adresse" type="text" placeholder="oslo veien, 3c" id="adresse"
                           oninput="adresseValidation()">
                </div>
            </div>
            <div class="form-inline row" id="postForm">
                <label class="col-2 justify-content-start">Post</label>
                <div class="col-10">
                    <input class="form-control" name="poststed" type="text" placeholder="OSLO" id="poststed"
                           oninput="postValidation()">
                    <input class="form-control" name="postnr" placeholder="0188" id="postnr"
                           oninput="postnrValidation()">
                </div>
            </div>
            <div class="form-inline row mt-5">
                <label class="col-2 justify-content-start" for="eventSelect">Velg Øvelse(r)</label>
                <select multiple class="form-control col-10" id="eventSelect"></select>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5"> Send Inn <i
                        class="fa-pencil"></i></button>
            <button id="HentKunde" class="btn btn-outline-info mt-5">Hent shit</button>
        </div>
    </div>
</div>