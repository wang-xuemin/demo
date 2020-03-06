<?php

trait User 
{
	public function showUsers() {
		echo('showUsers');
	}

	public function deleteUser() {
		echo('deleteUser');
	}
}

trait Member 
{
	public function showMembers() {
		echo('showMembers');
	}

	public function deleteMember() {
		echo('deleteMember');
	}
}

/**
 * 
 */
class Login 
{

	use User, Member;
	
	public function __construct()
	{
		# code...
	}

	public function show()
	{
		$this->showMembers();
	}
}

$obj = new Login();

$obj->showUsers();

$obj->show();

$obj->showMembers();

$obj->deleteUser();










