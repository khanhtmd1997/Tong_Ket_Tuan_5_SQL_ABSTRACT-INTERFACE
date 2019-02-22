<?php
// namespace Controller;

// use Controller\BaseController;

require_once 'base_controller.php';

class PagesController extends BaseController {
    function __construct() {
        $this->folder = 'pages';
    }

    public function home() {
        $data = array(
            'name' => 'Nguyen Van Khanh',
            'age' => 23
        );

        $this->render('home', $data);
    }

    public function error() {
        $this->render('error');
    }
}