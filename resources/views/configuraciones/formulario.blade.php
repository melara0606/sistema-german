<div id="form-configuracion">
      <h3>Datos generales de la alcaldía</h3>
      <section>
        <div class="panel panel-default">
          <div class="panel-body">

            @if($configuraciones != null)
              {{ Form::model($configuraciones, array('method' => 'put', 'class' => 'form-horizontal' , 'route' => array('configuraciones.ualcaldia', $configuraciones->id))) }}
            @else
              {{ Form::open(['action'=> 'ConfiguracionController@alcaldia', 'class' => 'form-horizontal']) }}
            @endif
            @include('configuraciones.alcaldia')
            @if($configuraciones != null)
              <div class="form-group">
    						<div class="col-md-6 col-md-offset-4">
    							<button type="submit" class="btn btn-success">
    								<span class="glyphicon glyphicon-floppy-disk">Modificar</span>
    							</button>
    						</div>
    					</div>
            @else
  					<div class="form-group">
  						<div class="col-md-6 col-md-offset-4">
  							<button type="submit" class="btn btn-success">
  								<span class="glyphicon glyphicon-floppy-disk">Registrar</span>
  							</button>
  						</div>
  					</div>
          @endif

          {{Form::close()}}
          </div>
        </div>
      </section>
      <h3>Logo</h3>
      <section>
        <div class="panel panel-default">
          <div class="panel-body">
            <h1>Logo alcaldia</h1>
    				<img src="{{ asset('avatars/'.Auth::user()->avatar) }}" width="150" height="200" class="user-image" alt="User Image">
    				<form method='post' action='{{url("configuraciones/logo")}}' enctype='multipart/form-data'>
    					{{csrf_field()}}
    					<div class='form-group'>
    						<label for='image'>Imagen: </label>
    						<input type="file" name="logo" />
    						<div class='text-danger'>{{$errors->first('avatar')}}</div>
    					</div>
    					<button type='submit' class='btn btn-primary'>Cambiar</button>
    				</form>
          </div>
        </div>
      </section>
      <h3>Datos personales del alcalde</h3>
      <section>
        <div class="panel panel-default">
          <div class="panel-body">
            @if($configuraciones != null)
              {{ Form::model($configuraciones, array('method' => 'put', 'class' => 'form-horizontal' , 'route' => array('configuraciones.ualcalde', $configuraciones->id))) }}
            @else
              {{ Form::open(['action'=> 'ConfiguracionController@alcalde', 'class' => 'form-horizontal']) }}
            @endif
            @include('configuraciones.alcalde')
            @if($configuraciones != null)
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-floppy-disk">Modificar</span>
                  </button>
                </div>
              </div>
            @else
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-floppy-disk">Registrar</span>
                </button>
              </div>
            </div>
          @endif
          {{Form::close()}}
          </div>
        </div>
      </section>
  </div>
