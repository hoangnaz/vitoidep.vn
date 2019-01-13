<?php
include ("database/select_data.php");
$data_select=new select_data();
$id_import_bill=$_GET['id_bill_import'];
$info_bill=$data_select->info_one_import_bill($id_import_bill);
$date_create=$info_bill->date_import;
$producer_publisher=$info_bill->id_producer_publisher;
$total=$info_bill->total_money;

$staff_in_charge=$data_select->info_staff($info_bill->staff_in_charge_bill);
$staff_create=$data_select->info_staff($info_bill->staff_create);
$product_in_order=$data_select->detail_import_bill($id_import_bill);
//print_r($product_in_order);
require('tfpdf.php');


// Colored table
function FancyTable($header, $data,$pdf)
{
    // Colors, line width and bold font
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
	$pdf->SetFont('DejaVu','',11);
  
    // Header
    $w = array(8,110,20,28,30);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],10,$header[$i],1,0,'C',true);
    $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
  
    // Data
    $fill = false;
	$count=1;
    foreach($data as $row)
    {
        $pdf->Cell($w[0],6,$count,'LR',0,'C',$fill);
        $pdf->Cell($w[1],6,$row->name_product,'LR',0,'C',$fill);
        $pdf->Cell($w[2],6,$row->quantity_import,'LR',0,'C',$fill);
		$pdf->Cell($w[3],6,number_format($row->import_price)."VNĐ",'LR',0,'C',$fill);
		$pdf->Cell($w[4],6,number_format($row->import_price * $row->quantity_import)."VNĐ",'LR',0,'C',$fill);
       
        $pdf->Ln();
        $fill = !$fill;
		$count++;
    }
    // Closing line
    $pdf->Cell(array_sum($w),0,'','T');
	
}


// Column headings


// Data loading
$pdf = new tFPDF();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);
$pdf->AddPage();
$pdf->SetFont('DejaVu','',16);
$pdf->SetTextColor(59,77,219);
$pdf->Cell(200,8,"VÌ TÔI ĐẸP SHOP",0,1,'C');
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(200,8,"Địa chỉ:Nguyễn Kim, Phường 12, Quận 5 (2,40 km)Thành phố Hồ Chí Minh ",0,1,'C');
$pdf->Cell(200,8,"Số điện thoại liên hệ :  0962876192 ",0,1,'C');
$pdf->Cell(200,8,"Email :  Vitoidep2018@gmail.com",0,1,'C');
$pdf->Cell(200,10,"---------------------------------------------------*******-------------------------------------------------------",0,1,'C');
$pdf->SetTextColor(73,79,74);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(200,10,"PHIẾU NHẬP KHO SỐ: ".strtoupper($id_import_bill),0,1,'C');
$pdf->SetTextColor(0,65,25);
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(200,8,"Ngày lập: ".$date_create,0,1,'C');
$pdf->SetFont('DejaVu','',8);
$pdf->Cell(200,8,"Số: PNK01-97_WHD",0,1,'C');
$pdf->SetFont('DejaVu','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(200,10,"Mã đơn hàng: ".$id_import_bill,0,1,'L');
$pdf->Cell(200,8,"Bên giao hàng: ".$producer_publisher,0,1,'L');
$pdf->Cell(200,8,"Nhập tại kho: Học viện BCVT   Địa chỉ: Man Thiện - Q9 - Hồ Chí Minh",0,1,'L');


$header = array('STT','Tên sản phẩm', 'SL nhập', 'Đơn giá nhập','Thành tiền');

FancyTable($header,$product_in_order,$pdf);
 $pdf->Ln();
$pdf->Cell(190,15,"Tổng giát trị đơn hàng: ".number_format($total)." VNĐ",0,1,'R');

$pdf->Cell(190,15,"................ ngày....tháng....năm 20...",0,1,'R');
$pdf->Cell(70,8,"NGƯỜI  LẬP ",0,0,'C');
$pdf->Cell(50,8,"NGƯỜI NHẬN HÀNG",0,0,'C');
$pdf->Cell(70,8,"BÊN GIAO ",0,0,'C');
$pdf->Ln();
$pdf->Cell(70,15," ",0,0,'C');
$pdf->Cell(50,15," ",0,0,'C');
$pdf->Cell(70,8,"(ký , ghi rõ họ tên) ",0,0,'C');
$pdf->Ln();
$pdf->Cell(70,15,$staff_create->fullname,0,0,'C');
$pdf->Cell(50,15,$staff_in_charge->fullname,0,0,'C');
$pdf->Output();
?>
	
