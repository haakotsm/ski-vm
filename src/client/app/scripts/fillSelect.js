/**
 * Created by hakon on 14.05.2017.
 */
$(document).ready(function () {
    $.get("app/resources/event-resources/methods/getEvents.php", function (resultat) {
        $.each(JSON.parse(resultat), function (index, element) {
            $('#eventSelect').append('<option value="' + element.id + '">' + element.navn + '</option>');
        });
    });
});