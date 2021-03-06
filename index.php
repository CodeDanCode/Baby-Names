<!--
Daniel Leach
Intro to Internet Computing
COP 3813

Project 6 PHP Baby Names Form Processing

-->
<?php
    require_once './php/db_connect.php';
    
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Baby Names</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!--Bootstrap scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!--My style sheet-->
    <link rel="stylesheet"type= "text/css" href="./css/style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <div class="jumbotron text-center">
            <div id="jumbotext">
                <h1>Popular Baby Names</h1>
            </div>
        </div>
    </header>
    <br>
    <div class="container" id="submitForm">   
        <form action="./php/insert.php" method="post">
        <div class="row">
             <div class = "col-md-8" >                
                <input type="text" name="babyname" id="suggest" class="form-control"required placeholder="Please Enter Name">
            </div>
            <div class="col-sm-4 mx-auto" id="buttons">
                <button type="submit"class="btn btn-lg Boybutton" name="boy"  value='boy'>Boys</button>
                <button type="submit"class="btn btn-lg Girlbutton" name="girl" value = 'girl'>Girls</button>  
            </div> 
        </div>
    </form>        
    </div>
    <br>
    <div class="container" id="maleTable"> 
        <h3>Boys</h3>
        <table class="table" id="mtable" >
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">pop.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $GetTable = 'SELECT * , count(*) as count FROM `boys` group by name having count(1) > 0 ORDER BY COUNT(1) DESC LIMIT 10 OFFSET 0';
                $showTable = $db->query($GetTable);
                if($showTable->num_rows > 0) {
                    while($row=$showTable->fetch_assoc()){
                        echo'<tr>    
                        <td scope="col">'.$row['name'].'</td>
                        <td scope="col">'.$row['count'].'</td>
                        </tr>';
                    }
                }
                ?> 
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="container" id="femaleTable"> 
        <h3>Girls</h3>
        <table class="table" id="ftable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">pop</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $GetTable = 'SELECT *, count(*) as count FROM `girls` group by name having count(name) > 0 ORDER BY COUNT(1) DESC LIMIT 10 OFFSET 0';
                $showTable = $db->query($GetTable);
                if($showTable->num_rows > 0) {
                    while($row=$showTable->fetch_assoc()){
                        echo'<tr>
                        <td scope="col">'.$row['name'].'</td>
                        <td scope="col">'.$row['count'].'</td>
                        </tr>';
                    }
                }
                ?> 
            </tbody>
        </table>
    </div>
    <div>
    <h2>Popular Baby Names: 2017</h2>
    </div>
    <div class="container col-8 mx-auto" id="girlsTable">
        <h3>Girls</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">pop.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selectStmt = 'SELECT * FROM `babynames` ORDER BY gender, pop DESC  LIMIT 10 OFFSET 0';
                    $result = $db->query($selectStmt);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo'<tr>
                            <td scope="col">'.$row['name'].'</td>
                            <td scope="col">'.$row['pop'].'</td>
                            </tr>';
                        }
                    } 
                ?>
            </tbody>
        </table>
    </div>
    <div class="container col-8 mx-auto" id="boysTable">
        <h3>Boys</h3>
        <table class="table">
            <thead>
                <tr> 
                    <th scope="col">name</th>
                    <th scope="col">pop</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selectStmt = 'SELECT * FROM `babynames` ORDER BY gender, pop DESC LIMIT 10 OFFSET 18309';
                    $result = $db->query($selectStmt);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo'<tr>
                            <td scope="col">'.$row['name'].'</td>
                            <td scope="col">'.$row['pop'].'</td>
                            </tr>';
                        }
                    }        
                ?>
            </tbody>
        </table>
    </div>
    
    <footer class="container-fluid">
        <h5 id="footer">Copyright &copy; 2019 Daniel Leach</h5>
    </footer>
     
</body>
<?php  
    $db->close();
?>
</html>



