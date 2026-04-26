<?php /**
 * XML Document Validator
 */
$xml = new DOMDocument;
$xml->load('data_group.xml');

/**if($xml->schemaValidate('data.xsd')): ?>
    <h2 style="color: green; margin:80px; text-align:center;">
        It's a <span style="color: limegreen;">VALID</span> XML document!
    </h2>
<?php else: ?>
    <h2 style="color: orange; margin:80px; text-align:center;">
        It's an <span style="color: red;">INVALID</span> XML document!
    </h2>
<?php endif; ?>**/
if($xml->schemaValidate('data_group_schema.xsd')):
    echo "Hey! Congratulations. <strong style='color:green;'>VALID</strong> XMLSchema.";
else:
    echo "Hey! Unfortunately. <strong style='color:red;'>INVALID</strong> XMLSchema.";
endif;