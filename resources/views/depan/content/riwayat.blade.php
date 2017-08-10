@extends('depan.partials.layout')
@section('content')
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
              <div class="col-md-8 col-md-offset-2">
                  <h1 class="text-center">Riwayat Pemesanan Kos</h1>
                  <br>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nama Kos</th>
                        <th>Nomor Kamar</th>
                        <th>Alamat Kos</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($riwayatkos as $riwayat)
                        <tr>
                          <td>{{$riwayat->getNamaKos()}}</td>
                          <td>{{$riwayat->getNomorKamar()}}</td>
                          <td>{{$riwayat->getAlamatKos()}}</td>
                          @if ($riwayat->status == 0)
                            <td>Belum Diterima</td>
                          @else
                            <td>Diterima</td>
                          @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
              <hr>
              <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Riwayat Pemesanan Kontrakan</h1>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Kontrakan</th>
                      <th>Alamat Kontrakan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($riwayatkontrakan as $riwayat)
                      <tr>
                        <td>{{$riwayat->getNamaKontrakan()}}</td>
                        <td>{{$riwayat->getAlamatKontrakan()}}</td>
                        @if ($riwayat->status == 0)
                          <td>Belum Diterima</td>
                        @else
                          <td>Diterima</td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      @endsection
