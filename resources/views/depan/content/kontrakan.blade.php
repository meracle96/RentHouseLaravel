@extends('depan.partials.layout')
@section('content')
<style media="screen">
  .boxfilter {
    margin-left: 30px;
    width: 180px;
    border: 1px solid #ccc;
  }

  .boxfilter:hover {
    border: 2px solid black;
  }

  .buttonfilter {
    padding: 10px;
  }
</style>
<div class="site-wrap js-site-wrap">
  <!-- BEGIN BREADCRUMBS-->
  <nav class="breadcrumbs">
    <div class="container">

    </div>
  </nav>
  <!-- END BREADCRUMBS-->
  <div class="center">
    <div class="container">
      <div class="row">
        <div class="site site--main">
          <header class="site__header">
            <h1 class="site__title">Rumah Kontrakan</h1>
            <h3>Jumlah :<strong> {{ $jumlahkontrakan }} Kontrakan </strong></h3>
            <a href="{{ route('kontrakan.create' )}}" class="btn btn-primary" style="margin-right:10px;">Tambah Kontrakan</a>
            <a href="/kontrakansaya" class="btn btn-warning" style="margin-right:10px;">Kontrakan Saya</a>
          </header>
          <button type="button" data-goto-target=".js-search-form" class="widget__btn--goto js-goto-btn">Show Filter</button>
          <div class="site__main">
            <div class="widget js-widget widget--main">
              <div class="widget__content">
                <div class="listing listing--grid listing--lg-6 js-properties-list">
                  <!-- BEGIN site-->

                  @foreach ($kontrakans as $kontrakan)

                    {{-- List Item --}}
                    <div class="listing__item">
                      <div class="properties properties--grid">
                        <div class="properties__thumb"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="item-photo"><img src="/uploads/foto/{{$kontrakan->foto}}" alt=""/>
                            <figure class="item-photo__hover item-photo__hover--params">
                              @if ($kontrakan->kecamatan_id == 1)
                                <span class="properties__params" style="color:white;"><b>Pontianak Barat</b></span>
                              @endif
                              @if ($kontrakan->kecamatan_id == 2)
                                <span class="properties__params" style="color:white;"><b>Pontianak Kota</b></span>
                              @endif
                              @if ($kontrakan->kecamatan_id == 3)
                                <span class="properties__params" style="color:white;"><b>Pontianak Utara</b></span>
                              @endif
                              @if ($kontrakan->kecamatan_id == 4)
                                <span class="properties__params" style="color:white;"><b>Pontianak Timur</b></span>
                              @endif
                              @if ($kontrakan->kecamatan_id == 5)
                                <span class="properties__params" style="color:white;"><b>Pontianak Selatan</b></span>
                              @endif
                              @if ($kontrakan->kecamatan_id == 6)
                                <span class="properties__params" style="color:white;"><b>Pontianak Tenggara</b></span>
                              @endif

                              <span class="properties__params"><b>{{ $kontrakan->judul }}</b></span>
                              <span class="properties__intro" style="color:white;"><b>{{ $kontrakan->alamat }}</b></span>
                              <br><br><br>
                              <span class="properties__more">View details</span>
                            </figure></a><span class="properties__ribon">{{ $kontrakan->getKecamatan() }}</span>
                        </div>
                        <!-- end of block .properties__thumb-->
                        <div class="properties__details">
                          <div class="properties__info"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="properties__address"><span class="properties__address-street">{{ $kontrakan->judul }}</span><span class="properties__address-city">{{ $kontrakan->alamat }}</span></a>
                            <div class="properties__offer">
                              <div class="properties__offer-column">
                                <div class="properties__offer-value"><strong>Rp. {{ $kontrakan->harga }}</strong><span class="properties__offer-period">/tahun</span>
                                </div>
                              </div>
                            </div>
                            <div class="properties__params--mob"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="properties__more">View details</a><span class="properties__params">Built-Up - 65 Sq Ft</span><span class="properties__params">Land Size - 110 Sq Ft</span></div>
                          </div>
                        </div>
                        <!-- end of block .properties__info-->
                      </div>
                      <!-- end of block .properties__item-->
                    </div>
          <!-- END site-->
        @endforeach
              </div>
              <div class="text-center">
                {{ $kontrakans->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>


        <!-- BEGIN SIDEBAR-->
        <div class="sidebar">
          <div class="widget js-widget widget--sidebar">
            <div class="widget__header">
              <h2 class="widget__title">Filter Kecamatan</h2>
              <h5 class="widget__headline">Cari Rumah Kontrakan dengan menggunakan filter kecamatan.</h5>
            </div>
            <div class="widget__content">
              <!-- BEGIN SEARCH-->
                <div class="row">
                  <div class="col-md-12 text-center boxfilter">
                    <a href="/kontrakan/pontianakkota" class="buttonfilter">Pontianak Kota</a>
                  </div>
                  <br><br>
                  <div class="col-md-12 text-center boxfilter">
                    <a href="/kontrakan/pontianakutara" class="buttonfilter">Pontianak Utara</a>
                  </div>
                  <br><br>
                  <div class="col-md-12 text-center boxfilter">
                    <a href="/kontrakan/pontianakselatan" class="buttonfilter">Pontianak Selatan</a>
                  </div>
                  <br><br>
                  <div class="col-md-12 text-center boxfilter">
                    <a href="/kontrakan/pontianakbarat" class="buttonfilter">Pontianak Barat</a>
                  </div>
                  <br><br>
                  <div class="col-md-12 text-center boxfilter">
                    <a href="/kontrakan/pontianaktimur" class="buttonfilter">Pontianak Timur</a>
                  </div>
                  <br><br>
                  <div class="col-md-12 text-center boxfilter">
                    <a href="/kontrakan/pontianaktenggara" class="buttonfilter">Pontianak Tenggara</a>
                  </div>
                </div>
              </form>
              <!-- end of block-->
              <!-- END SEARCH-->
            </div>
          </div>
        </div>
        <!-- END SIDEBAR-->
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@endsection
