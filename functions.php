<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/vendor/autoload.php';

function get_spreadsheet_data($template) {
	global $config;
	$api_url = $config['api_url'];
	$param = '/values/'.urlencode($config[$template]['sheet_name']).'!'.$config[$template]['sheet_range'].'?key=';
	$sheet_id = $config[$template]['spreadsheet_id'];
	$api_key = $config['api_key'];

	$endpoint = $api_url.$sheet_id.$param.$api_key;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL,$endpoint);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);
	return $result;
}

function vn_to_en($str, $convert_space = false){
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		'd'=>'đ',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'i'=>'í|ì|ỉ|ĩ|ị',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'D'=>'Đ',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	);
	 
	foreach($unicode as $nonUnicode=>$uni) {
		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
	}

	if ($convert_space) {
		$str = str_replace(' ', '_', $str);
	}
	
	return $str;
}

function trim_phone($phone='') {
	if (strpos($phone, '84') === 0) {
		$phone_trimmed = substr($phone, 2);
	} else if (strpos($phone, '84') === 1) {
		$phone_trimmed = substr($phone, 3);
	} else if (strpos($phone, '0') === 0) {
		$phone_trimmed = substr($phone, 1);
	} else {
		$phone_trimmed = $phone;
	}
	return $phone_trimmed;
}

function compare_name($name1, $name2) {
	return (
		str_replace(' ', '', strtolower(vn_to_en($name1))) === 
		str_replace(' ', '', strtolower(vn_to_en($name2)))
	);
}

function compare_phone($input_phone, $search_phone) {
	if (!$input_phone && $search_phone) {
		return false;
	}

	if (!$input_phone && !$search_phone) {
		return true;
	}

	return (
		strpos(
			str_replace(' ', '', $search_phone),
			str_replace(' ', '', $input_phone)
		) !== false
	);
}