<?php
namespace library\orm;

use library\orm\TableGateway;
use library\db\factory\DbInterface;

class Mapper extends TableGateway
{
	protected $primaryKey = null;
	
	protected $rowClass = '\\library\\orm\\ActiveRecord';
	
	public static $defaultAdapter = null;
	
	public function __construct($table = null, $primaryKey = null, $adapter = null)
	{
		if (!is_null($primaryKey))
			$this->primaryKey = $primaryKey;
		if (!is_null($table) && !is_null($adapter))
			parent::__construct($table, $adapter);
		if (self::$defaultAdapter !== null)
			$this->adapter = self::$defaultAdapter;
	}
	
	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}
	
	public function getTable()
	{
		return $this->table;
	}
	
	public function insert(array $cols)
	{
		$this->adapter->insert($this->table, $cols);
	}

	public function update(array $cols, $where)
	{
		$this->adapter->update($this->table, $cols, $where);
	}

	public function delete($where)
	{
		$this->adapter->delete($this->table, $where);
	}
	
	public function newRow()
	{
		$element = $this->adapter->getFields($this->table);		
		
		$row = new ActiveRecord($element, $this->adapter, $this, array('state'=>'new'));
		
		return $row;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}