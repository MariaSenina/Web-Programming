<?php

function createConnection($servername, $username, $password) {
    $connection = new mysqli($servername, $username, $password);

    if ($connection->connect_errno) {
        die("Connection unsuccessful: " . $connection->connect_error) . "<br>";
    }
    return $connection;
}

function createDatabase($connection) {
    //Create database
    $sql = "CREATE DATABASE assignment8";

    try {
      $connection->query($sql);
    } catch (Exception $e) {
        console_log("Caught exception: " . $e->getMessage());
    }
}

function createItemsTable($connection) {
    //Create table
    $sql = "CREATE TABLE assignment8.items ( ";
    $sql .= "ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
    $sql .= "Name VARCHAR(50), ";
    $sql .= "Type VARCHAR(40), ";
    $sql .= "Make VARCHAR(40), ";
    $sql .= "Model VARCHAR(40), ";
    $sql .= "Brand VARCHAR(40) ";
    $sql .= ")";

    try {
      $connection->query($sql);
    } catch (Exception $e) {
        console_log("Caught exception: " . $e->getMessage());
    }
}

function getHeaders() {
    $inputFile = fopen("input.csv", "r");
    $headers=NULL;

    //Fetching .csv data row by row
    while (($data = fgetcsv($inputFile)) !== false) {
        $rowLength = sizeof($data);

        $headers=$data;
        break;
    }
    //Close the .csv file
    fclose($inputFile);

    return $headers;
}

function getRowLength() {
    //Open the .csv file
    $inputFile = fopen("input.csv", "r");

    $rowLength = 0;

    while (($data = fgetcsv($inputFile)) !== false) {
        $rowLength = sizeof($data);
    }

    //Close the .csv file
    fclose($inputFile);

    return $rowLength;
}

function populateItemsTable($connection) {
    //Open the .csv file
    $inputFile = fopen("input.csv", "r");

    //Fetching .csv data row by row
    $counter = 0;
    while (($data = fgetcsv($inputFile)) !== false) {
        $rowLength = sizeof($data);

        if ($counter == 0) {
            $counter++;
            continue;
        } else {
            $values="";
            for ($i = 1; $i < $rowLength-1; $i++) {
                if ($data[$i] == "") {
                    if ($i == 1) {
                        $values="NULL";
                    } else {
                        $values=$values . ", NULL";
                    }
                } else {
                    if ($i == 1) {
                        $values="'" . $data[$i] . "'";
                    } else {
                        $values=$values . ", " . "'" . $data[$i] . "'";
                    }
                }
            }

            try {
              $sql = "INSERT INTO assignment8.items (Name, Type, Make, Model, Brand) VALUES ($values)";
            } catch (Exception $e) {
                console_log("Caught exception: " . $e->getMessage());
            }
        }

        //Verify inserts
        if($connection->query($sql) === FALSE) {
            echo "An error has occurred when trying to insert records: " . $connection->error . "<br>";
        }
    }

    //Close the .csv file
    fclose($inputFile);
}

//Populate html table with sql data
function printValuesFromItemsTable($connection, $headers, $rowLength) {
    $result = mysqli_query($connection,"SELECT * FROM assignment8.items;");

    if (mysqli_num_rows($result) > 0) {
        echo "<html><body><center><table id='itemList'>\n\n";

        echo "<tr>";
        for ($i = 0; $i<$rowLength-1; $i++) {
            echo "<th>" . $headers[$i] . "</th>";
        }
        echo "</tr>";

        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Make'] . "</td>";
            echo "<td>" . $row['Model'] . "</td>";
            echo "<td>" . $row['Brand'] . "</td>";
            echo "</tr>";
        }

        echo "\n</table></center></body></html>";
    } else {
        echo "No result found";
    }
}

//Close connection
function closeConnection($connection) {
    $connection->close();
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>
