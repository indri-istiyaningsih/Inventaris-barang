<div id="view_data">
	
</div>

<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
                      
            <a href="#" onclick="tambah()" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"> Tambah Data</i></a>
            Jumlah Data : <?= $data->num_rows(); ?>
            <hr>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$no = 1;
					foreach ($data->result_array() as $row) {

						//Primary key dr table
						$id = $row['id_kategori'];
				
				?>	
				<tr>
					<td><?= $no; ?></td>
					<td><?= $row['nama_kategori'] ?></td>
					<td>
						<a href="#" onclick="detail('<?= $id ?>')" title="Detail">Detail</a> | 
						<a href="#" onclick="edit('<?= $id ?>')" title="Edit">Edit</a> | 

						<a href="<?= site_url($this->uri->segment(1).'/delete/'.$id)?>" title="Delete" onclick="return confirm('Want to delete?')">Delete</a>
					</td>
				</tr>
				<?php					
						$no++;
					}
				?>
			</tbody>
		</table>
		<small>
			Note : Pada bagian tambah, lihat detail, dan edit menggunakan JQuery Ajax
		</small>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

	function detail(id) {
		$.ajax({
	        url: '<?php echo site_url('Kategori/detail/')?>'+id,
	        type: 'POST',
	        data: 'id='+id,
	        success: function(a){
	            $("#view_data").html(a);
	        }
	    });
		
	}

	function edit(id) {
		$.ajax({
	        url: '<?php echo site_url('Kategori/edit/')?>'+id,
	        type: 'POST',
	        data: 'id='+id,
	        success: function(a){
	            $("#view_data").html(a);
	        }
	    });
		
	}

	function tambah() {
		$.ajax({
	        url: '<?php echo site_url('Kategori/add/')?>',
	        type: 'POST',
	        data: '',
	        success: function(a){
	            $("#view_data").html(a);
	        }
	    });
		
	}

</script>