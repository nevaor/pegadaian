<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/data.css')}}" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>
<body>

     <div class="halaman">
    <p style="text-align:center; font-weight: bold; font-size:25px;">Laporan Pegadaian</p>
</div>
<div class="menu" style="text-align:center">
    <a href="{{route('data.admin')}}" style="margin-left: 10px; margin-top: -2px">Refresh</a>
    <a href="/export/pdf" style="margin-left: 10px; margin-top:-2px;">Cetak PDF</a>
    <a href="{{ route('export.excel') }}" style="margin-left: 10px; margin-top:-2px;">Cetak Excel</a>
    <br>
    <a href="{{route('home')}}">Home</a> |
    <a href="{{route('logout')}}">LogOut</a>
            </div>
            <div style="display: flex; justify-content: flex-end; align-items: center;">
    <form action="" method="GET">
        @csrf
        <input type="text" name="search" placeholder="cari berdasarkan nama ...">
        <button class="button-17" role="button" style="margin-left:5px;margin-top: -0.1px">Seacrh</button>
    </form>
       
    </div>
    </div>
    
    <div>
    <table class="styled-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Nik</th>
            <th>Item</th>
            <th>Foto</th>
            <th>Setatus Respon</th>
            <th>Shop Location</th>
            <th>Update At</th>
            <th>Aksi</th>

        </tr>
    </thead>
    <tbody>

    @php
        $no = 1;
     @endphp
        @foreach ($pegadaians as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['age']}}</td>
        @php
            $tlp = substr_replace($item->phone_number, "62",0,1);
        @endphp
       

            @php
            if($item->response) {
             $PesanWA='hallo' . $item->name . ' ! pengaduan anda ' .
             $item->response['status'] . '.Berikut pesan untuk anda :' .
             $item->response['pesan'];
            }
            else{
                $PesanWA ='Pengaduan anda';
            }
            @endphp
            
            <td><a href="https://wa.me/{{$tlp}}?text={{$PesanWA}}"
            target="_blank">{{$tlp}}</a></td>
        <td>{{$item['nik']}}</td>
        <td>{{$item['item']}}</td>
          <td><a href="../assets/image/{{$item->item_photo}}"
                target="_blank">
            <img src="{{asset('assets/image/' . $item->item_photo)}}" style="height:50px; width:100px"></td>
            <td>
                @if ($item->response)
                {{$item->response['status']}}
                @else
                -
                @endif
        </td>
        <td>
        @if ($item->response)
                {{$item->response['pesan']}}
                @else
                -
                @endif
        </td>
        <td><p>{{\Carbon\Carbon::parse($item['created-at'])->format('j,F, y')}}</p></td>
        <td>
                <form action="/hapus/{{$item->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"style="border-radius:70px;  color: black; width:100px;height:30px;">Hapus</button>
                </form><br>
                <form action="" method="GET">
                @csrf
                <button class="button-17" type="submit" style="border-radius:70px;  color: black; width:100px;height:30px;">Print</button>
                </form>
            </td>
        </tr>
            
         @endforeach       
    </tbody>
</table>
</body>
</html>
