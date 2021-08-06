<?php
include_once 'serverconnect.php';
$error= '';
$msg = "";

if (isset($_POST['submit'])) {
    $tieude = $_POST['name'];
    $noidung = $_POST['text'];
    $today = date("Y-m-d");
    $error = "Đăng bài viết thành công!";
    // POST image name
    if(isset($_POST['tick'])){
        $image = "/images/".$_FILES['image']['name'];
    } else {
        $image = '';
    }


    // image file directory
    $tarPOST = $_SERVER['DOCUMENT_ROOT']."/images/".basename($image);
    $sql = "INSERT INTO timeline (title, content, date, image)
VALUES ('$tieude', '$noidung', '$today', '$image')";

    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $tarPOST)) {
        $msg = "Ảnh đã được upload thành công";
    }else{
        $msg = "Tải lên ảnh thất bại hoặc không có ảnh";
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết - Everyday Your</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <link rel="stylesheet" href="styles/add.css">
</head>
<body>
<div class="container py-5">
    <h1 class="display-4">NHẬP NỘI DUNG</h1>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <label for="name">Tiêu đề:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="textt">Nội dung:</label><br>

        <textarea id="textt" name="textt" rows="9" cols="48"></textarea><br><br>


        <input type="checkbox" id="tick" name="tick" value="contain_pic" onclick="myFunction()">
        <label for="tick"> Có chứa ảnh</label><br>
        <input type="file" id="image" name="image" style="display:none">
        <br>
        <script type="text/javascript">
            function myFunction() {
                // Get the checkbox
                var checkBox = document.getElementById("tick");
                // Get the output text
                var text = document.getElementById("image");

                // If the checkbox is checked, display the output text
                if (checkBox.checked == true){
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>
        <input type="hidden" name="size" value="1000000">
        <input type="submit" name="submit">
        <br><br>
        <p><?php echo $error;?></p>
        <p><?php echo $msg;?></p>
    </form>

</div>
</body>