<?php 

namespace Cpanel\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\AbstractResultSet;

class AdminTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
         return $resultSet;
	}

	public function loginAdmin($data)
	{
		$username  = $data['username'];
		$password  = $data['password'];
		$rowset = $this->tableGateway->select(array('username' => $username, 'password'=>$password));
		$row = $rowset->current();
		if($row)
			return $row;
		else
			return FALSE;
	}
}