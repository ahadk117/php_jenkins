<?php
function dbConnect()
{
    $db = "ttbs_hrms";
    $host = "10.180.67.42";
    $user = "manish";
    $pass = "manish@#$123";
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        echo "not connected";
        die;
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
