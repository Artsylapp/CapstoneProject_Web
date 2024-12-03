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
        $results = $this->Order_model->getOrder($this->uri->segment(3));

        // Ensure $data is not empty and get the first element
        $bookingdata = !empty($results) ? $results[0] : null;

        // checking if the booking is not empty
        if ($bookingdata) {
            // Parse the JSON string
            $booking_details = json_decode($bookingdata->orders_tbl_service, true);
            $masseur_details = json_decode($bookingdata->orders_tbl_masseur, true);
            $customer_details = json_decode($bookingdata->orders_tbl_customer, true);

            // Prepare individual variables from the JSON
            $services = isset($booking_details['services']) ? $booking_details['services'] : [];
            $locations = isset($booking_details['locations']) ? $booking_details['locations'] : [];
            $totalCost = isset($booking_details['orders_tbl_cost']) ? $booking_details['orders_tbl_cost'] : '0';

            // Masseur Details: Assuming it's inside 'masseur_detail' key
            $masseurs = isset($masseur_details['masseur_detail']) ? $masseur_details['masseur_detail'] : [];

            // Customer Details: Assuming it's inside 'customer_details' key
            $customer = isset($customer_details['customer_details']) ? $customer_details['customer_details'] : [];
        } else {
            // Default empty values if no booking data found
            $services = $masseurs = $locations = [];
            $totalCost = '0';
            $customer = [];
        }

        // Prepare the array for view
        $info = array(
            'title' => 'Booking Info',
            'bookingdetails' => $booking_details,
            'id' => $bookingdata->orders_tbl_id,
            'status' => $bookingdata->orders_tbl_status,
            'paid_amount' => $bookingdata->orders_tbl_paid_amount,
            'services' => $services,
            'time_start'=> isset($booking_details['orders_tbl_date']) ? $booking_details['orders_tbl_date'] : 'N/A',
            'time_end'=> isset($booking_details['orders_tbl_time_end']) ? $booking_details['orders_tbl_time_end'] : 'N/A',
            
            // Extracting individual masseur details from the JSON
            'masseurs_name' => isset($masseurs['name']) ? $masseurs['name'] : 'N/A', 
            'masseurs_gender' => isset($masseurs['gender']) ? $masseurs['gender'] : 'N/A', 
            
            // Extracting location name from the booking details
            'workstation_name' => isset($locations['name']) ? $locations['name'] : 'N/A',

            'totalCost' => $totalCost,

            // Extracting customer details from the JSON
            'customer_name' => isset($customer['name']) ? $customer['name'] : 'N/A',
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
