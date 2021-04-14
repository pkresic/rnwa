<?php
// get the s parameter from URL
if (isset($_REQUEST["s"])) {
    $s = $_REQUEST["s"];
    $s = strtolower($s);
} else {
    $s = "";
}
$hint = "";
$s = strtolower($s);

/**********************************************************/
$db = mysqli_connect("localhost", "root", "");

if ($db) {

    $result = mysqli_select_db($db, "adventureworks") or die("Došlo je do problema prilikom odabira baze...");
    $sql = "SELECT e.EmployeeID, c.Title, c.FirstName, c.MiddleName, c.LastName, e.Gender, c.EmailAddress FROM employee e INNER JOIN contact c on e.ContactID = c.ContactID ";
    if ($s && strlen($s) > 0) {
        $sql .= "WHERE c.FirstName LIKE '%$s%' OR c.LastName LIKE '%$s%' OR c.MiddleName LIKE '%$s%'";
    }
//echo $sql;
    $result2 = mysqli_query($db, $sql) or die("Došlo je do problema prilikom izvrsavanja upita...");
    $n = mysqli_num_rows($result2);
    if ($n > 0) {
        while ($myrow = mysqli_fetch_row($result2)) {
            $hint .= "<tr id=\"" . $myrow[0] . "\">
                        <td>" . $myrow[1] . " " . $myrow[2] . " " . $myrow[3] . " " . $myrow[4] . "</td>
                        <td>" . $myrow[5] . "</td>
                        <td>" . $myrow[6] . "</td>
                        </tr>";

        }
    } else {
//echo "No patern rows returned<br>";
    }
} else {
    echo "<br>Nije proslo spajanje<br>";
}
/**********************************************************/

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no employees" : $hint;

?>