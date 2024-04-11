<script src="../asset/js/sweetalert.min.js"></script>
<?php
    $title = "Lưu ý!!!";
    $text = "Bạn cần đăng nhập để có thể vào giỏ hàng";
    $icon = "warning"; //"success", "error", "warning", "info"
    $button = "Tôi đã hiểu"; 
?>
<script type='text/javascript'>
swal({
    title: "<?php echo $title;?>",
    text: "<?php echo $text;?>",
    icon: "<?php echo $icon;?>",
    button: "<?php echo $button;?>",
    });
</script>