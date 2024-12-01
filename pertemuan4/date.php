<?php
// Date
// Untuk menampilkan tanggal dengan format
echo date("*1, d-M-Y");

// Time
// UNIX Timestamp / EPOCH time
// detik yang sudah beralu sejak 1 januari 1970
//echo time();
//echo date("1", time()-60*60*24*100);

//mktime
//membuat sendiridetik
//mktime(0,0,0,0,0,0)
//jam   `, menit, detik, bulan, tanggal, tahun
echo date ("1", mktime(0,0,0,8,31,2007));


//strtotime
echo date("1", strtotime("31 august 2007"));

?>