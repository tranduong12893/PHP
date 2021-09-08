<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh mục kho hàng</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="front/css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="top_19">
            <div class="row">
                <div class="col" >
                    <h2>DANH MỤC HÀNG HOÁ</h2>
                </div>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <form action="/add" method="get">
                <div class="add">
                    <br>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-plus"></i>Thêm</button>
                </div>
            </form>
            <table class="table table-bordered" style="width: 1170px;margin-left: 100px;margin-top: 50px" >
                <thead>
                <tr>
                    <th class="ct">ID</th>
                    <th class="ct">Name</th>
                    <th class="ct">Price</th>
                    <th class="ct">Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($warehouse as $wh)
                    <tr>
                        <td>{{$wh->id_name}}</td>
                        <td>{{$wh->name}}</td>
                        <td style="text-align: right">{{$wh->price}} VNĐ</td>
                        <td><img src="front/img/{{ $wh->image }}" alt="" width="250" style="margin-left: 25px"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>
</html>
