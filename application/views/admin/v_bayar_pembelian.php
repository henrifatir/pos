<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Primanto_tech">

    <title>Management Bayar Pembelian</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <?php $t=$this->session->userdata('toko'); ?>
                <?php $i=$this->session->userdata('id_toko'); ?>
                <h1 class="page-header">Pembayaran
                    <small>Pembelian Barang</small> <?php echo $t?>
                   
                </h1>
            </div>
            
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>No Faktur</th>
                        <th>Suplier</th>
                        <th>Tanggal Beli</th>
                        <th>Total Beli</th>
                        <th>Total Bayar</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($bayar->result_array() as $a):
                        $no++;
                        $id=$a['beli_nofak'];
                        $suplier=$a['suplier_nama'];
                        $tgl=$a['beli_tanggal'];
                        $total_beli=$a['total'];
                        $total_bayar=$a['bayar'];
                ?>
                    <tr>
                        <?php if ($total_beli==$total_bayar) {
                            $warna='white';
                           
                        }else{
                            $warna='aqua';
                          
                        }
                        ?>
                        <td style="text-align:center;background-color: <?php echo $warna;?>"><?php echo $no;?></td>
                        <td style="background-color: <?php echo $warna;?>"><?php echo $id;?></td>
                        <td style="background-color: <?php echo $warna;?>"><?php echo $suplier;?></td>
                        <td style="background-color: <?php echo $warna;?>"><?php echo $tgl;?></td>
                        <td style="background-color: <?php echo $warna;?>"><?php echo 'Rp '. number_format($total_beli);?></td>
                        <td style="background-color: <?php echo $warna;?>"><?php echo 'Rp '. number_format($total_bayar);?></td>
                        <td style="text-align:center;background-color: <?php echo $warna;?>">
                         <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
       
        <!-- ============ MODAL EDIT =============== -->
        <?php
  
                    foreach ($bayar->result_array() as $a) {
                        $id=$a['beli_nofak'];
                        $suplier=$a['suplier_nama'];
                        $tgl=$a['beli_tanggal'];
                        $total_beli=$a['total'];
                        $totall_beli=$a['bayar'];
                     
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pembayaran Pembelian Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/bayar_pembelian/edit_bayar'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nomor Faktur</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Suplier</label>
                            <div class="col-xs-9">
                                <input name="suplier" class="form-control" type="text" value="<?php echo $suplier;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-xs-3" >Tanggal Pembelian</label>
                            <div class="col-xs-9">
                                <input name="tgl_beli" class="form-control" type="text" value="<?php echo $tgl;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-xs-3" >Total Pembelian</label>
                            <div class="col-xs-9">
                                <input name="total_beli" class="form-control" type="text" value="<?php echo $total_beli;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-xs-3" >Bayar</label>
                            <div class="col-xs-9">
                                <input name="bayar" class="form-control" type="text"  placeholder="Kode Barang..." style="width:335px;" >
                            </div>
                        </div>

                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($bayar->result_array() as $a) {
                        $id=$a['beli_nofak'];
                       
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/hapus_barang'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!--END MODAL-->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2017';?> by Primanto_tech</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        function forder(){
              $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/barang/pindah';?>",
               success: function(msg){
               }
           });
        }
    </script>
    <script type="text/javascript">
        
   function TES() {
              $.ajax({
                type: 'get',
                url: '<?php echo base_url().'admin/barang/TES';?>',
                data: {tgl: tgl, id: idtes, unit:unit,},
                success: function (resp) {

                  // internal function for displaying status messages in the canvas
                 // _this._displayStatus('');

                  // doesn't have to be json, can be anything
                  // returned from server after upload as long
                  // as it contains the path to the image url
                  // or a base64 encoded png, either will work
                 // resp = $.parseJSON(resp);

                  // do something with the image
                  //$('#wPaint-img').attr('src', image);
    
                }
              });
            }
    </script>

</body>

</html>
