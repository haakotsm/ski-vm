<script>
    $(document).ready(function () {
            $.get("app/resources/event-resources/methods/getEvents.php", function (resultat) {
            $.each(JSON.parse(resultat), function (index, element) {
                var athleteArray = [];
                $.ajax({url: "app/resources/athlete-resource/methods/getAthleteForEvent.php?eventId=" + index,
                    type: 'get',
                    async: false,
                    success: function (resultat) {
                    $.each(JSON.parse(resultat), function (index, element) {
                        athleteArray.push(element);
                    });
                }});

                $('#eventContainer').append('' +
                    '<div class="card col-4 bg-info"> ' +
                        '<div class="card-block p-t-2">' +
                            '<h2 class="justify-content-start">'+ element.navn +'</h2>' +
                            '<b">Verdensrekord: </b><br>' + element.rekordholder + ' | ' + element.verdensrekord +
                        '</div>' +
                        '<div class="card-block p-t-2 bg-faded">' +
                            '<h3 class="justify-content-start"> Deltagere: </h3>' +
                            '<div class="dropdown-divider"></div>' +
                                "<div id='athletes" + (index) + "'>" +
                                '</div>' +
                            '</div>' +
                        '</div>'
                )

                for (var i = 0; i < athleteArray.length; i++) {
                    $('#athletes'+(index-1)).append(athleteArray[i].fornavn + ' ' + athleteArray[i].etternavn + '<br>');
                }
            });
        });
    })
</script>
<table id="myTable" class="table table-sm table-hover">
</table>
<div id="events">
    <section class="container p-t-3">
        <div class="row">
            <div class="col-lg-12">
                <h1>Øvelser</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row row-equal carousel-item active mb-5" id="eventContainer">

        </div>
    </div>
</div>
</div>

