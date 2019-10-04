<?php
class Database{
 
    // Database credentials
    private $DbHost = "dishlist.wmdd.ca:3306";
    private $DbName = "wp_v1sxv";
    private $DbUser = "wp_h8m3k";
    private $DbPass = "5_Vl28beTU";

    // Connection
    public $dbConnection;

    // Execute SELECT
    public function Select($sql, $valuesToReplace){
        // Result
        $dataResult = [];

        // Check Parameters
        if ($sql === null || trim($sql) === ""){
            die("ERROR: Parameter sql is required.");
        }

        // Connect to MySQL server
        $mysqli = new mysqli($this->DbHost, $this->DbUser, $this->DbPass, $this->DbName);
        
        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect to DB. " . $mysqli->connect_error);
        }

        // Statement
        $stmt = $mysqli->prepare($sql);

        // Add parameters
        if ($valuesToReplace !== null && is_array($valuesToReplace) && count($valuesToReplace) > 0){
            $stmt_types = "";
            $stmt_values = array();
            foreach($valuesToReplace as $key => $item){
                switch(gettype($item)){
                    case "string":
                        $stmt_types = $stmt_types . "s"; // corresponding variable has type string
                        break;
                    case "integer":
                        $stmt_types = $stmt_types . "i"; // corresponding variable has type integer
                        break;
                    case "double":
                        $stmt_types = $stmt_types . "d"; // corresponding variable has type double
                        break;
                    default:
                        $stmt_types = $stmt_types . "d"; // corresponding variable is a blob and will be sent in packets
                        break;
                }
                $stmt_values[] = $item;          
            }
            $stmt->bind_param($stmt_types, ...$stmt_values);
        }

        // Execute
        if($stmt->execute()){
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()) {
                $dataResult[] = $row;
            }
        }

        // Close connection and statement
        $stmt->close();
        $mysqli->close();

        // Return result
        return $dataResult;
    }

    // Execute INSERT
    public function Insert($sql, $valuesToReplace){
        // Recieve ID
        $id = null;

        // Check Parameters
        if ($sql === null || trim($sql) === ""){
            die("ERROR: Parameter sql is required.");
        }

        // Connect to MySQL server
        $mysqli = new mysqli($this->DbHost, $this->DbUser, $this->DbPass, $this->DbName);
        
        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect to DB. " . $mysqli->connect_error);
        }

        // Statement
        $stmt = $mysqli->prepare($sql);

        // Add parameters
        if ($valuesToReplace !== null && is_array($valuesToReplace) && count($valuesToReplace) > 0){
            $stmt_types = "";
            $stmt_values = array();
            foreach($valuesToReplace as $key => $item){
                switch(gettype($item)){
                    case "string":
                        $stmt_types = $stmt_types . "s"; // corresponding variable has type string
                        break;
                    case "integer":
                        $stmt_types = $stmt_types . "i"; // corresponding variable has type integer
                        break;
                    case "double":
                        $stmt_types = $stmt_types . "d"; // corresponding variable has type double
                        break;
                    default:
                        $stmt_types = $stmt_types . "d"; // corresponding variable is a blob and will be sent in packets
                        break;
                }
                $stmt_values[] = $item;          
            }
            $stmt->bind_param($stmt_types, ...$stmt_values);
        }

        // Execute
        if($stmt->execute()){
            $id = $stmt->insert_id;
        }

        // Close connection and statement
        $stmt->close();
        $mysqli->close();

        // Return id
        return $id;
    }    
}
?>