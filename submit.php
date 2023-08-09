<html>
    <head>
        <title>
            Feedback Form
        </title>
    </head>
    <body>
    </body>
</html>

<?php
            if($_POST)
            {
                $name = $_POST["name"];
                $mobile = $_POST["mobile"];
                $counsellor = $_POST["service"];
                $purpose = $_POST["budget"];
                $rating = $_POST["rating"];
                $message = $_POST["message"];
                require_once('ripcord/ripcord.php');
                $db = "logic_testdb23";
                $uid = "admin";
                $password = "admin";
                $url="http://172.19.0.3:8069";
                $common = ripcord::client("$url/xmlrpc/2/common");
                $uid = $common->authenticate($db, $uid, $password, array());
                $models = ripcord::client("$url/xmlrpc/2/object");
                $id = $models->execute_kw($db, $uid, $password, 'student.feedback', 'create', array(array("student_name"=>"$name","mobile"=>"$mobile", "counsellor"=>"$counsellor", "purpose"=>"$purpose", "rating"=>"$rating","message"=>"$message")));
                if($id)
                {
                    include('successful.html');
                }
            }
        ?>