<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Records extends CI_Controller
{

    /* CONSTRUCTOR */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Order_model');
        $this->load->model('Service_model');
        $this->load->model('Account_model');
        $this->load->model('Locations_model');
        $this->load->model('Booking_model');
        $this->load->library('session');
    }

    // Orders hub main page
    public function index()
    {
        $data['orders'] = $this->Order_model->getCompletes();
        $info = array(
            'title' => 'Records',
            'orders' => $data['orders'],
        );

        // echo '<pre>';
        // print_r($info);

        $this->load->view('page/include/header', $info);
        $this->load->view('page/records/hub');
        $this->load->view('page/include/footer');
    }

    // Orders - delete order
    public function records_view()
    {
        $data = $this->Order_model->getOrder($this->uri->segment(3));

        // Ensure $data is not empty and get the first element
        $booking = !empty($data) ? $data[0] : null;

        if ($booking) {
            // Parse the JSON string
            $booking_details = json_decode($booking->orders_tbl_details, true);

            // Prepare individual variables from the JSON
            $services = isset($booking_details['services']) ? $booking_details['services'] : [];
            $masseurs = isset($booking_details['masseurs']) ? $booking_details['masseurs'] : [];
            $locations = isset($booking_details['locations']) ? $booking_details['locations'] : [];
            $totalCost = isset($booking_details['orders_tbl_cost']) ? $booking_details['orders_tbl_cost'] : 'N/A';
        } else {
            $services = $masseurs = $locations = [];
            $totalCost = 'N/A';
        }

        // Pass the single object
        $info = array(
            'title' => 'Record Info',
            'booking' => $booking,
            'services' => $services,
            'masseurs' => $masseurs,
            'locations' => $locations,
            'totalCost' => $totalCost,
        );

        // echo '<pre>';
        // print_r($info);

        $this->load->view('page/include/header', $info);
        $this->load->view('page/records/records_view', $info);
        $this->load->view('page/include/footer');
    }

    // Export PDF in php
    // public function exportPDF()
    // {
    //     $this->load->library('pdf');
    //     $this->pdf->load_view('page/records/records_view');
    //     $this->pdf->render();
    //     $this->pdf->stream("records.pdf");
    // }

    public function recordsToPDF()
    {
        $data['orders'] = $this->Order_model->getCompletedOrders();

        if (!empty($data['orders'])) {
            // Array to hold all parsed orders
            $parsedOrders = [];

            foreach ($data['orders'] as $order) {
                // Decode JSON-encoded details for each order
                $booking_details = json_decode($order->orders_tbl_details, true);

                // Extract specific fields
                $services = isset($booking_details['services']) ? $booking_details['services'] : [];
                $masseurs = isset($booking_details['masseurs']) ? $booking_details['masseurs'] : [];
                $locations = isset($booking_details['locations']) ? $booking_details['locations'] : [];
                $totalCost = isset($booking_details['orders_tbl_cost']) ? $booking_details['orders_tbl_cost'] : 'N/A';

                // Add parsed order details to the array
                $parsedOrders[] = [
                    'order_id' => $order->orders_tbl_id,
                    'status' => $order->orders_tbl_status,
                    'total_cost' => $totalCost,
                    'services' => $services,
                    'masseurs' => $masseurs,
                    'locations' => $locations,
                    'date' => $order->orders_date,
                ];
            }

            // Return parsed orders as JSON
            // echo '<pre>';
            echo json_encode($parsedOrders, JSON_PRETTY_PRINT);
            // echo '</pre>';
        } else {
            // Handle case where no orders are found
            echo json_encode(['error' => 'No orders found']);
        }
    }
}
