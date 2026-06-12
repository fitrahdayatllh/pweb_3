<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-lg border-0 mb-4 rounded-4 overflow-hidden">
            <div class="card-header text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2"
                 style="background: linear-gradient(135deg, #4e54c8, #8f94fb); border: none;">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-mortarboard-fill fs-4"></i>
                    <h5 class="mb-0 fw-bold">
                        <?php echo isset($button) && $button === 'Update' ? 'Ubah Program Studi' : 'Tambah Program Studi'; ?>
                    </h5>
                </div>
                <a class="btn btn-light btn-sm rounded-pill px-3" href="<?php echo base_url('prodi') ?>">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body p-4">
                <form action="<?php echo $action; ?>" method="post">

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            name="prodi_name"
                            id="prodi_name"
                            class="form-control <?php echo form_error('prodi_name') ? 'is-invalid' : (isset($_POST['prodi_name']) ? 'is-valid' : ''); ?>"
                            value="<?php echo set_value('prodi_name', isset($prodi['prodi_name']) ? $prodi['prodi_name'] : ''); ?>"
                            placeholder="Masukkan Nama Prodi">
                        <label for="prodi_name">Nama Prodi</label>
                        <?php if (form_error('prodi_name')): ?>
                            <div class="invalid-feedback"><?php echo form_error('prodi_name'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="prodi_strata" id="prodi_strata"
                            class="form-select <?php echo form_error('prodi_strata') ? 'is-invalid' : (isset($_POST['prodi_strata']) ? 'is-valid' : ''); ?>">
                            <option value="">-- Pilih Strata --</option>
                            <?php
                            $strata_list = ['D3', 'S1', 'S2', 'S3'];
                            $selected_strata = set_value('prodi_strata', isset($prodi['prodi_strata']) ? $prodi['prodi_strata'] : '');
                            foreach ($strata_list as $s):
                            ?>
                            <option value="<?php echo $s; ?>" <?php echo $selected_strata === $s ? 'selected' : ''; ?>>
                                <?php echo $s; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="prodi_strata">Strata</label>
                        <?php if (form_error('prodi_strata')): ?>
                            <div class="invalid-feedback"><?php echo form_error('prodi_strata'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-floating mb-4">
                        <select name="fakultas_id" id="fakultas_id"
                            class="form-select <?php echo form_error('fakultas_id') ? 'is-invalid' : (isset($_POST['fakultas_id']) ? 'is-valid' : ''); ?>">
                            <option value="">-- Pilih Fakultas --</option>
                            <?php
                            $selected_fak = set_value('fakultas_id', isset($prodi['fakultas_id']) ? $prodi['fakultas_id'] : '');
                            foreach ($fakultas as $f):
                            ?>
                            <option value="<?php echo $f['fakultas_id']; ?>" <?php echo $selected_fak == $f['fakultas_id'] ? 'selected' : ''; ?>>
                                <?php echo $f['fakultas_name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="fakultas_id">Fakultas</label>
                        <?php if (form_error('fakultas_id')): ?>
                            <div class="invalid-feedback"><?php echo form_error('fakultas_id'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-check-circle"></i>
                            <?php echo isset($button) ? $button : 'Simpan'; ?>
                        </button>
                        <a href="<?php echo base_url('prodi'); ?>" class="btn btn-outline-secondary rounded-pill px-4">
                            Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>