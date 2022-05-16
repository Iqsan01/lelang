<div class="row justify-content-center mb-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">

                    <div class="form-group">

                        <div class="form-row">
                            <div class="col">
                              <input wire:model="id_barang" type="text" class="form-control @error('id_barang') is-invalid @enderror" placeholder="id_barang">
                              @error('id_barang')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                            <div class="col">
                                <input wire:model="id_pelanggan" type="text" class="form-control @error('id_pelanggan') is-invalid @enderror" placeholder="id_pelanggan">
                                @error('id_pelanggan')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">
                            <div class="col">
                              <input wire:model="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="nama_barang">
                              @error('nama_barang')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                            <div class="col">
                                <input wire:model="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" placeholder="kategori">
                                @error('kategori')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">
                            <div class="col">
                              <input wire:model="size" type="text" class="form-control @error('size') is-invalid @enderror" placeholder="size">
                              @error('size')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                            <div class="col">
                                <input wire:model="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="harga">
                                @error('harga')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">
                            <div class="col">
                                <input wire:model="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="deskripsi">
                                @error('deskripsi')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                     <div class="form-group">

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input wire:model="image" type="file" class="form-control-file" id="image">
                                    
                                    @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="" height="200">
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                

                    <div class="btn-group" role="group" aria-label="Button Form">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <button wire:click="$emit('formClose')" type="button" class="btn btn-sm btn-secondary">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>