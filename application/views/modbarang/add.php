<div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        	<div class="table-responsive">
        		<div class="table-responsive">
                
                <div id='message'>
                    <?php echo $this->session->flashdata('message');?>
                </div>

                <form class="form-group" method="post" action="<?= site_url($this->uri->segment(1).'/save')?>" enctype="multipart/form-data">   
                    <table class="table table-hover">
                        <tr>
                            <td>Nama Barang</td>
                            <td><input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required></td>
                        </tr> 

                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select name="id_kategori" class="form-control" required>
                                    <?php
                                        foreach ($kategori->result_array() as $row) {
                                            echo "
                                                <option value='$row[id_kategori]'>$row[nama_kategori]</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Nama Admin</td>
                            <td><input type="text" class="form-control" name="nama_admin" placeholder="Nama Admin" required></td>
                        </tr> 

                        <tr>
                            <td>Nama Pembuat</td>
                            <td><input type="text" class="form-control" name="nama_pembuat" placeholder="Nama Pembuat" required></td>
                        </tr>

                        <tr>
                            <td>Tahun masuk</td>
                            <td>
                                <select class="form-control" name="tahun_terbit" required>
                                    <?php
                                        for ($i=date('Y'); $i >= 1940 ; $i--) { 
                                            echo "<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>BARECODDE</td>
                            <td>
                                <input type="text" id="barecode" class="form-control" name="hasil_isbn" placeholder="code" minlength="13" maxlength="13" required>
                                <input type="text" class="form-control" id="hasil_isbn" name="barecode" placeholder="format code" readonly required>
                                <small>Input hanya angka.</small>
                            </td>
                        </tr>

                        <tr>
                            <td>Barang Masuk</td>
                            <td>
                                <select class="form-control" name="stok" required>
                                    <?php
                                        for ($i=0; $i <= 1000 ; $i++) { 
                                            echo "<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Barang Keluar</td>
                            <td>
                                <select class="form-control" name="barang_keluar" required>
                                    <?php
                                        for ($i=0; $i <= 1000 ; $i++) { 
                                            echo "<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Cover</td>
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
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#isbn").keyup(function() {

            var isbn = $("#isbn").val();

            isbn = isbn.replace("-", "");
            $("#isbn").val(isbn);

            var isbn = $("#isbn").val();
            var kol1 = isbn.substring(0,3);
            var kol2 = isbn.substring(3,6);
            var kol3 = isbn.substring(6,10);
            var kol4 = isbn.substring(10,12);
            var kol5 = isbn.substring(12,13);

            var hasil = kol1 + "-" + kol2 + "-" + kol3 + "-" + kol4 + "-" + kol5;

            $("#hasil_isbn").val(hasil);


        });

    });
</script>