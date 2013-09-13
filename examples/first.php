<?

include_once __DIR__.'/../source/class.ES24Datatable.php';

$table = new ES24Datatable;

$table->addClass('esdata');

$table->addColumn()->setHeading('Name');
$table->addColumn()->setHeading('Short Info');

$table->addColumn();
$table->addColumn()->setHeading('Action');

$row = $table->addRow();
$row->setFieldContent(0,'John');
$row->setFieldContent(1,'One man from San Francisco.');

$row = $table->addRow();
$row->setFieldContent(0,'James');
$row->setFieldContent(1,'Somebody from Los Angels.');

$table->setCheckable(true);
$table->setMoveable(true);

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
        <h2>Simple Table Example</h2>
        <?=$tableHtml?>
    </body>
</html>
