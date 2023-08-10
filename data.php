<?php
    require_once('ripcord/ripcord.php');
    $db = "logic_testdb23";
    $uid = "admin";
    $password = "admin";
    $url="http://172.19.0.3:8069";
    $common = ripcord::client("$url/xmlrpc/2/common");
    $uid = $common->authenticate($db, $uid, $password, array());
    $models = ripcord::client("$url/xmlrpc/2/object");
    $data = $models->execute_kw($db, $uid, $password, 'hr.employee', 'search_read', array(array(array('job_title', '=', 'Admission Officer'))), array('fields'=>array('name','id')));
    header('Content-Type: application/json');
    echo json_encode($data);
?>