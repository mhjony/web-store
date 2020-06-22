<?php
session_start();
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
<th colspan='2'>Action</th>
</tr>";
while($row = mysqli_fetch_array($query))
{
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['model'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td><img src='".$row['img']."' alt='".$row['img']."' width='60' height='60' /></td>";
    echo "<td><form method='post'><input type='hidden' name='product_id' value='".$row['id']."'><input type='submit' name='submit' value='Buy' style='background-color: red; cursor:pointer'></form></td>";
    echo "<td><input type='submit' name='add_to_cart'value='Add to Cart' /></td>";
    echo "</tr>";
}
echo "</table>";

