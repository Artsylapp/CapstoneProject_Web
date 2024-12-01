<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiAnalytics extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Analytics_model');
    }

    public function index_get()
    {
        // Example of fetching data from Booking_model
        $year = $this->Analytics_model->getYearsOrders(); // Ensure you have this method in the model
        $revenue = $this->Analytics_model->getRevenueData(); // Ensure you have this method in the model
        $analytics = $this->Analytics_model->getAnalyticsData(); // Ensure you have this method in the model

        $data = [
            'year' => $year,
            'revenue' => $revenue,
            'analytics' => $analytics
        ];

        if ($data) {
            $this->response([
                'error' => false,
                'message' => 'Request Successful.',
                'data' => $data
            ], 200);
        } else {
            $this->response([
                'error' => false,
                'message' => 'Request Successful, but no data to show.'
            ], 200);
        }
    }
}