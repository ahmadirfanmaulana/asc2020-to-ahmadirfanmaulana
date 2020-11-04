<?php
$xml = isset($_POST['xml']) ? $_POST['xml'] : false;
$json = false;

if ($xml) {
    $data = new SimpleXMLElement($xml);
    $json = json_encode($data, JSON_PRETTY_PRINT);
}