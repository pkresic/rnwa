<?php
$id = null;
$status = null;
$db_result = "";
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}
if (isset($_POST["status"])) {
    $status = $_POST["status"];
}

function get_status_string($status)
{
    if ($status == 4) {
        return "Paid";
    }
    if ($status == 1) {
        return "Shipped";
    }
    if ($status == 3) {
        return "Pending";
    }
    return $status;
}

if ($id || $status) {
    $db = mysqli_connect("localhost", "root", "");

    if ($db) {
        $result = mysqli_select_db($db, "adventureworks");
        if ($result) {
            $sql = "SELECT 
               e.EmployeeID, 
               c.Title, 
               c.FirstName, 
               c.MiddleName, 
               c.LastName, 
               p.TotalDue, 
               p.Status 
            FROM purchaseorderheader p 
            INNER JOIN employee e ON e.EmployeeID = p.EmployeeID
            INNER JOIN contact c on e.ContactID = c.ContactID WHERE 1=1";
            if ($id) {
                $sql .= " AND p.EmployeeID = $id";
            }
            if ($status) {
                $sql .= " AND p.Status = $status";
            }
            $query = mysqli_query($db, $sql);
            if ($query) {
                $n = mysqli_num_rows($query);
                if ($n > 0) {
                    $db_result = "";
                    while ($myrow = mysqli_fetch_row($query)) {
                        $db_result .= $myrow[1] . " " . $myrow[2] . " " . $myrow[3] . " " . $myrow[4] . ", " . $myrow[5] . "$, " . get_status_string($myrow[6]) . "(" . $myrow[6] . ")";
                        $db_result .= "\n";
                    }
                } else {
                    $db_result = "No Results";
                }
            } else {
                $db_result = "Došlo je do problema prilikom izvrsavanja upita...";
            }
        } else {
            $db_result = "Došlo je do problema prilikom odabira baze...";
        }
    } else {
        $db_result = "Nije proslo spajanje";
    }
}
?>
<form method="post">
    <label>
        Zaposlenik
        <input name="id" type="number" value="<?= $id !== null ? $id : '' ?>">
    </label>
    <label>
        Status
        <input name="status" type="number" value="<?= $status !== null ? $status : '' ?>">
    </label>
    <button type="submit">
        SUBMIT
    </button>
</form>
<?php if ($db_result !== null) { ?>
    <pre><?= $db_result ?></pre>
<?php } ?>
