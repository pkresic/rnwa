<?php
$result = null;
$id = null;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    try {
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);

        $endPointWSDL = "http://localhost:44399/Zaposlenici.asmx?WSDL";

        $sClient = new SoapClient($endPointWSDL,
            array(
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace' => 1)
        );
        $result = $sClient->GetZaposlenik([
        'id' => $id
        ])->GetZaposlenikResult;
    } catch (SoapFault $e) {
        var_dump($e);
        $result = null;
    }
}
?>
<form method="post">
    <label>
        Zaposlenik
        <input name="id" type="number" value="<?= $id !== null ? $id : 0 ?>">
    </label>
    <button type="submit">
        SUBMIT
    </button>
</form>
<?php if ($result !== null) { ?>
    <p><?= $result ?></p>
<?php } ?>
