<div class="form-group{{ $errors->has('empleado_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Empleado</label>
    <div class="col-md-6">
        <select name="empleado_id" id="empleado" class="form-control">
            <option value="">Seleccione un empleado</option>
            @foreach($empleados as $empleado)
            <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-default" type="button" id="" data-toggle="modal" data-target="#btnempleado" title="Agregar nuevo empleado"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
</div>

<div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Proyecto</label>
    <div class="col-md-6">
        <select name="proyecto_id" id="proyecto" class="form-control">
            <option value="">Seleccione un proyecto</option>

            @foreach($proyectos as $proyecto)
            <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#formproyecto"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-md-4 control-label">Cargo</label>
    <div class="col-md-6">
        <select name="cargo_id" id="cargo" class="form-control">
            <option value="">Seleccione un cargo</option>
            @foreach($cargos as $cargo)
            <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#formcargo"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
</div>

<div class="form-group{{ $errors->has('salario') ? ' has-error' : '' }}">
    <label for="salario" class="col-md-4 control-label">Salario</label>

    <div class="col-md-6">
        {{ Form::text('salario', null,['class' => 'form-control']) }}
        @if ($errors->has('salario'))
        <span class="help-block">
            <strong>{{ $errors->first('salario') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('funciones') ? ' has-error' : '' }}">
    <label for="funciones" class="col-md-4 control-label">Funciones del cargo</label>

    <div class="col-md-6">
        {!!Form::textarea('funciones',null,['class'=>'form-control','id'=>'funciones','autofocus'])!!}
        @if ($errors->has('funciones'))
        <span class="help-block">
            <strong>{{ $errors->first('funciones') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('motivo_contratacion') ? ' has-error' : '' }}">
    <label for="motivo_contratacion" class="col-md-4 control-label">Motivo de contratación</label>

    <div class="col-md-6">
        {!!Form::text('motivo_contratacion',null,['class'=>'form-control','id'=>'motivo_contratacion','autofocus'])!!}
        @if ($errors->has('motivo_contratacion'))
        <span class="help-block">
            <strong>{{ $errors->first('motivo_contratacion') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('inicio_contrato') ? ' has-error' : '' }}">
    <label for="inicio_contrato" class="col-md-4 control-label">Fecha de inicio</label>

    <div class="col-md-6">
        <?php
        use Carbon\Carbon;
        $date = Carbon::now();
        //$mayor = $date->subYears(18);
        $max = $date->format('Y-m-d');
        ?>
        @if(isset($contratoproyecto))
            {{ Form::date('inicio_contrato', $contratoproyecto->inicio_contrato->format('Y-m-d'),['class' => 'form-control','max' => $max]) }}
        @else
            {{ Form::date('inicio_contrato', null,['class' => 'form-control','max' => $max]) }}
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('fin_contrato') ? ' has-error' : '' }}">
    <label for="fin_contrato" class="col-md-4 control-label">Fecha finalización</label>
    <div class="col-md-6">
        {{Form::date('fin_contrato', null,['class' => 'nacimiento form-control','id'=>'nacimimiento_empleado'])}}
    </div>
</div>

<div class="form-group{{ $errors->has('hora_entrada') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Hora de entrada</label>
    <div class="col-md-6">
        {{Form::time('hora_entrada', null, ['class'=>'form-control','id'=>'hora_entrada','autofocus'])}}
        
    </div>
</div>


<div class="form-group{{ $errors->has('hora_salida') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Hora de salida</label>
    <div class="col-md-6">
        {{Form::time('hora_salida', null, ['class'=>'form-control','id'=>'hora_salida','autofocus'])}}
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btnempleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Empleado
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('empleados.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarempleado" data-dismiss="modal" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="formproyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Proyecto
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('proyectos.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarproyecto" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="formcargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Cargo
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('cargos.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarcargo" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
