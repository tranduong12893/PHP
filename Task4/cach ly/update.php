<?php
//Include config file
require_once 'config.php';

//Define variables and intialize with empty values
$name = $tel = $address = $f = $location = $date = $exit = "";
$name_err = $tel_err = $address_err = $f_err = $location_err = $date_err = $exit_err = "";

//Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    //Get hidden input value
    $id = $_POST["id"];

    //Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z'-.\s]+$/")))) {
        $name_err = 'Please enter a valid name.';
    } else {
        $name = $input_name;
    }

    //validate tel
    $input_tel = trim($_POST["tel"]);
    if (empty($input_tel)) {
        $tel_err = 'Please enter an tel.';
    } else {
        $tel = $input_tel;
    }
    //Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = 'Please enter an address.';
    } else {
        $address = $input_address;
    }

    //validate f
    $input_f = trim($_POST["f"]);
    if (empty($input_f)) {
        $f_err = 'Please enter an F.';
    } else {
        $f = $input_f;
    }

    //validate location
    $input_loc = trim($_POST["location"]);
    if (empty($input_loc)) {
        $location_err = 'Please enter an tel.';
    } else {
        $location = $input_loc;
    }

    //validate date
    $input_date = trim($_POST["date"]);
    if (empty($input_date)) {
        $date_err = 'Please enter an date.';
    } else {
        $date = $input_date;
    }

    //validate exit
    $input_exit = trim($_POST["exit"]);
    if (empty($input_exit)) {
        $exit_err = 'Please enter an exit-date.';
    } else {
        $exit = $input_exit;
    }


    //Check input errors before inserting in database
    if (empty($name_err) && empty($address_err) && empty($salary_err)) {
        //Prepare an insert statement
        $sql = "UPDATE people SET name=?, tel =?, address=?, f=?, location=?, date=?, exit=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            //Blind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_tel, $param_address, $param_f, $param_location, $param_date, $param_exit);

            //Set parameters
            $param_name = $name;
            $param_tel = $tel;
            $param_address = $address;
            $param_f = $f;
            $param_location = $location;
            $param_date = $date;
            $param_exit = $exit;
            $param_id = $id;

            //Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        //Close statement
        mysqli_stmt_close($stmt);
    }
    //Close connection
    mysqli_close($link);
}else{
    //Check exitsence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        //Get URL parameter
        $id = trim($_GET["id"]);

        //Prepare a select statement
        $sql="SELECT * FROM people WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            //Set parameters
            $param_id = $id;

            //Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    //Retrieve individual field value
                    $name = $row["name"];
                    $tel = $row["tel"];
                    $address = $row["address"];
                    $f  = $row["f"];
                    $location = $row["location"];
                    $date = $row["date"];
                    $exit = $row["exit"];
                }else{
                    header("location: error.php");
                    exit();
                }
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        //Close statement
        mysqli_stmt_close($stmt);

        //Close connection
        mysqli_close($link);
    }else{
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Update Record</h2>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        <span class="help-block"><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($tel_err)) ? 'has-error' : ''; ?>">
                        <label>TEL</label>
                        <input type="text" name="tel" class="form-control" value="<?php echo $tel; ?>">
                        <span class="help-block"><?php echo $tel_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                        <span class="help-block"><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($f_err)) ? 'has-error' : ''; ?>">
                        <label>F</label>
                        <input type="text" name="f" class="form-control" value="<?php echo $f; ?>">
                        <span class="help-block"><?php echo $f_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
                        <span class="help-block"><?php echo $location_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                        <label>Date</label>
                        <input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
                        <span class="help-block"><?php echo $date_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($exit_err)) ? 'has-error' : ''; ?>">
                        <label>Exit-date</label>
                        <input type="text" name="exit" class="form-control" value="<?php echo $exit; ?>">
                        <span class="help-block"><?php echo $exit_err; ?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>