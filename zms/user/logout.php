<?php
session_start();
unset($_SESSION["user"]);
?>
<script type="text/javascript">
	window.location="../login.php";
</script>