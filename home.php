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
	<a href="logout.php">logout</a>
    <div id="wrapper">
        <div id="sidebar">
            <div id="business" class="sidebarSection center">
                <div class="ovalImage"></div>
                <div class="companyTitle">
                    <h1 id="businessName"></h1>

                    <h2 id="businessLocation"></h2>
                </div>
            </div>¡

            <div id="businessInfo" class="sidebarSection">
                business info here
            </div>

            <div id="businessStock" class="sidebarSection">
                business stock here
            </div>

            <div id="recentActivity" class="sidebarSection">
                recent activity
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
