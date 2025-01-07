<?php
    session_start();
    session_destroy();
    echo '<script>alert("Terima Kasih")</script>';
    echo '<script>window.location="login.php"</script>';
?>