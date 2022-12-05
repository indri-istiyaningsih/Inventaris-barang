<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Departemnt</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
        		
        	
        	<form class="form-group" action="<?= site_url($this->uri->segment(1).'/update/'.$this->uri->segment(3))?>" method="post">
        		<table class="table table-hover">
        			<tr>
                        <td>Department</td>
                        <td><input type="text" class="form-control" name="department" value="<?= $data['department']?>" placeholder="Nama Department" required></td>
                    </tr> 

                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save
                            </button> 
                            <a href="<?= site_url($this->uri->segment(1))?>" title="Kembali">Kembali</a>
                        </td>
                    </tr> 
        		</table>
        	</form>
        	</div>
        </div>
    </div>
</div>