<script>
    $('#SubmitBtn').click(function (e) {
        e.preventDefault();
        if (valAthlete()) {
            $.ajax({
                url: 'app/resources/person-resources/methods/addPersonAthlete.php' +
                '?firstName=' + $('#firstName').val() + '&lastName=' + $('#lastName').val() + '&events=' + $('#eventSelect').val(),
                success: function (data) {
                    alert(data);
                },
                error: function (error) {
                    alert(error);
                }
            })
        }
    });
</script>
<script type="text/javascript" src="app/scripts/fillSelect.js"></script>
<div id="registrationAthlete">
    <h2 class="col-8 ml-auto mr-auto px-0">Legg til utøver</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row" id="fornavnForm">
                <label for="navn" class="col-2 col-form-label">Fornavn</label>
                <div class="col-10">
                    <input class="form-control" name="firstName" type="text"
                           placeholder="Ola" id="fornavn" oninput="nameValidation()">
                    <small class="form-text text-muted">Fyll inn navn</small>
                </div>
            </div>
            <div class="form-group row" id="etternavnForm">
                <label for="lastName" class="col-2 col-form-label">Etternavn</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="lastName" placeholder="Nordmann"
                           id="etternavn" oninput="lastnameValidation()">
                </div>
            </div>
            <div class="form-inline form-group row" id="selectForm">
                <label class="col-2 col-form-label justify-content-start" for="eventSelect">Velg Øvelse(r)</label>
                <div class="form-group col-10">
                    <select multiple class="form-control col-12" id="eventSelect"></select>
                </div>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5">
                Send Inn <i class="fa fa-pencil"></i></button>
        </div>
    </div>
</div>