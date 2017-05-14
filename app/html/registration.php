<script>
    $('#SubmitBtn').click(function (e) {
        e.preventDefault();
        if (valAll()) {
            $.ajax({
                url: 'app/resources/person-resources/methods/addPersonSpectator.php' +
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
    });</script>
<script type="text/javascript" src="app/scripts/fillSelect.js"></script>
<div id="registration">
    <h2 class="col-8 ml-auto mr-auto px-0">Kjøp billetter</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row" id="fornavnForm">
                <label for="fornavn" class="col-2 col-form-label">Fornavn</label>
                <div class="col-10">
                    <input class="form-control" name="fornavn" type="text"
                           placeholder="Ola Nordmann" id="fornavn" oninput="nameValidation()">
                    <small class="form-text text-muted">Fornavn kan inneholde bokstaver mellomrom og bindestrek (-)</small>

                </div>
            </div>
            <div class="form-group row" id="etternavnForm">
                <label for="etternavn" class="col-2 col-form-label">Etternavn</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="etternavn" placeholder="Artisanal kale" id="etternavn"
                           oninput="lastnameValidation()">
                    <small class="form-text text-muted">Etternavn kan inneholde bokstaver mellomrom og bindestrek (-)</small>

                </div>
            </div>
            <div class="form-group row" id="tlfForm">
                <label for="telefon" class="col-2 col-form-label">Telefon</label>
                <div class="col-10">
                    <input class="form-control" name="telefon" type="tel" placeholder="xx xx xx xx" id="telefon"
                           oninput="phoneValidation()">
                    <small class="form-text text-muted">Telefonnummer: 8 siffer. Landskode valgfritt (-)</small>

                </div>
            </div>
            <div class="form-group row" id="adrForm">
                <label for="adresse" class="col-2 col-form-label">Adresse</label>
                <div class="col-10">
                    <input class="form-control" name="adresse" type="text" placeholder="oslo veien, 3c" id="adresse"
                           oninput="adresseValidation()">
                    <small class="form-text text-muted">Adresse kan inneholde bokstaver mellomrom og bindestrek, og husnummer (-)</small>

                </div>
            </div>
            <div class="form-inline form-group row" id="postForm">
                <label class="col-2 col-form-label justify-content-start">Post</label>
                <div class="form-group col-5" id="pstedForm">
                    <input class="form-control col-12" name="poststed" type="text" placeholder="OSLO" id="poststed"
                           oninput="postValidation()">
                    <small class="form-text text-muted">Poststed: Bokstaver, mellomrom og bindestrek</small>

                </div>
                <div class="form-group col-5" id="pnrForm">
                    <input class="form-control col-12" name="postnr" placeholder="0188" id="postnr"
                           oninput="postnrValidation()">
                    <small class="form-text text-muted">Postnummer inneholder 4 siffer</small>

                </div>
            </div>
            <div class="form-inline form-group row" id="selectForm">
                <label class="col-2 col-form-label justify-content-start" for="eventSelect">Velg Øvelse(r)</label>
                <div class="form-group col-10">
                    <select multiple class="form-control col-12" id="eventSelect"></select>
                    <small class="form-text text-muted">Velg en eller flere øvelser du vil kjøpe billett til</small>

                </div>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5">
                Send Inn <i class="fa fa-pencil"></i></button>
        </div>
    </div>
</div>