<div class="container">

    @if($formVisible)
        @if (! $formUpdate)
            @livewire('product.create')
        @else
            @livewire('product.update')
        @endif
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Products
                    <button wire:click="$toggle('formVisible')" class="btn btn-sm btn-primary">Create</button>
                </div>

                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="col">
                            <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search...">
                        </div>
                        <hr>
                    </div>

                     <table class="table">
                         <thead class="thead-dark">
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Id Barang</th>
                                 <th scope="col">Id Pelanggan</th>
                                 <th scope="col">Nama Barang</th>
                                 <th scope="col">Kategori</th>
                                 <th scope="col">Size</th>
                                 <th scope="col">Gambar</th>
                                 <th scope="col">Harga</th>
                                 <th scope="col">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no=0?>
                             @foreach($products as $product)
                                <?php $no++ ?>
                                <tr>
                                    <td scope="row">{{ $no }}</td>
                                    <td scope="col">{{ $product->id_barang }}</td>
                                    <td scope="col">{{ $product->id_pelanggan }}</td>
                                    <td scope="col">{{ $product->nama_barang }}</td>
                                    <td scope="col">{{ $product->kategori }}</td>
                                    <td scope="col">{{ $product->size }}</td>
                                    <td scope="col">
                                        <img src="{{ $product->image }}" alt="">
                                    </td>
                                    <td scope="col">{{ $product->harga }}</td>
                                    <td>
                                        <button wire:click="editProduct({{ $product->id }})" class="btn btn-sm btn-info">Edit</button>
                                        <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                             @endforeach
                         </tbody>
                     </table>
                     {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>