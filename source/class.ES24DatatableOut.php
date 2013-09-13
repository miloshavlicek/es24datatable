<?
/* 
* © Copyright 2013, Miloš Havlíček
* All rights reserved. 
* 
*/ 

final class ES24DatatableOut {
    
    private $table;
    
    public function __construct(&$table) 
    {
        $this->table = $table;
    }
    
    public function getTable()
    {
        $table =& $this->table;
        
        if(!is_array($table->cols) OR count($table->cols)==0)
            return null;
        
        $out = '';
        
        $out .= '<table';
        
        if(is_array($table->classes) AND count($table->classes)>0)
        {
            $i = 0;
            foreach($table->classes as $classKey => $classOne)
            {
                $i++;
                
                if($i==1)
                {
                    $out .= ' class="';
                }
                else
                {
                    $out .= ' ';
                }
                
                $out .= $classOne;
            }
            if($i>0)
            {
                $out .= '"';
            }
        }
        
        $out .= '>';
        
        // Generate heading
        $out .= '<tr>';
        foreach($table->cols as $colKey => $colOne)
        {
            
            $out .= '<th>'.$colOne->getHeading().'</th>';
            
            
        }
        $out .= '</tr>';
        
        // Generate content rows
        foreach($table->rows as $rowKey => $rowOne)
        {
            
            $out .= '<tr>';
            
            
            foreach($table->cols as $colKey => $colOne)
            {
                $out .= '<td>'.$rowOne->getField($colKey)->getContent().'</td>';
            }
            
            $out .= '</tr>';
            
        }
        
        $out .= '</table>';
        
        return $out;
    }
    
}