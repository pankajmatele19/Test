<?php

$local = "localhost";
$user = "root";
$pass = "";
$dbname = "test";

$conn = mysqli_connect($local,$user,$pass,$dbname);

if(isset($_POST)) {

$name = $_POST['name'];
$data = $_POST['data'];
$date = $_POST['date'];

if($conn-> connect_error) {
    die("could not connect".$conn->connect_error);
}
else {
    
    $sql = "insert into users values('$name','$data','$date')";

    if(mysqli_query($conn,$sql)) {
        echo "user added cuccessfully";
    }
    else {
        echo $conn->connect_error;
    }
}

if($conn-> connect_error) {
    die("could not connect".$conn->connect_error);
}
else {
$sql = "select * from users";

$result = mysqli_query($conn,$sql);
echo "<table border=1>";
echo "<tr><th>Name</th><th>data</th><th>date</th></tr>";
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>"; 
        echo "<td>" . $row['name'] . "</td><td>" . $row['data'] . "</td><td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else {
    echo "No results";
}
}

}
?>