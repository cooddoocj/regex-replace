<?php

include('functions.php');

$link = $_GET['link'];

$noidung = single_curl($link);

$data = json_decode(file_get_contents('data.json'), true);

foreach ($data as $value) {
	if ($value['flag'] == 'g') {
		$noidung = preg_replace('/' . $value['search'] . '/', $value['replace'], $noidung);
	} elseif ($value['flag'] == 'u') {
		$noidung = preg_replace('/' . $value['search'] . '/u', $value['replace'], $noidung);
	} elseif ($value['flag'] == 'i') {
		$noidung = preg_replace('/' . $value['search'] . '/i', $value['replace'], $noidung);
	} elseif ($value['flag'] == 'is') {
		$noidung = preg_replace('#' . $value['search'] . '#is', $value['replace'], $noidung);
	} elseif ($value['flag'] == 'iu') {
		$noidung = preg_replace('/' . $value['search'] . '/iu', $value['replace'], $noidung);
	} elseif ($value['flag'] == 'td') {
		$tieude = preg_replace('/' . $value['search'] . '/', $value['replace'], $tieude);
	}
}

echo $noidung;