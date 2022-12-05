<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <td>Nama Barang</td>
                        <td><?= $data['nama_barang']?></td>
                    </tr> 
                    <tr>
                        <td>Kategori</td>
                        <td><?= $data['nama_kategori']?></td>
                    </tr> 
                    <tr>
                        <td>Nama Admin</td>
                        <td><?= $data['nama_admin']?></td>
                    </tr>
                    <tr>
                        <td>Nama Pembuat</td>
                        <td><?= $data['nama_pembuat']?></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td><?= $data['tahun_terbit']?></td>
                    </tr>
                    <tr>
                        <td>Barecode</td>
                        <td><?= $data['barecode']?></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><?= $data['stok']?></td>
                    </tr>
                    <tr>
                        <td>Barang Masuk</td>
                        <td><?= $data['barang_masuk']?></td>
                    </tr>
                    <tr>
                        <td>Barang Keluar</td>
                        <td><?= $data['barang_keluar']?></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="<?php echo base_url('assets/barang/').$data['image']?>" width="150px" alt="image"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Input</td>
                        <td><?= $data['tanggal_input']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Update</td>
                        <td><?= $data['tanggal_update']?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="<?= site_url($this->uri->segment(1))?>" title="Kembali">Kembali</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>