<?

include_once __DIR__.'/../source/class.ES24Datatable.php';

$table = new ES24Datatable;

$table->addClass('esdata');
$table->addRow();

$table->addColumn()->setHeading('Název');
$table->addColumn()->setHeading('Popis');

$table->addRow();

$tableHtml = $table->getOutTable();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>ES24Datatable Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <script type="text/javascript" src="../js/script.js"></script>
    </head>
    <body>
        <?=$tableHtml?>
    </body>
</html>
