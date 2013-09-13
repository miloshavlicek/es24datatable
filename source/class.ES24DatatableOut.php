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
        
        if($table->moveable===true)
        {
            $out .= '<th class="esgrippy">&nbsp;</th>';
        }
        
        if($table->checkable===true)
        {
            $out .= '<th class="escheck">&nbsp;</th>';
        }
        
        foreach($table->cols as $colKey => $colOne)
        {
            
            $out .= '<th>'.$colOne->getHeading();
               
            if($colOne->sortable===true)
            {
                $out .= ' <span class="essortable">&harr;</span>  ';
            }

            $out .= '</th>';
            
            
        }
        $out .= '</tr>';
        
        // Generate search line
        $out .= '<tr>';
        
        if($table->moveable===true)
        {
            $out .= '<th class="esgrippy">&nbsp;</th>';
        }
        
        if($table->checkable===true)
        {
            $out .= '<th class="escheck">&asymp;</th>';
        }
        
        foreach($table->cols as $colKey => $colOne)
        {
            
            $out .= '<th class="essearchbox">';
            
            if($colOne->searchable===true)
            {
                $out .= '<input type="text" />';
            }
            
            $out .= '</th>';
            
            
        }
        $out .= '</tr>';
        
        // Generate content rows
        foreach($table->rows as $rowKey => $rowOne)
        {
            
            $out .= '<tr>';
            
            if($table->moveable===true)
            {
                $out .= '<td class="esgrippy">&nbsp</td>';
            }
            
            if($table->checkable===true)
            {
                $out .= '<td class="escheck"><input type="checkbox" /></td>';
            }
            
            foreach($table->cols as $colKey => $colOne)
            {
                $out .= '<td';
                
                if($colOne->editable===true)
                {
                    $out .= ' class="eseditable" ';
                }
                
                $out .= '>'.$rowOne->getField($colKey)->getContent().'</td>';
            }
            
            $out .= '</tr>';
            
        }
        
        // Generate pagination
        if($table->pagination===true)
        {
            $out .= '<tr>';

            if($table->moveable===true)
            {
                $out .= '<th class="esgrippy">&nbsp;</th>';
            }

            if($table->checkable===true)
            {
                $out .= '<th class="escheck">&nbsp;</th>';
            }

            $out .= '<td class="espaginationrow" colspan="'.count($table->cols).'">';

            if($table->paginationShowSetter===true)
            {
                $out .= '<span class="espaginationset">'.$table->paginationRows.' '.$table->paginationSetterText.'</span>';
            }
            
            if($table->paginationShowCount===true)
            {
                $out .= '<span class="escount">'.$table->paginationCountTextPre.' '.count($table->rows).' '.$table->paginationCountTextAfter.'</span>';
            }
            
            $out .= '<span class="espaginationpages">'.$table->paginationText.' 1 / 1 </span>';

            $out .= '</td>';

            $out .= '</tr>';
        }
        
        $out .= '</table>';
        
        return $out;
    }
    
}