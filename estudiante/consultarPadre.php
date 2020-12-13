<?php
if(!empty($_POST['padreDui'])){
    include_once('../conexion/conexion.php');
    //consulta
    $padreDui = $_POST['datos'];
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consultPadre = $conn->prepare("SELECT * FROM padre where dui='$padreDui'");
        $consultPadre->execute();
        $dataPadre = $consultPadre->fetch(PDO::FETCH_ASSOC);
    $data = array();
    
    //database details
    /*$dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '*****';
    $dbName     = 'noprog';
    
    //create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($db->connect_error){
        die("Unable to connect database: " . $db->connect_error);
    }
    
    //get user data from the database
    $query = $db->query("SELECT * FROM users WHERE id = {$_POST['user_id']}");*/

    $duiP = $dataPadre['dui'];
    if($duiP == ""){
        //$userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $dataPadre;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>