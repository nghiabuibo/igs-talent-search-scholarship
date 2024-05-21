<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'functions.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$jwt = $_GET['jwt'] ?? '';

try {
	$payload = JWT::decode($jwt, new Key($config['api_key'], 'HS256'));
	if (property_exists($payload, 'error')) {
		return 'Error: '.$payload->error;
	};

	$template = $payload->success->template;
	$params = $payload->success->params;
	$additional_info = $payload->success->additional_info;
	
	require_once __DIR__.'/templates/'.$template.'.php';
}

catch(Exception $e) {
	echo 'Error: ' .$e->getMessage();
}