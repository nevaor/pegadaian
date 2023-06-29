<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/data.css') }}" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>

<body>

    <div class="halaman">
        <p style="text-align:center; font-weight: bold; font-size:25px;">Laporan Pegadaian</p>
    </div>
    <div class="menu" style="text-align:center">
        <a href="{{ route('home') }}">Home</a> |
        <a href="{{ route('logout') }}">LogOut</a>
    </div>
    <div style="display: flex; justify-content: flex-end; align-items: center;">
        <form action="" method="GET">
            @csrf
            {{-- menggunakan method GET karna route unutk masuk ke halaman data ini menggunakan ::get --}}
            <select name="search" id="search">
                <option selected hidden disabled> Pilih status</option>
                <option value="ditolak">ditolak</option>
                <option value="diterima">diterima</option>
                <option value="proses">proses</option>
            </select>
            <button type="submit" class="btn-login"
                style="margin-top: -1px;border-radius:70px; background-color:#9CFF2E; color: black; width:80px;height:20px;">Cari</button>
        </form>
        {{-- refresh balik lagi ke route data karna nanti pas di kluk refresh mau bersihin riwayat pencarian 
             sebelumnya dan balikin lagi nya ke halaman data lagi --}}
        <a href="{{ route('data.petugas') }}" style="margin-left: 10px; margin-top: -2px">Refresh</a>

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
            <tbody></tbody>

                @php
                    $no = 1;
                    $search = '';
                    if (@$_GET['search']) {
                        $search = $_GET['search'];
                    }
                @endphp

                @foreach ($pegadaians as $item)
                    @if ($search !== '')
                        @if ($item->response)
                            @if ($item->response['status'] == $search)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['age'] }}</td>
                                    @php
                                        $tlp = substr_replace($item->phone_number, '62', 0, 1);
                                    @endphp


                                    @php
                                        if ($item->response) {
                                            $PesanWA = 'hallo' . $item->name . ' ! pengaduan anda ' . $item->response['status'] . '.Berikut pesan untuk anda :' . $item->response['pesan'];
                                        } else {
                                            $PesanWA = 'Pengaduan anda';
                                        }
                                    @endphp

                                    <td><a href="https://wa.me/{{ $tlp }}?text={{ $PesanWA }}"
                                            target="_blank">{{ $tlp }}</a></td>
                                    <td>{{ $item['nik'] }}</td>
                                    <td>{{ $item['item'] }}</td>
                                    <td><a href="../assets/image/{{ $item->item_photo }}" target="_blank">
                                            <img src="{{ asset('assets/image/' . $item->item_photo) }}"
                                                style="height:50px; width:100px"></td>
                                    <td>
                                        @if ($item->response)
                                            {{ $item->response['status'] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->response)
                                            {{ $item->response['pesan'] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{ \Carbon\Carbon::parse($item->response['date'])->format('j,F, y') }}</p>
                                    </td>
                                    <td style="display: flex; justify-content:center;">
                                        <a href="{{ route('respon.edit', $item->id) }}" class="back-btn"> Send
                                            response</a>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @else
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['age'] }}</td>
                            @php
                                $tlp = substr_replace($item->phone_number, '62', 0, 1);
                            @endphp


                            @php
                                if ($item->response) {
                                    $PesanWA = 'hallo' . $item->name . ' ! pengaduan anda ' . $item->response['status'] . '.Berikut pesan untuk anda :' . $item->response['pesan'];
                                } else {
                                    $PesanWA = 'Pengaduan anda';
                                }
                            @endphp

                            <td><a href="https://wa.me/{{ $tlp }}?text={{ $PesanWA }}"
                                    target="_blank">{{ $tlp }}</a></td>
                            <td>{{ $item['nik'] }}</td>
                            <td>{{ $item['item'] }}</td>
                            <td><a href="../assets/image/{{ $item->item_photo }}" target="_blank">
                                    <img src="{{ asset('assets/image/' . $item->item_photo) }}"
                                        style="height:50px; width:100px"></td>
                            <td>
                                @if ($item->response)
                                    {{ $item->response['status'] }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($item->response)
                                    {{ $item->response['pesan'] }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($item->response)
                                        {{ \Carbon\Carbon::parse($item->response['date'])->format('j,F, y') }}
                                    @else
                                        -
                                    @endif
                            </p>
                            </td>
                            <td style="display: flex; justify-content:center;">
                                <a href="{{ route('respon.edit', $item->id) }}" class="back-btn"> Send response</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
</body>

</html>
