<script>
    $('#SubmitBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'app/resources/person-resources/methods/addPerson.php' +
            '?fornavn=' + $('#fornavn').val() + '&etternavn=' + $('#etternavn').val() +
            '&telefon=' + $('#telefon').val() + '&adresse=' + $('#adresse').val() +
            '&poststed=' + $('#poststed').val() + '&postnr=' + $('#postnr').val(),
            type: "POST",
            data: 'json',
            success: function (data) {
                alert(JSON.stringify(data));
            },
            error: function (error) {
                alert(error);
            }
        })
    })
</script>
<div id="registration">
    <h2 class="col-8 ml-auto mr-auto px-0">Registrer til øvelse</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row">
                <label for="fornavn" class="col-2 col-form-label">Fornavn</label>
                <div class="col-10">
                    <input class="form-control" name="fornavn" type="text" value="Ola Nordmann" id="fornavn">
                </div>
            </div>
            <div class="form-group row">
                <label for="etternavn" class="col-2 col-form-label">Etternavn</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="etternavn" value="Artisanal kale" id="etternavn">
                </div>
            </div>
            <div class="form-group row">
                <label for="telefon" class="col-2 col-form-label">Telefon</label>
                <div class="col-10">
                    <input class="form-control" name="telefon" type="tel" value="xx xx xx xx" id="telefon">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-2 col-form-label">Adresse</label>
                <div class="col-10">
                    <input class="form-control" name="adresse" type="text" value="oslo veien, 3c" id="adresse">
                </div>
            </div>
            <div class="form-inline row">
                <label class="col-2 justify-content-start">Post</label>
                <div id="post" class="col-10">
                    <input class="form-control" name="poststed" type="text" value="OSLO" id="poststed">
                    <input class="form-control" name="postnr" value="0188" id="postnr">
                </div>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5"> Send Inn <i
                        class="fa-pencil"></i></button>
            <button id="HentKunde" class="btn btn-outline-info mt-5">Hent shit</button>
        </div>
    </div>
</div>

