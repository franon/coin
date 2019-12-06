<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

// use chriskacerguis\RestServer\RestController;

class Example extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }


    public function index_get(){
        echo "uwu";
    }

    public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get('id');

        if ($id === null)
        {
            // Check if the users data store contains users
            if ($users)
            {
                // Set the response and exit
                echo "bakpao";
                $this->response($users, 200);
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                ], 404);
            }
        }
    }
}