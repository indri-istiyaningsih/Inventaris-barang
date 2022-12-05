<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail Kategori</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
        		<table class="table table-hover">
        			<tr>
                        <td>Kategori</td>
                        <td><?= $data['nama_kategori']?></td>
                    </tr> 

                    <tr>
                        <td colspan="2">                            
                            <a href="#" onclick="keluar()" title="Kembali">Keluar</a>
                        </td>
                    </tr> 
        		</table>
        	</div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

    function keluar() {
        $("#view_data").html('');
    }

</script>