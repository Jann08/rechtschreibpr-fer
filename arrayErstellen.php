<?php

// code aus dem internet um aus der liste von 26 tausend wörtern ein array zu machen
$file = fopen("woerter.txt", "r");
if (!$file) {
    die("Fehler beim Öffnen der Datei");
}


$outputFile = fopen("woerterbuch.php", "w");
if (!$outputFile) {
    die("Fehler beim Erstellen der Zieldatei");
}


fwrite($outputFile, "<?php\n\n\$woerterbuch = [\n");


$lineCount = 0;
while (($line = fgets($file)) !== false) {
    $wort = trim($line);
    if (!empty($wort)) {
        fwrite($outputFile, "    \"$wort\",\n");
        $lineCount++;
    }
}

fwrite($outputFile, "];\n\n?>");


fclose($file);
fclose($outputFile);

echo "Wörterbuch erfolgreich erstellt mit $lineCount Einträgen.\n";
