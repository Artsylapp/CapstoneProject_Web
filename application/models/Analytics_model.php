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
              AND orders_tbl_status IN ('completed')
            GROUP BY MONTH(orders_tbl_createDate)
        ")->result();
    
        // Query to count orders by month for the previous year
        $previousYearOrders = $this->db->query("
            SELECT MONTH(orders_tbl_createDate) as month, COUNT(*) as count
            FROM orders_tbl
            WHERE YEAR(orders_tbl_createDate) = $previousYear
              AND orders_tbl_status IN ('completed')
            GROUP BY MONTH(orders_tbl_createDate)
        ")->result();
    
        // Return both years' data
        return array(
            'currentYear' => $currentYearOrders,
            'previousYear' => $previousYearOrders
        );
    }
    
    public function getRevenueData() {
        // Fetch all orders from the database
        $query = $this->db->get('orders_tbl');
        $orders = $query->result();
    
        // Initialize an array to store revenue grouped by year and month
        $revenueData = [];
    
        // Process each order to decode JSON and calculate the revenue
        foreach ($orders as $order) {
            // Decode JSON details
            $order_details = json_decode($order->orders_tbl_details, true);
    
            // Validate JSON data
            if (is_null($order_details)) {
                // Handle invalid JSON data (e.g., log an error)
                continue;
            }
    
            // Extract total cost from JSON if available
            $totalCost = isset($order_details['orders_tbl_cost']) && is_numeric($order_details['orders_tbl_cost']) ? $order_details['orders_tbl_cost'] : 0;
    
            // Determine the year and month of the order
            $orderYear = date('Y', strtotime($order->orders_tbl_createDate));
            $orderMonth = date('m', strtotime($order->orders_tbl_createDate));
    
            // Add totalCost to the respective year's monthly revenue
            if ($order->orders_tbl_status == 'COMPLETED') {
                // If the year does not exist in the array, initialize it
                if (!isset($revenueData[$orderYear])) {
                    $revenueData[$orderYear] = [];
                }
    
                // If the month does not exist for the given year, initialize it
                if (!isset($revenueData[$orderYear][$orderMonth])) {
                    $revenueData[$orderYear][$orderMonth] = 0;
                }
    
                // Add the total cost to the respective year and month
                $revenueData[$orderYear][$orderMonth] += $totalCost;
            }
        }
    
        // Prepare a final array to structure the output
        $groupedRevenueData = [];
    
        foreach ($revenueData as $year => $months) {
            foreach ($months as $month => $totalRevenue) {
                $groupedRevenueData[] = [
                    'year' => $year,
                    'month' => $month,
                    'total_sales' => $totalRevenue
                ];
            }
        }
    
        // Sort by year and month
        usort($groupedRevenueData, function ($a, $b) {
            return $a['year'] <=> $b['year'] ?: $a['month'] <=> $b['month'];
        });
    
        // Return the grouped and sorted data
        return $groupedRevenueData;
    }
    
    public function getAnalyticsData() {
        $query = $this->db->get('orders_tbl');
        $orders = $query->result();
    
        // Initialize variables
        $totalProfit = 0;
        $totalOrder = 0;
        $mostService = '';
        $totalRevenue = 0;
        $AOV = 0;
        
        // Arrays to store monthly revenue
        $monthlyRevenue = array_fill(1, 12, 0); // Indexes 1 to 12 for months January to December
        $orderCounts = array();
        
        // Get the current year
        $currentYear = date('Y');
    
        // Count the number of orders per service
        $serviceCounts = array();
    
        foreach ($orders as $order) {
            $order_details = json_decode($order->orders_tbl_details, true);
    
            if ($order_details !== null) {
                $totalCost = isset($order_details['orders_tbl_cost']) ? (float)$order_details['orders_tbl_cost'] : 0;
                $orderDate = strtotime($order->orders_tbl_createDate);
                $orderYear = date('Y', $orderDate);
                $orderMonth = date('m', $orderDate); // Month as '01' to '12'
    
                // Filter by current year
                if ($orderYear == $currentYear) {
                    $monthlyRevenue[(int)$orderMonth] += $totalCost;
                    $totalRevenue += $totalCost;
                    $totalOrder++;
    
                    // Track counts services
                    $service = isset($order_details['orders_tbl_service']) ? $order_details['orders_tbl_service'] : 'Unknown';
                    if (!isset($serviceCounts[$service])) {
                        $serviceCounts[$service] = 0;
                    }
                    $serviceCounts[$service]++;
                }
            }
        }
    
        // Calculate the most ordered service
        if (!empty($serviceCounts)) {
            arsort($serviceCounts); // Sort services by count, highest first
            $mostService = key($serviceCounts);
        }
    
        // Calculate total profit
        $totalProfit = $totalRevenue;
    
        // Calculate average order value
        $AOV = $totalOrder > 0 ? $totalRevenue / $totalOrder : 0;
    
        // Output the results
        return [
            'totalProfit' => number_format($totalProfit, 2),
            'totalOrder' => $totalOrder,
            'mostService' => $mostService,
            'totalRevenue' => number_format($totalRevenue, 2),
            'AOV' => number_format($AOV, 2),
            'monthlyRevenue' => $monthlyRevenue // Optional: return monthly revenue data
        ];
    }
    
}
    
