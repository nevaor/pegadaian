<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Form Send Respon</title>
</head>
<body>
    <form action="{{route('respon.update', $pegadaianId)}}" method="POST" style="width: 500px; margin: 50px auto; display:block">
        @csrf
        @method('PATCH')
        <div class="input-card">
            <label for="status">Status : </label>
            @if($pegadaian)
                <select name="status" id="status">
                    <option selected hidden disabled> Pilih tatus</option>
                    <option value="ditolak"{{ $pegadaian['status'] == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                    <option value="proses" {{ $pegadaian['status'] == 'proses' ? 'selected' : '' }}>proses</option>
                    <option value="diterima" {{ $pegadaian['status'] == 'diterima' ? 'selected' : '' }}>diterima</option>
                </select>
            @else
                <select name="status" id="status">
                    <option selected hidden disabled> Pilih Status</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="proses">Proses</option>
                    <option value="diterima">Diterima</option>
                </select>
            @endif
        </div>
        <div class="input-card">
            <label for="pesan">Masukan Nama Kota :</label>
            <textarea name="pesan" id="pesan"  rows="3"></textarea>
            <fieldset>
                <label for="">Target Date</label>
                <input name="date" placeholder="Target Date" type="date"
                value="">
            </fieldset>
        <button type="submit">kirim Response</button>
    </form>
</body>
</html>