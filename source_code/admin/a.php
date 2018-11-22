<?php
include ("database/select_data.php");
$data_select=new select_data();
$order_id=$_GET['id_order'];
$info_bill=$data_select->info_one_order($order_id);
if($info_bill->id_customer==1)
{
	$name_customer=$info_bill->reciever;
}
else
{
	$name_customer=$data_select->query_one_customer($info_bill->id_customer)->fullname;
}


$date_create=$info_bill->date_bill_create;
$phone_customer=$info_bill->phone_nummber;
$address_recieve=$info_bill->address_recieve;
$total=$info_bill->total_money_order;

$staff_in_charge=$data_select->info_staff($info_bill->staff_in_charge);
$staff_create=$data_select->info_staff($info_bill->id_staff_create);
$product_in_order=$data_select->list_product_bill_order($order_id);
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
    $w = array(10,100,24,28,30);
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
		$price=$row[1]*(1-($row[2]/100));
        $pdf->Cell($w[0],6,$count,'LR',0,'C',$fill);
        $pdf->Cell($w[1],6,$row[0],'LR',0,'C',$fill);
        $pdf->Cell($w[2],6,$row[3],'LR',0,'C',$fill);
		$pdf->Cell($w[3],6,number_format($price)."VNĐ",'LR',0,'C',$fill);
		$pdf->Cell($w[4],6,number_format($row[6])."VNĐ",'LR',0,'C',$fill);
       
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
$pdf->SetTextColor(0,187,255);
$pdf->Cell(200,8,"VÌ TÔI ĐẸP SHOP",0,1,'C');
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(200,8,"Địa chỉ:Nguyễn Kim, Phường 12, Quận 5 (2,40 km)Thành phố Hồ Chí Minh ",0,1,'C');
$pdf->Cell(200,8,"Số điện thoại liên hệ :  0962678192",0,1,'C');
$pdf->Cell(200,8,"Email :  vitoidep@gmail.com",0,1,'C');
$pdf->Cell(200,10,"---------------------------------------------------*******-------------------------------------------------------",0,1,'C');
$pdf->SetTextColor(0,65,25);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(200,10,"HÓA ĐƠN BÁN HÀNG ".strtoupper($order_id),0,1,'C');
$pdf->SetTextColor(0,65,25);
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(200,8,"Ngày lập: ".$date_create,0,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(200,10,"Mã đơn hàng: ".$order_id,0,1,'L');
$pdf->Cell(200,8,"Họ tên khách hàng : ".$name_customer,0,1,'L');
$pdf->Cell(200,8,"Số điện thoại: 0".$phone_customer,0,1,'L');
$pdf->Cell(200,8,"Địa chỉ giao hàng: ".$address_recieve,0,1,'L');


$header = array('STT','Tên sản phẩm', 'Số lượng', 'Đơn giá','Thành tiền');

FancyTable($header,$product_in_order,$pdf);
 $pdf->Ln();
$pdf->Cell(190,15,"Tổng giát trị đơn hàng: ".number_format($total)." VNĐ",0,1,'R');

$pdf->Cell(190,15,"................ ngày....tháng....năm 20...",0,1,'R');
$pdf->Cell(70,8,"NHÂN VIÊN LẬP ",0,0,'C');
$pdf->Cell(50,8,"GIAO HÀNG",0,0,'C');
$pdf->Cell(70,8,"KHÁCH HÀNG ",0,0,'C');
$pdf->Ln();
$pdf->Cell(70,15," ",0,0,'C');
$pdf->Cell(50,15," ",0,0,'C');
$pdf->Cell(70,8,"(ký , ghi rõ họ tên) ",0,0,'C');
$pdf->Ln();
$pdf->Cell(70,15,$staff_create->fullname,0,0,'C');
$pdf->Cell(50,15,$staff_in_charge->fullname,0,0,'C');
$pdf->Output();
?>
	
