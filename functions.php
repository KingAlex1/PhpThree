<?php

$file = file_get_contents('data.xml');
$xml = new SimpleXMLElement($file);
echo "<pre>";
//print_r($xml);
PHP_EOL;
$address = $xml->Address;
$numAdr = count($address);

print_r("<header>" . "Order number: " .
    $xml->attributes()
        ->PurchaseOrderNumber->__toString() . "<br>");
print_r("Order date:" . $xml->attributes()
        ->OrderDate->__toString() . "<br>");
print_r("Number of adressess: " . $numAdr . "</header>" .
    "<br>");

print_r("<div class='main'>" . "<div class='first-order'>" .
    "<div class='first'>" . "First destination: "
    . $xml->Address[0]->attributes()->Type->__toString() . "<br>");
print_r("Name: " . $xml->Address[0]->Name->__toString() . "<br>");
print_r("Street :" . $xml->Address[0]->Street->__toString() .
    "<br>");
print_r("City :" . $xml->Address[0]->City->__toString() .
    "<br>");
print_r("State: " . $xml->Address[0]->State->__toString() .
    "<br>");
print_r("Zip: " . $xml->Address[0]->Zip->__toString() .
    "<br>");
print_r("Country :" . $xml->Address[0]->Country
        ->__toString() . "<br>" . "</div>");

print_r("<div class='second'>"
    . "Second destination: "
    . $xml->Address[1]->attributes()->Type->__toString()
    . "<br>");
print_r("Name: " . $xml->Address[1]->Name->__toString()
    . "<br>");
print_r("Street :" .
    $xml->Address[1]->Street->__toString() .
    "<br>");
print_r("City :" . $xml->Address[1]->City->__toString() .
    "<br>");
print_r("State: " . $xml->Address[1]->State->__toString
    () .
    "<br>");
print_r("Zip: " . $xml->Address[1]->Zip->__toString() .
    "<br>");
print_r("Country :" . $xml->Address[1]->Country
        ->__toString() . "<br>" . "</div>" . "</div>");

print_r("<div class='second-order'>" . "<div class='first__item'>" . "PartNumder :" .
    $xml->Items->Item[0]->attributes()
        ->PartNumber->__toString() . "<br>");
print_r("ProductName :" .
    $xml->Items->Item[0]->ProductName
        ->__toString() . "<br>");
print_r("Quantity :" .
    $xml->Items->Item[0]->Quantity
        ->__toString() . "<br>");
print_r("USPrice :" .
    $xml->Items->Item[0]->USPrice
        ->__toString() . "<br>");
print_r("Comment :" .
    $xml->Items->Item[0]->Comment
        ->__toString() . "<br>" . "</div>");

print_r("<div class='second__item'>" . "PartNumder :" .
    $xml->Items->Item[1]->attributes()
        ->PartNumber->__toString() . "<br>");
print_r("ProductName :" .
    $xml->Items->Item[1]->ProductName
        ->__toString() . "<br>");
print_r("Quantity :" .
    $xml->Items->Item[1]->Quantity
        ->__toString() . "<br>");
print_r("USPrice :" .
    $xml->Items->Item[1]->USPrice
        ->__toString() . "<br>");
print_r("Comment :" .
    $xml->Items->Item[1]->Comment
        ->__toString() . "<br>" . "</div>" . "</div>" . "</div>");

print_r("<div class='delivery'>" .
    $xml->DeliveryNotes->__toString() . "</div>" . "<br>");

?>

<style>
    header {
        text-align: center;
    }
    .main {
        display: flex;
        flex-direction: row;
        flex-flow: wrap;
        align-items: center;
    }
    .first, .second, .first__item, .second__item {
        margin: 10px;
        padding: 15px 0 15px 0;
        flex: 1;
        justify-content: space-around;
        align-items: center;
    }
    .delivery {
        margin: 15px;
        text-align: center;
    }
</style>

