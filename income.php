<!--
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

income.php
	Show income
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
                        <li><a href="income.php"  class="currPage">Income Statement</a></li>
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

     <h3>Income Table</h3>
            <!-- Table to list the income of business employees -->
        <table class="tb">
          <tr>
            <th class="headtb">Business ID</th>
            <th class="headtb">Net Sales</th>
            <th class="headtb">Transaction Count</th>
            <th class="headtb">Expenses</th>
          </tr>
          <tr>
            <td class="tb">1</td>
            <td class="tb">1233</td>
            <td class="tb">15</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">2</td>
            <td class="tb">5433</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">4</td>
            <td class="tb">1002</td>
            <td class="tb">2</td>
            <td class="tb">234</td>
          </tr>
          <tr>
            <td class="tb">10</td>
            <td class="tb">1800</td>
            <td class="tb">2</td>
            <td class="tb">500</td>
          </tr>
          <tr>
            <td class="tb">11</td>
            <td class="tb">2000</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">12</td>
            <td class="tb">9100</td>
            <td class="tb">22</td>
            <td class="tb">200</td>
          </tr>
          <tr>
            <td class="tb">14</td>
            <td class="tb">1201</td>
            <td class="tb">2</td>
            <td class="tb">900</td>
          </tr>
          <tr>
            <td class="tb">15</td>
            <td class="tb">1432</td>
            <td class="tb">2</td>
            <td class="tb">100</td>
          </tr>
          <tr>
            <td class="tb">17</td>
            <td class="tb">6453</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">18</td>
            <td class="tb">100</td>
            <td class="tb">2</td>
            <td class="tb">300</td>
          </tr>
          <tr>
            <td class="tb">19</td>
            <td class="tb">1699</td>
            <td class="tb">7</td>
            <td class="tb">100</td>
          </tr>
          <tr>
            <td class="tb">20</td>
            <td class="tb">2165</td>
            <td class="tb">42</td>
            <td class="tb">800</td>
          </tr>
          <tr>
            <td class="tb">21</td>
            <td class="tb">1300</td>
            <td class="tb">2</td>
            <td class="tb">400</td>
          </tr>
          <tr>
            <td class="tb">22</td>
            <td class="tb">2042</td>
            <td class="tb">2</td>
            <td class="tb">540</td>
          </tr>
          <tr>
            <td class="tb">23</td>
            <td class="tb">999</td>
            <td class="tb">2</td>
            <td class="tb">800</td>
          </tr>
          <tr>
            <td class="tb">24</td>
            <td class="tb">34</td>
            <td class="tb">344</td>
            <td class="tb">34</td>
          </tr>
          <tr>
            <td class="tb">26</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">27</td>
            <td class="tb">0</td>
            <td class="tb">0</td>
            <td class="tb">650</td>
          </tr>
          <tr>
            <td class="tb">29</td>
            <td class="tb">1303</td>
            <td class="tb">2</td>
            <td class="tb">432</td>
          </tr>
          <tr>
            <td class="tb">30</td>
            <td class="tb">1207</td>
            <td class="tb">2</td>
            <td class="tb">300</td>
          </tr>
          <tr>
            <td class="tb">31</td>
            <td class="tb">1093</td>
            <td class="tb">11</td>
            <td class="tb">500</td>
          </tr>
          <tr>
            <td class="tb">33</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">34</td>
            <td class="tb">1432</td>
            <td class="tb">2</td>
            <td class="tb">654</td>
          </tr>
          <tr>
            <td class="tb">37</td>
            <td class="tb">1093</td>
            <td class="tb">23</td>
            <td class="tb">500</td>
          </tr>
          <tr>
            <td class="tb">39</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">41</td>
            <td class="tb">1300</td>
            <td class="tb">2</td>
            <td class="tb">600</td>
          </tr>
          <tr>
            <td class="tb">42</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">43</td>
            <td class="tb">234.3</td>
            <td class="tb">1</td>
            <td class="tb">10</td>
          </tr>
          <tr>
            <td class="tb">45</td>
            <td class="tb">12.43</td>
            <td class="tb">120</td>
            <td class="tb">15</td>
          </tr>
          <tr>
            <td class="tb">48</td>
            <td class="tb">12</td>
            <td class="tb">12</td>
            <td class="tb">12</td>
          </tr>
          <tr>
            <td class="tb">49</td>
            <td class="tb">534.23</td>
            <td class="tb">20</td>
            <td class="tb">10.23</td>
          </tr>
          <tr>
            <td class="tb">51</td>
            <td class="tb">124.43</td>
            <td class="tb">120</td>
            <td class="tb">15</td>
          </tr>
          <tr>
            <td class="tb">52</td>
            <td class="tb">123</td>
            <td class="tb">1</td>
            <td class="tb">123</td>
          </tr>
          <tr>
            <td class="tb">54</td>
            <td class="tb"790></td>
            <td class="tb">2</td>
            <td class="tb">240</td>
          </tr>
          <tr>
            <td class="tb">55</td>
            <td class="tb">948.3</td>
            <td class="tb">120</td>
            <td class="tb">15</td>
          </tr>
          <tr>
            <td class="tb">57</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb"340></td>
          </tr>
          <tr>
            <td class="tb">58</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">59</td>
            <td class="tb">1005</td>
            <td class="tb">2</td>
            <td class="tb">234</td>
          </tr>
          <tr>
            <td class="tb">60</td>
            <td class="tb">987</td>
            <td class="tb">2</td>
            <td class="tb">654</td>
          </tr>
          <tr>
            <td class="tb">62</td>
            <td class="tb"944></td>
            <td class="tb">2</td>
            <td class="tb">345</td>
          </tr>
          <tr>
            <td class="tb">63</td>
            <td class="tb">1100</td>
            <td class="tb">2</td>
            <td class="tb">688</td>
          </tr>
          <tr>
            <td class="tb">64</td>
            <td class="tb">900</td>
            <td class="tb">2</td>
            <td class="tb">500</td>
          </tr>
          <tr>
            <td class="tb">65</td>
            <td class="tb">1300</td>
            <td class="tb">2</td>
            <td class="tb">700</td>
          </tr>
          <tr>
            <td class="tb">66</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb"340></td>
          </tr>
          <tr>
            <td class="tb">67</td>
            <td class="tb">1233</td>
            <td class="tb">3</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">68</td>
            <td class="tb">1233</td>
            <td class="tb">200</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">69</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">70</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">71</td>
            <td class="tb">1233</td>
            <td class="tb">2</td>
            <td class="tb">340</td>
          </tr>
          <tr>
            <td class="tb">72</td>
            <td class="tb">1293</td>
            <td class="tb">2</td>
            <td class="tb">200</td>
          </tr>
          <tr>
            <td class="tb">74</td>
            <td class="tb">1235</td>
            <td class="tb">2</td>
            <td class="tb">343</td>
          </tr>
        </table>
            </div>
        </div>
    </div>
</body>
</html>
