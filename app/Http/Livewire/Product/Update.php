<?php

namespace App\Http\Livewire\Product;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Update extends Component
{

    use WithFileUploads;

    public $productId;
    public $id_barang;
    public $id_pelanggan;
    public $nama_barang;
    public $kategori;
    public $size;
    public $harga;
    public $deskripsi;
    public $image;
    public $imageOld;




    protected $listeners = [
        'editProduct'   => 'editProductHandler'
    ];

    public function render()
    {
        return view('livewire.product.update');
    }

    public function editProductHandler($product)
    {
        $this->productId    = $product['id'];
        $this->id_barang    = $product['id_barang'];
        $this->id_pelanggan = $product['id_pelanggan'];
        $this->nama_barang  = $product['nama_barang'];
        $this->kategori     = $product['kategori'];
        $this->size         = $product['size'];
        $this->harga        = $product['harga'];
        $this->deskripsi    = $product['deskripsi'];
        $this->imageOld     = asset('/storage/'.$product['image']);

    }

    public function update()
    {
        $this->validate([
            'id_barang'     => 'required',
            'id_pelanggan'  => 'required',
            'nama_barang'   => 'required:max:50',
            'kategori'      => 'required',
            'size'          => 'required',
            'image'         => 'required|image|max:2048',
            'harga'         => 'required|numeric',
            'deskripsi'     => 'required|max:180'
        ]);

        if($this->productId)
        {
            $product = Product::find($this->productId);

            $image = '';
            if($this->image)
            {
                Storage::disk('public')->delete($product->image);

                $imageName = Str::slug($this->nama_barang, '-')
                . '-'
                . uniqid()
                . '-' . $this->image->getClientOriginalExtension();

                $this->image->storeAs('public', $imageName, 'local');

                $image = $imageName;
            } else {
                $image = $product->image;
            }

            $product->update([
                'id_barang'     => $this->id_barang,
                'id_pelanggan'  => $this->id_pelanggan,
                'nama_barang'   => $this->nama_barang,
                'kategori'      => $this->kategori,
                'size'          => $this->size,
                'harga'         => $this->harga,
                'deskripsi'     => $this->deskripsi,
                'image'         => $this->image
            ]);

            $this->emit('productUpdated');
        }
    }

}
