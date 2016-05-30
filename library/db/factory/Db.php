<?php
namespace library\db\factory;

class Db
{
	/**
	 * 
	 * @param array $config
	 * @return FactoryInterface
	 */
	public static function getFactory(array $config)
	{
		$dbtype = $config['dbtype'];
		
		$class = __NAMESPACE__ . "\\{$dbtype}\Db";  
		
		return new $class($config);
	}
}