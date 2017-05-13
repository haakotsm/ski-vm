<script>
    $('#SubmitBtn').click(function (e) {
        e.preventDefault();
        if (valAll()) {
            $.ajax({
                url: 'app/resources/person-resources/methods/addPersonAthlete.php' +
                '?firstName=' + $('#firstName').val() + '&lastName=' + $('#lastName').val(),
                type: "POST",
                data: 'json',
                success: function (data) {
                },
                error: function (error) {
                    alert(error);
                }
            })
        }
    });
</script>

<div id="registrationAthlete">
    <h2 class="col-8 ml-auto mr-auto px-0">Legg til utøver</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row" id="firstNameForm">
                <label for="navn" class="col-2 col-form-label">Fornavn</label>
                <div class="col-10">
                    <input class="form-control" name="firstName" type="text"
                           placeholder="Ola" id="firstName" oninput="nameValidation()">
                    <small class="form-text text-muted">Fyll inn navn</small>
                </div>
            </div>
            <div class="form-group row" id="lastNameForm">
                <label for="lastName" class="col-2 col-form-label">Etternavn</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="lastName" placeholder="Nordmann"
                           id="lastName oninput=" nameValidation()">
                </div>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5">
                Send Inn <i class="fa fa-pencil"></i></button>
        </div>
    </div>
</div>