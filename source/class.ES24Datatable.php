<?
/* 
* © Copyright 2013, Miloš Havlíček
* All rights reserved. 
* 
*/ 

require_once __DIR__.'/class.ES24DatatableRow.php'; 
require_once __DIR__.'/class.ES24DatatableColumn.php'; 
require_once __DIR__.'/class.ES24DatatableField.php'; 
require_once __DIR__.'/class.ES24DatatableOut.php'; 
        
class ES24Datatable {
 
    public $rows;
    public $cols;
    public $classes;
    
    public function __construct()
    {
        $this->rows = array();
        $this->cols = array();
        $this->classes = array();
    }
    
    public function addClass($in)
    {
        $this->classes[] = $in;
    }
    
    public function addRow()
    {
        $rows =& $this->rows;
        
        $index = count($rows);
        
        $rows[$index] = new ES24DatatableRow($this);
        
        $rowNew =& $rows[$index];
        
        return $rows;
    }
    
    public function addColumn()
    {
        $index = count($this->cols);
        
        $this->cols[$index] = new ES24DatatableColumn($this);
        
        $colNew =& $this->cols[$index];
        
        return $colNew;
    }
    
    public function getOutTable()
    {
        $out = new ES24DatatableOut($this);
        return $out->getTable();
    }
    
}