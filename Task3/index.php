<?php
require './connection.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <style>
            p{
                color: #abcdef;
            }

            button{
                background-color: #8499bd;
            }

            h1{
                color: #cfcfd0 ;
            }

            *{
                content: center;
                text-align: center;
                font-family: 'Source Sans Pro', sans-serif;
            }
        </style>
        <title>Web page</title>
</head>

<body>
    <h1>Enter an Integer value for the sensor</h1>
    <p>If you press send it will be sent to sensors database</p>
    <hr>

    <form name='fromNo' action='' method='GET'>
    <label> <br> <input name='int' type='number'><br></label>
    <br>
    <button name='submit' type='submit' onclick='send()'> send </button>
</form>
</body>
</html>

<?php
$intger_Get=$_GET['int'];

if (isset($_GET['submit'])) {
    if (empty($intger_Get)) {
        echo '<h2>Please enter the sensor value</h2>';
    } else {
        // Attempt insert query execution
        $sql="INSERT INTO sensors_data(sensor_value) VALUES('$intger_Get')";
        if (mysqli_query($link, $sql)){
            echo '<h2>Record inserted successfully!</h2>';
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
}
mysqli_close($link);
?>