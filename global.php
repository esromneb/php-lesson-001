<?php



if(!$_ENV["VCAP_SERVICES"]){ //local dev
    $mysql_server_name = "localhost";
    $mysql_username = "root";
    $mysql_password = "toor";
    $mysql_database = "getwiththe";
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