<?
/* 
* © Copyright 2013, Miloš Havlíček
* All rights reserved. 
* 
*/ 

class ES24DatatableRow {
    
    public $fields = array();
    
    public function __construct(&$table)
    {
        $cols =& $table->cols;
        $fields =& $this->fields;
        
        if(is_array($cols))
        {
            foreach($cols as $colKey => $colOne)
            {
                $index = count($fields);

                $fields[$index] = new ES24DatatableField($table);
            }
        }
        
    }
    
    public function getField($key)
    {
        if(isset($this->fields[$key]))
                return $this->fields[$key];
            
        return null;
    }
    
    public function getFields()
    { 
        return $this->fields;
    }
    
    public function setFieldContent($index,$content)
    {
        if(isset($this->fields[$index]))
        {
            $this->fields[$index]->setContent($content);
        }
        
    }
    
}