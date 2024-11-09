<?php
// XML dosyasını SimpleXML ile yükle
$xml = simplexml_load_file('data.xml');

// Boş bir array oluşturuyoruz, bu array'ı Selectbox'a aktaracağız
$options = [];
foreach ($xml->item as $item) {
    // Her item'ı array'a ekleyelim
    $options[] = [
        'id' => (int)$item->id,
        'name' => (string)$item->name
    ];
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery UI Selectbox ve PHP SimpleXML</title>
    <!-- jQuery ve jQuery UI'yi dahil ediyoruz -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<h2>PHP ve jQuery UI Selectbox Kullanımı</h2>

<!-- Select box'ı oluşturuyoruz -->
<select id="mySelect">
    <?php
    // PHP'den dinamik olarak optionsları ekliyoruz
    foreach ($options as $option) {
        echo "<option value='{$option['id']}'>{$option['name']}</option>";
    }
    ?>
</select>

<!-- jQuery UI Selectmenu ile select kutusunu güzelleştiriyoruz -->
<script>
$(document).ready(function() {
    // jQuery UI Selectmenu ile güzelleştiriyoruz
    $("#mySelect").selectmenu();
});
</script>

</body>
</html>
