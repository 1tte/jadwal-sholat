<?php

	function scrapJadwal($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
	function cariKota($url2){
		$hh = curl_init();
		curl_setopt($hh, CURLOPT_URL, $url2);
		curl_setopt($hh, CURLOPT_RETURNTRANSFER, 1);
		$hasil = curl_exec($hh);
		curl_close($hh);
		return $hasil;
	}
//interaksi

echo "Mau Daerah Mana? ";
$kotamana = trim(fgets(STDIN));
//url
$urlkota = cariKota("https://api.myquran.com/v1/sholat/kota/cari/" . $kotamana);
$urlkota = json_decode($urlkota, TRUE);	
//url
$profile = scrapJadwal("https://api.myquran.com/v1/sholat/jadwal/" . $urlkota['data'][0]['id'] . "/" . date("Y") . "/" . date("m") . "/"  . date("d"));
$profile = json_decode($profile, TRUE);
//hasil
$hasil = "Tanggal : " . $profile['data']['jadwal']['tanggal'] . "\n";
$hasil .= "Imsak : " . $profile['data']['jadwal']['imsak'] . "\n";
$hasil .= "Subuh : " . $profile['data']['jadwal']['subuh'] . "\n";
$hasil .= "Terbit : " . $profile['data']['jadwal']['terbit'] . "\n";
$hasil .= "Dhuha : " . $profile['data']['jadwal']['dhuha'] . "\n";
$hasil .= "Dzuhur : " . $profile['data']['jadwal']['dzuhur'] . "\n";
$hasil .= "Ashar : " . $profile['data']['jadwal']['ashar'] . "\n";
$hasil .= "Maghrib : " . $profile['data']['jadwal']['maghrib'] . "\n";
$hasil .= "Isya : " . $profile['data']['jadwal']['isya'] . "\n";
$hasil .= "Date : " . $profile['data']['jadwal']['imsak'] . "\n";
//print
echo $hasil;
?>
