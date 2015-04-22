<!--
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

profile.php
	Show user information and change password
		
	-user profile picture
	-username,fullname and email
	-form to change users password. Current password must be correct
		new password cannot be equivalent to old password.
-->

<?php
    session_start();
    if (empty($_SESSION['id'])) {header("location:index.php");} 
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'core/include/head.php';?>
    <script src="js/core.js" type="text/javascript"></script>
    <title>Income Statement</title>
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
                        <li><a href="home.php">Home</a></li>
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
				<div id = "userProfile">
					<div class="bigTitle">Your Account</div>
					<div class="avatar"></div>
					<div class="pInfo">
						<div id="pUsername">sdfsdsdfsd</div>
						<div id="pFullname"> sdsdf sdfsd</div>
						<div id="pEmail">sfsdsdfs</div>
					</div>
					
					<form id="changePass">
						<h1 class="whiteLabel2">Change Password</h1>
						<div id="changeMessage"></div>
						<div class="deLabel">Current Password </div>
						<input id="cpCurrent" class = "cTextbox"autocomplete="off" type="password" name="currPass"/>
						<br/>
						<div class="deLabel">New Password </div>
						<input id="cpNew" class = "cTextbox"autocomplete="off" type="password" name="newPass"/>
						<br/>
						<div class="deLabel">Confirm Password </div>
						<input id="expenses" class = "cTextbox"autocomplete="off" type="password" name="confirmPass"/>
						<input id="cpNewConfirm" class="cSubmit"type="submit" value="Change"  />
					</form>

					
				</div>
            </div>
        </div>
    </div>
</body>
</html>
