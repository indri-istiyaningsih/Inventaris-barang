<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
                <table class="table table-hover">
        			<tr>
        				<td>Email</td>
        				<td><?= $data['email']?></td>
        			</tr> 
        			<tr>
        				<td>Nama</td>
        				<td><?= $data['nama']?></td>
        			</tr> 
                    <tr>
                        <td>Password</td>
                        <td><?= $data['password']?></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><?= $data['department']?></td>
                    </tr>
        			<tr>
        				<td>Image</td>
        				<td><img src="<?php echo base_url('assets/user/').$data['image']?>" width="150px" alt="image"></td>
        			</tr>
                    <tr>
                        <td>Is Active</td>
                        <td><?= $data['is_active']?></td>
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
                            <small>Note : Password dienkripsi menggunakan md5()</small><br>
                            <a href="<?= site_url($this->uri->segment(1))?>" title="Kembali">Kembali</a>
                        </td>
                    </tr>
        		</table>
        	</div>
        </div>
    </div>
</div>