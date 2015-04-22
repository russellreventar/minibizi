<!--
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

Employees.php
	show all employees
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
    <title>Employees</title>
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
                        <li><a href="employees.php" class="currPage">Employees</a></li>
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
				<h1 class="whiteLabel">This section is not of focus for this project but just included for extensibility for further implementations :)<h1>
				<h3>Employee List</h3>
                <!-- Table to list the business employees and their id numberss -->
                <table class="tb">
                  <tr>
                    <th class="headtb">Employee Name</th>
                    <th class="headtb">BusinessID</th>
                  </tr>
                  <tr>
                    <td class="tb">John Smith</td>
                    <td class="tb">52</td>
                  </tr>
                  <tr>
                    <td class="tb">Barbara Green</td>
                    <td class="tb">57</td>
                  </tr>
                  <tr>
                    <td class="tb">Stephanie Anderson</td>
                    <td class="tb">58</td>
                  </tr>
                  <tr>
                    <td class="tb">Diane Sanders</td>
                    <td class="tb">71</td>
                  </tr>
                  <tr>
                    <td class="tb">Eric Martinez</td>
                    <td class="tb">70</td>
                  </tr>
                  <tr>
                    <td class="tb">Catherine Walker</td>
                    <td class="tb">69</td>
                  </tr>
                  <tr>
                    <td class="tb">Bobby ackson</td>
                    <td class="tb">68</td>
                  </tr>
                  <tr>
                    <td class="tb">Richard Jenkins</td>
                    <td class="tb">67</td>
                  </tr>
                  <tr>
                    <td class="tb">Daniel Phillips</td>
                    <td class="tb">66</td>
                  </tr>
                  <tr>
                    <td class="tb">Joe Bennett</td>
                    <td class="tb">65</td>
                  </tr>
                  <tr>
                    <td class="tb">Joshua Miller</td>
                    <td class="tb">64</td>
                  </tr>
                  <tr>
                    <td class="tb">Ashley Evans</td>
                    <td class="tb">42</td>
                  </tr>
                  <tr>
                    <td class="tb">Amanda Griffin</td>
                    <td class="tb">33</td>
                  </tr>
                  <tr>
                    <td class="tb">Jacqueline Washington</td>
                    <td class="tb">26</td>
                  </tr>
                  <tr>
                    <td class="tb">George Wright</td>
                    <td class="tb">55</td>
                  </tr>
                  <tr>
                    <td class="tb">Scott Thompson</td>
                    <td class="tb">51</td>
                  </tr>
                  <tr>
                    <td class="tb">Joyce Scott</td>
                    <td class="tb">49</td>
                  </tr>
                  <tr>
                    <td class="tb">Timothy Coleman</td>
                    <td class="tb">48</td>
                  </tr>
                  <tr>
                    <td class="tb">Phyllis Parker</td>
                    <td class="tb">45</td>
                  </tr>
                  <tr>
                    <td class="tb">Alan Thomas</td>
                    <td class="tb">43</td>
                  </tr>
                  <tr>
                    <td class="tb">Louise Lee</td>
                    <td class="tb">39</td>
                  </tr>
                  <tr>
                    <td class="tb">Brenda Moore</td>
                    <td class="tb">2</td>
                  </tr>
                  <tr>
                    <td class="tb">Douglas Jones</td>
                    <td class="tb">1</td>
                  </tr>
                  <tr>
                    <td class="tb">Paula Henderson</td>
                    <td class="tb">17</td>
                  </tr>
                  <tr>
                    <td class="tb">Christina Edwards</td>
                    <td class="tb">63</td>
                  </tr>
                  <tr>
                    <td class="tb">Jesse Ward</td>
                    <td class="tb">62</td>
                  </tr>
                  <tr>
                    <td class="tb">Carl Gray</td>
                    <td class="tb">60</td>
                  </tr>
                  <tr>
                    <td class="tb">Beverly Harris</td>
                    <td class="tb">22</td>
                  </tr>
                  <tr>
                    <td class="tb">Virginia Morgan</td>
                    <td class="tb">15</td>
                  </tr>
                  <tr>
                    <td class="tb">Andrew Perez</td>
                    <td class="tb">29</td>
                  </tr>
                  <tr>
                    <td class="tb">Rose Powell</td>
                    <td class="tb">4</td>
                  </tr>
                  <tr>
                    <td class="tb">Marie Gonzales</td>
                    <td class="tb">11</td>
                  </tr>
                  <tr>
                    <td class="tb">Arthur Rogers</td>
                    <td class="tb">10</td>
                  </tr>
                  <tr>
                    <td class="tb">Steven Lewis</td>
                    <td class="tb">54</td>
                  </tr>
                  <tr>
                    <td class="tb">Harry Mitchell</td>
                    <td class="tb">72</td>
                  </tr>
                  <tr>
                    <td class="tb">Jack Reed</td>
                    <td class="tb">12</td>
                  </tr>
                  <tr>
                    <td class="tb">Gary Martin</td>
                    <td class="tb">74</td>
                  </tr>
                  <tr>
                    <td class="tb">Aaron Murphy</td>
                    <td class="tb">24</td>
                  </tr>
                  <tr>
                    <td class="tb">Ruth Rivera</td>
                    <td class="tb">37</td>
                  </tr>
                  <tr>
                    <td class="tb">Larry Richardson</td>
                    <td class="tb">23</td>
                  </tr>
                  <tr>
                    <td class="tb">Heather Torres</td>
                    <td class="tb">59</td>
                  </tr>
                  <tr>
                    <td class="tb">Ronald Lopez</td>
                    <td class="tb">34</td>
                  </tr>
                  <tr>
                    <td class="tb">Jean Johnson</td>
                    <td class="tb">21</td>
                  </tr>
                  <tr>
                    <td class="tb">Teresa Alexander</td>
                    <td class="tb">27</td>
                  </tr>
                  <tr>
                    <td class="tb">Edward Roberts</td>
                    <td class="tb">20</td>
                  </tr>
                  <tr>
                    <td class="tb">Victor Carter</td>
                    <td class="tb">19</td>
                  </tr>
                  <tr>
                    <td class="tb">Denise Garcia</td>
                    <td class="tb">30</td>
                  </tr>
                  <tr>
                    <td class="tb">Thomas Kelly</td>
                    <td class="tb">14</td>
                  </tr>
                  <tr>
                    <td class="tb">Betty Turner</td>
                    <td class="tb">41</td>
                  </tr>
                  <tr>
                    <td class="tb">Martha Sanchez</td>
                    <td class="tb">18</td>
                  </tr>
                  <tr>
                    <td class="tb">Laura Peterson</td>
                    <td class="tb">31</td>
                  </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
