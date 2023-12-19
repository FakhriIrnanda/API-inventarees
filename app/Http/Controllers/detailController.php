<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class detailController extends Controller
{
    public function showall()
    {
        $barang = Barang::all();
        return view('detail', ['barang' => $barang]);
    }
}
