<?php 
$hostname='localhost';
$usuario='root';
$senha='';
$banco='db_dev';

$conn= mysqli_connect($hostname,$usuario,$senha,$banco);
// if($conn){
//     echo "parabens!! A conexão ao banco de dados está OK <br>";
// }else{echo "Falha na conexão! ".mysqli_connect_error();}
?>