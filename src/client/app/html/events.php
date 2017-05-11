<script>
    $(document).ready(function () {
        $.ajax({
            url: 'app/resources/event-resources/methods/getEvents.php',
            type: "GET",
            data: 'json',
            success: function (data) {
                var array = JSON.parse(data);
                console.log(array[0]);
                var table = document.querySelector('#myTable');
                array.forEach(function (event, index) {
                    var row = table.insertRow(index);
                    row.insertCell(0).innerHTML = event['navn'];
                })
            },
            error: function (error) {
                alert(error);
            }
        })
    })
</script>
<table id="myTable"></table>
<div id="events">
    <h2> Øvelser</h2>
    <div id="carouselExampleIndicators" class="ml-auto mr-auto col-8 carousel slide align-items-center"
         data-ride="carousel">
        <ol class="carousel-indicators align-content-center ">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid mx-auto" src="assets/kvinner5km.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto" src="assets/kvinner5km.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto" src="assets/kvinner5km.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

