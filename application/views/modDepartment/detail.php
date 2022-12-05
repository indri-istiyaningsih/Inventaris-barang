<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail Department</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
        		<table class="table table-hover">
        			<tr>
                        <td>Department</td>
                        <td><?= $data['department']?></td>
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