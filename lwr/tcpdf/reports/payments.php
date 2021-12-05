<?php
include 'conn.php';
include 'session_handler.php';
require_once('tcpdf_include.php');
error_reporting(0);
ob_start();

$cur_dte=date("Y-m-d");



class MYPDF extends TCPDF {

	public function Header() {
		
		$cur_dte=date("Y-m-d");
		
					  // Get the current page break margin
					$bMargin = $this->getBreakMargin();

					// Get current auto-page-break mode
					$auto_page_break = $this->AutoPageBreak;

					// Disable auto-page-break
					$this->SetAutoPageBreak(false, 0);

					// Define the path to the image that you want to use as watermark.
				
					$this->SetAutoPageBreak($auto_page_break, $bMargin);
					
					// Set the starting point for the page content
					$this->setPageMark();
					
					//$img_file1 = 'images/logo.png';
					//$this->Image($img_file1, 5, 0, 40, 28, '', '', '', false, 300, '', false, false, 0);
						//$this->SetFont('helvetica', 'B', 20);
						
						
						$html ='<table border="0"  width="100%">
									<tr>
										<td width="100%" >
											<div style="font-size:15px;font-weight:bold;" align="center">Lawyer Management System</div>
											<div style="font-size:18px;font-weight:bold;" align="center">Pending Discusss Case</div>
											<div style="font-size:13px;" align="center">'.$cur_dte.'</div>
											
										</td>
									</tr>
							</table>
							';
						$this->writeHTML($html, true, false, true, false, '');
						// Title
		
	  
	}
	public function Footer() {
		include 'session_handler.php';

			//$cur_dte_rtpgen=date("Y-m-d");
			date_default_timezone_set('Asia/Kolkata');
			$cur_dte_rtpgen = date('Y-m-d h:i:s');
			
			$ftext='<table border="0"  width="100%">
						<tr>
							<td width="40%" style="font-size:8px;">'.$ses_user.' &nbsp;&nbsp;&nbsp; '.$cur_dte_rtpgen.'</td>
							<td width="40%" style="font-size:8px;">Report Generated by Lawyer Management System</td>
							<td width="20%" align="right" style="font-size:8px;">Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().'</td>
						</tr>
						
					</table>';
        // Position at 15 mm from bottom
        $this->SetY(-6);
        // Set font
        //$this->SetFont('helvetica', 'I', 12);
        // Page number
		$this->writeHTML($ftext, true, false, true, false, '');
    }
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle('Payments');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 32, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
//$pdf->SetFont('dejavusans', '', 15);

// add a page
$pdf->AddPage();
$pdf->SetFont('times', '', 12);
//$pdf->Image('images/image_demo.jpg', 90, 100, 60, 60, '', '', '', true, 72);
 
			/*$sql5="SELECT * FROM casecycle_details WHERE casecycle_key='$_GET[cy]' AND finact=0";
			$result5 = mysqli_query($link,$sql5);
			while($row5=mysqli_fetch_array($result5)){
				$g1=$row5['enter_date'];
				$g2=$row5['noof_casedefined'];
				$g3=$row5['nextcourt_dte'];
				$g4=$row5['status_cycle'];
				$g5=$row5['casedetails_key'];
			}
			
			$sql2="SELECT * FROM case_details WHERE casedetail_key='$g5' AND finact=0";
			$result2 = mysqli_query($link,$sql2);
			while($row2=mysqli_fetch_array($result2)){
				$t2=$row2['case_date'];
				$t3=$row2['case_code'];
				$t4=$row2['lawyer_key'];
				$t5=$row2['case_key'];
				$t6=$row2['court_key'];
				$t7=$row2['courttype_key'];
				$t8=$row2['client_key'];
				$t9=$row2['compalintype_key'];
				$t10=$row2['case_year'];
				$t11=$row2['amount'];
				$t12=$row2['party'];
			}
			
			$sql3="SELECT * FROM lowyer_registration WHERE lowyer_key='$t4' AND finact=0";
			$result3 = mysqli_query($link,$sql3);
			while($row3=mysqli_fetch_array($result3)){
				$a1=$row3['lowyer_name'];
				$a2=$row3['qulification'];
				$a3=$row3['contact_no'];
				$a4=$row3['office_address'];
			}
			
			$sql8="SELECT * FROM case_master WHERE casemas_key='$t5' AND finact=0";
			$result8 = mysqli_query($link,$sql8);
			while($row8=mysqli_fetch_array($result8)){
				$b1=$row8['case_name'];
				$b2=$row8['case_code'];
			}
			
			$sql9="SELECT * FROM court_master WHERE courtmas_key='$t6' AND finact=0";
			$result9 = mysqli_query($link,$sql9);
			while($row9=mysqli_fetch_array($result9)){
				$c1=$row9['court_name'];
				
			}
			
			$sql10="SELECT * FROM courttype_master WHERE courttype_key='$t7' AND finact=0";
			$result10 = mysqli_query($link,$sql10);
			while($row10=mysqli_fetch_array($result10)){
				$d1=$row10['courtype_name'];
				
			}
			
			$sql11="SELECT * FROM client_master WHERE client_key='$t8' AND finact=0";
			$result11 = mysqli_query($link,$sql11);
			while($row11=mysqli_fetch_array($result11)){
				$e1=$row11['client_name'];
				$e2=$row11['address'];
				$e3=$row11['mobile_no'];
				$e4=$row11['tp_no'];
				$e5=$row11['nic_no'];
				$e6=$row11['nationality'];
				$e7=$row11['email_address'];
				
			}
			
			$sql12="SELECT * FROM complaintype_master WHERE complaintypemas_key='$t9' AND finact=0";
			$result12 = mysqli_query($link,$sql12);
			while($row12=mysqli_fetch_array($result12)){
				$f1=$row12['complain_name'];
				
			}*/
			
		$html='
			<h5> Pending Discusss</h5>
			<table border="1" width="100%">
				<thead>
					<tr>
						<th> Case Code</th>
						<th> Case Name</th>
						<th> Court</th>
						<th> Client</th>
						<th> Type of Documents</th>
						
						<th> Case Chargers</th>
						<th> Client Payments</th>
						<th> Balance</th>
					</tr>
				</thead>
				<tbody>';
				$sql13="SELECT * FROM case_details WHERE case_details.lawyer_key='$ses_ukey'
													AND case_details.finact=0";
				$result13=mysqli_query($link,$sql13);
				while($row13=mysqli_fetch_array($result13)){
					
					$sql8="SELECT * FROM case_master WHERE casemas_key='$row13[case_key]' AND finact=0";
					$result8 = mysqli_query($link,$sql8);
					while($row8=mysqli_fetch_array($result8)){
						$b1=$row8['case_name'];
						$b2=$row8['case_code'];
					}
					
					$sql9="SELECT * FROM court_master WHERE courtmas_key='$row13[court_key]' AND finact=0";
					$result9 = mysqli_query($link,$sql9);
					while($row9=mysqli_fetch_array($result9)){
						$c1=$row9['court_name'];
						
					}
					
					$sql10="SELECT * FROM courttype_master WHERE courttype_key='$row13[courttype_key]' AND finact=0";
					$result10 = mysqli_query($link,$sql10);
					while($row10=mysqli_fetch_array($result10)){
						$d1=$row10['courtype_name'];
						
					}
					
					$sql11="SELECT * FROM client_master WHERE client_key='$row13[client_key]' AND finact=0";
					$result11 = mysqli_query($link,$sql11);
					while($row11=mysqli_fetch_array($result11)){
						$e1=$row11['client_name'];
					}
					
					$sql12="SELECT * FROM complaintype_master WHERE complaintypemas_key='$row13[compalintype_key]' AND finact=0";
					$result12 = mysqli_query($link,$sql12);
					while($row12=mysqli_fetch_array($result12)){
						$f1=$row12['complain_name'];
					}
					$g1=0;
					$balance=0;
					$sql14="SELECT SUM(amount) AS totcasepay FROM casepayment_details WHERE casedetails_key='$row13[casedetail_key]' AND finact=0";
					$result14 = mysqli_query($link,$sql14);
					while($row14=mysqli_fetch_array($result14)){
						$g1=$row14['totcasepay'];
					}
					$balance=$row13['amount']-$g1;
					$html.='<tr style="font-size:10px;">';
						
						$html.='<td> '.$row13['case_code'].'</td>';
						$html.='<td> '.$b1.'</td>';
						$html.='<td> '.$c1.'_'.$d1.'</td>';
						$html.='<td> '.$e1.'</td>';
						$html.='<td> '.$f1.'</td>';
						$html.='<td align="right"> '.number_format($row13['amount'],2).'</td>';
						$html.='<td align="right"> '.number_format($g1,2).'</td>';
						$html.='<td align="right"> '.number_format($balance,2).'</td>';
						
					$html.='</tr>';
				}
			$html.='</tbody>
			 </table>';	
		
	
		
 $pdf->writeHTML($html, true, false, true, false, '');


$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Payments'.$cur_dte.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


?>