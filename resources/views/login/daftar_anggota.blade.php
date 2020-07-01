@extends('login.layout_login')

@section('content')
 <div class="login-box">
  <div class="login-logo">
  	<b>Daftar Menjadi Anggota </b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->
       {{ show_alert()}}

      <form action="{{ url('/daftar/anggota-act') }}" method="post">
        {{ csrf_field() }}
 		{{ method_field('POST') }}
		 <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama" name="nama" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-book"></span>
            </div>
          </div>
          @if($errors->has('nama'))
			<div class="text-danger">
			    {{ $errors->first('nama')}}
			</div>
		 @endif
        </div>
		

         <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="NIK" name="nik" maxlength="16" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
           
        </div>
         @if($errors->has('nik'))
                <div class="text-danger">
                    {{ $errors->first('nik')}}
                </div>
            @endif
         <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Alamat KTP" name="alamat" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-road"></span>
            </div>
          </div>
           @if($errors->has('alamat'))
                <div class="text-danger">
                    {{ $errors->first('alamat')}}
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            <select class="form-control" name="kelamin" required="required">
              <option value="">Jenis Kelamin</option>
              <option value="laki-laki">Laki - Laki</option>
              <option value="perempuan">Perempuan</option>
            </select> 
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-venus-mars"></span>
            </div>
          </div>
           @if($errors->has('kelamin'))
                <div class="text-danger">
                    {{ $errors->first('kelamin')}}
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Nomor HP" name="kontak" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
           @if($errors->has('kontak'))
                <div class="text-danger">
                    {{ $errors->first('kontak')}}
                </div>
            @endif
        </div>


        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		@if($errors->has('username'))
		    <div class="text-danger">
		        {{ $errors->first('username')}}
		    </div>
		@endif
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           @if($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password')}}
                </div>
            @endif
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12 ">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
 

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box --> 
@endsection