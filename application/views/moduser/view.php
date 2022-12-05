<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
                      
            <a href="<?= site_url($this->uri->segment(1).'/add')?>" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"> Tambah Data</i></a>
            Jumlah Data : <?= $data->num_rows(); ?>
            <hr>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$no = 1;
					foreach ($data->result_array() as $row) {

						//Primary key dr table
						$id = $row['email'];
				
				?>	
				<tr>
					<td><?= $no; ?></td>
					<td><?= $row['nama'] ?></td>
					<td><?= $row['email'] ?></td>
					<td>
						<a href="<?= site_url($this->uri->segment(1).'/detail/'.$id)?>" title="Detail">Detail</a> | 
						<a href="<?= site_url($this->uri->segment(1).'/edit/'.$id)?>" title="Edit">Edit</a> | 
						<a href="<?= site_url($this->uri->segment(1).'/delete/'.$id)?>" title="Delete" onclick="return confirm('Want to delete?')">Delete</a> |  
						<a href="<?= site_url($this->uri->segment(1).'/reset/'.$id)?>" title="Reset Password" onclick="return confirm('Yakin Akan Reset Password?')">Reset</a>
					</td>
				</tr>
				<?php					
						$no++;
					}
				?>
			</tbody>
		</table>
		<small>
			Reset : 123456<br>
			Note : ketika password direset, otomatis password menjadi 123456
		</small>
        </div>
    </div>
</div>