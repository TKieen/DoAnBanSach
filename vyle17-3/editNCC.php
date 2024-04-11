<?php extract($result);?>
<div class="container">
    <!--Start: Aside bar-->
    <aside>
        <!--menu button-->
    <div class="menu-btn">
        <i class="fas fa-bars"></i>
        <h1>Dashboard</h1>
    </div>
    <!--sidebar-->
    <div class="side-bar">
        <!--Menu items-->
        <div class="menu">
            <div class="item"><a href=""><i class="fas fa-desktop"></i>Dashboard</a></div>
            <div class="item"><a href=""><i class="fas fa-table"></i>Tables
                <!--dropdown-->
                <!--dropdown arrow-->
                <i class="fas fa-angle-right dropdown"></i>
            </a>
            <div class="sub-menu">
                <a href="" class="sub-item">Sub item</a>
                <a href="" class="sub-item">Sub item</a>
                <a href="" class="sub-item">Sub item</a>
            </div>
            </div>
            <div class="item"><a href=""><i class="fas fa-th"></i>Forms</a></div>            </div>
    </div>
    </aside>
    <!--End: Aside bar-->
    <main class="content">
        <form action="index.php?page=editNCC" class="create" method="post">
            <input type="hidden" name="id" value="<?=$ID?>">
            <label for="">Ten nha cung cap:</label>
            <input type="text" name="ten" value="<?=$tenNCC?>">
            <br>
            <label for="">Email:</label>
            <input type="email" name="email" value="<?=$email?>">
            <br>
            <label for="">Dien thoai:</label>
            <input type="text" name="dienthoai" value="<?=$dienthoai?>">
            <label for="">Dia chi:</label>
            <input type="text" name="diachi" value="<?=$diachi?>">
            <label for="">Trang thai:</label>
            <?php
                if($trangthai==0)
                    echo 
                '<input type="radio" value="1" name="trangthai"> <label for="">hoatdong</label>
                <input type="radio" value="0" name="trangthai" checked> <label for="">khoa</label>';
                else echo
                '<input type="radio" value="1" name="trangthai" checked> <label for="">hoatdong</label>
                <input type="radio" value="0" name="trangthai"> <label for="">khoa</label>';
            ?>
            <button type="submit" name="btnedit">Thay doi</button>
        </form>
    </main>
</div>