<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytics extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Analytics_model');
		$this->load->library('session');
	}

	public function index()
	{

		$info = array(
			'title' => 'Analytics',
		);

		$this->load->view('page/include/header', $info);
		$this->load->view('page/analytics');
		$this->load->view('page/include/footer');
	}

	public function getAnalytics()
	{
		// Fetch data from model
		$data = $this->Analytics_model->getAnalytics();

		// Initialize variables
		$totalOrder = 0; // display total completed booking
		$totalRevenue = 0; // display total income for completed booking

		// Employee tracking
		$employeeCount = [];
		$mostActiveEmployee = '';
		$mostActiveEmployeeCount = 0;
		$leastActiveEmployee = '';
		$leastActiveEmployeeCount = 0;

		// Service tracking
		$serviceCount = [];
		$serviceTotalRevenue = [];
		$mostProfitableService = '';
		$mostProfitableServiceIncome = 0;
		$leastProfitableService = '';
		$leastProfitableServiceIncome = 0;
		$mostOrderedService = [];
		$topmostService = '';
		$topmostServiceCount = 0;
		$leastOrderedService = [];
		$topleastService = '';
		$topleastServiceCount = 0;

		// Year tracking
		$monthlyRevenue = array_fill(1, 12, 0);
		$nonZeroMonthlyRevenue = []; // Add this line
		$mostProfitableMonth = '';
		$mostProfitableMonthIncome = 0;
		$leastProfitableMonth = '';
		$leastProfitableMonthIncome = 0;
		$currentYearRevenue = array_fill(1, 12, 0);
		$prevYearRevenue = array_fill(1, 12, 0);
		$currentYearOrder = array_fill(1, 12, 0);
		$prevYearOrder = array_fill(1, 12, 0);

		// Process each order
		foreach ($data as $order) {
			if ($order['orders_tbl_status'] === 'COMPLETED') {
				// Total Order and Revenue
				$totalOrder++;
				$totalRevenue += $order['orders_tbl_paid_amount'];

				// Employee Analysis
				$masseur = json_decode($order['orders_tbl_masseur'], true);
				$masseurName = $masseur['masseur_detail']['name'];
				$employeeCount[$masseurName] = ($employeeCount[$masseurName] ?? 0) + 1;

				// Service Analysis
				$serviceData = json_decode($order['orders_tbl_service'], true);
				foreach ($serviceData['services'] as $service) {
					$serviceName = $service['name'];
					$servicePrice = $service['price'];

					// Service Count
					$serviceCount[$serviceName] = ($serviceCount[$serviceName] ?? 0) + 1;

					// Service Revenue
					$serviceTotalRevenue[$serviceName] =
						($serviceTotalRevenue[$serviceName] ?? 0) + $servicePrice;
				}

				// Monthly Revenue Analysis
				$orderDate = new DateTime($order['orders_tbl_date']);
				$month = (int)$orderDate->format('m');
				$year = (int)$orderDate->format('Y');
				$monthlyRevenue[$month] += $order['orders_tbl_paid_amount'];

				// Non-zero monthly revenue tracking
				if ($order['orders_tbl_paid_amount'] > 0) {
					$nonZeroMonthlyRevenue[$month] =
						($nonZeroMonthlyRevenue[$month] ?? 0) + $order['orders_tbl_paid_amount'];
				}

				// Current and Previous Year Revenue
				$currentYear = date('Y');
				if ($year == $currentYear) {
					$currentYearRevenue[$month] += $order['orders_tbl_paid_amount'];
				} elseif ($year == $currentYear - 1) {
					$prevYearRevenue[$month] += $order['orders_tbl_paid_amount'];
				}

				// Process order counts for current and previous year
				if ($year == $currentYear) {
					$currentYearOrder[$month]++;
				} elseif ($year == $currentYear - 1) {
					$prevYearOrder[$month]++;
				}
			}
		}

		// Most and Least Active Employee
		if (!empty($employeeCount)) {
			$mostActiveEmployee = array_search(max($employeeCount), $employeeCount);
			$mostActiveEmployeeCount = max($employeeCount);
			$leastActiveEmployee = array_search(min($employeeCount), $employeeCount);
			$leastActiveEmployeeCount = min($employeeCount);
		}

		// Most and Least Ordered Services
		arsort($serviceCount);
		$mostOrderedService = array_slice($serviceCount, 0, 3, true);
		$topmostService = key($mostOrderedService);
		$topmostServiceCount = reset($mostOrderedService);

		asort($serviceCount);
		$leastOrderedService = array_slice($serviceCount, 0, 3, true);
		$topleastService = key($leastOrderedService);
		$topleastServiceCount = reset($leastOrderedService);

		// Most and Least Profitable Services
		arsort($serviceTotalRevenue);
		$mostProfitableService = key($serviceTotalRevenue);
		$mostProfitableServiceIncome = reset($serviceTotalRevenue);

		asort($serviceTotalRevenue);
		$leastProfitableService = key($serviceTotalRevenue);
		$leastProfitableServiceIncome = reset($serviceTotalRevenue);

		// Get top 3 profitable months
		arsort($nonZeroMonthlyRevenue);
		$top3Months = array_slice($nonZeroMonthlyRevenue, 0, 3, true);
		$top3MonthsData = [];
		foreach ($top3Months as $month => $revenue) {
			$top3MonthsData[] = [
				'month' => date('F', mktime(0, 0, 0, $month, 1)),
				'revenue' => $revenue
			];
		}

		// Get bottom 3 profitable months
		asort($nonZeroMonthlyRevenue);
		$bottom3Months = array_slice($nonZeroMonthlyRevenue, 0, 3, true);
		$bottom3MonthsData = [];
		foreach ($bottom3Months as $month => $revenue) {
			$bottom3MonthsData[] = [
				'month' => date('F', mktime(0, 0, 0, $month, 1)),
				'revenue' => $revenue
			];
		}

		// Most and Least Profitable Months
		$mostProfitableMonthKey = array_search(max($monthlyRevenue), $monthlyRevenue);
		$mostProfitableMonth = date('F', mktime(0, 0, 0, $mostProfitableMonthKey, 1));
		$mostProfitableMonthIncome = max($monthlyRevenue);

		$leastProfitableMonthKey = array_search(min($monthlyRevenue), $monthlyRevenue);
		$leastProfitableMonth = date('F', mktime(0, 0, 0, $leastProfitableMonthKey, 1));
		$leastProfitableMonthIncome = min($monthlyRevenue);

		// Prepare Response
		$response = [
			'totalOrder' => $totalOrder,
			'totalRevenue' => $totalRevenue,

			// Employee Analytics
			'mostActiveEmployee' => $mostActiveEmployee,
			'mostActiveEmployeeCount' => $mostActiveEmployeeCount,
			'leastActiveEmployee' => $leastActiveEmployee,
			'leastActiveEmployeeCount' => $leastActiveEmployeeCount,

			// Service Analytics
			'mostProfitableService' => $mostProfitableService,
			'mostProfitableServiceIncome' => $mostProfitableServiceIncome,
			'leastProfitableService' => $leastProfitableService,
			'leastProfitableServiceIncome' => $leastProfitableServiceIncome,
			'topmostService' => $topmostService,
			'topmostServiceCount' => $topmostServiceCount,
			'topleastService' => $topleastService,
			'topleastServiceCount' => $topleastServiceCount,

			'mostOrderedService' => $mostOrderedService,
			'leastOrderedService' => $leastOrderedService,

			// Monthly Analytics
			'mostProfitableMonth' => $mostProfitableMonth,
			'mostProfitableMonthIncome' => $mostProfitableMonthIncome,
			'leastProfitableMonth' => $leastProfitableMonth,
			'leastProfitableMonthIncome' => $leastProfitableMonthIncome,

			'top3ProfitableMonths' => $top3MonthsData,
			'bottom3ProfitableMonths' => $bottom3MonthsData,

			'currentYearRevenue' => $currentYearRevenue,
			'prevYearRevenue' => $prevYearRevenue,

			'currentYearOrder' => $currentYearOrder,
			'prevYearOrder' => $prevYearOrder,
		];

		// Return the response as JSON
		echo json_encode($response);

		// 	echo "<pre>";
		// 	// print_r($data);
		// 	print_r($response);
		// 	echo "<pre>";
	}
}
