<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'controllers/Format.php';
require APPPATH . 'controllers/RestController.php';
class Welcome extends RestController
{
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
