<?

include_once __DIR__.'/../source/class.ES24Datatable.php';

$table = new ES24Datatable;
$table->addClass('esdata');
$table->setSearchLine(true);
$table->setPagination(true);
$table->setPaginationShowSetter(true);
$table->setPaginationShowCount(true);

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
            .paragraph {
                padding-left: 20px;
                width: 500px;
                font-size: 25px;
                color: #444;
            }
            #github {
                position: fixed;
                right: 100px;
                top: 0;
                background-color: #666;
                color: #fff;
                padding: 10px 30px;
                font-size: 25px;
                cursor: pointer;
            }
            #github:hover {
                background-color: #222;
            }
        </style>
    </head>
    <body>
        <div id="github" onclick="window.location.href='https://github.com/miloshavlicek/ES24Datatable';">github</div>
        <div id="page">
            <h1>ES24Datatable</h1>
            <p class="paragraph">
                Create amazing tables in php easily!<br />
                With ES24Datatable class you can show, search, edit and sort thousands of your records from database or any other source.
            <h2>Simple Table Example</h2>
            <?=$tableHtml?>
        </div>
    </body>
</html>