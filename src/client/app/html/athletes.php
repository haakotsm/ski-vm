<script>
    $(document).ready(function () {
        $.get("app/resources/athlete-resource/methods/getAthletes.php", function (resultat) {
            console.log(resultat);
            /*$.each(JSON.parse(resultat), function (index, element) {
             $('#tbody-athletes').append(
             );
             });*/
            $('#tbody-athletes').append(resultat);
        });
    })
</script>

<div id="events">
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1> Utøvere </h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row row-equal carousel-item active mb-5" id="atheleteContainer">
            <table class="table">
                <thead class="bg-info">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                </thead>
                <tbody id="tbody-athletes">
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

