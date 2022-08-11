<?php 
/*
 * Dashboard Template
*/

$this->load->view('common/header', $data);

$user_details = tm_get_current_user();

?>
<div class="dashboard-page">
    <?php 
    
    $this->load->view('common/dashboard-sidebar');

    ?>
    <div class="app-content main-content">
        <div class="side-app">
        <?php $this->load->view('common/dashboard-navigation'); ?>
        <!--<div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <h4 class="page-title"><span class="font-weight-normal text-muted ms-2">Dashboard</span></h4>
            </div>
        </div>-->
        <div class="row">
            <!--<div class="col-lg-12">
                <!--<div class="alert alert-danger">
                    You have not verified your account yet. Please verify your account to continue
                </div>
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="card-title">Welcome Back <?php echo $user_details->user_first_name; ?> 😊</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>This page is coming soon...</strong></p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    </div>
                </div>
            </div>-->

            <div class="col-lg-6">
                <!--<div class="alert alert-danger">
                    You have not verified your account yet. Please verify your account to continue
                </div>-->
                <div class="card dashboard-card">
                    <div class="card-header border-0">
                        <h4 class="card-title">Recent Tickets</h4>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!--<div class="alert alert-danger">
                    You have not verified your account yet. Please verify your account to continue
                </div>-->
                <div class="card dashboard-card">
                    <div class="card-header border-0">
                        <h4 class="card-title">Recent Tickets</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover datatableInt table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
						<th>Location</th>
						<th>Order Date</th>						
                        <th>Status</th>						
						<th>Net Amount</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
						<td>London</td>
                        <td>Jun 15, 2017</td>                        
						<td><span class="badge badge-success">Delivered</span></td>
						<td>$254</td>
						<td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
					<tr>
                        <td>2</td>
                        <td>Madrid</td>                       
						<td>Jun 21, 2017</td>
						<td><span class="badge badge-info">Shipped</span></td>
						<td>$1,260</td>
						<td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
					<tr>
                        <td>3</td>
						<td>Berlin</td>
                        <td>Jul 04, 2017</td>
                        <td><span class="badge badge-danger">Cancelled</span></td>
						<td>$350</td>
						<td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>                        
                    </tr>
					<tr>
                        <td>4</td>
						<td>New York</td>
                        <td>Jul 16, 2017</td>						
						<td><span class="badge badge-warning">Pending</span></td>
						<td>$1,572</td>
						<td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
					<tr>
                        <td>5</td>
						<td>Paris</td>
                        <td>Aug 04, 2017</td>
						<td><span class="badge badge-success">Delivered</span></td>
						<td>$580</td>
						<td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
                </tbody>
            </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <!--<div class="alert alert-danger">
                    You have not verified your account yet. Please verify your account to continue
                </div>-->
                <div class="card dashboard-card">
                    <div class="card-header border-0">
                        <h4 class="card-title">Recent Tickets</h4>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <!--
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">All Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">30</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-primary my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Active Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">20</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-warning my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Closed Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">09</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-success my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Oh-Hold Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">5</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-info my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">My Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">30</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-secondary my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Assigned Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">00</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-danger my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">My Assigned Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">4</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-primary my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Overdue Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">01</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-danger my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>

    <?php
    $this->load->view('common/footer'); ?>

<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
    window.onload = function() {

var chart = {
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	title: {
		text: "Ticket Status Chart"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 12,
		indexLabel: "{label} - {y}%",
		dataPoints: [
            { y: <?php echo count($data['all_tickets']) ?>, label: "Total Tickets" },
			{ y: <?php echo count($data['active_tickets']) ?>, label: "New Tickets" },
			{ y: <?php echo count($data['solved_tickets']) ?>, label: "Solved Tickets" },
			{ y: <?php echo count($data['onhold_tickets']) ?>, label: "Onhold Tickets" },
			{ y: <?php echo count($data['assigned_tickets']) ?>, label: "Assigned Tickets" },
		]
	}]
};

jQuery("#chartContainer").CanvasJSChart(chart);

var chart1 = {
        animationEnabled: true,
        title: {
            text: "Military Expenditure of Countries: 2016"
        },
        axisX: {
            interval: 1
        },
        axisY: {
            title: "Expenses in Billion Dollars",
            includeZero: true,
            scaleBreaks: {
                type: "wavy",
                customBreaks: [{
                    startValue: 80,
                    endValue: 210
                    },
                    {
                        startValue: 230,
                        endValue: 600
                    }
            ]}
        },
        data: [{
            type: "bar",
            toolTipContent: "<img src=\"https://canvasjs.com/wp-content/uploads/images/gallery/javascript-column-bar-charts/\"{url}\"\" style=\"width:40px; height:20px;\"> <b>{label}</b><br>Budget: ${y}bn<br>{gdp}% of GDP",
            dataPoints: [
                { label: "Israel", y: 17.8, gdp: 5.8, url: "israel.png" },
                { label: "United Arab Emirates", y: 22.8, gdp: 5.7, url: "uae.png" },
                { label: "Brazil", y: 22.8, gdp: 1.3, url: "brazil.png"},
                { label: "Australia", y: 24.3, gdp: 2.0, url: "australia.png" },
                { label: "South Korea", y: 36.8, gdp: 2.7, url: "skorea.png" },
                { label: "Germany", y: 41.1, gdp: 1.2, url: "germany.png" },
                { label: "Japan", y: 46.1, gdp: 1.0, url: "japan.png" },
                { label: "United Kingdom", y: 48.3, gdp: 1.9, url: "uk.png" },
                { label: "India", y: 55.9, gdp: 2.5, url: "india.png" },
                { label: "Russia", y: 69.2, gdp: 5.3, url: "russia.png" },
                { label: "China", y: 215.7, gdp: 1.9, url: "china.png" },
                { label: "United States", y: 611.2, gdp: 3.3, url: "us.png" }
            ]
        }]
    };
    jQuery("#chartContainer2").CanvasJSChart(chart1);

}


</script>
</div>