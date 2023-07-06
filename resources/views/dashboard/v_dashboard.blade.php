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
              <li class="dropdown tasks-menu">
                <a href="#">
                  <ul class="dropdown-menu">
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                        <li><!-- Task item --></li>
                        <!-- end task item -->
                      </ul>
                    </li>
                  </ul>
                </a>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('template/') }}/dist/img/user1.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <!-- Menu Body -->
                  <!-- /.row -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    {{-- <form action="{{ route('logout') }}" method="POST"> --}}
                      @csrf
                      <button type="submit" class="dropdown-item">
                        Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
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
          <a href="/admin/add" class="btn btn-primary btn-sm">Add</a> <br>
            @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{session('pesan')}}
            </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Produk</th>
                        <th>Nama Kue</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Foto</th>
                        <th width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($product as $item)
                  <tr>
                      <th>{{ $item->no }}</th>
                      <th>{{ $item->id }}</th>
                      <th>{{ $item->namakue }}</th>
                      <th>{{ $item->deskripsi }}</th>
                      <th>{{ $item->harga }}</th>
                      <th>{{ $item->stock }}</th>
                      <td><img src="{{url('fotokue/',$item->photo)}}" width="100px"></td>
                      <th>
                        <a href="/admin/detailproduk/{{ $item->id }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/admin/edit/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id}}">
                          Delete
                        </button>
                      </th>
                  </tr>
                  @endforeach
              </tbody>
            </table>
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
