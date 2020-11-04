<?php require 'converter.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XML2JSON Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="index.php" method="POST" class="wrapper">
    <div class="content">
        <textarea name="xml" id="xml" cols="30" rows="30"><?= $xml ?></textarea>
        <textarea name="json" id="json" cols="30" rows="30" readonly><?= $json ?></textarea>
    </div>
    <div class="action">
        <button>Convert!</button>
    </div>
</form>

</body>
</html>