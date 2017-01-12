<!DOCTYPE html>
<html>
<head>
	<title>Menampilkan data kampus</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<table class="table table-bordered table-hover" >
		<th>No</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Nilai</th>
		<th>Nama Mata Kuliah</th>
		<th>SKS</th>

		<?php  
				mysql_connect("localhost", "root","");
				mysql_select_db("anakampus");

			$query = "SELECT mhs.nim,mhs.nama,mhs.alamat,nilai.nilai,matkul.nama_mk,matkul.sks from (mahasiswa mhs left JOIN nilai nilai on mhs.nim = nilai.nim) LEFT JOIN matakuliah matkul on nilai.no_mk = matkul.no_mk";
			$hasil = mysql_query($query);
			$no_urut = 0;
			while($data = mysql_fetch_array($hasil)) {
				$no_urut++;
				echo "<tr>
							<td>".$no_urut."</td>
							<td>".$data['nim']."</td>
							<td>".$data['nama']."</td>
							<td>".$data['alamat']."</td>
							<td>".$data['nilai']."</td>
							<td>".$data['nama_mk']."</td>
							<td>".$data['sks']."</td>
					  </tr>";
			}

		?>
	</table>
</body>
</html>