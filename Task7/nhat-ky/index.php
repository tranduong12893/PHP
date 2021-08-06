
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Everyday Tunna</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
<link rel="stylesheet" href="styles/index.css">
</head>
<body>
<div class="container py-5">

    <div class="row text-center text-white mb-5">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">Your Diary</h1>
            <p class="lead mb-0">Nhật ký hằng ngày của bạn. </p>
            <p class="lead">Instagram:<a href="#" class="text-white">
                <u>...</u></a></p>
            <p class="lead">Facebook:<a href="#" class="text-white">
                    <u>...</u></a></p>
            </div>
    </div>
    <div class="row">
            <div class="col-lg-7 mx-auto">
                <ul class="timeline">
				<?php
                include_once 'serverconnect.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, content, date, image FROM timeline ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $datee = $row['date'];
	  $mydate = strtotime("$datee");
      $realdate = date('j F, Y', $mydate);
      $a = array(
        'January' => 'Tháng Một',
        'February' => 'Tháng Hai',
        'March' => 'Tháng Ba',
        'April' => 'Tháng Tư', 
        'May' => 'Tháng Năm', 
        'June' => 'Tháng Sáu', 
        'July' => 'Tháng Bảy', 
        'August' => 'Tháng Tám', 
        'September' => 'Tháng Chín', 
        'October' => 'Tháng Mười', 
        'November' => 'Tháng Mười một', 
        'December' => 'Tháng Mười hai', 
        );
      $off_date = strtr($realdate, $a);
      if (empty($row['image'])){
      	$row['image'] = "";
      }
      
    echo "<li class='timeline-item bg-white rounded ml-3 p-4 shadow'>
                        <div class='timeline-arrow'></div>
                        <h2 class='h5 mb-0'>".$row['title']."</h2><span class='small text-gray'><i class='fa fa-clock-o mr-1'></i>".$off_date."</span>
                        <p class='text-small mt-2 font-weight-light'>".$row['content']."</p>
                        <img src='".$row['image']."' style='max-width: 100%;max-height: 100%;'/>
                    </li>";
  }
} else {
  echo "<p style='color:white'>Không có bài viết nào. Có thể là do tác giả quá lười viết. Quay lại sau nhé :)</p>";
}
$conn->close();
?>
                </ul>
            </div>
        </div>
    <div>
        <a href="add.php"><button type="submit" name="submit" class="btn btn-outline-light" style="margin-left: 900px"> ADD</button></a>
    </div>
    </div>
	</body>