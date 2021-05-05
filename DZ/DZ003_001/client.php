<?php
$result = null;
$type = null;
$value = null;
if (isset($_POST['value']) && isset($_POST['type'])) {
    $type = $_POST['type'];
    $value = floatval($_POST['value']);
    try {
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);

        $endPointWSDL = "http://localhost/DZ/DZ003_001/konverzije.wsdl";

        $sClient = new SoapClient($endPointWSDL,
            array(
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace' => 1)
        );
        if ($type == 'EUR') {
            $result = $sClient->konverzijaEURToBAM($value);
        } else if ($type == 'BAM') {
            $result = $sClient->konverzijaBAMToEUR($value);
        } else {
            $result = null;
        }
    } catch (SoapFault $e) {
        var_dump($e);
        $result = null;
    }
}
?>
<form method="post">
    <label>
        Vrijednost
        <input name="value" type="number" value="<?= $value !== null ? $value : 0 ?>">
    </label>
    <label>
        Tip
        <select name="type">
            <option value="EUR" <?= $type == null || $type == 'EUR' ? 'selected' : '' ?>>EUR to BAM</option>
            <option value="BAM"<?= $type == 'BAM' ? 'selected' : '' ?>>BAM to EUR</option>
        </select>
    </label>
    <button type="submit">
        SUBMIT
    </button>
</form>
<?php if ($result !== null) { ?>
    <p>Konverzija: <?= $result ?></p>
<?php } ?>
