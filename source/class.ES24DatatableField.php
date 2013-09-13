<?
/* 
* © Copyright 2013, Miloš Havlíček
* All rights reserved. 
* 
*/ 

final class ES24DatatableField {
 
    private $content; // string
    private $table;
    
    public function __construct(&$table)
    {
        $this->table =& $table;
        
        $this->content = 1;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setContent($in)
    {
        $this->content = $in;
    }
    
}