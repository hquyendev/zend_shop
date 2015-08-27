<?php 

namespace Cpanel\Model;

class Admin
{
	public $id;
	public $name;
	public $username;
	public $email;
	public $active;

	public function exchangeArray($data)
	{
	 	$this->id     = (!empty($data['id'])) ? $data['id'] : null;
	 	$this->name     = (!empty($data['name'])) ? $data['name'] : null;
	 	$this->username     = (!empty($data['username'])) ? $data['username'] : null;
	 	$this->email     = (!empty($data['email'])) ? $data['email'] : null;
	 	$this->active     = (!empty($data['active'])) ? $data['active'] : null;
	}
}