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
    <title>Selectbox ve PHP SimpleXML</title>
</head>
<body>

<h2>PHP Selectbox Kullanımı</h2>

<!-- Select box'ı oluşturuyoruz -->
<select id="mySelect">
    <?php
    // PHP'den dinamik olarak optionsları ekliyoruz
    foreach ($options as $option) {
        echo "<option value='{$option['id']}'>{$option['name']}</option>";
    }
    ?>
</select>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the select element
    var select = document.getElementById('mySelect');
});
</script>

</body>
</html>
