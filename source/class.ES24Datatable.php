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
    public $checkable;
    public $moveable;
    public $searchLine;
    public $pagination;
    public $paginationRows;
    public $paginationText;
    public $paginationShowSetter;
    public $paginationSetterText;
    public $paginationShowCount;
    public $paginationCountTextPre;
    public $paginationCountTextAfter;
    
    public function __construct()
    {
        $this->rows = array();
        $this->cols = array();
        $this->classes = array();
        $this->checkable = false;
        $this->moveable = false;
        $this->searchLine = false;
        $this->pagination = false;
        $this->paginationRows = 50;
        $this->paginationText = 'Page';
        $this->paginationShowSetter = false;
        $this->paginationSetterText = 'records per page';
        $this->paginationShowCount = false;
        $this->paginationCountTextPre = '(Showed';
        $this->paginationCountTextAfter = 'records)';
    }
    
    public function setPaginationShowCount($in)
    {
        if($in===true)
            $this->paginationShowCount = true;
        elseif($in===false)
            $this->paginationShowCount = false;
    }
    
    public function setPaginationShowSetter($in)
    {
        if($in===true)
            $this->paginationShowSetter = true;
        elseif($in===false)
            $this->paginationShowSetter = false;
    }
    
    public function setPagination($in)
    {
        if($in===true)
            $this->pagination = true;
        elseif($in===false)
            $this->pagination = false;
    }
    
    public function setSearchLine($in)
    {
        if($in===true)
            $this->searchLine = true;
        elseif($in===false)
            $this->searchLine = false;
    }
    
    public function addClass($in)
    {
        $this->classes[] = $in;
    }
    
    public function setCheckable($in)
    {
        if($in===true)
            $this->checkable = true;
        elseif($in===false)
            $this->checkable = false;
    }
    
    public function setMoveable($in)
    {
        if($in===true)
            $this->moveable = true;
        elseif($in===false)
            $this->moveable = false;
    }
    
    public function addRow()
    {
        $rows =& $this->rows;
        
        $index = count($rows);
        
        $rows[$index] = new ES24DatatableRow($this);
        
        $rowNew =& $rows[$index];
        
        return $rows[$index];
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