<?php
/**
* @developer-Lead: David Hernandez
* @senior-developer: J. Sanchez @mozpit
* @team: Software Engineering Team 4 @ Lehman
* @members: Eddy Vittini, Jhon Sanchez, Vanessa Ortiz, Melida Grullon, Madelin Arias Bueno, Rafael Velazquez, Moumouni Sawadogo, Jordan Falcon, David Hernandez
* @description: Leo's Lasagna Project by Team 4 Fall 2018
* @software-license: MIT
*/

define( 'RESTRICTED', true );

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
$sessions = '{$base_dir}services{$ds}sessions.php';
//$cookies = '{$base_dir}services{$ds}processCookie.php';

include_once('../services/sessions.php');
//require($cookies);

$header = file_get_contents('header.php');
$footer = file_get_contents('footer.php');

/* begin header */
echo $header;
/* end header */

/* set current page */
$GLOBALS['currentPage'] = ORDERS;

/* add menu if user is an admin only */
if($_SESSION['user_type'] && isset($_SESSION['id'])){
	include_once('menu.php');
}else{
	include_once('publicNav.php');
}

	if($_SESSION['user_type'] != "ADMIN"){
		$pageTitle = '<h1 class="display-4">Most Recent Deliveries</h1>';
		$sql_all_deliveries = "SELECT
															   de.deliverieId,
															   od.orderId,
															   ap.airportName AS Airport,
															   al.airlineName as Airline,
															   od.deliveryScheduleDate,
															   od.deliveryScheduleTime,
															   de.deliveryStatus,
															   de.delieveryDeparturedate,
															   de.delieveryDeparturetime,
															   de.deliveryArrivaldate,
															   de.deliveryArrivaltime,
															   dei.deliveriesIntervalsDesc
															FROM
															   orders as od,
															   deliveries as de,
															   deliveryintervals as dei,
															   deliveriesspecifics as dee,
															   airport as ap,
															   airline as al,
															   airport_has_airline as aha
															WHERE
															   od.orderId = de.orderId
															   AND od.orderId = dee.orderId
															   AND de.orderId = dee.orderId
															   AND od.airportId = ap.airportId
															   AND dei.deliveryIntervalsId = dee.deliveryIntervalsId
															   AND aha.airlineId = al.airlineId
															   AND aha.airportId = ap.airportId
																 AND ap.airportId = 1
															ORDER BY de.deliveryArrivaldate, de.deliveryStatus DESC";

															//draw table header
															echo '<div class="home-all style="width: 90%;">
																				<div class="jumbotron jumbotron-fluid text-center">
																							<div class="container">
																								<center>'.$pageTitle.'</center>
																							</div>
																					<table width="90%" class="table table-striped table-bordered table-hover" style="opacity: 0.97!important;"" id="dataTables-example">
																						<thead>
																							<tr>
																								<th>Order Id</th>
																								<th>Client</th>
																								<th>Destination</th>
																								<th>Scheduled Date</th>
																								<th>Scheduled Time</th>
																								<th>Departure Time</th>
																								<th>Arrival Time</th>
																								<th>Frequency</th>
																								<th>Status</th>
																								<th>Driver</th>
																							</tr>
																						</thead>
																				<tbody>';
																				//process query
																				$result_deliveries = mysqli_query($GLOBALS['link'], $sql_all_deliveries);

																					 while ( $record = $result_deliveries->fetch_array(MYSQLI_ASSOC) )
																					 {
																								 $id = $record['deliverieId'];
																								 $airport = $record['Airport'];
																								 $airline = $record['Airline'];
																								 $scheduledDate = $record['deliveryScheduleDate'];
																								 $deliveryScheduleTime = $record['deliveryScheduleTime'];
																								 $deliveryStatus = $record['deliveryStatus'];
																								 $delieveryDeparturedate = $record['delieveryDeparturedate'];
																								 $delieveryDeparturetime = $record['delieveryDeparturetime'];
																								 $deliveryArrivaldate = $record['deliveryArrivaldate'];
																								 $deliveryArrivaltime = $record['deliveryArrivaltime'];
																								 $deliveriesIntervalsDesc = $record['deliveriesIntervalsDesc'];
																								 $driver = "";

																								 //alternate row colors in table
																								 if($counter % 2 == 1){
																										 $rowSeq = 'odd';
																								 }else{
																										 $rowSeq = 'even';
																								 }

																								 echo '<tr class="'.$rowSeq.'odd gradeX">
																												<td>'.$id.'</td>
																												<td>'.$airport.'</td>
																												<td>'.$airline.'</td>
																												<td>'.$scheduledDate.'</td>
																												<td>'.$deliveryScheduleTime.'</td>
																												<td>'.$delieveryDeparturetime.'</td>
																												<td>'.$deliveryArrivaltime.'</td>
																												<td>'.$deliveriesIntervalsDesc.'</td>
																												<td>'.$deliveryStatus.'</td>
																												<td>'.$driver.'</td>
																											</tr>';
																					 }//end of while*/

																				echo '	</tbody>';
																				echo '</table>';
																				echo '</div>';
																				//end of table
	}else{
						$pageTitle = '<h1 class="display-4">Most Recent Orders</h1>';
						$sql_all_orders = "SELECT
				   od.orderid,
				   od.departuresterminal,
				   od.arrivalsterminal,
				   ap.airportid,
				   ap.airportname,
				   ap.airportcode,
				   al.airlineid,
				   al.airlinename,
				   al.phone,
				   te.terminalid,
				   te.terminalname,
				   aa.airlineid,
				   aa.airportid,
				   olg.orderid,
				   olg.lasagnaid,
				   lg.lasagnatype,
				   lg.lasstate,
				   aa.dailyflightcount
				FROM
				   orders AS od,
				   airport AS ap,
				   airline AS al,
				   terminals AS te,
				   airport_has_airline AS aa,
				   orderlasagna AS olg,
				   lasagna AS lg
				WHERE
				   ap.airportid = aa.airportid
				   AND al.airlineid = aa.airlineid
				   AND te.terminalid = od.departuresterminal
				   AND te.terminalid = od.arrivalsterminal
				   AND od.airportid = ap.airportid
				   AND od.airlineid = al.airlineid
				   AND od.orderid = olg.orderid
				   AND lg.lasagnaid = olg.lasagnaid
					 ORDER BY ap.airportid DESC";

					 //draw table header
					 echo '<div class="home-all style="width: 90%;">
										 <div class="jumbotron jumbotron-fluid text-center">
													 <div class="container">
														 <center>'.$pageTitle.'</center>
													 </div>
											 <table width="90%" class="table table-striped table-bordered table-hover" style="opacity: 0.97!important;"" id="dataTables-example">
												 <thead>
													 <tr>
														 <th>Order Id</th>
														 <th>Client</th>
														 <th>Airline</th>
														 <th>Terminal</th>
														 <th>Product</th>
														 <th>Product Type</th>
														 <th>Daily Flight Count</th>
													 </tr>
												 </thead>
										 <tbody>';

										 //process query
										 $result_orders = mysqli_query($GLOBALS['link'], $sql_all_orders);

												while ( $row = $result_orders->fetch_array(MYSQLI_ASSOC) )
												{
															$id = $row['orderid'];
															$airport = $row['airportname'];
															$airline = $row['airlinename'];
															$terminal = $row['terminalname'];
															$product = $row['asagnatype'];
															$type = $row['lasstate'];
															$dailycount = $row['dailyflightcount'];

															//alternate row colors in table
															if($counter % 2 == 1){
																	$rowSeq = 'odd';
															}else{
																	$rowSeq = 'even';
															}

															echo '<tr class="'.$rowSeq.'odd gradeX">
																		 <td>'.$id.'</td>
																		 <td>'.$airport.'</td>
																		 <td>'.$airline.'</td>
																		 <td>'.$terminal.'</td>
																		 <td>'.$product.'</td>
																		 <td>'.$type.'</td>
																		 <td>'.$dailycount.'</td>
																	 </tr>';
												}//end of while*/

										 echo '	</tbody>';
										 echo '</table>';
										 echo '</div>';
										 //end of table
	}

/* begin footer */
	echo $footer;
/* end footer */

?>
