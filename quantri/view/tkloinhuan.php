<?php
    require_once '../model/func_lib.php';
?>

<?php
    include_once '../inc/header_thongke.php';
?>
    <main class="content">
        <h1>Thống kê lợi nhuận</h1>
        <form class="form-controller" action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
        <!-- Sửa thành tkloinhuan -->
        <input type="hidden" name="page" value="tkloinhuan">
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
            <input type="hidden" name="report" value="loinhuan">
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
        <div id="thongke-container" class="loinhuan">
            <?php
                if(isset($_GET['time']) && isset($_GET['report'])) {
                    $time = $_GET['time'];
                    if ($time == 'thang') {
                        $date = $_GET['thang'];
                        $dateStart = $date . "-01";
                        $dateEnd = $date . "-" . dayEndOfMonth($date);
                        $weeks = getWeeks($date);

                        echo '
                            <table class="thongke-table loinhuan" border="2px">
                                <tr class="title loinhuan">
                                    <th width="5%">Tuần thứ</th>
                                    <th width="10%">Từ ngày</th>
                                    <th width="10%">Đến ngày</th>
                                    <th width="15%">
                                        Số đơn hàng
                                        <br>
                                        <span>(đơn)</span>
                                    </th>
                                    <th width="15%">
                                        Số sản phẩm đã bán
                                        <br>
                                        <span>(cuốn)</span>
                                    </th>
                                    <th width="15%">Doanh thu</th>
                                    <th width="15%">Chi</th>
                                    <th width="20%">Lợi nhuận</th>
                                </tr>
                        ';
                        $sumCount = 0;
                        $sumQty = 0;
                        $sumTotal = 0;
                        $sumGRNTotal = 0;
                        $sumProfit = 0;

                        for ($i = 1; $i <= sizeof($weeks); $i++) {
                            $dateWeekStart = $weeks[$i][0];
                            $dateWeekEnd = $weeks[$i][sizeof($weeks[$i]) - 1];

                            $orderCount = getOrderCount($dateWeekStart, $dateWeekEnd);
                            $orderQty = getQuantityCount($dateWeekStart, $dateWeekEnd);
                            $orderTotal = getOrderTotal($dateWeekStart, $dateWeekEnd);
                            $grnTotal = getGRNTotal($dateWeekStart, $dateWeekEnd);
                            $profit = $orderTotal - $grnTotal;
                            
                            $sumCount += $orderCount;
                            $sumQty += $orderQty;
                            $sumTotal += $orderTotal;
                            $sumGRNTotal += $grnTotal;
                            $sumProfit += $profit;

                            echo "
                                <tr class='table-data loinhuan'>
                                    <td>$i</td>
                                    <td>".dateFormat($dateWeekStart)."</td>
                                    <td>".dateFormat($dateWeekEnd)."</td>
                                    <td class='algin-right'>$orderCount</td>
                                    <td class='algin-right'>$orderQty</td>
                                    <td class='algin-right'>".priceFormat($orderTotal)." VNĐ</td>
                                    <td class='algin-right'>".priceFormat($grnTotal)." VNĐ</td>
                                    <td class='algin-right'>".priceFormat($profit)." VNĐ</td>
                                </tr>
                            ";
                        }  
                        echo "    
                                <tr class='table-data sum-row'>
                                    <td colspan='3' class='loinhuan' id='sum-cell'>TỔNG:</td>
                                    <td class='algin-right sum'>$sumCount</td>
                                    <td class='algin-right sum'>$sumQty</td>
                                    <td class='algin-right sum'>".priceFormat($sumTotal)." VNĐ</td>
                                    <td class='algin-right sum'>".priceFormat($sumGRNTotal)." VNĐ</td>
                                    <td class='algin-right sum'>".priceFormat($sumProfit)." VNĐ</td>
                                </tr>
                            </table>
                            <p class='numberInWords'>
                                <span class='numberInWords-title'>Viết bằng chữ: </span>
                                <span class='numberInWords-content'>".numberToWords($sumProfit)." đồng</span>
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
                            <table class="thongke-table loinhuan" border="2px">
                                <tr class="title loinhuan">
                                    <th width="5%">Tháng</th>
                                    <th width="10%">Từ ngày</th>
                                    <th width="10%">Đến ngày</th>
                                    <th width="15%">
                                        Số đơn hàng
                                        <br>
                                        <span>(đơn)</span>
                                    </th>
                                    <th width="15%">
                                        Số sản phẩm đã bán
                                        <br>
                                        <span>(cuốn)</span>
                                    </th>
                                    <th width="15%">Doanh thu</th>
                                    <th width="15%">Chi</th>
                                    <th width="20%">Lợi nhuận</th>
                                </tr>
                        ';

                        $sumCount = 0;
                        $sumQty = 0;
                        $sumTotal = 0;
                        $sumGRNTotal = 0;
                        $sumProfit = 0;
                        
                        for ($i = 1; $i <= sizeof($months); $i++) {
                            $dateMonthStart = $months[$i][0];
                            $dateMonthEnd = $months[$i][sizeof($months[$i]) - 1];

                            $orderCount = getOrderCount($dateMonthStart, $dateMonthEnd);
                            $orderQty = getQuantityCount($dateMonthStart, $dateMonthEnd);
                            $orderTotal = getOrderTotal($dateMonthStart, $dateMonthEnd);
                            $grnTotal = getGRNTotal($dateMonthStart, $dateMonthEnd);
                            $profit = $orderTotal - $grnTotal;

                            $sumCount += $orderCount;
                            $sumQty += $orderQty;
                            $sumTotal += $orderTotal;
                            $sumGRNTotal += $grnTotal;
                            $sumProfit += $profit;

                            echo "
                                <tr class='table-data loinhuan'>
                                    <td>$i</td>
                                    <td>".dateFormat($dateMonthStart)."</td>
                                    <td>".dateFormat($dateMonthEnd)."</td>
                                    <td class='algin-right'>$orderCount</td>
                                    <td class='algin-right'>$orderQty</td>
                                    <td class='algin-right'>".priceFormat($orderTotal)." VNĐ</td>
                                    <td class='algin-right'>".priceFormat($grnTotal)." VNĐ</td>
                                    <td class='algin-right'>".priceFormat($profit)." VNĐ</td>
                                </tr>
                            ";
                        }
                        echo "
                            <tr class='table-data sum-row'>
                                <td colspan='3' class='loinhuan' id='sum-cell'>TỔNG:</td>
                                <td class='algin-right sum'>$sumCount</td>
                                <td class='algin-right sum'>$sumQty</td>
                                <td class='algin-right sum'>".priceFormat($sumTotal)." VNĐ</td>
                                <td class='algin-right sum'>".priceFormat($sumGRNTotal)." VNĐ</td>
                                <td class='algin-right sum'>".priceFormat($sumProfit)." VNĐ</td>
                            </tr>
                            </table>
                            <p class='numberInWords'>
                                <span class='numberInWords-title'>Viết bằng chữ: </span>
                                <span class='numberInWords-content'>".numberToWords($sumProfit)." đồng</span>
                            </p>
                        ";
                    }
                    echo "
                        <button class='thongke-button print-btn loinhuan' type='submit' id='inthongke'>
                            <i class='fa-solid fa-print'></i>";
                            if(isset($_GET['time']) && isset($_GET['report'])) {
                                $time = $_GET['time'];
                                if ($time == 'thang') {
                                    $date = $_GET['thang'];
                                    echo "<a href='../controller/printReports.php?time=thang&report=loinhuan&thang=$date'>In thống kê</a>";
                                } 
                                else if ($time == 'nam'){
                                    $year = $_GET['nam'];
                                    echo "<a href='../controller/printReports.php?time=nam&report=loinhuan&nam=$year'>In thống kê</a>";
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