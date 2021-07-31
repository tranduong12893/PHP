<?php
    $myDB = new mysqli('localhost', 'root', '', 'ebookshop');
    if ($myDB->connect_error)
    {
        die('Connect Error('. $myDB->connect_errno.')'
            . $myDB->connect_error);
    }
    $sql = "SELECT * FROM books WHERE qty = 55 ORDER BY title";
    $result = $myDB->query($sql);
    ?>

    <table cellspacing="2" cellpadding="6" align="center" border="1">
        <tr>
            <td colspan="4">
                <h3 align="center">These Book are currently available</h3>
            </td>
        </tr>
        <tr>
            <td align="center"> Title</td>
            <td align="center"> Author</td>
            <td align="center"> Price</td>
        </tr>
    <?php
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo stripslashes($row["title"]);
        echo "</td><td align='center'>";
        echo $row["author"];
        echo "</td><td>";
        echo $row["price"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>


