<?php
echo "Hello!";
die;
// Dane do połączenia z bazą danych
$servername = "todolist-lab12-server.mysql.database.azure.com";
$username = "wacztqewss";
$password = "9SUC$XDzNb6WI8CU";
$dbname = "todolist-lab12-server";
// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);
// Sprawdzanie połączenia
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
// Pobieranie danych z tabeli users
$sql_users = "SELECT username, password FROM users";
$result_users = $conn->query($sql_users);
echo "<h2>Users Table</h2>";
echo "<table border='1'>
<tr>
<th>Username</th>
<th>Password</th>
</tr>";
if ($result_users->num_rows > 0) {
   // Wyświetlanie danych z tabeli users
   while($row = $result_users->fetch_assoc()) {
       echo "<tr>
<td>" . $row["username"] . "</td>
<td>" . $row["password"] . "</td>
</tr>";
   }
} else {
   echo "<tr><td colspan='2'>No results</td></tr>";
}
echo "</table>";
// Pobieranie danych z tabeli tasks
$sql_tasks = "SELECT taskid, username, task, done FROM tasks";
$result_tasks = $conn->query($sql_tasks);
echo "<h2>Tasks Table</h2>";
echo "<table border='1'>
<tr>
<th>Task ID</th>
<th>Username</th>
<th>Task</th>
<th>Done</th>
</tr>";
if ($result_tasks->num_rows > 0) {
   // Wyświetlanie danych z tabeli tasks
   while($row = $result_tasks->fetch_assoc()) {
       echo "<tr>
<td>" . $row["taskid"] . "</td>
<td>" . $row["username"] . "</td>
<td>" . $row["task"] . "</td>
<td>" . ($row["done"] ? "Yes" : "No") . "</td>
</tr>";
   }
} else {
   echo "<tr><td colspan='4'>No results</td></tr>";
}
echo "</table>";
// Zamykanie połączenia
$conn->close();
?>
