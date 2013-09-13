<?
/* 
* © Copyright 2013, Miloš Havlíček
* All rights reserved. 
* 
*/      
        
final class ES24DatatableColumn {

    private $heading; // string
    private $minWidth; // in px - int
    private $rows;
    private $cols;
    public $sortable;
    public $editable;
    
    public function __construct(&$table)
    {
        $this->heading = null;
        $this->minWidth = 200;
        $this->sortable = false;
        $this->editable = false;
        
        $this->rows =& $table->rows;
        $this->cols =& $table->cols;
        
        $rows =& $this->rows;
        
        if(is_array($rows))
        {
            foreach($rows as $rowKey => $rowOne)
            {
                $index = count($rowOne->fields);

                $rowOne->fields[$index] = new ES24DatatableField($table);
            }
        }
    }
    
    public function setEditable($in)
    {
        if($in===true)
            $this->editable = true;
        elseif($in===false)
            $this->editable = false;
    }
    
    public function setSortable($in)
    {
        if($in===true)
            $this->sortable = true;
        elseif($in===false)
            $this->sortable = false;
    }
    
    public function getHeading()
    {
        return $this->heading;
    }
    
    public function setHeading($in)
    {
        $this->heading = $in;
    }
    
    public function setMinWidth($in)
    {
        $this->minWidth = $in;
    }
    
}