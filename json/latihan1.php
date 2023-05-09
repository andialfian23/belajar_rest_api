<?php

//CARA MANUAL
// $mahasiswa = [
//     [
//         "nama" => "Andi Alfian",
//         "npm" => "18.14.1.0001",
//         "email" => "andialfi90@gmail.com"
//     ], [
//         "nama" => "Haris Sakur",
//         "npm" => "18.14.1.0002",
//         "email" => "harissakur2@gmail.com"
//     ]
// ];


//DARI DB
$dbh = new PDO('mysql:host=localhost;dbname=db_mt', 'root', '');
$db = $dbh->prepare('select * from orang');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
