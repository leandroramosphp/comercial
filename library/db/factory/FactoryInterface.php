<?php
namespace library\db\factory;

use library\db\factory\DbInterface;

interface FactoryInterface
{
	/**
	 * @return DbInterface
	 */
	public function factory();
}