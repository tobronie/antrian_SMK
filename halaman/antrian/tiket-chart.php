<?php
include 'halaman/_bagian/link.php';

//mendapatkan bulan dan tahun
$tahunbulan = date("Y-m");

//melakukan query untuk mendapatkan jumlah antrian per hari selama bulan ini
$sql = "SELECT COUNT(*) AS jml_antrian, DATE_FORMAT (hari, '%d') AS hari FROM tiket_antrian WHERE DATE_FORMAT(hari, '%Y-%m') = '{$tahunbulan}' GROUP BY DATE_FORMAT(hari, '%d') ;";

//echo $sql;
$query = $db->query($sql);

if ($db->error) {
	echo "Gagal eksekusi";
	var_dump($db->error);
	exit();	
}

$total_rows = $query->num_rows; //mendapatkan jumlah baris

if ($total_rows > 0) {
	//jumlah data yang didapat lebih dari 0, atau bisa dibilang ada data yang bisa digunakan untuk membuat chart

	//melakukan looping untuk menetapkan data agar sesuai format javascript
	$var_data = $var_label = [];
	while ($data = $query->fetch_object()) {
		$var_data[] = (int) $data->jml_antrian;
		$var_label[] = $data->hari;
	}
?>
<div>
	<canvas id="myChart"></canvas>
</div>
<script type="text/javascript" src="lib/chart.min.js"></script>
<script type="text/javascript">
	
// getElementById digunakan untuk mengambil suatu value dari form input yang pastinya dari element HTML dimana element tersebut sudah kita buatkan id. Maka kita dapat menggunakan getElementById. Sebagai contoh misalnya saya ingin mengambil value atau nilai dari suatu form input text	
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		// json_encode adalah fungsi yang mengubah format data Array menjadi JSON, sedangkan json_decode berfungsi sebaliknya, mengubah JSON menjadi PHP Array.
		labels: <?= json_encode($var_label) ?>, //['01', '02', '03'], tanggal
		datasets: [{
			label: '# jumlah antrian bulan ini',
			data: <?= json_encode($var_data) ?>, //[12, 19, 3, 5, 2, 3], jumlah data
			borderwidth: 1
		}]
	},
	options: {
		scales:{
			y: {
				beginAtZero: true //mulai dari nol
			}
		}
	}
});
</script>
<?php

} else {
	echo '<h1>Belum Ada Data Antrian Di Bulai Ini</h1>';
}

include 'halaman/_bagian/footer.php';
?>