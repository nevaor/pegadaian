<?php

namespace App\Exports;

use App\Models\Pegadaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;



class PegadaianExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pegadaian::with('response')->orderBy('created_at','DESC')->get();
    }

    public function headings(): array
    {
        return[
            'Nama',
            'Email',
            'Age',
            'Phone',
            'Nik',
            'Item',
            'Foto',
            'Setatus Respon',
            'Shop Location',
            'Update At',
        ];
    }
     // mengatur data yang ditampilkan percolumn di excelnya
    // fungsinya seperti foreach. $item merupakan as pada foreach
    public function map($item): array
    {
        return [
            $item->name,
            $item->email,
            $item->age,
            $item->phone_number,
            $item->nik,
            $item->item,
            $item->item_photo,
            $item->response ? $item->response['status'] : '-',
            $item->response ? $item->response['pesan'] : '-',
            \Carbon\Carbon::parse($item->created_at)->format('j F Y'),
        ];
    }
}
