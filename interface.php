<?php

interface User 
{
	public function getAll();
	public function getOne();
}

/**
 * 
 */
class Menber implements User
{
	
	public function getAll() {}
	public function getOne() {}
}

