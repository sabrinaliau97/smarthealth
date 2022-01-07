<?php

require_once 'common.php';

class Cre2DAO {

    public function retrieve($sub_component) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT sub_component, reason, status2 FROM ch_criteria WHERE sub_component = '".$sub_component."'";
        


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_cre = null;
        $cre_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_cre = 
                new Cre(
                    $row[0],
                    $row[1],
                    $row[2]);
            array_push($cre_list,$return_cre);
            
        }


        // Step 5 - Return
        return $cre_list;
    }
}


?>