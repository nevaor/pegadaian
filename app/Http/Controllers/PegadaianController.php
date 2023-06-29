<?php

namespace App\Http\Controllers;

use App\Models\Pegadaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\PegadaianExport;




class PegadaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function login()
    {
        return view('login');
    }

    public function dataAdmin(Request $request)
    {
        $search = $request->search;
        $pegadaians = Pegadaian::with('response')->where('name','LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
        return view('data',compact('pegadaians'));
    }

    public function dataPetugas(Request $request)
    {
        $search = $request->search;
        $pegadaians = Pegadaian::with('response')->orderBy('created_at', 'DESC')->get();
        return view('data_petugas',compact('pegadaians'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone_number' => 'required|numeric',
            'nik' => 'required',
            'item' => 'required',
            'item_photo' => 'required|image|mimes:jpeg,jpg,png,svg',
        ]);

        // dd($request->all());
        //panggil folder tempat simpen gambar
        $path = public_path('assets/image/');
         //ambil file yg diupload di input yg name nya foto
         $image = $request->file('item_photo');
         //ubah nama file jadi random extensi
         $imgName = rand() . '.' . $image->extension();
         //pindahin gambar yg di upload dan udah di rename ke folder tadi
         $image->move($path, $imgName);

         Pegadaian::create([
            'name' => $request->name ,
            'email' =>  $request->email,
            'age' =>  $request->age,
            'phone_number' =>  $request->phone_number,
            'nik' =>  $request->nik,
            'item' =>  $request->item,
            'item_photo' =>  $imgName,
        ]);

        return redirect()->route('home')->with('success', 'Berhasil menambahkan data baru');

    }

    public function createPDF() { 
        // ambil data yg akan ditampilkan pada pdf, bisa juga dengan where atau eloquent lainnya dan jangan gunakan pagination
        $pegadaians = Pegadaian::with('response')->get()->toArray(); 
        // kirim data yg diambil kepada view yg akan ditampilkan, kirim dengan inisial 
        view()->share('pegadaians',$pegadaians); 
        // panggil view blade yg akan dicetak pdf serta data yg akan digunakan
        $pdf = PDF::loadView('pdf', $pegadaians)->setPaper('a4', 'landscape'); 
        // download PDF file dengan nama tertentu
        return $pdf->download('data_pegadaian.pdf'); 
        }
        
    public function createExcel(){ 
    $file_name = 'data_pegadaian'.'.xlsx'; 
    return Excel::download(new PegadaianExport, $file_name); 
    }


    /**
     * Display the specified resource.
     */
    public function auth(Request $request)
    
    {
            $request->validate([
                'email' => 'required|email|:dns',
                'password' => 'required',
            ]);

            $user = $request->only('email', 'password');
            if (Auth::attempt($user)) {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('data.admin');
            }elseif(Auth::user()->role == 'petugas'){
                return redirect()->route('data.petugas');
            }
            } else {
                return redirect('/')->with('fail', "Gagal login, periksa dan coba lagi!");
            }
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegadaian $pegadaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegadaian $pegadaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         //cari data yang dimaksud
         $data = Pegadaian::where('id', $id)->firstOrFail();
         // $data isinya -> nik sampe foto dari pengaduan
         // hapus data foto dr folder public : path , nama fotonya
         // nama fotonya diambil dari $data yang diatas terus di ambil dari colum 'foto'
        //  $image= public_path('assets/image/' .$data['photo']);
         // udah nemu posisi fotonya, tinggal dihapus fotonya pake unilnk
         unlink('assets/image/'. $data->item_photo);
         // hapus data yang isinya data nik-foto tadi, hapusnya di db
         $data->delete();
         //setelahnya dikembalikan lagi ke halaman awal
         return redirect()->back();
 
         // Report::where('id', '=', $id)->delete();
         // return redirect()->back()->with('successDelete', 'Berhasil menghapus data!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('');
    }
}
