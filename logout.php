<?php
session_start();
$_SESSION['id']=="";
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="loginpage.php";
</script>
