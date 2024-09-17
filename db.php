<?php
function dbConnect()
{

  
   $db = "test_db";
$host = "143.110.243.191";
$user = "ahadkhalid";
$pass = "Ahad@0786";
var_dump(mysqli_connect($host, $user, $pass, $db));die;
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}


    return $conn;
}

function insertMessage($post)
{
    // get the post records
    $txtName = $post['txtName'];
    $txtEmail = $post['txtEmail'];
    $txtPhone = $post['txtPhone'];
    $txtMessage = $post['txtMessage'];

    $conn = dbConnect();

    $query = "insert into messages_test(name, email, phone, message) values ( 
                '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";

    $res = $conn->query($query);
    $conn->close();
}

function printMessages()
{
    $conn = dbConnect();
    $query = "select * from messages_test";
    $res = $conn->query($query);

    if ($res->num_rows > 0) {
        echo "<table>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td><td>" . $row["name"] .
                "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["message"] . "</td>";
            echo "</tr>";
            #echo "<br>";
        }
        echo "</table>";
    }
    $conn->close();
}
