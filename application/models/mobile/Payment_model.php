<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model{

  private function fetch_booking_details($booking_id)
  {
      $query = $this->db->get_where('orders_tbl', array('orders_tbl_id' => $booking_id));
      return $query->row();
  }

  private function update_payment($booking_id, $paid_amount)
  {
      $this->db->set('orders_tbl_paid_amount', $paid_amount)
               ->where('orders_tbl_id', $booking_id)
               ->update('orders_tbl');
  }

  private function cancel_booking($booking_id)
  {
      try {
          $new_status = 'CANCELLED';
          $this->db->set('orders_tbl_status', $new_status)
                   ->where('orders_tbl_id', $booking_id)
                   ->update('orders_tbl');

          $this->session->set_flashdata('message', 'Selected Booking has been cancelled successfully.');
          redirect('bookings');
      } catch (Exception $e) {
          $this->session->set_flashdata('message', 'Error updating order status: ' . $e->getMessage());
      }
  }
}
