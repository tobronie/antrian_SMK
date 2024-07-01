<?php
include 'halaman/_bagian/link.php';

//menyiapkan session untuk menyimpan angka order
if (!isset($_SESSION['URUTAN'])) $_SESSION['URUTAN'] = 0;

$tanggal = date("Y-m-d");//mendapatkan tanggal hari ini format 2021-06-09
$query = $db->query("SELECT * FROM tiket_antrian WHERE hari = '{$tanggal}' AND status_tiket = 'MULAI';");//mandapatkan total tiket hari ini yang masih belum terpanggil

$total_rows = $query->num_rows;

if ($_SESSION['URUTAN'] >= $total_rows) {
	$_SESSION['URUTAN'] =0;//dikembalikan ke urutan 0
}

$urutan = $_SESSION['URUTAN'];
//mendapatkan data
$query = $db->query("SELECT * FROM tiket_antrian WHERE hari = '{$tanggal}' AND status_tiket = 'MULAI' ORDER BY id LIMIT {$urutan},1");
if ($db->error) {
	echo "Gagal eksekusi : ";
	var_dump($db->error);
	exit();
}

$res = $query->fetch_object();
?>

<a class="btn btn-primary btn-lg btn-block" href="?halaman=ambil-tiket">ambil tiket baru disini</a>
<hr>

<?php
echo 'Urutan yang belum dipanggil: ' . $urutan . '<br>';
echo 'Total yang belum dipanggil : ' . $total_rows . '<br>';  //untuk mrlihat total yang belum dipanggil atau belum selesai
if ($urutan == 0 && $total_rows == 0) {
	echo 'Selesai! Anda bisa mencetak tiket baru';
	$_SESSION['URUTAN'] = 0;
} else {
?>
	<hr>
	<h3>Urutan Tiket</h3>
	<div class="jumbotron text-center">
		<h4>No. Tiket :</h4>

		<h2><?=$res->nomor ?> </h2>

		<h4>Silahkan menuju admin</h4>
	</div>

	<a class="btn btn-danger btn-lg btn-block" href="?halaman=tiket-selesai&id=<?= $res->id ?>">Verifikasi sebagai selesai</a>
	<!-- 
		1. btn = button atau tombol
		2. btn-warning = tombol warna oren dan btn-primary = tombol warna biru
		3. btn-lg = tombol ukuran
		4. btn-block = untuk tombol penuh dengan yang sudah diberi warna
	-->
	<a class="btn btn-warning btn-lg btn-block" href="?halaman=tiket-selanjutnya">Selanjutnya</a>
<?php } ?>

<hr>
Daftar Tiket Antrian :
<br>

<table class="table table-hover">
	<tr>
		<th>Urutan</th>
		<th>Status</th>
		<th>Waktu Ambil</th>
		<th>Waktu Terpanggil</th>
	</tr>
	<?php
	$tanggal = date("Y-m-d");

	$query = $db->query("SELECT * FROM tiket_antrian WHERE hari = '{$tanggal}'");
	while ($data = $query->fetch_object()) {
	?>
		<tr>
			<td><?= $data->nomor ?></td>
			<td><?= $data->status_tiket ?></td>
			<td><?= $data->tanggal_ambil ?></td>
			<td><?= $data->tanggal_terpanggil ?></td>
		</tr>
		<?php
	}
	?>
</table>


<?php
//echo 'final urutan : ' . $_SESSION['URUTAN'];
include 'halaman/_bagian/footer.php';
?>