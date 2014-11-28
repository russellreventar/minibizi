<?php
    session_start();
    if (empty($_SESSION['id'])) {header("location:index.php");} 
?>
<!DOCTYPE html>

<html>
<head>
    <?php include 'includes/head.php';?>
    <script src="js/home.js" type="text/javascript"></script>
</head>

<body>
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
           
            	<div class = "sidebarInner">
            	<ul>
            		<li>
            			<div id="sectiontitle">
            				INFORMATION
            			</div>	
            		</li>
            		<li>
            			Founded
            			<div id="infoValue">
            				September 13, 2014
            			</div>	
            		</li>
            		<li>
	            		Phone
	            		<div id="infoValue">
            				(419) 999-9999
            			</div>
            		</li>
            		<li>
	            		Address
	            		<div id="infoValue2">
							52 Solding Ave </br>
							L4N 8L2 </br>
							Sm City </br>
            			</div>
            		</li>
            		
            	</ul>
            	</div>
         
            </div>

            <div id="businessStock" class="sidebarSection">
            
            	<div class = "sidebarInner">
            	<ul>
            		<li>
            			<div id="sectiontitle">
            				STOCK
            			</div>	
            		</li>
            		<li>
            			Name
            			<div id="infoValue">
            				AAPL
            			</div>	
            		</li>
            		<li>
            			Price
            			<div id="infoValue">
            				$100.09
            			</div>	
            		</li>
            		<li>
            			Change
            			<div id="infoValue">
            				September 13, 2014
            			</div>	
            		</li>
            		<li>
						<img id="stockChart" src="https://www.google.com/finance/getchart?q=AAPL">
            		</li>
            	</ul>
            	</div>

            </div>

            <div id="recentActivity" class="sidebarSection">
                <div class = "sidebarInner">
            	<ul>
            		<li>
            			<div id="sectiontitle">
            				STATUS
            			</div>	
            		</li>
            		<li>
            			Entry for the Day
            			<div id="infoValue">
            				September 13, 2014
            			</div>	
            		</li>
            		<li>
	            		Open
	            		<div id="infoValue">
            				(419) 999-9999
            			</div>
            		</li>
            		<li>
	            		Address
	            		<div id="infoValue2">
	
            			</div>
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
                        <li><a href="default.asp">Home</a></li>

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
                    			<li><a href="logout.php">Profile</a></li>
								<li><a href="logout.php">Account Settings</a></li>
                    		</ul>
                    	</div>
                    	<div class="section">
							<a href="logout.php">Change Profile Picture</a>
						</div>
						<div class="section-lastchild">
                    		<a href="logout.php">Sign Out</a>
                    	</div>
                    	
                    </div>
                </div>
            </div>

            <div id="content">
                <div id="graphCon"></div>

                <div id="tableCon">
                    <table id="dailySales">
                        <thead>
                            <tr>
                                <th>SURPLUS</th>

                                <th>DATE</th>

                                <th>Paid</th>

                                <th>Paid</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>+</td>

                                <td>October 23, 2014</td>

                                <td>$23,304</td>

                                <td></td>
                            </tr>

                            <tr>
                                <td></td>

                                <td></td>

                                <td></td>

                                <td></td>
                            </tr>

                            <tr>
                                <td></td>

                                <td></td>

                                <td></td>

                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
