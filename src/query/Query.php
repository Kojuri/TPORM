<?php
namespace TPORM\query;


class Query
{
    
    private $sqltablke;
    
    private $fields = '*';
    
    private $where = null;
    
    private $args = [];
    
    private $sql = '';
    
    public static function table(string $table)
    {
        $query = new Query();
        $query->sqltable = $table;
        return $query;
    }
    
    public function select(array $fields)
    {
        $this->fields = implode(',', $fields);
        return $this;
    }
    
    public function where($col, $op, $val)
    {
        /* … */
        $this->args[] = $val;
        return $this;
    }
    
    public function get()
    {
        $this->sql = 'select ' . $this->fields . ' from ' . $this->sqltable;
        /* … */
        $stmt = $pdo->prepare($this->sql);
        $stmt->execute($this->args);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function delete
    {
        
    }
}


