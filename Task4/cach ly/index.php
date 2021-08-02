<!DOCTYPe html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sach cach ly</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css ">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr rd:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="application/javascript">
        $(document).ready(function (){
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <form action="search.php" method="get">
                        <input type="text" name="search" placeholder="Input text" value="
                        <?php if(isset($_GET["search"])){echo $_GET["search"];} ?>">
                        <input type="submit" value="search" />
                    </form>
                    <h2 style="text-align: center">DANH SACH CACH LY</h2>
                </div>
                <?php
                require_once 'config.php';
                $sql = "SELECT * FROM people";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) >0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo"<thead>";
                        echo "<tr>";
                        echo "<th style='text-align: center'>ID</th>";
                        echo "<th style='text-align: center'>Name</th>";
                        echo "<th style='text-align: center'>Tel</th>";
                        echo "<th style='text-align: center'>Address</th>";
                        echo "<th style='text-align: center'>F</th>";
                        echo "<th style='text-align: center'>Location</th>";
                        echo "<th style='text-align: center'>Date</th>";
                        echo "<th style='text-align: center'>Exit-date</th>";
                        echo "<th style='text-align: center'>Action</th>";
                        echo "</tr>";
                        echo"</thead>";
                        echo"<tbody>";
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td style='text-align: center'>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td style='text-align: right'>" . $row['tel'] . "</td>";
                            echo "<td style='text-align: right' >" . $row['address'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['f'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['date'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['exit'] . "</td>";
                            echo "<td style='text-align: center'>";
                            echo"<a href='read.php?id=". $row['id']
                                . "'title='View Record' data-toggle='toolip'>
                                        <span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo"<a href='update.php?id=". $row['id']
                                . "'title='Update Record' data-toggle='toolip'>
                                        <span class='glyphicon glyphicon-pencil'></span></a>";
                            echo"<a href='delete.php?id=". $row['id']
                                . "'title='Delete Record' data-toggle='toolip'>
                                        <span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        mysqli_free_result($result);
                    }else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                }else{
                    echo"EROR: Could not able to execute $sql. " . mysqli_arror($link);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
