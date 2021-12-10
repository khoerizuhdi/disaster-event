<div class="page-header text-dark d-print-none">
    <div class="row align-items-center">

        <div class="col">
            <h2 class="page-title">
                Manajemen Bencana
            </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">

                <a href="#" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-bencana">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Bencana
                </a>
            </div>
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
                        <h3 class="card-title">Daftar Bencana</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-vcenter table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Bencana</th>
                                        <th>Janis Bencana</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Tanggal Kejadian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal modal-blur fade" id="modal-add-bencana" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Bencana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('add'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Judul Bencana</label>
                            <input name="judul_bencana" type="text" class="form-control" placeholder="Masukkan judul bencana">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('judul_bencana') ?></div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Jenis Bencana</label>
                            <select name="jenis_bencana_id" class="form-select">
                                <option selected disabled>Pilih jenis bencana</option>
                                <?php foreach ($jenis_bencana as $jenis) : ?>
                                    <option value="<?= $jenis['id'] ?>"><?= $jenis['jenis_bencana'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="text-danger mt-1"><?= form_error('jenis_bencana') ?></div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Kejadian</label>
                            <div class="input-icon">
                                <input name="tanggal_kejadian" type="text" id="datepicker" class=" form-control" placeholder="Masukkan tanggal bencana">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="11" y1="15" x2="12" y2="15" />
                                        <line x1="12" y1="15" x2="12" y2="18" />
                                    </svg>
                                </span>
                            </div>
                            <div class="text-danger mt-1"><?= form_error('tanggal_kejadian') ?></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Latitude</label>
                            <input name="latitude" type="text" class="form-control" placeholder="Masukkan latitude">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('latitude') ?></div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Longitude</label>
                            <input name="longitude" type="text" class="form-control" placeholder="Masukkan longitude">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('longitude') ?></div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control" placeholder="Masukkan alamat">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('alamat') ?></div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Bencana</label>
                            <textarea name="deskripsi_bencana" class="form-control" rows="3" placeholder="Masukkan deskripsi bencana"></textarea>
                        </div>
                        <div class="text-danger mt-1"><?= form_error('deskripsi_bencana') ?></div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Photo Bencana</label>
                            <input name="photo_bencana" type="file" class="form-control" placeholder="Masukkan alamat">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('photo_bencana') ?></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary ms-auto">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Bencana
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo base_url('get_bencana_datatables') ?>",
                "type": "POST"
            },

            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });
</script>

<script>
    $(function() {
        $("#datepicker").datepicker({
            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true,
            orientation: "bottom"
        });
    });
</script>