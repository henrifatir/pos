<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Pesan Per Kode</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PESANAN BARANG</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>

</tr>
    <tr>
        <th style="width:50px;">No</th>
        <th>No Pesanan</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Jumlah Pesanan</th>
        <th>Toko Pemesan</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
//beli_kode,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,t.barang_nama as nama,d_beli_harga as harga,beli_suplier_id as toko_pesan
    foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['beli_kode'];
        $tgl=$i['beli_tanggal'];
        $nama=$i['nama'];
        $jumlah=$i['jumlah'];
        $toko=$i['toko_pesan'];
        
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $nofak;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:center;"><?php echo $nama;?></td>
        <td style="text-align:right;"><?php echo $jumlah;?></td>
        <td style="text-align:right;"><?php echo $toko;?></td>
       
    </tr>
<?php }?>
</tbody>
<tfoot>

  
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Ponorogo, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>