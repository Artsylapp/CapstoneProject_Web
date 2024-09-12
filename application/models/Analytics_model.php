<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_model extends CI_Model{

    public function getYearsOrders(){
        $currentYear = date('Y');
        $previousYear = date('Y', strtotime('-1 year'));

        // sql code
        // SELECT 
        //     MONTH(orders_tbl_createDate) AS month, 
        //     COUNT(*) AS count
        // FROM 
        //     orders_tbl
        // WHERE 
        //     YEAR(orders_tbl_createDate) = 2024
        //     AND orders_tbl_status IN ('completed', 'cancelled')
        // GROUP BY 
        //     MONTH(orders_tbl_createDate);
    
        // Query to count orders by month for the current year
        $currentYearOrders = $this->db->query("
            SELECT MONTH(orders_tbl_createDate) as month, COUNT(*) as count
            FROM orders_tbl
            WHERE YEAR(orders_tbl_createDate) = $currentYear
              AND orders_tbl_status IN ('completed', 'cancelled')
            GROUP BY MONTH(orders_tbl_createDate)
        ")->result();
    
        // Query to count orders by month for the previous year
        $previousYearOrders = $this->db->query("
            SELECT MONTH(orders_tbl_createDate) as month, COUNT(*) as count
            FROM orders_tbl
            WHERE YEAR(orders_tbl_createDate) = $previousYear
              AND orders_tbl_status IN ('completed', 'cancelled')
            GROUP BY MONTH(orders_tbl_createDate)
        ")->result();
    
        // Return both years' data
        return array(
            'currentYear' => $currentYearOrders,
            'previousYear' => $previousYearOrders
        );
    }
    
    
}
    
