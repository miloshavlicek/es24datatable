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
    
    public function __construct(&$table)
    {
        $this->heading = null;
        $this->minWidth = 200;
        
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