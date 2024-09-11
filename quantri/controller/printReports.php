<?php
    include '../../lib/connect.php';
    require '../model/func_lib.php';
    require '../tfpdf/tfpdf.php';

    //Header and Footer
    class PDF extends tFPDF {
        function addCustomFont() {
            //Set font to DejaVu
            $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
            $this->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);
            $this->AddFont('DejaVu', 'I', 'DejaVuSerifCondensed-Italic.ttf', true);
        }

        function Header() {
            $this->addCustomFont();
            $this->SetFont('DejaVu', 'B', '12');
            //Container for image
            $this->Cell(40, 10, "", 0, 0);
            $this->Image('../asset/img/vinabookLogo.png', 10, 11.5, 35, 5);
            //Header title
            $this->Cell(0, 10, "Công ty TNHH Bốn Thành Viên Vinabook", 0, 1);
            //Add a line from 10mm -> 287mm and angle = 0 (20 - 20)
            $this->Line(10, 20, 287, 20);
            $this->Ln(10);
        }
    }

    class A3PDF extends tFPDF {
        function addCustomFont() {
            //DejaVu font-family
            $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
            $this->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);
            $this->AddFont('DejaVu', 'I', 'DejaVuSerifCondensed-Italic.ttf', true);
            //Times New Roman font-family
            $this->AddFont('Times New Roman', '', 'times.ttf', true);
            $this->AddFont('Times New Roman', 'B', 'timesbd.ttf', true);
            $this->AddFont('Times New Roman', 'I', 'timesi.ttf', true);
            $this->AddFont('Times New Roman', 'BI', 'timesbi.ttf', true);
        }

        function Header() {
            $this->addCustomFont();
            $this->SetFont('DejaVu', 'B', '16');
            //Container for image
            $this->Cell(40, 10, "", 0, 0);
            $this->Image('../asset/img/vinabookLogo.png', 10, 11.5, 35, 5);
            //Header title
            $this->Cell(0, 10, "Công ty TNHH Bốn Thành Viên Vinabook", 0, 1);
            //Add a line from 10mm -> 287mm and angle = 0 (20 - 20)
            $this->Line(10, 20, 410, 20);
            $this->Ln(10);
        }
        
        function Footer() {
            //Add custom font to Footer
            $this->addCustomFont();
            //Go to 1.5cm from the bottom
            $this->SetY(-15);   
            $this->SetFont('DejaVu', '', '12');
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 10, "Trang ".$this->PageNo()."/{nb}", 0, 0, 'C');
        }
    }

    //Get value of opt & time from URL (thang/nam - doanhthu/ loinhuan/ nhapkho)
    if(isset($_GET['thang'])) {
        $date = $_GET['thang'];
        $dateStart = $date . "-01";
        $dateEnd = $date . "-" . dayEndOfMonth($date);
        $weeks = getWeeks($date);
    }
    else if(isset($_GET['nam'])) {
        $year = $_GET['nam'];
        $dateStart = dateFormat($year . "-01-01");
        $dateEnd = dateFormat($year . "-12-31");
        $months = getDaysOfMonth($year);
    }

    if(isset($_GET['time']) && ($_GET['time'] == "thang") && isset($_GET['report'])) {
        //Define a new A4 PDF object
        $pdf = new PDF("L", "mm", "A4");
        $pdf->AddPage();
        //AddFont
        $pdf->addCustomFont();  

        $opt = $_GET['report'];
        switch ($opt) {
            case 'doanhthu':
                //Bold
                $pdf->SetFont("DejaVu", "B", 20);
                //Set color for text
                $pdf->SetTextColor(9, 39, 53);
                //Set color for cell border
                $pdf->SetDrawColor(21, 61, 99);
    
                //Title
                $pdf->Cell(0, 10, "BÁO CÁO DOANH THU THÁNG ". getMonth($date) ."", 0, 1, "C");
                $pdf->SetFont("DejaVu", "", 13);
                $pdf->Cell(0, 6, "từ ngày ".dateFormat($dateStart)." đến ngày ".dateFormat($dateEnd)."", 0, 1, "C");
    
                $pdf->Ln(10);
                //Table
                    //Table title
                    $pdf->SetFont("DejaVu", "B", 13);
                    $pdf->SetFillColor(218, 233, 247);  //cell background color
    
                    $pdf->Cell(30, 15, "Tuần thứ", 1, 0, 'C', true);
                    $pdf->Cell(40, 15, "Từ ngày", 1, 0, 'C', true);
                    $pdf->Cell(40, 15, "Đến ngày", 1, 0, 'C', true);
                    $pdf->Cell(50, 7.5, "Số đơn hàng", "LRT", 0, 'C', true);
                    $pdf->Cell(50, 7.5, "Số sản phẩm đã bán", "LRT", 0, 'C', true);
                    $pdf->Cell(60, 15, "Doanh thu", 1, 0, 'C', true);
                    $pdf->Cell(0, 7.5, "", 0, 1, 'C', false);    //dummy line ending
                    
                    //Second line of cells (Merge cells)
                    $pdf->SetFont("DejaVu", "I", 13);
    
                    $pdf->Cell(110, 7.5, "", 0, 0, false);
                    $pdf->Cell(50, 7.5, "(đơn)", "LRB", 0, "C", true);
                    $pdf->Cell(50, 7.5, "(cuốn)", "LRB", 0, "C", true);
                    $pdf->Cell(0, 7.5, "", 0, 1, false);
    
                    //Table data
                    $sumOrderCount = 0;
                    $sumQtyCount = 0;
                    $sumOrderTotal = 0;
                    for($i = 1; $i <= sizeof($weeks); $i++) {
                        $dateWeekStart = $weeks[$i][0];
                        $dateWeekEnd = $weeks[$i][sizeof($weeks[$i]) - 1];
                        /* orderCount */
                        $orderCount = getOrderCount($dateWeekStart, $dateWeekEnd);
                        /* orderCount */

                        /* qtyCount */
                        $qtyCount = getQuantityCount($dateWeekStart, $dateWeekEnd);
                        /* qtyCount */

                        /* orderTotal */
                        $orderTotal = getOrderTotal($dateWeekStart, $dateWeekEnd);
                        /* orderTotal */
                        $sumOrderCount += $orderCount;
                        $sumQtyCount += $qtyCount;
                        $sumOrderTotal += $orderTotal;

                        
                        $pdf->SetFont("DejaVu", "B", 13);
                        $pdf->Cell(30, 10, "$i", 1, 0, 'C');
                        $pdf->SetFont("DejaVu", "", 13);
                        $pdf->Cell(40, 10, "".dateFormat($dateWeekStart)."", 1, 0, 'C');
                        $pdf->Cell(40, 10, "".dateFormat($dateWeekEnd)."", 1, 0, 'C');
                        $pdf->Cell(50, 10, "$orderCount", 1, 0, 'R');
                        $pdf->Cell(50, 10, "$qtyCount", 1, 0, 'R');
                        $pdf->Cell(60, 10, "".priceFormat($orderTotal)." đ", 1, 1, 'R');
                       
                    }
    
                    //Total row
                    $pdf->SetFont("DejaVu", "B", 16);
                    $pdf->SetTextColor(255, 255, 255);
                    $pdf->SetFillColor(21, 61, 99);  //cell background color
                    $pdf->Cell(110, 12, "TỔNG:", 1, 0, 'C', true);
    
                    $pdf->SetFont("DejaVu", "B", 13);
                    $pdf->SetTextColor(9, 39, 53);
                    $pdf->Cell(50, 12, "$sumOrderCount", 1, 0, 'R', false);
                    $pdf->Cell(50, 12, "$sumQtyCount", 1, 0, 'R', false);
                    $pdf->Cell(60, 12, "".priceFormat($sumOrderTotal)." đ", 1, 1, 'R', false);
                    //End: table data
                //End: table
    
                // Price in words
                $pdf->SetFont("DejaVu", "I", 15);
                $pdf->Cell(270, 10, "(".numberToWords($sumOrderTotal)." đồng)", 0, 1, 'R');
    
                $pdf->Ln(6);
    
                //Sign area
                $pdf->SetFont("DejaVu", "", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "TP.HCM, ".getCurrentDate()."", 0, 1, 'C');
                $pdf->SetFont("DejaVu", "B", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "Người lập phiếu", 0, 1, 'C');
                $pdf->SetFont("DejaVu", "I", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "(Ký tên, ghi rõ họ tên)", 0, 1, 'C');
    
    
                $pdf->Output("I", "IncomeReport_$date.pdf");
                break;
    
            case "loinhuan":
                //Bold
                $pdf->SetFont("DejaVu", "B", 20);
                //Set color for text
                $pdf->SetTextColor(58, 67, 49);
                //Set color for cell border
                $pdf->SetDrawColor(38, 44, 32);
    
                //Title
                $pdf->Cell(0, 10, "BÁO CÁO LỢI NHUẬN THÁNG ". getMonth($date) ."", 0, 1, "C");
                $pdf->SetFont("DejaVu", "", 13);
                $pdf->Cell(0, 6, "từ ngày ".dateFormat($dateStart)." đến ngày ".dateFormat($dateEnd)."", 0, 1, "C");
    
                $pdf->Ln(10);
                //Table
                    //Table title
                    $pdf->SetFont("DejaVu", "B", 11);
                    $pdf->SetFillColor(200, 214, 192);  //cell background color
    
                    $pdf->Cell(13, 7.5, "Tuần", "LRT", 0, 'C', true);
                    $pdf->Cell(30, 15, "Từ ngày", 1, 0, 'C', true);
                    $pdf->Cell(30, 15, "Đến ngày", 1, 0, 'C', true);
                    $pdf->Cell(30, 7.5, "Số đơn hàng", "LRT", 0, 'C', true);
                    $pdf->Cell(50, 7.5, "Số sản phẩm đã bán", "LRT", 0, 'C', true);
                    $pdf->Cell(40, 15, "Doanh thu", 1, 0, 'C', true);
                    $pdf->Cell(40, 15, "Chi", 1, 0, 'C', true);
                    $pdf->Cell(40, 15, "Lợi nhuận", 1, 0, 'C', true);
                    $pdf->Cell(0, 7.5, "", 0, 1, 'C', false);    //dummy line ending
                    
                    //Second line of cells (Merge cells)
                    
                    $pdf->Cell(13, 7.5, "thứ", "LRB", 0, "C", true);
                    $pdf->SetFont("DejaVu", "I", 12);
                    $pdf->Cell(60, 7.5, "", 0, 0, false);
                    $pdf->Cell(30, 7.5, "(đơn)", "LRB", 0, "C", true);
                    $pdf->Cell(50, 7.5, "(cuốn)", "LRB", 0, "C", true);
                    $pdf->Cell(0, 7.5, "", 0, 1, false);
    
                    //Table data
                    $sumOrderCount = 0;
                    $sumQtyCount = 0;
                    $sumOrderTotal = 0;
                    $sumGRNTotal = 0;
                    $sumProfit = 0;
                    for($i = 1; $i <= sizeof($weeks); $i++) {
                        $dateWeekStart = $weeks[$i][0];
                        $dateWeekEnd = $weeks[$i][sizeof($weeks[$i]) - 1];
                        /* orderCount */
                        $orderCount = getOrderCount($dateWeekStart, $dateWeekEnd);
                        /* orderCount */

                        /* qtyCount */
                        $qtyCount = getQuantityCount($dateWeekStart, $dateWeekEnd);
                        /* qtyCount */

                        /* orderTotal */
                        $orderTotal = getOrderTotal($dateWeekStart, $dateWeekEnd);
                        /* orderTotal */

                        /* grnTotal */
                        $grnTotal = getGRNTotal($dateWeekStart, $dateWeekEnd);
                        /* grnTotal */

                        $profit = $orderTotal - $grnTotal;
                        $sumOrderCount += $orderCount;
                        $sumQtyCount += $qtyCount;
                        $sumOrderTotal += $orderTotal;
                        $sumGRNTotal += $grnTotal;
                        $sumProfit += $profit;

                        $pdf->SetFont("DejaVu", "B", 13);
                        $pdf->Cell(13, 10, "$i", 1, 0, 'C');
                        $pdf->SetFont("DejaVu", "", 13);
                        $pdf->Cell(30, 10, "$dateWeekStart", 1, 0, 'C');
                        $pdf->Cell(30, 10, "$dateWeekEnd", 1, 0, 'C');
                        $pdf->Cell(30, 10, "$orderCount", 1, 0, 'R');
                        $pdf->Cell(50, 10, "$qtyCount", 1, 0, 'R');
                        $pdf->Cell(40, 10, "".priceFormat($orderTotal)." đ", 1, 0, 'R');
                        $pdf->Cell(40, 10, "".priceFormat($grnTotal)." đ", 1, 0, 'R');
                        $pdf->Cell(40, 10, "".priceFormat($profit)." đ", 1, 1, 'R');                        
                    }
    
                    //Total row
                    $pdf->SetFont("DejaVu", "B", 16);
                    $pdf->SetTextColor(255, 255, 255);
                    $pdf->SetFillColor(98, 114, 84);  //cell background color
                    $pdf->Cell(73, 12, "TỔNG:", 1, 0, 'C', true);
    
                    $pdf->SetFont("DejaVu", "B", 13);
                    $pdf->SetTextColor(58, 67, 49);
                    $pdf->Cell(30, 12, "$sumOrderCount", 1, 0, 'R', false);
                    $pdf->Cell(50, 12, "$sumQtyCount", 1, 0, 'R', false);
                    $pdf->Cell(40, 12, "".priceFormat($sumOrderTotal)." đ", 1, 0, 'R', false);
                    $pdf->Cell(40, 12, "".priceFormat($sumGRNTotal)." đ", 1, 0, 'R', false);
                    $pdf->Cell(40, 12, "".priceFormat($sumProfit)." đ", 1, 1, 'R', false);
                    //End: table data
                //End: table
    
                // Price in words
                $pdf->SetFont("DejaVu", "I", 15);
                $pdf->Cell(275, 10, "(".numberToWords($sumProfit)." đồng)", 0, 1, 'R');
    
                $pdf->Ln(6);
    
                //Sign area
                $pdf->SetFont("DejaVu", "", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "TP.HCM, ".getCurrentDate()."", 0, 1, 'C');
                $pdf->SetFont("DejaVu", "B", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "Người lập phiếu", 0, 1, 'C');
                $pdf->SetFont("DejaVu", "I", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "(Ký tên, ghi rõ họ tên)", 0, 1, 'C');
    
    
                $pdf->Output("I", "ProfitReport_$date.pdf");    
                break;
            
            case "nhapkho":
                //Bold
                $pdf->SetFont("DejaVu", "B", 20);
                //Set color for text
                $pdf->SetTextColor(54 ,33, 55);
                //Set color for cell border
                $pdf->SetDrawColor(54 ,33, 55);
    
                //Title
                $pdf->Cell(0, 10, "BÁO CÁO NHẬP KHO THÁNG ". getMonth($date) ."", 0, 1, "C");
                $pdf->SetFont("DejaVu", "", 13);
                $pdf->Cell(0, 6, "từ ngày ".dateFormat($dateStart)." đến ngày ".dateFormat($dateEnd)."", 0, 1, "C");
    
                $pdf->Ln(10);
                //Table
                    //Table title
                    $pdf->SetFont("DejaVu", "B", 13);
                    $pdf->SetFillColor(217, 192, 218);  //cell background color
    
                    $pdf->Cell(30, 15, "Tuần thứ", 1, 0, 'C', true);
                    $pdf->Cell(40, 15, "Từ ngày", 1, 0, 'C', true);
                    $pdf->Cell(40, 15, "Đến ngày", 1, 0, 'C', true);
                    $pdf->Cell(50, 7.5, "Số đơn nhập", "LRT", 0, 'C', true);
                    $pdf->Cell(50, 7.5, "Số sản phẩm nhập", "LRT", 0, 'C', true);
                    $pdf->Cell(60, 15, "Chi", 1, 0, 'C', true);
                    $pdf->Cell(0, 7.5, "", 0, 1, 'C', false);    //dummy line ending
                    
                    //Second line of cells (Merge cells)
                    $pdf->SetFont("DejaVu", "I", 13);
    
                    $pdf->Cell(110, 7.5, "", 0, 0, false);
                    $pdf->Cell(50, 7.5, "(đơn)", "LRB", 0, "C", true);
                    $pdf->Cell(50, 7.5, "(cuốn)", "LRB", 0, "C", true);
                    $pdf->Cell(0, 7.5, "", 0, 1, false);
    
                    //Table data
                    $sumGRNCount = 0;
                    $sumGRNQty = 0;
                    $sumGRNTotal = 0;
                    for($i = 1; $i <= sizeof($weeks); $i++) {
                        $dateWeekStart = $weeks[$i][0];
                        $dateWeekEnd = $weeks[$i][sizeof($weeks[$i]) - 1];
                        /* grnCount */
                        $grnCount = getGRNCount($dateWeekStart, $dateWeekEnd);
                        /* grnCount */

                        /* grnQty */
                        $grnQty = getGRNQty($dateWeekStart, $dateWeekEnd);
                        /* grnQty */
                        
                        /* grnTotal */
                        $grnTotal = getGRNTotal($dateWeekStart, $dateWeekEnd);
                        /* grnTotal */

                        $sumGRNCount += $grnCount;
                        $sumGRNQty += $grnQty;
                        $sumGRNTotal += $grnTotal;

                        
                        $pdf->SetFont("DejaVu", "B", 13);
                        $pdf->Cell(30, 10, "$i", 1, 0, 'C');
                        $pdf->SetFont("DejaVu", "", 13);
                        $pdf->Cell(40, 10, "".dateFormat($dateWeekStart)."", 1, 0, 'C');
                        $pdf->Cell(40, 10, "".dateFormat($dateWeekEnd)."", 1, 0, 'C');
                        $pdf->Cell(50, 10, "$grnCount", 1, 0, 'R');
                        $pdf->Cell(50, 10, "$grnQty", 1, 0, 'R');
                        $pdf->Cell(60, 10, "".priceFormat($grnTotal)." đ", 1, 1, 'R');
                       
                    }
    
                    //Total row
                    $pdf->SetFont("DejaVu", "B", 16);
                    $pdf->SetTextColor(255, 255, 255);
                    $pdf->SetFillColor(84, 52, 86);  //cell background color
                    $pdf->Cell(110, 12, "TỔNG:", 1, 0, 'C', true);
    
                    $pdf->SetFont("DejaVu", "B", 13);
                    $pdf->SetTextColor(54, 33, 55);
                    $pdf->Cell(50, 12, "$sumGRNCount", 1, 0, 'R', false);
                    $pdf->Cell(50, 12, "$sumGRNQty", 1, 0, 'R', false);
                    $pdf->Cell(60, 12, "".priceFormat($sumGRNTotal)." đ", 1, 1, 'R', false);
                    //End: table data
                //End: table
    
                // Price in words
                $pdf->SetFont("DejaVu", "I", 15);
                $pdf->Cell(270, 10, "(".numberToWords($sumGRNTotal)." đồng)", 0, 1, 'R');
    
                $pdf->Ln(6);
    
                //Sign area
                $pdf->SetFont("DejaVu", "", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "TP.HCM, ".getCurrentDate()."", 0, 1, 'C');
                $pdf->SetFont("DejaVu", "B", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "Người lập phiếu", 0, 1, 'C');
                $pdf->SetFont("DejaVu", "I", 13);
                $pdf->Cell(150, 8, "", 0, 0);
                $pdf->Cell(120, 8, "(Ký tên, ghi rõ họ tên)", 0, 1, 'C');
    
    
                $pdf->Output("I", "SupplyReport_$date.pdf");
                break;
            
            default:
                echo "<h2>Vui lòng chọn loại báo cáo cần in</h2>";
                // header("location: ....");
                break;
        }
    }
    else if (isset($_GET['time']) && ($_GET['time'] == "nam") && isset($_GET['report'])) {
        //Define a new A4 PDF object
        $pdf = new A3PDF("L", "mm", "A3");
        $pdf->AddPage();
        //Alias for the total number of pages
        $pdf->AliasNbPages();
        //AddFont
        $pdf->addCustomFont();  


        $opt = $_GET['report'];
        // NAM 
        switch ($opt) {
            case "doanhthu":
                //Bold
                $pdf->SetFont("Times New Roman", "B", 26);
                //Set color for text
                $pdf->SetTextColor(9, 39, 53);
                //Set color for cell border
                $pdf->SetDrawColor(21, 61, 99);
    
                //Title
                $pdf->Cell(0, 10, "BÁO CÁO DOANH THU NĂM $year", 0, 1, "C");
                $pdf->SetFont("Times New Roman", "", 20);
                $pdf->Cell(0, 10, "từ ngày $dateStart đến ngày $dateEnd", 0, 1, "C");
    
                $pdf->Ln(12);

                //Table title
                $pdf->SetFont("Times New Roman", "B", 18);
                $pdf->SetFillColor(218, 233, 247);  //cell background color
                
                $pdf->Cell(30, 20, "Tháng", 1, 0, 'C', true);
                $pdf->Cell(70, 20, "Từ ngày", 1, 0, 'C', true);
                $pdf->Cell(70, 20, "Đến ngày", 1, 0, 'C', true);
                $pdf->Cell(50, 10, "Số đơn hàng", "LRT", 0, 'C', true);
                $pdf->Cell(60, 10, "Số sản phẩm đã bán", "LRT", 0, 'C', true);
                $pdf->Cell(120, 20, "Doanh thu", 1, 0, 'C', true);
                $pdf->Cell(0, 10, "", 0, 1, 'C', false);    //dummy line ending

                //Second line of cells (Merge cells)
                $pdf->SetFont("Times New Roman", "I", 18);
                $pdf->Cell(170, 10, "", 0, 0, false);
                $pdf->Cell(50, 10, "(đơn)", "LRB", 0, "C", true);
                $pdf->Cell(60, 10, "(cuốn)", "LRB", 0, "C", true);
                $pdf->Cell(0, 10, "", 0, 1, false);

                //Table data
                $sumOrderCount = 0;
                $sumQtyCount = 0;
                $sumOrderTotal = 0;

                for ($i = 1; $i <= sizeof($months); $i++) {
                    $dateMonthStart = $months[$i][0];
                    $dateMonthEnd = $months[$i][sizeof($months[$i]) - 1];
                    /* orderCount */
                    $orderCount = getOrderCount($dateMonthStart, $dateMonthEnd);
                    /* orderCount */

                    /* qtyCount */
                    $qtyCount = getQuantityCount($dateMonthStart, $dateMonthEnd);
                    /* qtyCount */

                    /* orderTotal */
                    $orderTotal = getOrderTotal($dateMonthStart, $dateMonthEnd);
                    /* orderTotal */


                    $sumOrderCount += $orderCount;
                    $sumQtyCount += $qtyCount;
                    $sumOrderTotal += $orderTotal;

                    $pdf->SetFont("Times New Roman", "B", 20);
                    $pdf->Cell(30, 13, "$i", 1, 0, 'C');
                    $pdf->SetFont("Times New Roman", "", 20);
                    $pdf->Cell(70, 13, "".dateFormat($dateMonthStart)."", 1, 0, 'C');
                    $pdf->Cell(70, 13, "".dateFormat($dateMonthEnd)."", 1, 0, 'C');
                    $pdf->Cell(50, 13, "$orderCount", 1, 0, 'R');
                    $pdf->Cell(60, 13, "$qtyCount", 1, 0, 'R');
                    $pdf->Cell(120, 13, "".priceFormat($orderTotal)." đ", 1, 1, 'R');
                }

                //Total row
                $pdf->SetFont("Times New Roman", "B", 24);
                $pdf->SetTextColor(255, 255, 255);
                $pdf->SetFillColor(21, 61, 99);  //cell background color
                $pdf->Cell(170, 15, "TỔNG:", 1, 0, 'C', true);

                $pdf->SetFont("Times New Roman", "B", 22);
                $pdf->SetTextColor(9, 39, 53);
                $pdf->Cell(50, 15, "$sumOrderCount", 1, 0, 'R', false);
                $pdf->Cell(60, 15, "$sumQtyCount", 1, 0, 'R', false);
                $pdf->Cell(120, 15, "".priceFormat($sumOrderTotal)." đ", 1, 1, 'R', false);
                //End: table data

                // Price in words
                $pdf->SetFont("Times New Roman", "I", 22);
                $pdf->Cell(0, 15, "(".numberToWords($sumOrderTotal)." đồng)", 0, 1, 'R');

                $pdf->Output("I", "YearIncomeReport_$year.pdf");
                break;
                
            case "loinhuan":
                //Bold
                $pdf->SetFont("Times New Roman", "B", 26);
                //Set color for text
                $pdf->SetTextColor(58, 67, 49);
                //Set color for cell border
                $pdf->SetDrawColor(38, 44, 32);

                //Title
                $pdf->Cell(0, 10, "BÁO CÁO LỢI NHUẬN NĂM 2024", 0, 1, "C");
                $pdf->SetFont("Times New Roman", "", 20);
                $pdf->Cell(0, 10, "từ ngày $dateStart đến ngày $dateEnd", 0, 1, "C");

                $pdf->Ln(12);

                //Table title
                $pdf->SetFont("Times New Roman", "B", 18);
                $pdf->SetFillColor(200, 214, 192);  //cell background color

                $pdf->Cell(30, 20, "Tháng", 1, 0, 'C', true);
                $pdf->Cell(40, 20, "Từ ngày", 1, 0, 'C', true);
                $pdf->Cell(40, 20, "Đến ngày", 1, 0, 'C', true);
                $pdf->Cell(50, 10, "Số đơn hàng", "LRT", 0, 'C', true);
                $pdf->Cell(60, 10, "Số sản phẩm đã bán", "LRT", 0, 'C', true);
                $pdf->Cell(60, 20, "Doanh thu", 1, 0, 'C', true);
                $pdf->Cell(60, 20, "Chi", 1, 0, 'C', true);
                $pdf->Cell(60, 20, "Lợi nhuận", 1, 0, 'C', true);
                $pdf->Cell(0, 10, "", 0, 1, 'C', false);    //dummy line ending

                //Second line of cells (Merge cells)
                $pdf->SetFont("Times New Roman", "I", 18);
                $pdf->Cell(110, 10, "", 0, 0, false);
                $pdf->Cell(50, 10, "(đơn)", "LRB", 0, "C", true);
                $pdf->Cell(60, 10, "(cuốn)", "LRB", 0, "C", true);
                $pdf->Cell(0, 10, "", 0, 1, false);

                //Table data
                $sumOrderCount = 0;
                $sumQtyCount = 0;
                $sumOrderTotal = 0;
                $sumGRNTotal = 0;
                $sumProfit = 0;

                for ($i = 1; $i <= sizeof($months); $i++) {
                    $dateMonthStart = $months[$i][0];
                    $dateMonthEnd = $months[$i][sizeof($months[$i]) - 1];
                    /* orderCount */
                    $orderCount = getOrderCount($dateMonthStart, $dateMonthEnd);
                    /* orderCount */

                    /* qtyCount */
                    $qtyCount = getQuantityCount($dateMonthStart, $dateMonthEnd);
                    /* qtyCount */

                    /* orderTotal */
                    $orderTotal = getOrderTotal($dateMonthStart, $dateMonthEnd);
                    /* orderTotal */

                    /* grnTotal */
                    $grnTotal = getGRNTotal($dateMonthStart, $dateMonthEnd);
                    /* grnTotal */
                    $profit = $orderTotal - $grnTotal;

                    $sumOrderCount += $orderCount;
                    $sumQtyCount += $qtyCount;
                    $sumOrderTotal += $orderTotal;
                    $sumGRNTotal += $grnTotal;
                    $sumProfit += $profit;

                    $pdf->SetFont("Times New Roman", "B", 20);
                    $pdf->Cell(30, 13, "$i", 1, 0, 'C');
                    $pdf->SetFont("Times New Roman", "", 20);
                    $pdf->Cell(40, 13, "$dateMonthStart", 1, 0, 'C');
                    $pdf->Cell(40, 13, "$dateMonthEnd", 1, 0, 'C');
                    $pdf->Cell(50, 13, "$orderCount", 1, 0, 'R');
                    $pdf->Cell(60, 13, "$qtyCount", 1, 0, 'R');
                    $pdf->Cell(60, 13, "".priceFormat($orderTotal)." đ", 1, 0, 'R');
                    $pdf->Cell(60, 13, "".priceFormat($grnTotal)." đ", 1, 0, 'R');
                    $pdf->Cell(60, 13, "".priceFormat($profit)." đ", 1, 1, 'R');                                        
                }

                //Total row
                $pdf->SetFont("Times New Roman", "B", 24);
                $pdf->SetTextColor(255, 255, 255);
                $pdf->SetFillColor(98, 114, 84);  //cell background color
                $pdf->Cell(110, 15, "TỔNG:", 1, 0, 'C', true);

                $pdf->SetFont("Times New Roman", "B", 22);
                $pdf->SetTextColor(58, 67, 49);
                $pdf->Cell(50, 15, "$sumOrderCount", 1, 0, 'R', false);
                $pdf->Cell(60, 15, "$sumQtyCount", 1, 0, 'R', false);
                $pdf->Cell(60, 15, "".priceFormat($sumOrderTotal)." đ", 1, 0, 'R', false);
                $pdf->Cell(60, 15, "".priceFormat($sumGRNTotal)." đ", 1, 0, 'R', false);
                $pdf->Cell(60, 15, "".priceFormat($sumProfit)." đ", 1, 1, 'R', false);
                //End: table data

                // Price in words
                $pdf->SetFont("Times New Roman", "I", 20);
                $pdf->Cell(0, 15, "(".numberToWords($sumProfit)." đồng)", 0, 1, 'R');


                $pdf->Output("I", "YearProfitReport_$year.pdf");
                break;
            case "nhapkho":
                //Bold
                $pdf->SetFont("Times New Roman", "B", 26);
                //Set color for text
                $pdf->SetTextColor(54 ,33, 55);
                //Set color for cell border
                $pdf->SetDrawColor(54 ,33, 55);

                //Title
                $pdf->Cell(0, 10, "BÁO CÁO NHẬP KHO NĂM 2024", 0, 1, "C");
                $pdf->SetFont("Times New Roman", "", 20);
                $pdf->Cell(0, 10, "từ ngày $dateStart đến ngày $dateEnd", 0, 1, "C");

                $pdf->Ln(12);

                //Table title
                $pdf->SetFont("Times New Roman", "B", 18);
                $pdf->SetFillColor(217, 192, 218);  //cell background color

                $pdf->Cell(30, 20, "Tháng", 1, 0, 'C', true);
                $pdf->Cell(70, 20, "Từ ngày", 1, 0, 'C', true);
                $pdf->Cell(70, 20, "Đến ngày", 1, 0, 'C', true);
                $pdf->Cell(50, 10, "Số đơn nhập", "LRT", 0, 'C', true);
                $pdf->Cell(60, 10, "Số sản phẩm nhập", "LRT", 0, 'C', true);
                $pdf->Cell(120, 20, "Chi", 1, 0, 'C', true);
                $pdf->Cell(0, 10, "", 0, 1, 'C', false);    //dummy line ending

                //Second line of cells (Merge cells)
                $pdf->SetFont("Times New Roman", "I", 18);

                $pdf->Cell(170, 10, "", 0, 0, false);
                $pdf->Cell(50, 10, "(đơn)", "LRB", 0, "C", true);
                $pdf->Cell(60, 10, "(cuốn)", "LRB", 0, "C", true);
                $pdf->Cell(0, 10, "", 0, 1, false);

                //Table data
                $sumGRNCount = 0;
                $sumGRNQty = 0;
                $sumGRNTotal = 0;

                for ($i = 1; $i <= sizeof($months); $i++) {
                    $dateMonthStart = $months[$i][0];
                    $dateMonthEnd = $months[$i][sizeof($months[$i]) - 1];
                    /* grnCount */
                    $grnCount = getGRNCount($dateMonthStart, $dateMonthEnd);
                    /* grnCount */

                    /* grnQty */
                    $grnQty = getGRNQty($dateMonthStart, $dateMonthEnd);
                    /* grnQty */
                    
                    /* grnTotal */
                    $grnTotal = getGRNTotal($dateMonthStart, $dateMonthEnd);
                    /* grnTotal */

                    $sumGRNCount += $grnCount;
                    $sumGRNQty += $grnQty;
                    $sumGRNTotal += $grnTotal;

                    $pdf->SetFont("Times New Roman", "B", 20);
                    $pdf->Cell(30, 13, "$i", 1, 0, 'C');
                    $pdf->SetFont("Times New Roman", "", 20);
                    $pdf->Cell(70, 13, "".dateFormat($dateMonthStart)."", 1, 0, 'C');
                    $pdf->Cell(70, 13, "".dateFormat($dateMonthEnd)."", 1, 0, 'C');
                    $pdf->Cell(50, 13, "$grnCount", 1, 0, 'R');
                    $pdf->Cell(60, 13, "$grnQty", 1, 0, 'R');
                    $pdf->Cell(120, 13, "".priceFormat($grnTotal)." đ", 1, 1, 'R');
                }

                //Total row
                $pdf->SetFont("Times New Roman", "B", 24);
                $pdf->SetTextColor(255, 255, 255);
                $pdf->SetFillColor(84, 52, 86);  //cell background color
                $pdf->Cell(170, 15, "TỔNG:", 1, 0, 'C', true);

                $pdf->SetFont("Times New Roman", "B", 22);
                $pdf->SetTextColor(54, 33, 55);
                $pdf->Cell(50, 15, "$sumGRNCount", 1, 0, 'R', false);
                $pdf->Cell(60, 15, "$sumGRNQty", 1, 0, 'R', false);
                $pdf->Cell(120, 15, "".priceFormat($sumGRNTotal)." đ", 1, 1, 'R', false);
                //End: table data

                // Price in words
                $pdf->SetFont("Times New Roman", "I", 20);
                $pdf->Cell(0, 15, "(".numberToWords($sumGRNTotal)." đồng)", 0, 1, 'R');

                $pdf->Output("I", "YearSupplyReport_$year.pdf");
                break;
            default:
                echo "<h2>Vui lòng chọn loại báo cáo cần in</h2>";
                // header("location: ....");
                break;
                
        }
    }
    
?>