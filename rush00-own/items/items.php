<?php
$conn = mysqli_connect("localhost", "root", "123456", "rush00");
if ($_GET['page'] == 'all')
{
    $query = mysqli_query($conn, "SELECT * FROM items");
}
if ($_GET['page'] == 'nokia')
{
    $query = mysqli_query($conn, "SELECT * FROM items WHERE `name` = 'Nokia'");
}

if ($_GET['page'] == 'samsung')
{
    $query = mysqli_query($conn, "SELECT * FROM items WHERE `name` = 'Samsung'");
}

if ($_GET['page'] == 'apple')
{
    $query = mysqli_query($conn, "SELECT * FROM items WHERE `name` = 'Apple'");
}

echo "<table border='1 solid red'>
<tr>
<th>Name</th>
<th>Type</th>
<th>Model</th>
<th>Price</th>
<th>Description</th>
<th>Image</th>
<th>Action</th>
</tr>";

$i = 0;
while($row = mysqli_fetch_array($query))
{
    echo "<tr>";
    echo "<td style='text-align:center; margin='10' padding='10'>" . $row['name'] . "</td>";
    echo "<td style='text-align:center'>" . $row['type'] . "</td>";
    echo "<td style='text-align:center'>" . $row['model'] . "</td>";
    echo "<td style='text-align:center'>" . $row['price'] . "</td>";
    echo "<td style='text-align:center'>" . $row['description'] . "</td>";
    echo "<td style='text-align:center'><img src='".$row['img']."' alt='".$row['img']."' width='60' height='60' /></td>";
    echo "<td><form method='post'><input type='hidden' name='hidden' value='$i'><input type='submit' name='submit' value='Buy'></form></td>";
    echo "</tr>";
    $i++;
}
echo "</table>";
mysqli_close($conn);
?>