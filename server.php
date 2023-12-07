<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'deduction_db';

$dns = "mysql:host=$host;dbname=$dbname";
$pdo = new PDO($dns, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$pdo){
  die("Eror: No Database Connection");
}else{
 foreach($_POST['deduction_name'] as $k => $v){
  $deductionName  = $v;
  $deductionDescription  = $_POST['description'][$k];
  $deductionAmount  = $_POST['amount'][$k];

  $sql = $pdo->prepare("INSERT INTO deductions(name,description,amount) VALUES(?,?,?)");
  $sql->execute([$deductionName,$deductionDescription,$deductionAmount]);
 }
  if($sql){

    echo "Data Inserted Successfully!";
  }
}

