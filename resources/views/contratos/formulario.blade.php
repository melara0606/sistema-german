<div class="form-group{{ $errors->has('empleado_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Empleado</label>
    <div class="col-md-6">
        <select name="empleado_id" id="empleado" class="form-control">
            <option value="">Seleccione un empleado</option>
        </select>
        @if ($errors->has('empleado_id'))
        <span class="help-block">
            <strong>{{ $errors->first('empleado_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-2">
        <button class="btn btn-default" type="button" id="" data-toggle="modal" data-target="#btnempleado" title="Agregar nuevo empleado"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
</div>

<div class="form-group{{ $errors->has('tipocontrato_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Contrato</label>
    <div class="col-md-6">
        <select name="tipocontrato_id" id="tipocontrato" class="form-control">
            <option value="">Seleccione un tipo de contrato</option>
        </select>
        @if ($errors->has('tipocontrato_id'))
        <span class="help-block">
            <strong>{{ $errors->first('tipocontrato_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#formtipo"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-md-4 control-label">Cargo</label>
    <div class="col-md-6">
        <select name="cargo_id" id="cargo" class="form-control">
            <option value="">Seleccione un cargo</option>
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
        {{ Form::textarea('funciones', null,['class'=>'form-control']) }}
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
        {{ Form::text('motivo_contratacion', null,['class'=>'form-control']) }}
        @if ($errors->has('motivo_contratacion'))
        <span class="help-block">
            <strong>{{ $errors->first('motivo_contratacion') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('inicio_contrato') ? ' has-error' : '' }}">

    <label for="" class="col-md-4 control-label">Fecha de inicio</label>
    <div class="col-md-4">
        {{Form::date('inicio_contrato',null,['class'=>'form-control','id'=>'inicio_contrato','autofocus'])}}
    </div>
</div>

<div class="form-group{{ $errors->has('fin_contrato') ? ' has-error' : '' }}">
    <label for="fin_contrato" class="col-md-4 control-label">Fecha finalización</label>
    <div class="col-md-4">
        {{Form::date('fin_contrato', null,['class' => 'form-control','id'=>'fin_contrato','autofocus'])}}
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

<div class="form-group{{ $errors->has('fecha_aprobacion') ? ' has-error' : '' }}">

    <label for="" class="col-md-4 control-label">Fecha de aprobación</label>
    <div class="col-md-6">
        {{Form::date('fecha_aprobacion',null,['class'=>'form-control','id'=>'fecha_aprobacion','autofocus'])}}
    </div>
</div>

<div class="form-group{{ $errors->has('fecha_revision') ? ' has-error' : '' }}">

    <label for="" class="col-md-4 control-label">Fecha de revisión</label>
    <div class="col-md-6">
        {{Form::date('fecha_revision',null,['class'=>'form-control','id'=>'fecha_revision','autofocus'])}}
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

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="formtipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Tipo de contrato
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('tipocontratos.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardartipo" data-dismiss="modal" class="btn btn-success">Agregar</button>
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
