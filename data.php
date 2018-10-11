<?php
    require_once("db.php");
?>

<table border=1>
	<thead>
		<td>Nama</td>
		<td>NIM</td>
		<td>Kelas</td>
        <td>Jenis Kelamin</td>
        <td>Hobi</td>
        <td>Fakultas</td>
        <td>Alamat</td>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM mahasiswa";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
				<td><?php echo $row['nama']?></td>
				<td><?php echo $row['nim']?></td>
				<td><?php echo $row['kelas']?></td>
                <td><?php echo $row['jeniskelamin']?></td>
                <td><?php echo $row['hobi']?></td>
                <td><?php echo $row['fakultas']?></td>
                <td><?php echo $row['alamat']?></td>
				<td><a href="updateform.php?id=<?php echo $row['id']?>">Update</a></td>
				</tr>
				<?php
			}
		}else {
			echo "0 Result";
		}
		mysqli_close($conn);
		?>
	</tbody>
</table>