<?php

$name = $params[1];
$scholarship_vn = $additional_info[0];
$scholarship_en = $additional_info[1];
$scholarship_amount = $additional_info[2];
$date_vn = $additional_info[3];
$date_en =$additional_info[4];

$pageLayout = [
	'scholarship' => [
		'bg_path' => __DIR__.'/../assets/pdf/igs_openweek_scholarship.pdf',
		'dimension' => [1755, 2481]
	]
];

use setasign\Fpdi\Tcpdf\Fpdi;
$pdf = new Fpdi('P', 'px', $pageLayout['scholarship']['dimension'], true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ivy Global School');
$pdf->SetTitle('IGS Scholarship');
$pdf->SetSubject('Ivy Global School');
$pdf->SetKeywords('Ivy Global School, Scholarship');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}



// ---------------------------------------------------------

// convert TTF font to TCPDF format and store it on the fonts folder
$mont = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/Montserrat-SemiBold.ttf', 'TrueTypeUnicode', '', 96);
$corm = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/CormorantGaramond-Regular.ttf', 'TrueTypeUnicode', '', 96);
$corm_b = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/CormorantGaramond-Bold.ttf', 'TrueTypeUnicode', '', 96);
$corm_sb = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/CormorantGaramond-SemiBold.ttf', 'TrueTypeUnicode', '', 96);
$corm_sbi = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/CormorantGaramond-SemiBoldItalic.ttf', 'TrueTypeUnicode', '', 96);
$corm_li = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/CormorantGaramond-LightItalic.ttf', 'TrueTypeUnicode', '', 96);
$corm_i = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/CormorantGaramond-Italic.ttf', 'TrueTypeUnicode', '', 96);
$spectral_mi = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/Spectral-MediumItalic.ttf', 'TrueTypeUnicode', '', 96);
$future = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/Future-History.ttf', 'TrueTypeUnicode', '', 96);
$corsiva = TCPDF_FONTS::addTTFfont(__DIR__.'/../assets/fonts/MTCORSVA.TTF', 'TrueTypeUnicode', '', 96);

$scholarship_width = $pageLayout['scholarship']['dimension'][0];
$scholarship_height = $pageLayout['scholarship']['dimension'][1];
// set the source file
$pdf->setSourceFile($pageLayout['scholarship']['bg_path']);

// add a page
$pdf->AddPage('P', $pageLayout['scholarship']['dimension']);

// import scholarship page 1
$tplId = $pdf->importPage(1);
// use the imported page and place it at point 0, 0 with a width equal to layout width (fullpage)
$pdf->useTemplate($tplId, 0, 0, $scholarship_width);

$pdf->SetTextColor(9, 24, 48);
$pdf->SetFont($corm_b, '', 110, false);
$pdf->writeHTMLCell($scholarship_width, 300, 0, 1000, vn_to_en($name), 0, 0, false, true, 'C');

$html = "
for being awarded
<br/>
the $scholarship_en Scholarship in the amount of
<br/>
Đã nhận được học bổng $scholarship_vn trị giá
";
$pdf->setCellHeightRatio(1.4);
$pdf->SetFont($corm_li, '', 50, false);
$pdf->writeHTMLCell($scholarship_width, 100, 0, 1160, $html, 0, 0, false, true, 'C');

$pdf->SetFont($spectral_mi, '', 90, false);
$pdf->writeHTMLCell($scholarship_width, 100, 0, 1420, $scholarship_amount, 0, 0, false, true, 'C');

// add a page
$pdf->AddPage('P', $pageLayout['scholarship']['dimension']);

// import scholarship page 2
$tplId = $pdf->importPage(2);
// use the imported page and place it at point 0, 0 with a width equal to layout width (fullpage)
$pdf->useTemplate($tplId, 0, 0, $scholarship_width);

$html = "Conditions apply";
$pdf->SetFont($corm_sb, '', 50, false);
$pdf->writeHTMLCell($scholarship_width, 100, 0, 950, $html, 0, 0, false, true, 'C');

if ($scholarship_en === 'IGS Global English Program') {
	$scholarship_valid_text_en = 'The scholarship is valid for tution fee of the first school year';
	$scholarship_valid_text_vn = 'Học bổng có giá trị sử dụng cho 01 năm học đầu tiên';
} else {
	$scholarship_valid_text_en = 'The scholarship is valid for one-time use only';
	$scholarship_valid_text_vn = 'Học bổng có giá trị sử dụng 01 lần';
}

$html = "
-&nbsp;&nbsp;The scholarship applies to the $scholarship_en
<br/>
-&nbsp;&nbsp;$scholarship_valid_text_en
<br/>
-&nbsp;&nbsp;The scholarship amount is non-transferable and non-cashable
<br/>
-&nbsp;&nbsp;The scholarship is not valid in conjunction with other promotions
<br/>
-&nbsp;&nbsp;Expired date: $date_en
";
$pdf->setCellHeightRatio(1.2);
$pdf->SetFont($corm, '', 43, false);
$pdf->writeHTMLCell($scholarship_width, 500, 0, 1030, $html, 0, 0, false, true, 'C');

$html = "Điều kiện áp dụng";
$pdf->SetFont($corm_sbi, '', 50, false);
$pdf->writeHTMLCell($scholarship_width, 100, 0, 1450, $html, 0, 0, false, true, 'C');

$html = "
-&nbsp;&nbsp;Học bổng áp dụng cho chương trình học $scholarship_vn
<br/>
-&nbsp;&nbsp;$scholarship_valid_text_vn
<br/>
-&nbsp;&nbsp;Học bổng không được chuyển nhượng, không có giá trị quy đổi thành tiền mặt
<br/>
-&nbsp;&nbsp;Học bổng không được cộng gộp với các chương trình ưu đãi, học bổng khác
<br/>
-&nbsp;&nbsp;Giá trị sử dụng học bổng đến: $date_vn
";
$pdf->setCellHeightRatio(1.25);
$pdf->SetFont($corm_i, '', 43, false);
$pdf->writeHTMLCell($scholarship_width, 500, 0, 1530, $html, 0, 0, false, true, 'C');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(vn_to_en($name, true).'_IGS_Scholarship.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+