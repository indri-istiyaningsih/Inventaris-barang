<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
        		
            	<div id='message'>
                    <?php echo $this->session->flashdata('message');?>
                </div>

            	<form class="form-group" method="post" action="<?= site_url($this->uri->segment(1).'/save')?>" enctype="multipart/form-data">
            		<table class="table table-hover">
            			<tr>
            				<td>Email</td>
            				<td><input type="text" class="form-control" name="email" placeholder="Email User" required></td>
            			</tr> 
            			<tr>
            				<td>Nama</td>
            				<td><input type="text" class="form-control" name="nama" placeholder="Nama User" required></td>
            			</tr> 
                        <tr>
                            <td>Password</td>
                            <td><input type="password" class="form-control" name="password" required></td>
                        </tr>
                        <tr>
                            <td>Ulangi Password</td>
                            <td><input type="password" class="form-control" name="password_retry" required></td>
                        </tr> 
                        <tr>
                            <td>Department</td>
                            <td>
                                <select name="department" class="form-control" required>
                                    <?php
                                        foreach ($data->result_array() as $row) {
                                            echo "
                                                <option value='$row[id]'>$row[department]</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" name="image" required><br>
                                <small>
                                    type file : jpg / png; max size: 512 kb
                                </small>
                            </td>
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