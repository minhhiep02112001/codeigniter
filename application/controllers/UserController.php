<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller
{
	protected $modelUser;

	function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->model('UserModel');
		$this->load->helper('url');
		$this->modelUser = $this->UserModel;
	}

	function index()
	{
		$this->load->model('UserModel');
		$data['users'] = $this->modelUser->getAllUser();
		if (!empty($this->session->flashdata('message'))) {
			$data['message'] = $this->session->flashdata('message') ;
		}
		return $this->load->view('user/index', $data);
	}

	function create()
	{
		return $this->load->view('user/create');
	}

	function store()
	{
		$data = [
			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
		];

		if ($this->modelUser->insertRecord($data)) {
			$this->session->set_flashdata('message', 'Create user successfully');
			redirect(base_url('/user'));
		} else {
			$url = $_SERVER['HTTP_REFERER'];
			$this->session->set_flashdata('message', 'Error! Create user unsuccessfully');
			redirect("$url");
		}
	}

	function edit($index)
	{
		$data['user'] = $this->modelUser->show($index);

		return $this->load->view('user/edit', $data);

	}

	function update($id)
	{
		$data = [
			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
		];


		if ($this->modelUser->updateRecord($id, $data)) {
			$this->session->set_flashdata('message', 'Update user successfully');
			redirect(base_url('/user'));
		} else {
			$url = $_SERVER['HTTP_REFERER'];
			$this->session->set_flashdata('message', 'Error! Update user unsuccessfully');
			redirect("$url");
		}
	}

	function delete($id)
	{

		if ($this->modelUser->deleteRecord($id)) {
			$this->session->set_flashdata('message', 'Delete user successfully');
			redirect(base_url('/user'));
		} else {
			$url = $_SERVER['HTTP_REFERER'];
			$this->session->set_flashdata('message', 'Error! Delete user unsuccessfully');
			redirect(base_url('/user'));
		}
	}
}
