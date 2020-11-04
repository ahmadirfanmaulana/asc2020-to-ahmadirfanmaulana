<?php require 'pagination.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A Pagination Code</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>

<div class="jumbotron">
    <div class="container">
        <h1>Lists Employee</h1>
    </div>
</div>

    <div class="container">
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Company</th>
                    <th>Phone</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($employees as $employee) : ?>
                <tr>
                    <td><?= $employee->name ?></td>
                    <td><?= $employee->age ?></td>
                    <td><?= $employee->gender ?></td>
                    <td><?= $employee->company ?></td>
                    <td><?= $employee->phone ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <ul class="pagination">
            <li class="page-item">
                <a href="index.php?page=<?= $page - 1 ?>" class="page-link"><</a>
            </li>

            <?php foreach (range($start, $end) as $i) : ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a href="index.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                </li>
            <?php endforeach; ?>

            <li class="page-item">
                <a href="index.php?page=<?= $page + 1 ?>" class="page-link">></a>
            </li>
        </ul>
    </div>

</body>
</html>