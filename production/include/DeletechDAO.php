<?php

require_once 'common.php';

class DeletechDAO {

    public function delete($ch) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "DELETE from ch_infomation WHERE ch_name = '".$ch."'";


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $msg = "Record Delete Successful";

        // Step 5 - Return
        return $msg; 
    }


}


?>