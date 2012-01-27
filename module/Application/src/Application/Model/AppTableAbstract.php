<?php
namespace Application\Model;
use Zend\Db\Table\AbstractTable,
    Zend\Db\Expr;

abstract class AppTableAbstract extends AbstractTable
{
    /**
     * Zend\Db\Expr('now()')
     * @var Zend\Db\Expr 
     */
    protected $now;
    protected $autocompleteColumns = array();
    private   $_defAutocompleteCols = array('created', 'modified');
    // values hashed by md5 
    public    $protectCols = array();


    public function init() 
    {
        $this->now = new Expr('now()');
        $this->autocompleteColumns = $this->inTableCols($this->_defAutocompleteCols);
    }
    
    /**
     * Save data into table
     * if new data - insert, if primary key exists - update
     * @param array $data
     * @return int ID of the record 
     */
    public function save(array $data)
    {
        $cols = $this->info('cols');
        
        // find all columns we can modify
        $columns = array_flip(array_diff($cols, $this->autocompleteColumns));
        $data = array_intersect_key($data, $columns);
        
        if(in_array('modified', $this->autocompleteColumns)) {
            $data['modified'] = $this->now;
        }
        
        // replace string by its md5 hash for protected columns
        $protectedCols = array_intersect_key($data, array_flip($this->protectCols));
        foreach ($protectedCols as $protectedCol=>$value){
            $data[$protectedCol] = new Expr("md5('$value')");
        }
        
        // save data
        if ($data['id'] > 0) {
             $updated = $this->update($data, array(' id = ?' => $data['id']));
             return ($updated > 0) ? $data['id'] : 0 ;
        } else {
            unset($data['id']);
            if(in_array('created', $this->autocompleteColumns)) {
                $data['created'] = $this->now;
            }
            return $this->insert($data);
        }
        
    }
    
    /**
     * Add new autocomplete columns
     * if second param 'true' => delete earlest autocomplete columns
     * @param array $cols
     * @param bool $rewrite 
     */
    public function setAutocompleteColumns(array $cols, $rewrite = false)
    {
        // find $cols columns in database table
        $newCols = $this->inTableCols($cols);
        
        if(count($newCols) > 0 ) {
            if($rewrite) {
                $this->autocompleteColumns = array();
            }
            $this->autocompleteColumns = 
                array_merge($newCols, $this->autocompleteColumns);
        }
    }
    
    /**
     * reset all autocomplete columns  
     */
    public function resetAutocompleteColumns()
    {
        $this->setAutocompleteColumns(array(), true);
    }
    
    /**
     * Return only column names wich exists in the table
     * or empty array
     * @param array $colsToFind
     * @return array 
     */
    protected function inTableCols(array $colsToFind) 
    {
        // get all table columns
        $dbCols = $this->info('cols');
        $inTableCols = array();
        
        foreach ($colsToFind as $value) {
            // column exists in the table 
            if(in_array($value, $dbCols)){
                $inTableCols[] = $value;
            }
        }
         return $inTableCols;
    }
    
}