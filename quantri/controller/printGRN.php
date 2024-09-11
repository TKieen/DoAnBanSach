<?php
    include '../../lib/connect.php';
    require '../model/func_lib.php';
    require '../tfpdf/tfpdf.php';

    //Chỉnh sửa: Lấy id của phiếu nhập được click!!!
    if(isset($_GET['idPN'])) {
        $idPN = $_GET['idPN'];
        //Lấy thông tin phiếu
        $GRNInfo = getGRNInfo($idPN);
        extract($GRNInfo);
        // $ngaytao = date("d/m/Y H:i:s", strtotime($ngaytao));
        // $total_fm = number_format($tongtien, 0, ',', '.');
    
    
        $pdf = new tFPDF("L", "mm", "A4");
        $pdf->AddPage();
    
        //Thêm font
        $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $pdf->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);
        $pdf->AddFont('DejaVu', 'I', 'DejaVuSerifCondensed-Italic.ttf', true);
        $pdf->SetTextColor(0, 0, 0);
        
        $fill = 0;  //cell background must be painted (true) or transparent (false)
    
        
        //Chèn dữ liệu
        //Mỗi cụm Cell = 1 dòng
        $pdf->SetFont('DejaVu', 'B', 20);
    
        $pdf->Cell(95, 10, '', 0, 0);
        $pdf->Cell(96, 0, "PHIẾU NHẬP KHO", 0, 0, 'C');
        $pdf->Cell(95, 10, '', 0, 1);
        
        $pdf->SetFont('DejaVu', 'B', 13);
    
        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(140, 5, "Thông tin phiếu nhập", 0, 0);
        $pdf->Cell(117, 5, "Thông tin nhà cung cấp", 0, 1);
    
        $pdf->SetFont('DejaVu', '', 13);
    
        $pdf->Cell(20, 10, '', 0, 0);
        $pdf->Cell(140, 10, "Mã phiếu nhập: $idPN", 0, 0);
        $pdf->Cell(117, 10, "Mã nhà cung cấp: $idNCC",0 ,1);
    
        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(140, 5, "Ngày lập phiếu: ".dateTimeFormat($ngaytao)."", 0, 0);
        $pdf->Cell(117, 5, "Tên nhà cung cấp: $tenNCC",0 ,1);
        
        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(140, 10, "", 0, 0);
        $pdf->Cell(117, 10, "Số điện thoại: $dienthoai",0 ,1);
    
        $pdf->Cell(160, 5, '', 0, 0);
        $pdf->Cell(117, 5, "Email: $email",0 ,1);
    
        $pdf->SetFont('DejaVu', 'B', 13);
        $pdf->Cell(0, 10, "Chi tiết phiếu nhập: ", 0, 1);
        
        // $pdf->Ln(5);   //new line with line height = 5
    
            //Heading of the table
        $pdf->SetFont('DejaVu', 'B', 13);
        $pdf->SetFillColor(193, 228, 245);
    
        $pdf->Cell(20, 10, "Mã sách", 1, 0, 'C', true);
        $pdf->Cell(90, 10, "Tựa sách", 1, 0, 'C', true);
        $pdf->Cell(30, 10, "Số lượng", 1, 0, 'C', true);
        $pdf->Cell(40, 10, "Giá bìa", 1, 0, 'C', true);
        $pdf->Cell(40, 10, "Giá nhập", 1, 0, 'C', true);
        $pdf->Cell(57, 10, "Thành tiền", 1, 1, 'C', true);
    
            //Table datas
        $pdf->SetFont('DejaVu', '', 13);
    
        foreach (getGRNDetails($idPN) as $row) {
            extract($row);
            $giabia = number_format($giabia, 0, ',', '.');
            $gianhap = number_format($gianhap, 0, ',', '.');
            $thanhtien = number_format($thanhtien, 0, ',', '.');
    
            //Add datas of 1 row into table
            $pdf->Cell(20, 10, "$idSach", 1, 0, 'C');
            $pdf->Cell(90, 10, "$tuasach", 1, 0, 'C');
            $pdf->Cell(30, 10, "$soluong", 1, 0, 'C');
            $pdf->Cell(40, 10, "$giabia VNĐ", 1, 0, 'C');
            $pdf->Cell(40, 10, "$gianhap VNĐ", 1, 0, 'C');
            $pdf->Cell(57, 10, "$thanhtien VNĐ", 1, 1, 'C');
        }
            //End: Table datas
        
        $pdf->Ln(15);
    
            //Summary
        $totalStr = numberToWords($tongtien);
        $pdf->SetFont('DejaVu', '', 16);
        $pdf->Cell(0, 10, "Tổng số lượng: $tongsoluong (cuốn)", 0, 1);
    
        $pdf->SetFont('DejaVu', 'B', 16);
        // $pdf->SetTextColor(255, 0, 0);
        $pdf->Cell(90, 10, "Tổng tiền: ".priceFormat($tongtien)." đồng", 0, 0);
    
        $pdf->SetFont('DejaVu', 'I', 16);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, "($totalStr đồng)", 0, 1);
    
        $pdf->Ln(10);
        
            //Signs
        $pdf->SetFont('DejaVu', 'B', 13);
        
        $pdf->Cell(100, 5, "Nhà cung cấp", 0, 0, 'C');
        $pdf->Cell(43, 5, "", 0, 0, 'C');
        $pdf->Cell(134, 5, "Người lập phiếu", 0, 1, 'C');
    
        $pdf->SetFont('DejaVu', 'I', 13);
    
        $pdf->Cell(100, 5, "(Ký tên, ghi rõ họ tên)", 0, 0, 'C');
        $pdf->Cell(43, 5, "", 0, 0, 'C');
        $pdf->Cell(134, 5, "(Ký tên, ghi rõ họ tên)", 0, 1, 'C');
    
        $pdf->Output("I", "GRN_ID-$idPN.pdf");
    }
    else {
        echo "Không có phiếu nhập cần in!";
    }
?>