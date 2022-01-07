<?php

require_once 'common.php';

class EditaccessdateDAO {

    public function editaccess($username, $todaydate) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "UPDATE chrw_user SET last_access = '".$todaydate."' WHERE username = '".$username."';";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $msg = "Record Updated Successfully";

        // Step 6 - Return
        return $msg;
    }

}


?>