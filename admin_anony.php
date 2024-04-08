<!DOCTYPE html>
<html>
<head>
    <title>Anonymous Accounts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: left;
            padding: 12px 20px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 10px;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Anonymous Accounts that are logged in</h1>
    <a href="home.html">Return to Home Page</a> 
    <table>
        <tr>
            <th>Email</th>
            <th>Phone</th>
            <th>Survey</th>
            <th>Funds</th>
        </tr>
        <?php
        // Database connection setup
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "redcross";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve data from the view
        $sql = "SELECT * FROM ADMIN_ANONYMOUS_VIEW";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td>" . $row['PHONE'] . "</td>";
                echo "<td>" . $row['SURVEY'] . "</td>";
                echo "<td>" . $row['FUNDS'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </table>
    
    <a href="admin_options.php">Return to Admin Options</a>
</body>
</html>
