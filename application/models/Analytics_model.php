<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_model extends CI_Model{

    public function getAnalytics(){
        // Initialize variables
        // data analytics
        $totalOrder = 0;
        $totalRevenue = 0;
        $mostActiveEmployee = '';
        $mostActiveEmployeeCount = 0;
        $leastActiveEmployee = '';
        $leastActiveEmployeeCount = 0;
        $mostprofitableService = '';
        
        // chart analytics
        $mostService = ''; // display top 3
        //$leastService = ''; // dsplay bottom 3
        $mostProfitableMonth = ''; // display most income month
        $mostMonthProfit = 0; // display most service income
        $currentYearRevenue = 0;
        $prevYearRevenue = 0;
}
    
    public function getYears() {
        
    }

    
}
    
