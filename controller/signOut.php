<?php
    login_session_unset();
    cart_session_unset();
    header("Location:index.php?page=home");
?>