<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class GreetingsController extends CI_Controller {

	function __construct(){
        /* Session Checking Start*/
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('greeting_model');
        $this->load->model('callback_model');
        $this->load->library('session');
    }
    public function index($value='')
    {
 
    	$data = $this->greeting_model->checkDOB(); 
    	if(count($data)>0)
    	{
    		foreach ($data as $today_dob) {
    			$data = array("user_id" => $today_dob->id, "username" => $today_dob->first_name." ".$today_dob->last_name, "type" =>"dob"); 
    			$check_data = $this->greeting_model->getWhere(array_merge($data,array("date_added"=>date("Y-m-d"))),"todaysgreetings");
    			if(!$check_data)
    			$this->greeting_model->insertRow($data,'todaysgreetings'); 
    		}
    	}
    	else
    	{
    		echo "No DOB";
    	}
   	 
    }
 
}