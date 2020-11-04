<?php
$data = file_get_contents('data.json');
$data = json_decode($data);

$take = 5;

$data_count = count($data);
$pagination_count = ceil($data_count/$take);

$page = isset($_GET['page']) ? $_GET['page'] : 1;

if ($page < 1) {
    header('location:index.php?page=1');
}
if ($page > $pagination_count) {
    header('location:index.php?page=' . $pagination_count);
}

$employees = array_splice($data, ($page - 1) * $take, $take);

$start = 1;
if ($page > 3) {
    $start = $page-2;
}
if ($page > $pagination_count - 3) {
    $start = $pagination_count - $take + 1;
}
$end = $start + $take - 1;