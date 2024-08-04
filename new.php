<?php 
$user = 'root';
$password = '';
$database = 'std';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$sql = " SELECT * FROM std_dt ORDER BY PIN";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<html>
 
<head>
    <meta charset="UTF-8">
    <title>KHIT</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>C20 VSEM Students Data</h1>
        
        <table>
            <tr>
                <th>PIN</th>
                <th>Name</th>
                <th>Course</th>
                <th>Branch</th>
            </tr>
          
            <?php 
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['PIN'];?></td>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['Course'];?></td>
                <td><?php echo $rows['Branch'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>
<?php echo"Hello World!.." ?>