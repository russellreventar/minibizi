<!--
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

home.php
	The main home page of the user when logged in
	
	- PopupCard
		A hidden form that comes into display when user wants to add new daily
		entry. Automatically opens with the current date. Datepicker allows user
		to select any date and see if an entry has already been made for that date.
		If so, placeholders in text show current data values for that date, 
		if not, a new entry can be made. Multiple entries can be made without
		closing the popupCard and when closed. The ui refreshes to dynamically change content
	- Sidebar
		A panel to display all current information on the users business. 
			Top: show business logo and name and location
			Information: show business opened date, phone number and full address
			Stock: If stock name provided for business, google finance request for
				stock information
			Status: Status of entries for the day
	- Header
		Provide navigation throughout the website
			Home) main dashboard for seeing daily entries
			Employees) View employees
			Income) See income statement
			User Menu) Logout or go to profile
	- Main
		Business performance content for daily sales. Made up of two components
			1) Chart
				Button to add new daily entry(open popupCard)
				Dropdown selectors to choose which month and year to see entries for
				Data visualization chart to see sales,expenses and monthly target
			2) Table
				table of all entries for the selected month and year
				dynamically populated with all information on each entry
				profit, target margin, average sales etc

-->
<?php
    session_start();
    if (empty($_SESSION['id'])) {header("location:index.php");} 
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'core/include/head.php';?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="js/core.js" type="text/javascript"></script>
    <title>Home</title>
</head>

<body>
	<div id="DailyEntryPopup">
	<div class="popupCard">
		<button id="closePopup"></button>
		<h1> New Daily Entry </h1>
		<h2 id="popupCardMessage"></h2>
		<form id="newEntryForm">
			<div class="deLabel">Date </div>
			<input id="datepicker" class="deTextbox" autocomplete="off" type="text">
			<br/>
			<div class="deLabel">Net Sales </div>
			<input id="netSales" class = "deTextbox"autocomplete="off" type="text" />
			<br/>
			<div class="deLabel">Expenses </div>
			<input id="expenses" class = "deTextbox"autocomplete="off" type="text" />
			<br/>
			<div class="deLabel">Transaction Count</div>
			<input id = "tCount" class = "deTextbox"autocomplete="off" type="text" />
			<input id="deSubmit" class="deSubmit"type="submit" value="ADD"  />
		</form>
	</div>
	<div class="dim">
	</div>
	</div>
    <div id="wrapper">
        <div id="sidebar">
        
            <div id="business" class="sidebarSection center">
                <div class="ovalImage"></div>
                <div class="companyTitle">
                    <h1 id="businessName"></h1>
                    <h2 id="businessLocation"></h2>
                </div>
            </div>

            <div id="businessInfo" class="sidebarSection">
                <div class="sidebarInner static">
                    <ul>
                        <li>
                            <div id="sectiontitle">INFORMATION</div>
                        </li>
                        <li>
                        	Founded<div id="founded" class="infoValue blueBG"></div>
                        </li>
                        <li>
                        	Phone<div id="phone" class="infoValue blueBG"></div>
                        </li>

                        <li>
                        	Address<div id="address" class="infoValue2"></div>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="businessStock" class="sidebarSection">
                <div class="sidebarInner">
                    <ul>
                        <li>
                            <div id="sectiontitle">STOCK</div>
                        </li>
                        <li>Name
                        	<div id="stockName" class="infoValue blueBG"></div>
                        </li>
                        <li>Price
                        	<div id="stockPrice" class="infoValue blueBG"></div>
                        </li>
                        <li>Change 
                        	<div id="stockChange" class="infoValue"></div>
                        </li>

                        <li>Time
                        	<div id="stockTime" class="infoValue2"></div>
                        </li>
                        <li>
                        	<img id="stockChart">
                        </li>
                    </ul>
                </div>
            </div>

            <div id="recentActivity" class="sidebarSection">
                <div class="sidebarInner">
                    <ul>
                        <li>
                            <div id="sectiontitle">STATUS</div>
                        </li>

                        <li>Today's Entry Complete
                            <div id="statusEntry" class="statusIndicator"></div>
                            <div class="statusSwitch"></div>
                        </li>

                        <li>Open
                            <div id="statusOpen" class="statusIndicator"></div>
                            <div class="statusSwitch"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="main">
            <div id="header">
                <div id="headerLogo"></div>

                <div id="nav">
                    <ul>
                        <li><a href="home.php" class="currPage">Home</a></li>
                        <li><a href="employees.php">Employees</a></li>
                        <li><a href="income.php">Income Statement</a></li>
                    </ul>
                </div>

                <div id="user">
                    <div id="name"></div>
                    <div id="profilepic"></div>
                    <div id="userOptions">
                        <div class="section">
                            <ul>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="profile.php">Account Settings</a></li>
                            </ul>
                        </div>

                        <div class="section">
                            <a href="profile.php">Change Profile Picture</a>
                        </div>

                        <div class="section-lastchild">
                            <a href="core/handler/logout.php">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="content">
                <div id="graphCon">
                	<div class="addDaily">
                		<button id="newEntryButton"></button> 
                        &nbsp Daily Entry
					</div>
                    <div class="entrySelector">
                    	<div class="addDaily2">
                            Show entries for &nbsp 
                            <select id="month" class="custom-dropdown">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3"> March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select> 
                            <select id="year" class="custom-dropdownSmall">
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                            </select>
                       
                
                         </div>
                         <button id="loadEntry" class="loadEntryButton">GO</button>
                         
                    </div>
                    <div id="chart-div">
                    </div>
                </div>

                <div id="tableCon">
                	
                    <table id="entryTable">
                    	<thead>
                    	<tr>
                        	<th>Target</th>
							<th>Date</th>
							<th>Net Sales</th>
							<th>Total Sales</th>
							<th>Avg Sales</th>
							<th>Expenses</th>
							<th>TransactionCount</th>
                        	<th>Profit</th>    
                        </tr>
                    	</thead>
						<tbody>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
