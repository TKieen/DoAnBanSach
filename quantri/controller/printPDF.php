<?php
    require_once "../../lib/tcpdf/tcpdf.php";
    //if (isset($_POST['print'])) {
        $pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle("Thống kê");
        $pdf->setHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont('dejavusans');
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(True, 10);
        $pdf->SetFont('dejavusans', 13);
        $pdf->AddPage();

        $content = '';
        $content = $content.'
        <main class="content">
        <h1>Thống kê doanh thu</h1>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="?page=TKDoanhThu" method="post">

            <button type="submit" name="btnsearch">Xem</button>
        </div>
        <!--End: Admin-controller-->

        <!--Start: Data table-->
            <table>
            <!--noi dung tieu de-->
                
            <tr class="title">
                <th></th>
                <th>Từ ngày</th>
                <th>Đến ngày</th>
                <th>Tổng đơn hàng</th>
                <th>Tổng sản phẩm</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                <th>Tổng doanh thu</th>
            </tr>
            <tr>
                <th>Tuần 1</th>
                <td><?php echo dateFormat(WEEK1_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat(WEEK1_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w1_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK1_START_DAY."-".$M."-".$Y), dateFormat(WEEK1_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w1_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK1_START_DAY."-".$M."-".$Y), dateFormat(WEEK1_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w1_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK1_START_DAY."-".$M."-".$Y), dateFormat(WEEK1_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tuần 2</th>
                <td><?php echo dateFormat(WEEK2_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat(WEEK2_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w2_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK2_START_DAY."-".$M."-".$Y), dateFormat(WEEK2_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w2_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK2_START_DAY."-".$M."-".$Y), dateFormat(WEEK2_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w2_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK2_START_DAY."-".$M."-".$Y), dateFormat(WEEK2_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tuần 3</th>
                <td><?php echo dateFormat(WEEK3_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat(WEEK3_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w3_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK3_START_DAY."-".$M."-".$Y), dateFormat(WEEK3_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w3_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK3_START_DAY."-".$M."-".$Y), dateFormat(WEEK3_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w3_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK3_START_DAY."-".$M."-".$Y), dateFormat(WEEK3_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tuần 4</th>
                <td><?php echo dateFormat(WEEK4_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat($WEEK4_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w4_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK4_START_DAY."-".$M."-".$Y), dateFormat($WEEK4_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w4_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK4_START_DAY."-".$M."-".$Y), dateFormat($WEEK4_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w4_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK4_START_DAY."-".$M."-".$Y), dateFormat($WEEK4_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <th>Tổng</th>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        ';

        $pdf->writeHTML($content);
        $pdf->Output();

    //}
    
?>