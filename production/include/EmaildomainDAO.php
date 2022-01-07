<?php

require_once 'common.php';

class EmaildomainDAO {

    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT domain_name from email_domain";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_domain = null;
        $domain_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_domain = 
                new Emaildomain(
                    $row[0]);
            array_push($domain_list,$return_domain);
        }


        // Step 5 - Return
        return $domain_list;
    }

}


?>