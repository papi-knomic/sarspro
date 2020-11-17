<?php
    require 'header.php';
    require 'include/dbCon.php';
?>




<link rel="stylesheet" href="css/index.css">

<div class="header">
    <a href="index.php"><h1><span style="color:crimson;">#</span>EndSARS</h1></a>
</div>

<div class="body">
    <div class="body-div">
        <span>
            <h2>INFORM ABOUT A PROTEST</h2>
            <button class="btn" onclick="report()" id="repbtn">
                <i class="fa fa-arrow-down"></i>
            </button>
        </span>
        <div id="report" class="dropdown">
            
            <form action="include/index.php" method="post">
                Please try to be very specific with information
                <br/>
                <input type="text" placeholder="Twitter Username..." name="username">
                <br/>
                
                <input type="text" placeholder="LGA" name="area">
                <br/>
                
                <input type="text" placeholder="State..." name="state">
                <br/>
                
                <textarea placeholder="Address/Description/Direction..." name="direction"></textarea>
                <br/>
                
                <button type="submit" name="save">Submit</button>

            </form>
        </div>
        </div>
    
    <div class="body-div">
        <span>
            <h2>FIND A PROTEST</h2>
            <button class="btn" onclick="find()" ><i class="fa fa-arrow-down"></i></button>
        </span>
        <div id="find" class="dropdown">
            
            <form action="index.php" method="POST">
                Type in your state/area
                 <input type="text" placeholder="Search.." name="searchQuery">
                <br/>
                
                <button type="submit" name="submit">Search <i class="fa fa-search"></i></button>

            </form>
        </div>
</div>
    
    <div id='search-result'>
    <div class='container'>
        <div class='result-area'>
            <div id='bookArea'>
        <?php
            if(isset($_POST['submit'])){
                require 'include/dbCon.php';
                $search = mysqli_real_escape_string($con, $_POST['searchQuery']);
                if(empty($search)){
                    echo "<h4 class='SearchTag'>Search field received no query</h4>";
                    exit();
                }
                $sql = "SELECT * FROM report where area LIKE '%$search%' OR state LIKE '%$search%' OR username LIKE '%$search%'";
                $result = mysqli_query($con, $sql);
                $queryResult = mysqli_num_rows($result);
                echo "<h4 class='SearchTag'>There are ".$queryResult." result(s) matching your search '".$search."'</h4>";

                if($queryResult > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "
                            <div class='report'>
                                <p> Username: ".$row['username']."</p>
                                <p>LGA: ".$row['area']."</p>
                                <p> State: ".$row['state']."</p>
                                <p>Direction: ".$row['direction']."</p>
                                <br/>
                            </div>
                        ";
                    }
                }else {
                    echo "
                    <br/>
                   <button class='btn' onclick='report()'>
                Report Protest
            </button>";
                }
            }
        ?>
            </div>
        </div>
    </div>
</div>

<div id="footer">
        <a href="forum/forum.php">Forum</a>
    </div>
<?php
    require 'footer.php';
?>