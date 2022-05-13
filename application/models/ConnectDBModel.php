<?php

class ConnectDBModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
}
