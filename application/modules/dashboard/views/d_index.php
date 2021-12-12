
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Peta Sebaran Bencana</h3>
                    </div>
                    <div id="map" style="height:470px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- leaflet -->
<script>
    //inisialisasi leaflet
    var map = L.map('map').setView([-1.505562791383256, 117.59910490733944], 5);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/light-v10',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1Ijoia2FyaXNtYWt1cyIsImEiOiJja3dkN3phdmcxYThrMnVxbHRwNWRxbzU1In0.4YL0meWh0DtvnZoc6hBPdA'
    }).addTo(map);

    //meminta data bencana dalam bentuk json ke controller
    $.post("<?= base_url('get_bencana') ?>", function(result) {
        let bound = []; //array untuk menampung koordinat

        //melakukan pengulangan untuk menambahkan marker ke peta
        $.each(result, function(index, value) {
            //membuat variabel yg nanti dimasukan ke popup marker
            let content = '';
            content += '<img src="<?= base_url('uploads/') ?>' + value.photo_bencana + '" class="rounded" width="150">' + '<br>';
            content += '<h5 class="mt-2">' + value.judul_bencana + '</h5>';
            content += 'Tanggal : ' + value.tanggal_kejadian + '<br>';
            content += 'Latitude : ' + value.latitude + '<br>';
            content += 'Longitude : ' + value.longitude + '<br>';
            content += 'Jenis Bencana : ' + value.jenis_bencana + '<br>';
            content += 'Deskripsi : ' + value.deskripsi_bencana + '<br>';

            console.log(value.photo_bencana);

            let marker = L.marker([value.latitude, value.longitude]).addTo(map).bindPopup(content); //buat marker
            bound.push([value.latitude, value.longitude]);
        });

        //map.fitBounds(bound); //zoom map berdasarkan marker yang ada
    }, "json");
</script>