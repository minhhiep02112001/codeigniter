<?php
include 'ConnectDBModel.php';

class UserModel extends ConnectDBModel
{
	function getAllUser()
	{
		$this->db->select('*');
		$this->db->from('users');
		$data = $this->db->get();
		return $data->result() ;
	}

	function insertRecord($data = []){
		try {
			$this->db->insert('users', $data);
			// documentation at
			// https://www.codeigniter.com/userguide3/database/queries.html#handling-errors
			// says; "the error() method will return an array containing its code and message"
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function show($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id = ', $id);
		$data = $this->db->get();

		return $data->row() ;
	}
	function updateRecord($id , $data = []){
		try {
			$this->db->where('id =', $id);
			$this->db->update('users', $data);
			return  true;
		}catch (\Exception $ex){
			return false;
		}
	}
	function deleteRecord($id){
		try {
			$this->db->delete('users', array('id' => $id));
			return  true;
		}catch (\Exception $ex){
			return false;
		}
	}
}
