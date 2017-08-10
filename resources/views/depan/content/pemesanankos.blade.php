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
                  <h1 class="text-center">Daftar Request Pemesanan Kos</h1>
                  <br>
                  @foreach ($koses as $kos)
                    <h2>Nama Kos : {{$kos->judul}}</h2>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama Pemesan</th>
                          <th>Nomor HP</th>
                          <th>Nomor Kamar</th>
                          <th>Kirim Pesan</th>
                          <th>Terima</th>
                          <th>Tolak</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $orders = App\OrderKos::where('status',0)->where('kos_id',$kos->id)->get();
                        @endphp
                        @foreach ($orders as $order)
                          <tr>
                              <td>{{$order->getNama()}}</td>
                              <td>{{$order->nomorhp}}</td>
                              <td>{{$order->getNomorKamar()}}</td>
                              <td><a href="#" class="btn btn-info">Kirim Pesan</a></td>
                              <td>
                                <form action="{{route('kos.orderkos.terima',['id'=>$order->id])}}" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="PUT">
                                  <input type="submit" name="submit" value="Terima" class="btn btn-success">
                                </form>
                              </td>
                              <td>
                                <form action="{{route('kos.orderkos.tolak',['id'=>$order->id])}}" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="submit" name="submit" value="Tolak" class="btn btn-danger">
                                </form>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      @endsection
