<?php $this->load->view('template_data/head'); ?>

<body>
    <div class="app app-default">
        <?php $this->load->view('template_data/sidebar'); ?>
        <div class="app-container">
            <?php $this->load->view('template_data/navbar'); ?>

            <?php if (validation_errors()) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors() ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class='row'>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Tambah Karyawan
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" class="form form-horizontal">
                                <div class="section">
                                    <div class="section-title">Information</div>
                                    <div class="section-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kode Karyawan*</label>
                                            <div class="col-md-9">
                                                <input type="text" name="kode" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Karyawan*</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nama" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin*</label>
                                            <div class="col-md-9">
                                                <div class="radio radio-inline">
                                                    <input type="radio" name="jenis_kelamin" id="radiol" value="L" checked>
                                                    <label for="radiol">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" name="jenis_kelamin" id="radiop" value="P">
                                                    <label for="radiop">
                                                        Wanita
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Kawin*</label>
                                            <div class="col-md-9">
                                                <select name="status_kawin" class="select2">
                                                    <option value="">Pilih Status Kawin</option>
                                                    <?php
                                                        foreach($statuskawin as $list) {
                                                    ?>
                                                        <option value="<?= $list['id']; ?>"><?= $list['nama']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jumlah Anak*</label>
                                            <div class="col-md-9">
                                                <input type="number" name="jumlah_anak" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir*</label>
                                            <div class="col-md-9">
                                                <select name="pendidikan_terakhir" class="select2">
                                                    <option value="">Pilih Pendidikan Terakhir</option>
                                                    <?php
                                                        foreach($pendidikanterakhir as $list) {
                                                    ?>
                                                        <option value="<?= $list['id']; ?>"><?= $list['nama']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Agama*</label>
                                            <div class="col-md-9">
                                                <select name="agama" class="select2">
                                                    <option value="">Pilih Agama</option>
                                                    <?php
                                                        foreach($agama as $list) {
                                                    ?>
                                                        <option value="<?= $list['id']; ?>"><?= $list['nama']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jabatan*</label>
                                            <div class="col-md-9">
                                                <select name="jabatan" class="select2">
                                                    <option value="">Pilih Jabatan</option>
                                                    <?php
                                                        foreach($jabatan as $list) {
                                                    ?>
                                                        <option value="<?= $list['id']; ?>"><?= $list['nama']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Karyawan*</label>
                                            <div class="col-md-9">
                                                <select name="status_karyawan" class="select2">
                                                    <option value="">Pilih Status Karyawan</option>
                                                    <?php
                                                        foreach($statuskaryawan as $list) {
                                                    ?>
                                                        <option value="<?= $list['id']; ?>"><?= $list['nama']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir*</label>
                                            <div class="col-md-9">
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir*</label>
                                            <div class="col-md-9">
                                                <input type="text" name="tanggal_lahir" class="form-control" placeholder="YYYY-MM-DD" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Asal*</label>
                                            <div class="col-md-9">
                                                <textarea name="alamat_asal" class="form-control" placeholder="" row="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Sekarang*</label>
                                            <div class="col-md-9">
                                                <textarea name="alamat_sekarang" class="form-control" placeholder="" row="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No Telepon</label>
                                            <div class="col-md-9">
                                                <input type="text" name="no_telp" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No KTP</label>
                                            <div class="col-md-9">
                                                <input type="text" name="no_ktp" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No NPWP</label>
                                            <div class="col-md-9">
                                                <input type="text" name="no_npwp" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No BPJS Kesehatan</label>
                                            <div class="col-md-9">
                                                <input type="text" name="no_bpjs_kes" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No BPJS Ketenagakerjaan</label>
                                            <div class="col-md-9">
                                                <input type="text" name="no_bpjs_kerja" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" name="email" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Mulai Kerja</label>
                                            <div class="col-md-9">
                                                <input type="text" name="mulai_kerja" class="form-control" placeholder="YYYY-MM-DD" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">SK Kontrak</label>
                                            <div class="col-md-9">
                                                <input type="text" name="sk_kontrak" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">SK Karyawan</label>
                                            <div class="col-md-9">
                                                <input type="text" name="sk_karyawan" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php $this->load->view('template_data/footer'); ?>
        </div>
    </div>

    <?php $this->load->view('template_data/libs'); ?>
</body>
</html>