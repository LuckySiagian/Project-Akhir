@extends('pelanggan.layout.index')

@section('content')
    <div class="container mt-3">
        @if ($best->count() == 0)
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" data-aos="flip-left"
            data-aos-easing="ease-out-cubic"
            data-aos-duration="2000">
              <div class="carousel-item active">
                <img src="{{ asset('assets/images/hom.jpg') }}"  alt="" style="width:1250px; height:800px; border-radius:40px;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/images/wc1.png') }}" alt="" style="width:1250px; height:800px; border-radius:40px;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/images/Content.jpg') }}" alt="" style="width:1250px; height:800px; border-radius:40px;">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            <h1 data-aos="zoom-in">"Sejarah awal berdirinya Ijabu Coffee"</h1>
            <p data-aos="zoom-in">Awal mulanya berdirinya nama Coffee Shop ijabu yakni karena adanya seorang anak muda yang sering keluar malam dari rumah untuk pergi ke tempat tongkrongan.Namun orang tuanya selalu menelepon anaknya karena orangtuanya pergi kerja keluar kota.Nah karena sering ditelepon anak muda tersebut mempunyai ide untuk membuat sebuah nama tempat tonkrongan terdebut Ijabu.Karena dalam bahasa Batak Ijabu artinya Rumah,sehingga ketika orang tuanya menelepon dia berada dimana dia akan menjawab Ijabu/Dirumah padahal dia berada dia berada di tempat tongkrongan. Pemuda tersebut juga beranggapan bahwa dia berbohong kepada orangtuanya karena dia memang benar berada di Ijabu/Dirumah</p>
          </div>
        
        @else
            <h4 class="mt-5">Best Seller</h4>
            <div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
                @foreach ($best as $b)
                    <div class="card" style="width: 220px;">
                        <div class="card-header m-auto" style="height: 100%; width: 100%;">
                            <img src="{{ asset('storage/product/' . $b->foto) }}" alt="baju 1"
                                style="width: 100%; height: 200px; object-fit: cover; padding: 0;">
                        </div>
                        <div class="card-body">
                            <p class="m-0 text-justify">{{ $b->nama_product }}</p>
                            <p class="m-0"><i class="fa-regular fa-star"></i> 5+</p>
                        </div>
                        <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                            <p class="m-0" style="font-size: 16px; font-weight: 600;"><span>IDR </span>{{ number_format($b->harga) }}</p>
                            <button class="btn btn-outline-primary" style="font-size: 24px;">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <h4 class="mt-5" data-aos="fade-up"
        data-aos-duration="3000">New Product</h4>
        <div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
            @if ($data->isEmpty())
                <div class="text-center mt-5">
                    <h1>Belum Ada Produk ...!</h1>
                </div>
            @else
                @foreach ($data as $p)
                    <div class="card" style="width: 220px;" data-aos="fade-up"
                    data-aos-duration="3000">
                        <div class="card-header m-auto" style="height: 100%; width: 100%;">
                            <img src="{{ asset('storage/product/' . $p->foto) }}" alt="baju 1"
                                style="width: 100%; height: 200px; object-fit: cover; padding: 0;">
                        </div>
                        <div class="card-body">
                            <p class="m-0 text-justify">{{ $p->nama_product }}</p>
                            <p class="m-0"><i class="fa-regular fa-star"></i> 5+</p>
                        </div>
                        <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                            <p class="m-0" style="font-size: 16px; font-weight: 600;"><span>IDR </span>{{ number_format($p->harga) }}</p>
                            <form action="{{ route('addTocart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="idProduct" value="{{ $p->id }}">
                                <button type="submit" class="btn btn-outline-primary" style="font-size: 24px;">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="pagination d-flex flex-row justify-content-between">
            <div class="showData">
                Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
            </div>
            <div>
                {{ $data->links() }}
            </div>
        </div>
        @endif
    </div>
@endsection
