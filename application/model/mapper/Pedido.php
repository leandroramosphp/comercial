<?php
namespace application\model\mapper;

use library\orm\Mapper;

class Pedido extends Mapper
{
	protected $table = 'pedidos';
	protected $primaryKey = 'numero';
	protected $adapter = null;
}