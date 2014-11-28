<?php
    session_start();
    if (empty($_SESSION['id'])) {header("location:index.php");} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
    <?php include 'includes/head.php';?>
    <script src="js/home.js" type="text/javascript">
</script>

    <title></title>
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

                        <li>Daily Entry Complete
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
                <div id="graphCon">
                    <div id="graphSettings">
                        <div class="addDaily">
                            <button id="newEntryButton"></button> New Daily Entry
                        </div>
						
                        <div class="addDaily2">
                            Show entries for &nbsp <select id="month" class="custom-dropdown">
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
                            </select>
                       
                
                         </div>
                         <button id="showEntryButton" class="entryButton">GO</button>
                    </div>
                    <div id="canvas">
                    </div>
                </div>

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
