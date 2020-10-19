<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Primanto_tech">

    <title>Management data barang</title>

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

<body style="background-color: #008B8B;">

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
  
<div id="container">
    <h1>Welcome to Primanto WareHouse!</h1>
    <hr>
   <div class="form-group" style="border: 1px;"><center>
    
                        <label><H2>DATA PASIEN</H2></label>
                        <div style="font-size: 25px;" >
                                <select name="kode_pasien" id="kode_pasien" class="form-group" style="width: 50%;height: 30px;font: 25px;" autofocus>
                                <?php foreach ($pasien->result_array() as $k) {
                                    $bln=$k['kode_pasien'];
                                    $nama=$k['nama_pasien'];
                                    $tgl=$k['tgl_masuk'];
                                ?>
                                    <option ><h3><?php echo $bln.'|'.$nama.'|'.$tgl;?></h3></option>
                                <?php }?>
                                </select>
                        </div>
                        <br>

                       <button style="width: 300px;height: 50px;" onclick="pdf()"><h3>SIMPAN</h3></button> 
   </center>

                    </div>
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
        function pdf(){
            var kode_pasien=$('#kode_pasien').val();
              $.ajax({
               type: "GET",
               url : "<?php echo base_url().'admin/barang/konversipdf';?>",
               data:{kode_pasien:kode_pasien},
               success: function(msg){
                alert('Berhasil disimpan');
               }
           });
        }
        $(document).on('keydown', function(e){
        var charCode = ( e.which ) ? e.which : event.keyCode;
        if(charCode == 112) //F7
        {
        pdf();
        return false;
        }
      });
    </script>


</body>

</html>
