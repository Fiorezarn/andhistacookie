<!DOCTYPE html>
<html>
  @include('dashboard.head')
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Andhista Cookie</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->
      @include('dashboard.sidebar')
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title')
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          @yield('content')
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id Pesanan</th>
                    <th>Id User</th>
                    <th>Nama Penerima</th>
                    <th>Nama Kue</th>
                    <th>Total Item</th>
                    <th>Total Harga</th>
                    <th>Alamat</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($order as $item)
              <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->id_user}}</th>
                    <th>{{$item->namapenerima}}</th>
                    <th>{{$item->namakue}}</th>
                    <th>{{$item->totalitem}}</th>
                    <th>{{$item->totalharga}}</th>
                    <th>{{$item->alamat}}</th>
                    <th><img src="{{url('buktipembayaran/',$item->buktipembayaran)}}" width="100px"></th>
                    <th>{{$item->status_pembayaran}}</th>
                    {{-- <td>
                        <div class="btn-group">
                          <button type="button" class="btn
                            @if ($item->status_pembayaran == 'Menunggu Pembayaran') btn-warning
                            @elseif ($item->status_pembayaran == 'Pembayaran Diterima') btn-secondary
                            @elseif ($item->status_pembayaran == 'Pembayaran Ditolak') btn-success
                            @endif
                            btn-sm dropdown-toggle py-0 px-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if ($item->status_pembayaran == 'Menunggu Pembayaran')
                            Menunggu Pembayaran
                            @elseif ($item->status_pembayaran == 'Pembayaran Diterima')
                            Pembayaran Diterima
                            @elseif ($item->status_pembayaran == 'Pembayaran Ditolak')
                            Pembayaran Ditolak
                          </button>
                          
                          <div class="dropdown-menu">
                            <form action="{{ route('update', $item->first()->id) }}" method="POST" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <button type="submit" name="status" value="Menunggu Pembayaran" class="dropdown-item"  {{ $item->status_pembayaran === 'Menunggu Pembayaran' ? 'selected' : '' }} >Menunggu Pembayaran</button>
                                <button type="submit" name="status" value="Pembayaran Diterima" class="dropdown-item"  {{ $item->status_pembayaran === 'Pembayaran Diterima' ? 'selected' : '' }}>Pembayaran Diterima</button>
                                <button type="submit" name="status" value="Pembayaran Ditolak" class="dropdown-item"  {{ $item->status_pembayaran === 'Pembayaran Ditolak' ? 'selected' : '' }}>Pembayaran Ditolak</button>
                            </form>
                          </div>
                        </div>
                      </td> --}}
                    <th>
                    <a href="/daftarpesanan/detail/{{ $item->id }}" class="btn btn-sm btn-success">Detail</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id}}">
                      Delete
                    </button>
                  </th>
              </tr>
              @endforeach
          </tbody>
        </table>
        @foreach ($order as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id}}">
              <div class="modal-dialog modal-sm" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{$data->namapenerima }}</h4>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Pesanan Ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">No</button>
                    <a href="/daftarpesanan/delete/{{ $data->id}}" class="btn btn-outline">Yes</a>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        @endforeach
        </section>
      </div>
      <!-- <footer class="main-footer">
        <strong>Batary 2023.</strong> All rights reserved.
      </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      
        <!-- /.control-sidebar-menu -->

        
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('dashboard.script')
</body>
</html>
