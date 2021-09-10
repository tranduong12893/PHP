<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('/')}}">
    <title>Danh Sach</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="front/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="top">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="row">
                    <div class="col">
                        <h2>Đăng Kí Tiêm Vắc Xin Covid-19</h2>
                    </div>
                    <div class="col-md-auto">
                        <form action="/search" method="get">
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </form>
                    </div>

                </div>
                    <form method="post" role="form" action="{{ route('store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" for="number">Số CMND/ CCCD:</label><br/>
                            <input type="text" maxlength="12"class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ và tên:</label><br/>
                            <input type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ngày Tháng năm sinh:</label><br/>
                            <input type="date" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Địa chỉ:</label><br/>
                            <input type="text" class="form-control" id="inputAddress">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Điện thoại:</label><br/>
                            <input type="tel" maxlength="10" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lích sử dị ứng</label><br/>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Đăng ký</button>
                    </form>
            </div>
        </div>
        <br>
        <table class="table table-bordered" style="width: 1170px;margin-left: 120px;margin-top: 20px" >
            <thead>
                <tr>
                    <th class="ct">Id_Card</th>
                    <th class="ct">Name</th>
                    <th class="ct">Date</th>
                    <th class="ct">Address</th>
                    <th class="ct">Phone</th>
                    <th class="ct" width="250">History</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userss as $user)
                    <tr>
                        <td>{{$user->id_card}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->date_year}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->allergy_history}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>
