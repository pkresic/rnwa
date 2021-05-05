<?php

if (!extension_loaded("soap")) {
    dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer("konverzije.wsdl");

function konverzijaBAMToEUR($bam)
{
    return floatval($bam) / 2;
}

function konverzijaEURToBAM($eur)
{
    return floatval($eur) * 2;
}

$server->AddFunction("konverzijaBAMToEUR");
$server->AddFunction("konverzijaEURToBAM");
$server->handle();
?>