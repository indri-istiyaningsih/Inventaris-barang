<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
        		
            	<div id='message'>
                    <?php echo $this->session->flashdata('message');?>
                </div>

                <div class="alert alert-info">
                    Email dan Password tidak perlu diedit<br>
                    Gambar bisa diedit
                </div>

                <form class="form-group" method="post" action="<?= site_url($this->uri->segment(1).'/update/'.$this->uri->segment(3))?>" enctype="multipart/form-data">
            		<table class="table table-hover">

            			<tr>
            				<td>Nama</td>
            				<td><input type="text" class="form-control" name="nama" value="<?= $row['nama']?>" placeholder="Nama User" required></td>
            			</tr>

                        <tr>
                            <td>Department</td>
                            <td>
                                <select name="role_id" class="form-control" required>
                                    <option value="<?= $row['id']?>"><?= $row['department']?></option>
                                    <?php
                                        foreach ($data->result_array() as $r) {
                                            echo "
                                                <option value='$r[id]'>$r[department]</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Is Active</td>
                            <td>
                                <select class="form-control" name="is_active" required>
                                    <option value="<?= $row['is_active']?>"><?= $row['is_active']?></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                        </tr>
            			<tr>
            				
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