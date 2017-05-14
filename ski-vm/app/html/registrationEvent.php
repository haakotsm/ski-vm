<script>
    $('#SubmitBtn').click(function (e) {
        e.preventDefault();
        if (valAddOvelse()) {
            $.ajax({
                url: 'app/resources/person-resources/methods/addPersonAthlete.php' +
                '?name=' + $('#name').val() + '&record=' + $('#record').val() + '&recordHolder=' + $('#recordHolder'),
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
<div id="registrationEvent">
    <h2 class="col-8 ml-auto mr-auto px-0">Legg til øvelse</h2>
    <div class="card col-8 ml-auto mr-auto px-0 pb-2">
        <div class="card-block">
            <div class="form-group row" id="nameForm">
                <label for="navn" class="col-2 col-form-label">Navn på øvelse</label>
                <div class="col-10">
                    <input class="form-control" name="name" type="text"
                           placeholder="Eksempel: Langrenn" id="name" oninput="valOvelse()">
                    <small class="form-text text-muted">Fyll inn navn på øvelse</small>
                </div>
            </div>
            <div class="form-group row" id="recordForm">
                <label for="record" class="col-2 col-form-label">Rekord</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="record" placeholder="35:50" id="record" oninput="valRekord()">
                    <small class="form-text text-muted">Rekord Fyll inn fornavn. Fornavn kan inneholde bokstaver, tall, mellomrom og bindestrek (-) </small>
                </div>
            </div>
            <div class="form-group row" id="recordHolderForm">
                <label for="recordHolder" class="col-2 col-form-label">Rekordholder</label>
                <div class="col-10">
                    <input class="form-control" name="recordHolder" type="tel" placeholder="Tor Krattebøl"
                           id="recordHolder"oninput="valRekordHolder()">
                    <small class="form-text text-muted">Rekordholders navn kan inneholde bokstaver mellomrom og bindestrek (-)</small>
                </div>
            </div>
            <button type="submit" id="SubmitBtn" class="btn btn-outline-primary mt-5">
                Send Inn <i class="fa fa-pencil"></i></button>
        </div>
    </div>
</div>