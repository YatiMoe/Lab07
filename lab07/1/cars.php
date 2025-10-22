<?php
require_once "setting.php"; // Include DB connection settings

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);


if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    $query = "SELECT * FROM cars;";
    $result = mysqli_query($conn, $query);

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Cars List</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            table { width: 70%; border-collapse: collapse; margin: 0 auto; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
            th { background-color: #f2f2f2; }
            h1 { text-align: center; }
        </style>
    </head>
    <body>
        <h1>Used Car Listings</h1>";

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>Car ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price ($)</th>
                    <th>Year</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>There are no cars to display.</p>";
    }

    echo "</body></html>";

    mysqli_close($conn); 
}
?>
