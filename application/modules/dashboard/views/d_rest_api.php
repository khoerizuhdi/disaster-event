<div class="page-header text-dark d-print-none">
    <div class="row align-items-center">

        <div class="col">
            <h2 class="page-title">
                REST API
            </h2>
        </div>

    </div>
</div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Panduan Penggunaan REST API Bencana</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h2>GET</h2>
                            <p>Menarik semua data bencana.</p>
                            <input readonly type="text" class="form-control" value="{base_url}/api/bencana">
                            <br>
                            <p>Menarik data bencana berdasarkan ID.</p>
                            <input readonly type="text" class="form-control" value="{base_url}/api/bencana/{id}">
                            <hr>
                        </div>
                        <div class="mb-3">
                            <h2>POST</h2>
                            <p>Menambahkan data bencana baru.</p>
                            <input readonly type="text" class="form-control" value="{base_url}/api/bencana">
                            <br>
                            <p>Parameter yang harus di kirimkan:</p>
                            <ul>
                                <li>judul_bencana</li>
                                <li>jenis_bencana_id</li>
                                <li>latitude</li>
                                <li>longitude</li>
                                <li>deskripsi_bencana</li>
                                <li>photo_bencana</li>
                                <li>tanggal_kejadian</li>
                                <li>alamat</li>
                            </ul>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <h2>PUT</h2>
                            <p>Mengubah data bencana.</p>
                            <input readonly type="text" class="form-control" value="{base_url}/api/bencana/id">
                            <br>
                            <p>Parameter yang harus di kirimkan:</p>
                            <ul>
                                <li>judul_bencana</li>
                                <li>jenis_bencana_id</li>
                                <li>latitude</li>
                                <li>longitude</li>
                                <li>deskripsi_bencana</li>
                                <li>photo_bencana</li>
                                <li>tanggal_kejadian</li>
                                <li>alamat</li>
                            </ul>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <h2>DELETE</h2>
                            <p>Menghapus data bencana.</p>
                            <input readonly type="text" class="form-control" value="{base_url}/api/bencana/id">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>