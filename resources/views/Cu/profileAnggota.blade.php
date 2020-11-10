@extends('_layouts.layoutAnggota')
@section('css')

@stop

@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
      @foreach($profileAnggotas as $pa)				  
    	<div class="row clearfix">
		    <div class="col-md-12"> 
          <div class="heading-block border-0">
            <h3>{{ $pa-> name}}</h3>
            <span>Data Pribadi</span>
          </div>

					<div class="clear"></div>

					<div class="row clearfix">
						<div class="col-lg-12">
              <div class="tabs tabs-alt clearfix" id="tabs-profile">
								<div class="tab-container">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                  </div>
                @endif
								  <div class="row">
								    <div class="col-md-6 panel panel-primary"><div class="panel-heading">
								      <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;
								    </div>
								    <div class="panel-body">
                      <div class="table-responsive"><table class="table table-condensed" id="" width="100%" >			
                        <tbody>
                          <tr>
                            <td class id width align="1" valign="top"><strong>NIK</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="nik" value="{{ $pa->nik }}">{{ $pa->nik }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>NPWP</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="npwp" value="{{ $pa->npwp }}">{{ $pa->npwp }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Nama Lengkap</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="name" value="{{ $pa->name }}">{{ $pa->name }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Tempat Lahir</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="tempat_lahir" value="{{ $pa->tempat_lahir }}">{{ $pa->tempat_lahir }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Tanggal Lahir</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="tanggal_lahir" value="{{ $pa->tanggal_lahir }}">{{ $pa->tanggal_lahir }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Jenis Kelamin</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="kelamin" value="{{ $pa->kelamin }}">{{ $pa->kelamin }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Agama</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="agama" value="{{ $pa->agama }}">{{ $pa->agama }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Status</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="status" value="{{ $pa->status }}">{{ $pa->status }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Status Jalinan</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="status_jalinan" value="{{ $pa->status_jalinan }}">{{ $pa->status_jalinan }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Alamat</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="alamat" value="{{ $pa->alamat }}">{{ $pa->alamat }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>RT</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="rt" value="{{ $pa->rt }}">{{ $pa->rt }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>RW</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="rw" value="{{ $pa->rw }}">{{ $pa->rw }}</td>
                          </tr>

                          <tr>
                            <td class id width align="1" valign="top"><strong>Kontak</strong></td>
                            <td class id width="2%" align="center">:</td>
                            <td class id width align="1" valign="top" id="kontak" value="{{ $pa->kontak }}">{{ $pa->kontak }}</td>
                          </tr>
                        </tbody>
                      </div>
                    </div>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

		      <div class="col-md-6 panel panel-primary">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-condensed" id="" width="100%" >
                  <tr>
                    <td class id width align="1" valign="top"><strong>Email</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="email" value="{{ $pa->email }}">{{ $pa->email }}</td>
                  </tr>
                          
                  <tr>
                    <td class id width align="1" valign="top"><strong>No. HP</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="hp" value="{{ $pa->hp }}">{{ $pa->hp }}</td>
                  </tr>

                  <tr>
                    <td class id width align="1" valign="top"><strong>Golongan Darah</strong></td>
                    <td class id width="2%" align="center">:</td>
                    <td class id width align="1" valign="top" id="darah" value="{{ $pa->darah }}">{{ $pa->darah }}</td>
                  </tr>
                    
                  <tr>
                    <td class id width align="1" valign="top"><strong>Tinggi</strong></td>
                    <td class id width="2%" align="center">:</td>
                    <td class id width align="1" valign="top" id="tinggi" value="{{ $pa->tinggi }}">{{ $pa->tinggi }}</td>
                  </tr>		         
                          
                  <tr>
                    <td class id width align="1" valign="top"><strong>Pendidikan</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="pedidikan" value="{{ $pa->pendidikan }}">{{ $pa->pendidikan }}</td>
                  </tr>

                  <tr>
                    <td class id width align="1" valign="top"><strong>Jabatan</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="tinggi" value="{{ $pa->tinggi }}">{{ $pa->tinggi }}</td>
                  </tr>

                  <tr>
                    <td class id width align="1" valign="top"><strong>Organisasi</strong></td>
                    <td class id width="2%" align="center">:</td>
                    <td class id width align="1" valign="top" id="organisai" value="{{ $pa->organisasi }}">{{ $pa->organisasi }}</td>
                  </tr>
                  
                  <tr>
                    <td class id width align="1" valign="top"><strong>Lembaga</strong></td>
                    <td class id width="2%" align="center">:</td>
                    <td class id width align="1" valign="top" id="lembaga" value="{{ $pa->lembaga }}">{{ $pa->lembaga }}</td>
                  </tr>
                  
                  <tr>
                    <td class id width align="1" valign="top"><strong>Ahli Waris</strong></td>
                    <td class id width="2%" align="center">:</td>
                    <td class id width align="1" valign="top" id="ahli_waris" value="{{ $pa->ahli_waris }}">{{ $pa->ahli_waris }}</td>
                  </tr>
                                                    
                  <tr>
                    <td class id width align="1" valign="top"><strong>No. Kartu Keluarga</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="kartu_keluarga" value="{{ $pa->kk }}">{{ $pa->kk }}</td>
                  </tr>

                  <tr>
                    <td class id width align="1" valign="top"><strong>Nama Ibu</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="nama_ibu" value="{{ $pa->nama_ibu }}">{{ $pa->nama_ibu }}</td>
                  </tr>

                  <tr>
                    <td class id width align="1" valign="top"><strong>Pekerjaan</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="pekerjaan" value="{{ $pa->pekerjaan }}">{{ $pa->pekerjaan }}</td>
                  </tr>

                  <tr>
                    <td class id width align="1" valign="top"><strong>Suku</strong></td>
                    <td class id width="2%" align="center">:</td>
						        <td class id width align="1" valign="top" id="suku" value="{{ $pa->suku }}">{{ $pa->suku }}</td>
                  </tr>
						    </tbody>
						  </table>
						</div>
				  </div>
				</div>

        <!----EDIT BUTTON ---->
        <tr>
          <td colspan="3">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModaleditedit-form1">&nbsp;
              <span class="" aria-hidden="true">EDIT</span>&nbsp;
            </button>
                            
            
          </td>
        </tr>
			</div>
      @endforeach
    </div>
  </div>
</section>
@stop

@section('js')

@stop

<!----FORM EDIT ---->
<form method="post" action="/updateProfile">
@csrf
  <div class="modal fade" id="myModaleditedit-form1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
            &times;
            </span>
          </button>

          <h4 class="modal-title" id="myModalLabel">
            <blockquote>EDIT DATA PROFILE</blockquote>
          </h4>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" class="form-control" size="20" id="nik" name="nik" placeholder="-" value="{{ $pa->nik }}">
          </div>

          <div class="form-group">
            <label for="npwp">NPWP</label>
            <input type="number" class="form-control" size="20" id="npwp" name="npwp" placeholder="-" value="{{ $pa->npwp }}">
          </div>
  
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" size="20" id="name" name="name" placeholder="-" value="{{ $pa->name }}">
          </div>

          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" size="20" id="tempat_lahir" name="tempat_lahir" placeholder="-" value="{{ $pa->tempat_lahir }}">
          </div>

          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" size="20" id="tanggal_lahir" name="tanggal_lahir" placeholder="-" value="{{ $pa->tanggal_lahir }}">
          </div>

          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" size="20" id="kelamin" name="kelamin" placeholder="-" value="{{ $pa->kelamin }}">
          </div>

          <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" class="form-control" size="20" id="agama" name="agama" placeholder="-" value="{{ $pa->agama }}">
          </div>

          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" size="20" id="status" name="status" placeholder="-" value="{{ $pa->status }}">
          </div>

          <div class="form-group">
            <label for="status_jalinan">Status Jalinan</label>
            <input type="text" class="form-control" size="20" id="status_jalinan" name="status_jalinan" placeholder="-" value="{{ $pa->status_jalinan }}">
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" size="20" id="alamat" name="alamat" placeholder="-" value="{{ $pa->alamat }}">
          </div>

          <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" class="form-control" size="20" id="kontak" name="kontak" placeholder="-" value="{{ $pa->kontak }}">
          </div>

          <div class="form-group">
            <label for="darah">Golongan Darah</label>
            <input type="text" class="form-control" size="20" id="darah" name="darah" placeholder="-" value="{{ $pa->darah }}">
          </div>

          <div class="form-group">
            <label for="tinggi">Tinggi Badan</label>
            <input type="text" class="form-control" size="20" id="tinggi" name="tinggi" placeholder="-" value="{{ $pa->tinggi }}">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" size="20" id="email" name="email" placeholder="-" value="{{ $pa->email }}">
          </div>

          <div class="form-group">
            <label for="hp">No. HP</label>
            <input type="text" class="form-control" size="20" id="hp" name="hp" placeholder="-" value="{{ $pa->hp }}">
          </div>

          <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" class="form-control" size="20" id="pendidikan" name="pendidikan" placeholder="-" value="{{ $pa->pendidikan }}">
          </div>

          <div class="form-group">
            <label for="organisasi">Organisasi</label>
            <input type="text" class="form-control" size="20" id="organisasi" name="organisasi" placeholder="-" value="{{ $pa->organisasi }}">
          </div>

          <div class="form-group">
            <label for="lembaga">Lembaga</label>
            <input type="text" class="form-control" size="20" id="lembaga" name="lembaga" placeholder="-" value="{{ $pa->lembaga }}">
          </div>

          <div class="form-group">
            <label for="ahli_waris">Ahli Waris</label>
            <input type="text" class="form-control" size="20" id="ahli_waris" name="ahli_waris" placeholder="-" value="{{ $pa->ahli_waris }}">
          </div>

          <div class="form-group">
            <label for="rt">RT</label>
            <input type="text" class="form-control" size="20" id="rt" name="rt" placeholder="-" value="{{ $pa->rt }}">
          </div>

          <div class="form-group">
            <label for="rw">RW</label>
            <input type="text" class="form-control" size="20" id="rw" name="rw" placeholder="-" value="{{ $pa->rw }}">
          </div>

          <div class="form-group">
            <label for="kk">No. Kartu Keluarga</label>
            <input type="text" class="form-control" size="20" id="kk" name="kk" placeholder="-" value="{{ $pa->kk }}">
          </div>

          <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" class="form-control" size="20" id="nama_ibu" name="nama_ibu" placeholder="-" value="{{ $pa->nama_ibu }}">
          </div>

          <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <select class="form-control" id="pekerjaan" name="pekerjaan">
                <option value="{{ $pa->pekerjaan }}" hidden>{{ $pa->pekerjaan }}</option>
                @foreach ( $pekerjaans as $pekerjaan )
                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->name }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="suku">Suku</label>
            <select class="form-control" id="suku" name="suku">
                <option value="{{ $pa->suku }}" hidden>{{ $pa->suku }}</option>
                @foreach ( $sukus as $suku )
                    <option value="{{ $suku->id }}">{{ $suku->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" type="submit" name="edit" value="UPDATE">SAVE</button>
          <button type="reset" class="btn btn-primary btn-sm" name="edit" value="RESET">RESET</button>
          &nbsp;&nbsp;
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CLOSE</button>
        </div>
      </div>
    </div>
  </div>
</form>