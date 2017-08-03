<?php
	header('Access-Control-Allow-Origin: *');
	session_start();
	if(session_destroy()){
		echo 'success';
	}
?>