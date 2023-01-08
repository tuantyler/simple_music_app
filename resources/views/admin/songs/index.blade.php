@extends('admin.layouts.layout1')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <button class="btn btn-success">Thêm bài hát mới</button>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên bài hát</th>
                  <th>Hình bài hát</th>
                  <th>Ca sĩ</th>
                  <th>Nghe</th>
                  <th>Lượt thích</th>
                  <th>Album</th>
                  <th>Thể loại</th>
                  <th>Playlist</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($songs as $index => $song)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$song->TenBaiHat}}</td>
                    <td>
                        <img src="{{$song->HinhBaiHat}}" height="80" width="80"/>
                    </td>
                    <td>{{$song->Casi}}</td>
                    <td>   
                        <div class="audio-player" data-src="{{$song->LinkBaiHat}}"></div>
                    </td>
                    <td>{{$song->LuotThich}}</td>
                    <td>{{$song->TenAlbum ?? 'Không có'}}</td>
                    <td>{{$song->TenTheLoai ?? 'Không có'}}</td>    
                    <td>{{$song->Ten ?? 'Không có'}}</td>  
                    <td>
                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>  
                </tr>
                @endforeach

              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('extras')
    @include('admin.layouts.musicplayer')
@endsection
