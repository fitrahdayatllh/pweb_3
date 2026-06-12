<div class="card shadow-lg border-0 mb-4 rounded-4 overflow-hidden">
    <div class="card-header text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2"
         style="background: linear-gradient(135deg, #4e54c8, #8f94fb); border: none;">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-mortarboard-fill fs-4"></i>
            <h5 class="mb-0 fw-bold">Data Program Studi</h5>
        </div>
        <a class="btn btn-light fw-bold rounded-pill px-4 shadow-sm" href="<?php echo base_url('prodi/tambah') ?>">
            <i class="bi bi-plus-circle"></i> Tambah
        </a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table id="datatable" class="table table-hover align-middle w-100 mb-0">
                <thead>
                    <tr class="text-uppercase small text-muted border-bottom">
                        <th class="ps-3">No.</th>
                        <th>Nama Prodi</th>
                        <th>Strata</th>
                        <th>Fakultas</th>
                        <th class="text-center pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prodi as $key => $value): ?>
                    <tr>
                        <td class="ps-3"><?php echo $key + 1; ?></td>
                        <td class="fw-semibold"><?php echo $value['prodi_name']; ?></td>
                        <td>
                            <span class="badge rounded-pill text-bg-info"><?php echo $value['prodi_strata']; ?></span>
                        </td>
                        <td><?php echo $value['fakultas_name']; ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning btn-sm rounded-pill px-3" href="<?php echo base_url('prodi/ubah/' . $value['prodi_id']); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-danger btn-sm rounded-pill px-3 btn-hapus" href="<?php echo base_url('prodi/hapus/' . $value['prodi_id']); ?>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>