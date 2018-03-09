<?php
function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
    echo "<pre>";
    PHP_EOL;
    $address = $xml->Address;
    $numAdr = count($address);

    print_r("<header>" . "Order number: " . $xml->attributes()
            ->PurchaseOrderNumber->__toString() . "<br>");
    print_r("Order date:" . $xml->attributes()->OrderDate->__toString() . "<br>");
    print_r("Number of adressess: " . $numAdr . "</header>" . "<br>");

    print_r("<div class='main'>" . "<div class='first-order'>" . "<div class='first'>"
        . "First destination: " . $xml->Address[0]->attributes()->Type->__toString() . "<br>");
    print_r("Name: " . $xml->Address[0]->Name->__toString() . "<br>");
    print_r("Street :" . $xml->Address[0]->Street->__toString() . "<br>");
    print_r("City :" . $xml->Address[0]->City->__toString() . "<br>");
    print_r("State: " . $xml->Address[0]->State->__toString() . "<br>");
    print_r("Zip: " . $xml->Address[0]->Zip->__toString() . "<br>");
    print_r("Country :" . $xml->Address[0]->Country->__toString() . "<br>" . "</div>");

    print_r("<div class='first__item'>" . "PartNumder :" . $xml->Items->Item[0]
            ->attributes()->PartNumber->__toString() . "<br>");
    print_r("ProductName :" . $xml->Items->Item[0]->ProductName->__toString() . "<br>");
    print_r("Quantity :" . $xml->Items->Item[0]->Quantity->__toString() . "<br>");
    print_r("USPrice :" . $xml->Items->Item[0]->USPrice->__toString() . "<br>");
    print_r("Comment :" . $xml->Items->Item[0]->Comment->__toString() . "<br>" . "</div>" . "</div>");
    print_r("<div class='second-order'>" . "<div class='second'>" . "Second destination: "
        . $xml->Address[1]->attributes()->Type->__toString() . "<br>");
    print_r("Name: " . $xml->Address[1]->Name->__toString() . "<br>");
    print_r("Street :" . $xml->Address[1]->Street->__toString() . "<br>");
    print_r("City :" . $xml->Address[1]->City->__toString() . "<br>");
    print_r("State: " . $xml->Address[1]->State->__toString() . "<br>");
    print_r("Zip: " . $xml->Address[1]->Zip->__toString() . "<br>");
    print_r("Country :" . $xml->Address[1]->Country->__toString() . "<br>" . "</div>");

    print_r("<div class='second__item'>" . "PartNumder :" .
        $xml->Items->Item[1]->attributes()->PartNumber->__toString() . "<br>");
    print_r("ProductName :" . $xml->Items->Item[1]->ProductName->__toString() . "<br>");
    print_r("Quantity :" . $xml->Items->Item[1]->Quantity->__toString() . "<br>");
    print_r("USPrice :" . $xml->Items->Item[1]->USPrice->__toString() . "<br>");
    print_r("Comment :" . $xml->Items->Item[1]->Comment->__toString() . "<br>" . "</div>" . "</div>" . "</div>");

    print_r("<div class='delivery'>" . $xml->DeliveryNotes->__toString() . "</div>" . "</div>" . "<br>");
}

function task2()
{
    $data = [
        ["one", "two", "three", "four"],
        ["five", "six", "seven", "eight"],
        ["nine", "ten", "eleven", "twelve"]
    ];
    $encoded = json_encode($data);
    file_put_contents('./output.json', $encoded);
    $handle = fopen('./output.json', 'r+');
    $readFile = fread($handle, filesize('./output.json'));

    $rand = rand(1, 2);
    if ($rand === 1) {
        $someStr = rand();
        $randHandle = fopen('./output2.json', 'w+');
        fwrite($randHandle, $readFile);
        fwrite($randHandle, $someStr);
    } else {
        $randHandle = fopen('./output2.json', 'w+');
        fwrite($randHandle, $readFile);
    }
    $hand = fopen('./output2.json', 'r+');
    $readRandFile = fread($hand, filesize('./output2.json'));

    if ($readFile == $readRandFile) {
        echo " В файлах одинаковое содержимое !!! ";
    } else {
        $extraStr = str_replace($readFile, '', $readRandFile);
        echo "Новая строка : " . $extraStr;
    }


}

function task3()
{
    $arr = [];
    for ($i = 0; $i < 50; $i++) {
        $arr[$i] = rand(1, 100);
    }
    $csvFile = fopen('./filecsv.csv', 'w+');
    // W+ открывает для чтения и записи ,
    // вставляю переменную в функцию fgetcsv, функция не работает, приходится заново
    // открывать файл , в чем тут подвох ?
    fputcsv($csvFile, $arr);
    $file = fopen('./filecsv.csv', 'r');
    if ($csvFile) {
        $csvData = fgetcsv($file, filesize('./filecsv.csv'), ",");
        for ($j = 0; $j < count($arr); $j++) {
            if ($arr[$j] % 2 === 0) {
                $count += $arr[$j];
            }
        }
        echo "сумма четных чисел: " . $count;
    }
}

function task4()
{
    $url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
    $data = file_get_contents($url);
    $decoded = json_decode($data, true);
    print_r("page_id :" . $decoded['query']['pages']['15580374']['pageid'] . "<br>");
    print_r("title: " . $decoded['query']['pages']['15580374']['title']);

}

?>

<style>
    header {
        text-align: center;
    }

    .main {
        display: flex;
        flex-direction: column;
        flex-flow: wrap;
        align-items: center;
    }

    .first-order, .second-order {
        display: flex;
        flex-direction: row;
        flex-flow: wrap;
    }

    .first, .second, .first__item, .second__item {
        margin: 10px;
        padding: 15px 0 15px 0;
        justify-content: space-around;
        align-items: center;
    }

    .delivery {
        margin: 15px;
        text-align: center;
    }
</style>

