<div class="page-header text-dark d-print-none">
    <div class="row align-items-center">

        <div class="col">
            <h2 class="page-title">
                Manajemen Bencana
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
                        <h3 class="card-title">Edit Bencana</h3>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('edit/' . $bencana['id']); ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Judul Bencana</label>
                                    <input value="<?= $bencana['judul_bencana'] ?>" name="judul_bencana" type="text" class="form-control" placeholder="Masukkan judul bencana">
                                </div>
                                <div class="text-danger mt-1"><?= form_error('judul_bencana') ?></div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Bencana</label>
                                    <select name="jenis_bencana_id" class="form-select">
                                        <?php foreach ($jenis_bencana as $jenis) : ?>
                                            <option <?php if ($bencana['jenis_bencana_id'] == $jenis['id']) {
                                                        echo 'selected ';
                                                    } ?>value="<?= $jenis['id'] ?>"><?= $jenis['jenis_bencana'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="text-danger mt-1"><?= form_error('jenis_bencana') ?></div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Kejadian</label>
                                    <div class="input-icon">
                                        <input value="<?= $bencana['tanggal_kejadian'] ?>" name="tanggal_kejadian" type="text" id="datepicker" class=" form-control" placeholder="Masukkan tanggal bencana">
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
                                    <input value="<?= $bencana['latitude'] ?>" name="latitude" type="text" class="form-control" placeholder="Masukkan latitude">
                                </div>
                                <div class="text-danger mt-1"><?= form_error('latitude') ?></div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Longitude</label>
                                    <input value="<?= $bencana['longitude'] ?>" name="longitude" type="text" class="form-control" placeholder="Masukkan longitude">
                                </div>
                                <div class="text-danger mt-1"><?= form_error('longitude') ?></div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input value="<?= $bencana['alamat'] ?>" name="alamat" type="text" class="form-control" placeholder="Masukkan alamat">
                                </div>
                                <div class="text-danger mt-1"><?= form_error('alamat') ?></div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Bencana</label>
                                    <textarea name="deskripsi_bencana" class="form-control" rows="3" placeholder="Masukkan deskripsi bencana"><?= $bencana['deskripsi_bencana'] ?></textarea>
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

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ms-auto">
                                <!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                                Edit Bencana
                            </button>
                            <a href="<?= base_url('management') ?>" class="btn btn-link link-secondary">
                                Cancel
                            </a>
                        </div>
                        <?= form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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