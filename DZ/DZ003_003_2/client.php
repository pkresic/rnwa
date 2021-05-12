<?php
$result = null;
$query = null;
if (isset($_POST['query'])) {
    $query = $_POST['query'];
    try {
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);

        $endPointWSDL = "http://localhost:44374/Zaposlenici.asmx?WSDL";

        $sClient = new SoapClient($endPointWSDL,
            array(
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace' => 1)
        );
        $result = $sClient->SearchZaposlenik([
        'query' => $query
        ])->SearchZaposlenikResult;
    } catch (SoapFault $e) {
        var_dump($e);
        $result = null;
    }
}
?>
<form method="post">
    <label>
        Zaposlenik
        <input name="query" type="search" value="<?= $query !== null ? $query : '' ?>">
    </label>
    <button type="submit">
        SUBMIT
    </button>
</form>
<?php if ($result !== null) { ?>
    <pre><?= $result ?></pre>
<?php } ?>
