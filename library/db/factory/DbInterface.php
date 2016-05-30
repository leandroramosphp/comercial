<?php
namespace library\db\factory;

interface DbInterface
{
	public function __construct(array $config);
	public function insert($table, array $fields);
	public function update($table, array $fields, $where);
	public function delete($table, $where);
	public function select($table, $cols = '*', $where = null);
} 