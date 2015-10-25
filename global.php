<?php

$_ENV["VCAP_SERVICES"] = '{"cleardb":[{"name":"ClearDB MySQL Database-nk","label":"cleardb","tags":["Data Stores","data_management","ibm_third_party"],"plan":"spark","credentials":{"jdbcUrl":"jdbc:mysql://us-cdbr-iron-east-03.cleardb.net/ad_ecf663f6b8c39da?user=ba803a6929aec0&password=863189ea","uri":"mysql://ba803a6929aec0:863189ea@us-cdbr-iron-east-03.cleardb.net:3306/ad_ecf663f6b8c39da?reconnect=true","name":"ad_ecf663f6b8c39da","hostname":"us-cdbr-iron-east-03.cleardb.net","port":"3306","username":"ba803a6929aec0","password":"863189ea"}}]}';

if(!$_ENV["VCAP_SERVICES"]){ //local dev
    $mysql_server_name = "127.0.0.1:3306";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "test";
} else { //running in Bluemix
    $vcap_services = json_decode($_ENV["VCAP_SERVICES" ]);
    if($vcap_services->{'cleardb'}){ //if cleardb mysql db service is bound to this application
        $db = $vcap_services->{'cleardb'}[0]->credentials;
    } 
    else { 
        echo "Error: No suitable MySQL database bound to the application. <br>";
        die();
    }
    $mysql_database = $db->name;
    $mysql_port=$db->port;
    $mysql_server_name =$db->hostname . ':' . $db->port;
    $mysql_username = $db->username; 
    $mysql_password = $db->password;
}

?>