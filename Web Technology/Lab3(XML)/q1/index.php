<?php
$xml = new DOMDocument();
if (!$xml->load('book.xml')) {
    die("Error: Cannot find or load book.xml");
}
echo "<h1>XML Validation Report</h1>";

libxml_use_internal_errors(true);

if ($xml->schemaValidate(__DIR__ . '/book.xsd')) {
    echo "<div style='color: green; padding: 10px; border: 2px solid green;'>";
    echo "<strong>Success:</strong> The XML file is valid against the provided XSD schema.";
    echo "</div>";
} else {
    echo "<div style='color: red; padding: 10px; border: 2px solid red;'>";
    echo "<strong>Validation Failed:</strong> The XML does not match the schema rules.<br><br>";

    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        echo "- " . $error->message . "<br>";
    }
    libxml_clear_errors();
    echo "</div>";
}
?>