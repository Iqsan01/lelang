<?php

namespace App\Http\Livewire\Product;

use App\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $id_barang;
    public $id_pelanggan;
    public $nama_barang;
    public $kategori;
    public $size;
    public $image;
    public $harga;
    public $deskripsi;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        $this->validate([
            'id_barang'     => 'required',
            'id_pelanggan'  => 'required',
            'nama_barang'   => 'required:max:50',
            'kategori'      => 'required',
            'size'          => 'required',
            'image'         => 'image|max:2048',
            'harga'         => 'required|numeric',
            'deskripsi'     => 'required|max:180'
        ]);

        $imageName = '';

        if($this->image)
        {
            $imageName = Str::slug($this->nama_barang, '-')
            . '-'
            . uniqid()
            . '-' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('public', $imageName, 'local');


        }

        Product::create([
            'id_barang'     => $this->id_barang,
            'id_pelanggan'  => $this->id_pelanggan,
            'nama_barang'   => $this->nama_barang,
            'kategori'      => $this->kategori,
            'size'          => $this->size,
            'image'         => $imageName,
            'harga'         => $this->harga,
            'deskripsi'     => $this->deskripsi
        ]);
        
        $this->emit('productStored');
    }
}

              
              
               
                    
                  
                    
            