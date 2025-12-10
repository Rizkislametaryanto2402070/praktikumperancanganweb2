<?php
include("conn.php");

// hitung total row
$query = mysqli_query($conn, "SELECT COUNT(userid) FROM `user`");
$row = mysqli_fetch_row($query);
$rows = $row[0];

// berapa record per halaman
$page_rows = 10;

// jumlah halaman terakhir
$last = ceil($rows / $page_rows);
if ($last < 1) { $last = 1; }

// halaman sekarang (default 1)
$pagenum = 1;
if (isset($_GET['pn'])) {
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']); // hanya angka
}

if ($pagenum < 1) { $pagenum = 1; }
else if ($pagenum > $last) { $pagenum = $last; }

// LIMIT untuk query
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
$nquery = mysqli_query($conn, "SELECT * FROM `user` $limit");

// buat kontrol pagination
$paginationCtrls = '';

if ($last != 1) {
    // Previous & angka sebelum current
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';
        for ($i = $pagenum - 4; $i < $pagenum; $i++) {
            if ($i > 0) {
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
            }
        }
    }

    // current page
    $paginationCtrls .= ''.$pagenum.' &nbsp; ';

    // angka setelah current
    for ($i = $pagenum + 1; $i <= $last; $i++) {
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
        if ($i >= $pagenum + 4) { break; }
    }

    // Next button
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-default">Next</a> ';
    }
}
?>
