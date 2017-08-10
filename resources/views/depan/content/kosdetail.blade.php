@extends('depan.partials.layout')
@section('content')
  <style media="screen">
  #map-permanent {
    width: 100%;
    height: 300px;
    margin-top: 20px;
  }
  @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
  /*Baru*/
  .star {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .staruser {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 30px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }



  .fa-star:before, .rating[data-rating="1"] .star:first-child:before, .rating[data-rating="2"] .star:nth-child(1):before, .rating[data-rating="2"] .star:nth-child(2):before, .rating[data-rating="3"] .star:nth-child(1):before, .rating[data-rating="3"] .star:nth-child(2):before, .rating[data-rating="3"] .star:nth-child(3):before, .rating[data-rating="4"] .star:before, .rating[data-rating="5"] .star:before {
    content: "\f005";
  }

  .fa-star-o:before, .star:before, .rating[data-rating="4"] .star:last-child:before {
    content: "\f006";
  }

  .fa-star-half:before {
    content: "\f089";
  }
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
    div.stars {
      width: 270px;
      /*display: inline-block;*/
    }

    input.star { display: none; }

    label.star {
      float: right;
      padding: 10px;
      font-size: 36px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }

    #leftPanel{
      background-color:#0079ac;
      color:#fff;
      text-align: center;
    }

    #rightPanel{
      min-height:415px;
    }


    /* Credit to bootsnipp.com for the css for the color graph */
    .colorgraph {
    height: 5px;
    border-top: 0;
    background: #c4e17f;
    border-radius: 5px;
    background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
    .animated {
       -webkit-transition: height 0.2s;
       -moz-transition: height 0.2s;
       transition: height 0.2s;
    }

    .stars
    {
       font-size: 24px;
       color: #d17581;
    }


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
                <!-- BEGIN PROPERTY DETAILS-->
                <div class="property">
                  <div class="rating" data-rating="{{$ratingkos}}">
                    <div class="star staruser"></div>
                    <div class="star staruser"></div>
                    <div class="star staruser"></div>
                    <div class="star staruser"></div>
                    <div class="star staruser"></div>
                  </div>
                  <h1 class="property__title">{{ $kos2->judul }} ({{$kos2->tipe}})<span class="property__city">{{ $kos2->getKecamatan() }}</span></h1>
                  <div class="property__header">
                    <div class="property__price"><strong class="property__price-value"> Rp. {{ $kos2->harga }} </strong></div>
                    <div class="property__actions">
                      <a href="{{route('depan.pm',['sender_id'=>Auth::user()->id, 'receiver_id'=>$kos2->user_id])}}"><button type="button" class="btn--default"><i class="fa fa-star"></i>Kirim Pesan</button></a>
                    </div>
                    @if (Auth::check())
                      @if ($kos2->user_id == Auth::user()->id)
                        <div class="property__actions" style="float:right">
                          <form action="{{route('rumahkos.destroy',['id'=>$kos2->id])}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" name="submit" class="btn--default"><i class="fa fa-close"></i>Hapus Kos</button>
                          </form>
                        </div>
                        <div class="property__actions">
                          <a href="{{route('rumahkos.edit',['id'=>$kos2->id])}}">
                            <button type="button" class="btn--default"><i class="fa fa-pencil"></i>Edit Kos</button>
                          </a>
                        </div>
                      @endif
                    @endif
                    @php
                      $kamartersedia = App\Kamar::where('kos_id',$kos2->id)->where('status',0)->count();
                    @endphp
                    <h3>Jumlah Kamar Kos : {{$kos2->jumlahkamar}} dan Jumlah Kamar Kos Kosong : {{ $kamartersedia }}</h3>
                  </div>
                  <div class="clearfix"></div>
                  <img src="{{ asset('uploads/foto') }}/{{$kos2->foto}}" alt="">
                  <br><br>
                  <div class="property__plan">
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon">
                        <svg>
                          <use xlink:href="#icon-area"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title">Luas Kamar</dd>
                      <dd class="property__plan-value">{{ $kos2->luaskamar }}</dd>
                    </dl>
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon property__plan-icon--window">
                        <svg>
                          <use xlink:href="#icon-window"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title">Tersedia AC ?</dd>
                      <dd class="property__plan-value">{{$kos2->ac}}</dd>
                    </dl>
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon property__plan-icon--bathrooms">
                        <svg>
                          <use xlink:href="#icon-geolocation"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title">Tersedia Wifi ?</dd>
                      <dd class="property__plan-value">{{$kos2->wifi}}</dd>
                    </dl>
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon">
                        <svg>
                          <use xlink:href="#icon-bathrooms"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title">Letak Kamar Mandi ?</dd>
                      <dd class="property__plan-value">{{$kos2->kamarmandi}}</dd>
                    </dl>
                    <dl class="property__plan-item">
                      <dt class="property__plan-icon property__plan-icon--garage">
                        <svg>
                          <use xlink:href="#icon-garage"></use>
                        </svg>
                      </dt>
                      <dd class="property__plan-title">Tersedia Garasi?</dd>
                      <dd class="property__plan-value">{{$kos2->garasi}}</dd>
                    </dl>
                  </div>
                  <div class="property__params">
                  </div>
                  <div class="property__description js-unhide-block">
                    <h4 class="property__subtitle">Description</h4>
                    <div class="property__description-wrap">
                      <p>{{ $kos2->isi }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="property__description js-unhide-block">
                    <h4 class="property__subtitle">Lokasi pada Google Maps</h4>
                    <div id="map-permanent"></div>
                  </div>
                  <div class="property__description js-unhide-block">
                    <h4 class="property__subtitle">Kamar Kos</h4>
                      <table class="table table-hovered">
                        <thead>
                          <tr>
                            <th>Nomor Kamar</th>
                            <th>Nama Penyewa</th>
                            <th>Status</th>
                            <th>Pesan Kamar Kos</th>
                            @if (Auth::user()->id == $kos2->user_id)
                              <th>Hapus</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($kamars as $kamar)
                            <tr>
                              <td>{{$kamar->nomorkamar}}</td>
                              @if ($kamar->status == 0)
                                <td>Belum Ada Pemesan</td>
                                <td>Tersedia</td>
                                <td><a href="{{route('kos.orderkos.tambah', ['kos' => $kos2->id, 'kamar'=>$kamar->id])}}" class="btn btn-success">Pesan</a></td>
                                @if (Auth::user()->id == $kos2->user_id)
                                  <td><a href="#" class="btn btn-danger disabled">Hapus</a></td>
                                @endif
                              @else
                                <td>{{$kamar->getNama()}}</td>
                                <td>Tidak Tersedia</td>
                                <td><a href="{{route('kos.orderkos.tambah', ['kos' => $kos2->id, 'kamar'=>$kamar->id])}}" class="btn btn-success disabled">Pesan</a></td>
                                @if (Auth::user()->id == $kos2->user_id)
                                  <td>
                                    <form action="{{route('kos.orderkos.hapuspemesan',['id'=>$kamar->id])}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="submit" name="submit" value="Hapus" class="btn btn-danger">
                                    </form>
                                  </td>
                                @endif
                              @endif
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  <hr>
                  @if(Auth::user()->id == $kos2->user_id)
                  <div class="property__description js-unhide-block">
                    <h4 class="property__subtitle">Request Pemesanan Kamar Kos</h4>
                      <table class="table table-hovered">
                        <thead>
                          <tr>
                            <th>Nama Penyewa</th>
                            <th>Nomor HP</th>
                            <th>Nomor Kamar</th>
                            <th>Kirim Pesan</th>
                            <th>Terima</th>
                            <th>Tolak</th>
                          </tr>
                        </thead>
                        <tbody>
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
                  </div>
                  <hr>
                  @endif
                  <div class="widget js-widget widget--details">
                    <div class="widget__content">
                      <div data-sr="enter bottom move 80px, scale(0), over 0s" data-animate-end="animate-end" class="worker js-unhide-block vcard worker--list worker--details">
                        <div class="worker__photo"><a href="/profil/{{$kos2->user_id}}" class="item-photo item-photo--static"><img src="{{asset('uploads/user') }}/{{$kos2->getAvatar()}}" alt="Christopher Pakulla" class="photo"/>
                            <figure class="item-photo__hover"></figure></a></div>
                        <div class="worker__intro">
                          <div class="worker__intro-head">
                            <div class="worker__intro-name">
                              <h3 class="worker__name fn">{{$kos2->getNama()}}</h3>
                              <div class="worker__post">{{$kos2->getAlamat()}}</div>
                            </div>

                            <!-- end of block .worker__listings-->
                          </div>
                          <button type="button" class="worker__show js-unhide">Contact agent</button>
                          <div class="worker__intro-row">
                            <div class="worker__intro-col">
                              <div class="worker__contacts">
                                <div class="tel"><span class="type">Email : </span><a href="#" class="uri value">{{$kos2->getEmail()}}</a></div>
                                <div class="tel"><span class="type">No HP : </span><a href="#" class="uri value">{{$kos2->getNohp()}}</a></div>
                                <div class="email"><span class="type">No KTP : </span><a href="#" class="uri value">{{$kos2->getNoktp()}}</a></div>
                              </div>
                              <!-- end of block .worker__contacts-->
                            </div>
                          </div>

                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <!-- end of block .worker-->
                      <form action="{{route('komentarkos.store')}}" method="POST" class="form form--flex form--property-agent js-contact-form form--properties">
                        {{csrf_field()}}
                        <input type="hidden" name="kos_id" value="{{$kos2->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="row">
                          <div class="form-group form-group--col-4 required">
                            <label for="in-form-name" class="control-label">Nama Lengkap</label>
                            <input id="in-form-name" type="text" name="nama" required class="form-control" value="{{Auth::user()->name}}" readonly>
                          </div>
                          <div class="form-group form-group--col-4">
                            <label for="in-form-phone" class="control-label">Nomor HP</label>
                            <input id="in-form-phone" type="text" name="nohp" class="form-control">
                          </div>
                          <div class="form-group form-group--col-4 required">
                            <label for="in-form-email" class="control-label">E-mail</label>
                            <input id="in-form-email" type="email" name="email" required data-parsley-trigger="change" class="form-control" readonly value="{{Auth::user()->email}}">
                          </div>
                          <div class="form-group required">
                            <label for="in-form-message" class="control-label">Isi Pesan</label>
                            <textarea id="in-form-message" name="isi" required data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message="You need to enter at least a 20 caracters long comment.." class="form-control"></textarea>
                          </div>
                          <div class="stars pull-right clearfix">
                              <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                              <label class="star star-5" for="star-5"></label>
                              <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                              <label class="star star-4" for="star-4"></label>
                              <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                              <label class="star star-3" for="star-3"></label>
                              <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                              <label class="star star-2" for="star-2"></label>
                              <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                              <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>
                        <div class="row">
                          <button type="submit" class="form__submit">Submit</button>
                        </div>
                      </form>
                      <!-- end of block form-->
                      <div class="clearfix"></div>
                      <br>
                      @foreach ($komentar_koses as $komentar)
                      <div class="well">
                        <div class="row">
                          <div class="col-md-2">
                            <img src="{{asset('uploads/user')}}/{{$komentar->getAvatar()}}" alt="" width="100" class="img-circle">
                          </div>
                          <div class="col-md-10">
                            <h3>{{$komentar->nama}}</h3>
                            <div class="rating" data-rating="{{$komentar->getRating()}}">
                              <div class="star"></div>
                              <div class="star"></div>
                              <div class="star"></div>
                              <div class="star"></div>
                              <div class="star"></div>
                            </div>
                            <p>{{$komentar->isi}}</p>
                            @if ($kos2->user_id == Auth::user()->id)
                              <a href="#" class="btn btn-warning pull-right">Kirim Pesan</a>
                            @endif
                          </div>
                      </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <!-- end of block .property-->
                <!-- END PROPERTY DETAILS-->
              </div>
              <!-- BEGIN SIDEBAR-->
              <div class="sidebar">
                <div class="widget js-widget widget--sidebar">
                  <div class="widget__header">
                    <h2 class="widget__title">Filter Kecamatan</h2>
                    <h5 class="widget__headline">Cari Rumah Kos dengan menggunakan filter kecamatan.</h5>
                  </div>
                  <div class="widget__content">
                    <!-- BEGIN SEARCH-->
                      <div class="row">
                        <div class="col-md-12 text-center boxfilter">
                          <a href="/rumahkos/pontianakkota" class="buttonfilter">Pontianak Kota</a>
                        </div>
                        <br><br>
                        <div class="col-md-12 text-center boxfilter">
                          <a href="/rumahkos/pontianakutara" class="buttonfilter">Pontianak Utara</a>
                        </div>
                        <br><br>
                        <div class="col-md-12 text-center boxfilter">
                          <a href="/rumahkos/pontianakselatan" class="buttonfilter">Pontianak Selatan</a>
                        </div>
                        <br><br>
                        <div class="col-md-12 text-center boxfilter">
                          <a href="/rumahkos/pontianakbarat" class="buttonfilter">Pontianak Barat</a>
                        </div>
                        <br><br>
                        <div class="col-md-12 text-center boxfilter">
                          <a href="/rumahkos/pontianaktimur" class="buttonfilter">Pontianak Timur</a>
                        </div>
                        <br><br>
                        <div class="col-md-12 text-center boxfilter">
                          <a href="/rumahkos/pontianaktenggara" class="buttonfilter">Pontianak Tenggara</a>
                        </div>
                      </div>
                    </form>
                    <!-- end of block-->
                    <!-- END SEARCH-->
                  </div>
                </div>
              </div>
              <!-- END SIDEBAR-->
            </div>
          </div>
        </div>
        @endsection

        @section('googlescript')
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
        type="text/javascript"></script>
        <script type="text/javascript">
          var lat = {{$kos2->lat}}
          var lng = {{$kos2->lng}}
          var map = new google.maps.Map(document.getElementById('map-permanent'),{
            center:{
              lat: lat,
              lng: lng
            },
            zoom:15
          });

          var marker = new google.maps.Marker({
            position: {
              lat: lat,
              lng: lng
            },
            map: map,
            draggable: false
          });
        </script>
        @endsection
