@extends('pelanggan.layout.index')

@section('content')
    <div class="d-flex flex-row gap-2 mt-4" data-aos="fade-right"
    data-aos-offset="300"
    data-aos-easing="ease-in-sine">
        <div class="" style="width: 30%;">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Kategory
                </div>
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Drink
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-4">
                                        <div class="d-flex flex-row gap-3">
                                            <input type="checkbox" name="kategory" class="kategory" value="Coffee">
                                            <span>Coffee</span>
                                        </div>
                                        <div class="d-flex flex-row gap-3">
                                            <input type="checkbox" name="kategory" class="kategory" value="Non Coffee">
                                            <span>Non Coffee</span>
                                        </div>
                                        <div class="d-flex flex-row gap-3">
                                            <input type="checkbox" name="kategory" class="kategory" value="Boba">
                                            <span>Boba</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Food
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body p-0">
                                    <div class="accordion-body">
                                        <div class="d-flex flex-column gap-4">
                                            <div class="d-flex flex-row gap-3">
                                                <input type="checkbox" name="kategory" class="kategory"
                                                    value="Snack">
                                                <span>Snack</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap gap-4 mb-5" id="filterResult" data-aos="fade-up"
        data-aos-duration="3000">
            @if ($data->isEmpty())
                <h1>Belum ada product ...!</h1>
            @else
                @foreach ($data as $p)
                    <div class="card" style="width:200px;">
                        <div class="card-header m-auto">
                            <img src="{{ asset('storage/product/' . $p->foto) }}" alt="baju 1"
                                style="width: 100%;height:130px; object-fit: cover; padding:0;">
                        </div>
                        <div class="card-body">
                            <p class="m-0 text-justify" style="font-size: 14px;"> {{ $p->nama_product }} </p>
                            <p class="m-0"><i class="fa-regular fa-star"></i> 5+</p>
                        </div>
                        <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                            <p class="m-0" style="font-size: 16px; font-weight:600;"><span>IDR
                                </span>{{ number_format($p->harga) }}</p>
                            <form action="{{route('addTocart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="idProduct" value="{{$p->id}}">
                                <button type="submit" class="btn btn-outline-primary" style="font-size:24px">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
        </div>
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

    <script>
        $(document).ready(function() {
            $('.kategory').change(function(e) {
                e.preventDefault();
                var value = $(this).val();
                var split = value.split(' ');
                var kategory = split[0];
                var type = split[1];
                // alert(type);
                $.ajax({
                    type: "GET",
                    url: "{{ route('shop') }}",
                    data: {
                        kategory: kategory,
                        type: type,
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endsection
