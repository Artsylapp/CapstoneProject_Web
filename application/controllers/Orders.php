<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Orders extends CI_Controller {
    
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
        $data['orders'] = $this->Order_model->getOngoing();

        $info = array(
            'title' => 'Booking',
            'orders' => $data['orders'],
        );
        // echo "<pre>";
        // print_r($info);

        $this->load->view('page/include/header', $info);
        $this->load->view('page/orders/hub');
        $this->load->view('page/include/footer');
    }

    public function orders_info()
    {
        $data['services'] = $this->Service_model->getServices();
        $info = array(
            'title' => 'Select Services',
            'mode' => 'information',
            'services' => $data['services'],
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_info');
    }

    // Orders - create order
    public function orders_create()
    {
        $data['services'] = $this->Service_model->getServices();
        $info = array(
            'title' => 'Select Services',
            'mode' => 'create',
            'services' => $data['services'],
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_create');
    }

    // Orders - Assign masseur
    public function orders_assign()
    {
        $data = $this->Account_model->getAccounts();
        $info = array(
            'title' => 'Assign Masseur',
            'mode' => 'assign',
            'accounts' => $data,
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_assign', $info);
    }

    // Orders - Assign location
    public function orders_placement() {
        $data = $this->Locations_model->getLocations();
        $info = array(
            'title' => 'Assign Location',
            'mode' => 'place',
            'locations' => $data,
        );
        $this->load->view('page/include/header', $info);
        $this->load->view('page/include/transaction_side', $info);
        $this->load->view('page/orders/orders_placement', $info);
    }

    // Orders - Cancel order
    public function orders_cancel()
    {
        $data = $this->Order_model->getOrder($this->uri->segment(3));

        // Ensure $data is not empty and get the first element
        $booking = !empty($data) ? $data[0] : null;

        if ($booking) {
            // Parse the JSON string
            $booking_details = json_decode($booking->orders_tbl_service, true);

            // Prepare individual variables from the JSON
            $services = isset($booking_details['services']) ? $booking_details['services'] : [];
            $masseurs = isset($booking_details['masseurs']) ? $booking_details['masseurs'] : [];
            $locations = isset($booking_details['locations']) ? $booking_details['locations'] : [];
            $totalCost = isset($booking_details['orders_tbl_cost']) ? $booking_details['orders_tbl_cost'] : 'N/A';
        } else {
            $services = $masseurs = $locations = [];
            $totalCost = 'N/A';
        }

        $info = array(
            'title' => 'Cancel Booking',
            'booking' => $booking, // Pass the single object
            'services' => $services,
            'masseurs' => $masseurs,
            'locations' => $locations,
            'totalCost' => $totalCost,
        );

        $this->load->view('page/include/header', $info);
        $this->load->view('page/orders/orders_delete', $info); // Pass $info to the view
        $this->load->view('page/include/footer');        
    }

    // Orders - Save the booking details
    public function save_booking()
    {
        $this->load->model('Booking_model');
        
        // Retrieve the JSON input
        $data = json_decode(file_get_contents('php://input'), true);
        print_r($data);

        // Check if the data is valid and required fields are not empty
        if (!empty($data)) {
            // Validate required fields
            if (empty($data['services']) || empty($data['masseurs']) || empty($data['locations']) || empty($data['totalCost']) || empty($data['customer_information'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'One or more required fields are empty',
                    'missing_fields' => [
                        'services' => empty($data['services']),
                        'masseurs' => empty($data['masseurs']),
                        'locations' => empty($data['locations']),
                        'totalCost' => empty($data['totalCost']),
                        'customer_information' => empty($data['customer_information']),
                    ]
                ]);
            } else {
                // All required fields are valid, proceed to save
                if ($this->Booking_model->saveBooking($data)) {
                    echo json_encode(['status' => 'success']);
                    log_message('info', 'Booking saved successfully: ' . json_encode($data)); // Uncomment for logging
                } else {
                    // Handle model save failure
                    echo json_encode(['status' => 'error', 'message' => 'Failed to save booking']);
                }
            }
        } else {
            // Handle invalid or empty data
            echo json_encode(['status' => 'error', 'message' => 'Invalid or empty data']);
        }


    }
    
    // Orders - Cancel booking
    public function cancel_booking()
{
    $id = $this->uri->segment(3);

    $booking = $this->Order_model->getOrder($id);
    if (!empty($booking)) {
        $booking_details = json_decode($booking[0]->orders_tbl_service, true);
        $booking_masseur = json_decode($booking[0]->orders_tbl_masseur, true);

        $data = array(
            'id' => $id,
            'masseurs' => isset($booking_masseur['masseur_detail']['name']) ? [$booking_masseur['masseur_detail']['name']] : [],
            'locations' => isset($booking_details['locations']['name']) ? [$booking_details['locations']['name']] : [],
            'status' => "CANCELLED"
        );

        $success = $this->Booking_model->updateBooking($data);
        if ($success) {
            $this->session->set_flashdata('message', 'Booking cancelled successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to cancel booking.');
        }
    } else {
        $this->session->set_flashdata('error', 'Booking not found.');
    }
    redirect(base_url("orders"));
}

    // Orders - Complete booking
    public function complete_booking($id)
    {
        $booking = $this->Order_model->getOrder($id);
        if (!empty($booking)) {
            $booking_details = json_decode($booking[0]->orders_tbl_service, true);
    
            $data = array(
                'id' => $id,
                'masseurs' => isset($booking_details['masseurs']) ? array_keys($booking_details['masseurs']) : [],
                'locations' => isset($booking_details['locations']) ? array_keys($booking_details['locations']) : [],
                'status' => 'COMPLETED'
            );
    
            $success = $this->Booking_model->updateBooking($data);
            if ($success) {
                $this->session->set_flashdata('message', 'Booking Completed.');
            } else {
                $this->session->set_flashdata('error', 'Failed to complete booking.');
            }
        } else {
            $this->session->set_flashdata('error', 'Booking not found.');
        }
        redirect(base_url("orders"));
    }

    public function orders_finalize(){
        $info = array(
            'title' => 'Finalize Booking',
            'mode' => 'finalize',
        );
        
        $this->load->view('page/include/header', $info);
        $this->load->view('page/orders/orders_finalize', $info);
    }

    // Orders - Updating masseur status and booking status
    public function orders_view() // Orders - delete order
    {
        // Get the order details based on the ID
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

        // Pass $info array to all views
        $this->load->view('page/include/header', $info);
        $this->load->view('page/orders/orders_view', $info); // Pass $info to the view
        $this->load->view('page/include/footer');
    }

    public function manual_pay() {
        $id = $this->uri->segment(3);
        $booking = $this->Order_model->getOrder($id);
    
        if (!empty($booking)) {
            // Check if form was submitted with a new payment amount
            $paid_amount = $this->input->post('updatePayment');
    
            if ($paid_amount !== null) {
                // Prepare data for updating the paid amount
                $data = array(
                    'id' => $id,
                    'paid_amount' => $paid_amount,
                );
    
                // Update the payment in the database
                $success = $this->Booking_model->updatePaidAmount($data);
                
                if ($success) {
                    $this->session->set_flashdata('message', 'Payment updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update payment.');
                }
            } else {
                $this->session->set_flashdata('error', 'No payment amount provided.');
            }
        } else {
            $this->session->set_flashdata('error', 'Booking not found.');
        }
    
        // Redirect back to the booking details page after the update
        redirect('orders/orders_view/' . $id);
    }
    
}

