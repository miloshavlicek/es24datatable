<?

include_once __DIR__.'/../source/class.ES24Datatable.php';

$table = new ES24Datatable;
$table->addClass('esdata');
$table->setSearchLine(true);

$col = $table->addColumn();
$col->setHeading('Name');
$col->setSortable(true);
unset($col);

$col = $table->addColumn();
$col->setHeading('Short Info');
$col->setEditable(true);

$table->addColumn();

$col = $table->addColumn();
$col->setHeading('Action');

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
        <style>
            body {
                background: #eee;
                margin-top: 0;
                font-family: Calibri;
            }
            #page {
                margin: 0 auto;
                width: 920px;
                padding: 10px 30px 50px 30px;
                margin: 0 auto;
                background: #fff;
            }
        </style>
    </head>
    <body>
        <div id="page">
            <h1>ES24Datatable - Examples</h1>
            <h2>Simple Table Example</h2>
            <?=$tableHtml?>
        </div>
    </body>
</html>
