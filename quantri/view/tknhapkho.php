<?php
    require_once '../model/func_lib.php';
?>

<?php
    include_once '../inc/header_thongke.php';
?>
    <main class="content">
        <h1>Thống kê nhập kho</h1>
        <form class="form-controller" action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
        <input type="hidden" name="page" value="tknhapkho">
            <div class="form-group" id="thoigian">
                <label for="time">Xem báo cáo theo: </label>
                <select name="time" id="time">
                    <option value="thang" 
                    <?php if(isset($_GET['time']) && ($_GET['time']) == 'thang') echo "selected"?>
                    >
                        Tháng
                    </option>
                    <option value="nam" 
                    <?php if(isset($_GET['time']) && ($_GET['time']) == 'nam') echo "selected"?>
                    >
                        Năm
                    </option>
                </select>
            </div>
            <input type="hidden" name="report" value="nhapkho">
            <div class="form-group">
                <label for="date">Chọn thời gian: </label>
                <div id="chonthoigian">
                    <?php
                        if (isset($_GET['time'])) {
                            $time = $_GET['time'];
                            if ($time == 'thang') {
                                echo createMonthSelectBox();
                            } else if ($time == 'nam') {
                                echo createYearSelectBox();
                            }
                        }
                        else {
                            echo createMonthSelectBox();
                        }
                    ?>
                </div>
            </div>
            <button class="thongke-button view-btn" type="submit" id="xemthongke">
                <i class="fa-regular fa-eye"></i>
                Xem thống kê
            </button>
        </form>    
        <div id="thongke-container" class="nhapkho">
            <?php
                if(isset($_GET['time']) && isset($_GET['report'])) {
                    $time = $_GET['time'];
                    if ($time == 'thang') {
                        $date = $_GET['thang'];
                        $dateStart = $date . "-01";
                        $dateEnd = $date . "-" . dayEndOfMonth($date);
                        $weeks = getWeeks($date);

                        echo '
                            <table class="thongke-table nhapkho" border="2px">
                                <tr class="title nhapkho">
                                    <th width="10%">Tuần thứ</th>
                                    <th width="15%">Từ ngày</th>
                                    <th width="15%">Đến ngày</th>
                                    <th width="15%">
                                        Số đơn nhập
                                        <br>
                                        <span>(đơn)</span>
                                    </th>
                                    <th width="20%">
                                        Số sản phẩm đã nhập
                                        <br>
                                        <span>(cuốn)</span>
                                    </th>
                                    <th width="25%">Chi</th>
                                </tr>
                        ';
                        $sumCount = 0;
                        $sumQty = 0;
                        $sumTotal = 0;
                        for ($i = 1; $i <= sizeof($weeks); $i++) {
                            $dateWeekStart = $weeks[$i][0];
                            $dateWeekEnd = $weeks[$i][sizeof($weeks[$i]) - 1];

                            $grnCount = getGRNCount($dateWeekStart, $dateWeekEnd);
                            $grnQty = getGRNQty($dateWeekStart, $dateWeekEnd);
                            $grnTotal = getGRNTotal($dateWeekStart, $dateWeekEnd);

                            $sumCount += $grnCount;
                            $sumQty += $grnQty;
                            $sumTotal += $grnTotal;

                            echo "
                                <tr class='table-data nhapkho'>
                                    <td>$i</td>
                                    <td>".dateFormat($dateWeekStart)."</td>
                                    <td>".dateFormat($dateWeekEnd)."</td>
                                    <td class='algin-right'>$grnCount</td>
                                    <td class='algin-right'>$grnQty</td>
                                    <td class='algin-right'>".priceFormat($grnTotal)." VNĐ</td>
                                </tr>
                            ";
                        }  
                        echo "    
                                <tr class='table-data sum-row'>
                                    <td colspan='3' class='nhapkho' id='sum-cell'>TỔNG:</td>
                                    <td class='algin-right sum'>$sumCount</td>
                                    <td class='algin-right sum'>$sumQty</td>
                                    <td class='algin-right sum'>".priceFormat($sumTotal)." VNĐ</td>
                                </tr>
                            </table>
                            <p class='numberInWords'>
                                <span class='numberInWords-title'>Viết bằng chữ: </span>
                                <span class='numberInWords-content'>".numberToWords($sumTotal)." đồng</span>
                            </p>
                        </div>
                        ";
                    } 
                    else if ($time == 'nam'){
                        $year = $_GET['nam'];
                        $dateStart = dateFormat($year . '-01-01');
                        $dateEnd = dateFormat($year . '-12-31');
                        $months = getDaysOfMonth($year);

                        echo '
                            <table class="thongke-table nhapkho" border="2px">
                                <tr class="title nhapkho">
                                    <th width="10%">Tháng</th>
                                    <th width="15%">Từ ngày</th>
                                    <th width="15%">Đến ngày</th>
                                    <th width="15%">
                                        Số đơn nhập
                                        <br>
                                        <span>(đơn)</span>
                                    </th>
                                    <th width="20%">
                                        Số sản phẩm đã nhập
                                        <br>
                                        <span>(cuốn)</span>
                                    </th>
                                    <th width="25%">Chi</th>
                                </tr>
                        ';

                        $sumCount = 0;
                        $sumQty = 0;
                        $sumTotal = 0;
                        
                        for ($i = 1; $i <= sizeof($months); $i++) {
                            $dateMonthStart = $months[$i][0];
                            $dateMonthEnd = $months[$i][sizeof($months[$i]) - 1];

                            $grnCount = getGRNCount($dateMonthStart, $dateMonthEnd);
                            $grnQty = getGRNQty($dateMonthStart, $dateMonthEnd);
                            $grnTotal = getGRNTotal($dateMonthStart, $dateMonthEnd);

                            $sumCount += $grnCount;
                            $sumQty += $grnQty;
                            $sumTotal += $grnTotal;

                            echo "
                                <tr class='table-data nhapkho'>
                                    <td>$i</td>
                                    <td>".dateFormat($dateMonthStart)."</td>
                                    <td>".dateFormat($dateMonthEnd)."</td>
                                    <td class='algin-right'>$grnCount</td>
                                    <td class='algin-right'>$grnQty</td>
                                    <td class='algin-right'>".priceFormat($grnTotal)." VNĐ</td>
                                </tr>
                            ";
                        }
                        echo "
                            <tr class='table-data sum-row'>
                                <td colspan='3' class='nhapkho' id='sum-cell'>TỔNG:</td>
                                <td class='algin-right sum'>$sumCount</td>
                                <td class='algin-right sum'>$sumQty</td>
                                <td class='algin-right sum'>".priceFormat($sumTotal)." VNĐ</td>
                            </tr>
                            </table>
                            <p class='numberInWords'>
                                <span class='numberInWords-title'>Viết bằng chữ: </span>
                                <span class='numberInWords-content'>".numberToWords($sumTotal)." đồng</span>
                            </p>
                        ";
                    }
                    echo "
                        <button class='thongke-button print-btn nhapkho' type='submit' id='inthongke'>
                            <i class='fa-solid fa-print'></i>";
                            if(isset($_GET['time']) && isset($_GET['report'])) {
                                $time = $_GET['time'];
                                if ($time == 'thang') {
                                    $date = $_GET['thang'];
                                    echo "<a href='../controller/printReports.php?time=thang&report=nhapkho&thang=$date'>In thống kê</a>";
                                } 
                                else if ($time == 'nam'){
                                    $year = $_GET['nam'];
                                    echo "<a href='../controller/printReports.php?time=nam&report=nhapkho&nam=$year'>In thống kê</a>";
                                }
                            }
                            else {
                                echo "<a href='#'>In thống kê</a>";
                                }
                    echo "</button>";
                }
            ?>
        </div>
    </main>
    <script src="../asset/js/thongKe.js"></script>
</body>
</html>