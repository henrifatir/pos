<?php
class Scan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_barang');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['pasien']=$this->m_barang->tampil_pasien();
		$this->load->view('welcome_message',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
   
    public function konversipdf(){
    	$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		//$remove='C://Users/primanto/Pictures/*/'.'/';
		$lokasi =glob($basePath.'/*.jpg');
		$jumlah =count($lokasi);
		if ($jumlah==1) {
			$this->PDF1();
			 redirect('admin/Scan');
		}elseif ($jumlah==2) {
			$this->PDF2();
			 redirect('admin/Scan');
		}elseif ($jumlah==3) {
			$this->PDF3();
			 redirect('admin/Scan');
		}elseif ($jumlah==4) {
			$this->PDF4();
		}elseif ($jumlah==5) {
			$this->PDF5();
		}elseif ($jumlah==6) {
			$this->PDF6();
		}elseif ($jumlah==7) {
			$this->PDF7();
		}elseif ($jumlah==8) {
			$this->PDF8();
		}elseif ($jumlah==9) {
			$this->PDF9();
		}elseif ($jumlah==10) {
			$this->PDF10();
		}elseif ($jumlah > 10 && $jumlah < 15) {
			$this->PDF14();
		}elseif ($jumlah > 16 && $jumlah < 23) {
			$this->PDF22();
		}else{
			$this->PDF30();
		}
		   
    }
    public function hapus(){
    	$hapus=glob('C://Users/primanto/Pictures/*/*.jpg');
    	foreach ($hapus as $key => $value) {
    		if (is_file($value)) 
    			# code...
    		
    	unlink($value);
    	}
    }
    public function PDF_30(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";
		 $html7="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[7]."' /></td>
					</tr>
					</table>
					";
		$html8="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[8]."' /></td>
					</tr>
					</table>
					";
		 $html9="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[9]."' /></td>
					</tr>
					</table>
					";
		 $html10="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[10]."' /></td>
					</tr>
					</table>
					";
		 $html11="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[11]."' /></td>
					</tr>
					</table>
					";
		 $html12="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[12]."' /></td>
					</tr>
					</table>
					";
		 $html13="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[13]."' /></td>
					</tr>
					</table>
					";
		 $html14="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[14]."' /></td>
					</tr>
					</table>
					";
		 $html15="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[15]."' /></td>
					</tr>
					</table>
					";
		$html16="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[16]."' /></td>
					</tr>
					</table>
					";
		 $html17="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[17]."' /></td>
					</tr>
					</table>
					";
		 $html18="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[18]."' /></td>
					</tr>
					</table>
					";
		 $html19="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[19]."' /></td>
					</tr>
					</table>
					";
		 $html20="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[20]."' /></td>
					</tr>
					</table>
					";
		 $html21="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[21]."' /></td>
					</tr>
					</table>
					";
		  $html22="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[22]."' /></td>
					</tr>
					</table>
					";
		 $html23="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[23]."' /></td>
					</tr>
					</table>
					";
		 $html24="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[24]."' /></td>
					</tr>
					</table>
					";
		 $html25="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[25]."' /></td>
					</tr>
					</table>
					";
		 $html26="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[26]."' /></td>
					</tr>
					</table>
					";
		 $html27="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[27]."' /></td>
					</tr>
					</table>
					";
		 $html28="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[28]."' /></td>
					</tr>
					</table>
					";
		 $html29="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[29]."' /></td>
					</tr>
					</table>
					";

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html7);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html8);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html9);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html10);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html11);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html12);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html13);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html14);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html15);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html16);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html17);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html18);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html19);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html20);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html21);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html22);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html23);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html24);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html25);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html26);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html27);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html28);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html29);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
		
	}
	public function PDF_22(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";
		 $html7="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[7]."' /></td>
					</tr>
					</table>
					";
		$html8="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[8]."' /></td>
					</tr>
					</table>
					";
		 $html9="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[9]."' /></td>
					</tr>
					</table>
					";
		 $html10="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[10]."' /></td>
					</tr>
					</table>
					";
		 $html11="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[11]."' /></td>
					</tr>
					</table>
					";
		 $html12="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[12]."' /></td>
					</tr>
					</table>
					";
		 $html13="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[13]."' /></td>
					</tr>
					</table>
					";
		 $html14="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[14]."' /></td>
					</tr>
					</table>
					";
		 $html15="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[15]."' /></td>
					</tr>
					</table>
					";
		$html16="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[16]."' /></td>
					</tr>
					</table>
					";
		 $html17="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[17]."' /></td>
					</tr>
					</table>
					";
		 $html18="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[18]."' /></td>
					</tr>
					</table>
					";
		 $html19="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[19]."' /></td>
					</tr>
					</table>
					";
		 $html20="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[20]."' /></td>
					</tr>
					</table>
					";
		 $html21="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[21]."' /></td>
					</tr>
					</table>
					";
		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html7);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html8);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html9);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html10);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html11);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html12);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html13);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html14);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html15);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html16);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html17);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html18);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html19);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html20);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html21);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF_14(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";
		 $html7="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[7]."' /></td>
					</tr>
					</table>
					";
		$html8="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[8]."' /></td>
					</tr>
					</table>
					";
		 $html9="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[9]."' /></td>
					</tr>
					</table>
					";
		$html10="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[10]."' /></td>
					</tr>
					</table>
					";
		 $html11="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[11]."' /></td>
					</tr>
					</table>
					";
		$html12="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[12]."' /></td>
					</tr>
					</table>
					";
		 $html13="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[13]."' /></td>
					</tr>
					</table>
					";


		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html7);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html8);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html9);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html10);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html11);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html12);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html13);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF10(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";
		 $html7="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[7]."' /></td>
					</tr>
					</table>
					";
		 $html8="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[8]."' /></td>
					</tr>
					</table>
					";
		 $html9="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[9]."' /></td>
					</tr>
					</table>
					";

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html7);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html8);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html9);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF9(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";
		 $html7="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[7]."' /></td>
					</tr>
					</table>
					";
		  $html8="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[8]."' /></td>
					</tr>
					</table>
					";
		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html7);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html8);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF8(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";
		 $html7="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[7]."' /></td>
					</tr>
					</table>
					";
		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html7);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF7(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		 $html6="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[6]."' /></td>
					</tr>
					</table>
					";

		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html6);
	
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF6(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
		 $html5="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[5]."' /></td>
					</tr>
					</table>
					";
		
		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html5);
	
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF5(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
		 $html4="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[4]."' /></td>
					</tr>
					</table>
					";
	

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html4);
	
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF4(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
		 $html3="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[3]."' /></td>
					</tr>
					</table>
					";
	

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html3);

		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF3(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		 $html2="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[2]."' /></td>
					</tr>
					</table>
					";
	

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html2);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF2(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		 $html1="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[1]."' /></td>
					</tr>
					</table>
					";
		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		$mpdf->WriteHTML($html1);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}
	public function PDF1(){
		$dir_tanggal = date("Y-m-d");
		$basePath ='C://Users/primanto/Pictures/*/';
		$lokasi =glob($basePath.'/*.jpg');
	    $html="
				<table>

					<tr>
					<td style='width:100%;'><img src='".$lokasi[0]."' /></td>
					</tr>
					</table>
					";
		

		ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();
		$mpdf=new mPDF('', array(180, 200), 10, 10, 20, 5, 2, 2, 5, 5);
		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$jamak=explode('-', $dir_tanggal);
		$tahun=$jamak[0];
		$bulan=$jamak[1];
		$hari=$jamak[2];
		$tanggal=$tahun.'/'.$bulan.'/'.$hari;
		$carifolder=glob('D://Aplikasi/htdocs/pos/'.$tahun.'/'.$bulan.'/.'.$hari.'/*.pdf');
		$jumlahfile=count($carifolder);
		if ($jumlahfile==0) {
			
			mkdir($tahun.'/'.$bulan.'/'.$hari, 0777, true);
		}

		$mpdf->Output($tahun.'/'.$bulan.'/'.$hari.'/tessss.pdf', 'F');
	}

	

	
}