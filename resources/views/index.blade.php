{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</body>
</html> --}}

@extends('app')

@section('content')
<section class="hero-area bg-primary" id="parallax">
    <div class="container">
        <img src="{{ asset('tradingkkn.png') }}" alt="" style="position: absolute; top:1px; z-index: 99; filter: drop-shadow(5px 5px 15px rgba(34, 34, 34, 0.35));">
        {{-- <div class="pt-5"></div> --}}
        <div class="p-4 rounded-4 mb-4 d-flex flex-row align-items-center justify-content-center gap-3" style="max-width: 700px">
            <a href="https://trakteer.id/overdose/tip" class="btn btn-primary rounded-4" target="__blank">Donasi</a>
            <h4 class="text-white">Created by
                <a href="https://www.instagram.com/overdose.std/" class="text-white">@Overdose.std</a></h4>
        </div>
        <div class="row px-2 gap-3 mb-4" style="max-width: 700px">
            <a href="{{ route('create.form') }}" class="btn btn-primary rounded-4 col">
                <svg style="height: 24px" class="me-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                Ajukan Permintaan</a>
            <a href="{{ route('create.form') }}" class="btn btn-warning rounded-4 col">
                <svg style="height: 24px" class="me-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                  </svg>
                Permintaan Diambil</a>
        </div>
        <div class="row px-2" style="max-width: 700px">
            <a class="btn btn-info rounded-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="max-width: 700px">
                <svg style="height: 24px" class="me-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                Filter Pencarian
              </a>
              <div class="collapse p-0" id="collapseExample">
            <form class="card shadow p-4 rounded-4 mt-4" action="{{route('create.store')}}" method="post" style="max-width: 700px">
                {{-- <h3 class="mb-4">Pencarian Filter</h3> --}}

                @csrf
                {{-- Show Error --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    Silahkan isi data-data yang diperlukan.
                </div>
                @endif
                {{-- Show Session Error --}}
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="mb-3">
                    <label for="gender">Gender*</label>
                    <div class="form-check">
                        <input class="" type="radio" id="male" name="gender" value="male" @if (old('gender')=='male' )
                            checked @endif>
                        <label for="male">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="" type="radio" id="female" name="gender" value="female" @if (old('gender')=='female' )
                            checked @endif>
                            <label for="female">Perempuan</label>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label>Wilayah Asal KKN*</label>
                    <select class="form-select" name="origin_city" id="origin_city">
                        <option selected disabled>Pilih Kota</option>
                        @foreach ($cities as $city)
                        <option value="{{$city}}" @if (old('origin_city')==$city) selected @endif>{{$city}}</option>
                        @endforeach
                    </select>
                </div>

                <hr>

                <div class="mb-3">
                    <div class="d-flex">
                        <div class="">
                            <label>Wilayah Tujuan Penukaran KKN*</label>
                        </div>
                        <div class="checkbox d-flex justify-content-end" style="width: 100%">
                            <label class="" for="all">
                                <input class="checkbox-input"  type="checkbox" id="all" name="all" value="all" @if (old('all')=='all' ) checked @endif>
                                <span class="checkbox-tile" style="height: 40px; padding: .5rem; min-height: 40px; width: 75px;">
                                    <span class="checkbox-label"> Semua</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($cities as $city)
                        <div class="checkbox col">
                            <label for="{{$city}}" class="checkbox-wrapper">
                                <input class="checkbox-input" type="checkbox" id="{{$city}}" name="destination_city[]" value="{{$city}}"
                                    @if (in_array($city,
                                    old('destination_city') ?? [])) checked
                                    @endif>
                                <span class="checkbox-tile">
                                    <span class="checkbox-label">{{$city}}</span>
                                </span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
            <hr>
              </div>
        </div>
        <div class="row" style="max-width: 700px">
            @for ($i = 0; $i < 5; $i++)
            <div>
                <div class="card shadow p-4 rounded-4 mt-4 me-4" action="{{route('create.store')}}" method="post" style="max-width: 700px">
                    <div class="row">
                        <div class="col-sm-5 col-12">
                            <h4>Lokasi saat ini : Kebumen</h4>
                        </div>
                        <div class="col-sm-6 col-12">
                            <p class="m-0"><strong>Nama : </strong>Anonim</p>
                            <p class="m-0"><strong>Lokasi diinginkan : </strong>Banyuwangi, Kediri, Tuban, Mulyorejo, Karmen, Gresik, Pasuruan</p>
                        </div>
                        <div class="col-sm-1 col-12">
                            <a href="" class="btn btn-primary py-2 px-4 me-2" style="font-size: 1rem; position:absolute; right:-40px">Hubungi</a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    {{-- <div class="layer-bg w-100">
        <img class="img-fluid w-100" src="{{ asset('kross/images/illustrations/leaf-bg.png') }}" alt="bg-shape">
    </div> --}}
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="layer" id="l2">
        <img src="{{ asset('kross/images/illustrations/dots-cyan.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l3">
        <img src="{{ asset('kross/images/illustrations/leaf-orange.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l4">
        <img src="{{ asset('kross/images/illustrations/dots-orange.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l5">
        <img src="{{ asset('kross/images/illustrations/leaf-yellow.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l7">
        <img src="{{ asset('kross/images/illustrations/dots-group-orange.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l8">
        <img src="{{ asset('kross/images/illustrations/leaf-pink-round.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l9">
        <img src="{{ asset('kross/images/illustrations/leaf-cyan-2.png') }}" alt="bg-shape">
    </div>
</section>
@endsection

@section('script')
{{-- JS if select all then city checked --}}
<script>
    $('#all').click(function () {
        if ($(this).is(':checked')) {
            $('input[name="destination_city[]"]').prop('checked', true);
        } else {
            $('input[name="destination_city[]"]').prop('checked', false);
        }
    });

</script>

{{-- JS if all city checked then 'all' checked --}}
<script>
    $('input[name="destination_city[]"]').click(function () {
        if ($('input[name="destination_city[]"]:checked').length == $('input[name="destination_city[]"]')
            .length) {
            $('#all').prop('checked', true);
        } else {
            $('#all').prop('checked', false);
        }
    });

</script>
@endsection
