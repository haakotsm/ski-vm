/**
 * Created by hakon on 14.05.2017.
 */
$(document).ready(function () {
    console.log("TEST");
    $.get("app/resources/event-resources/methods/getEvents.php", function (resultat) {
        console.log(resultat);
        $.each(JSON.parse(resultat), function (index, element) {
            $('#eventSelect').append('<option value="' + element.id + '">' + element.navn + '</option>');
        });
    });
});