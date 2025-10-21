<?php
include "koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<h2>Daftar User</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Tanggal Dibuat</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['user_id']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['created_at']; ?></td>
        </tr>
    <?php } ?>
</table>
