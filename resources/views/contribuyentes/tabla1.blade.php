<table class="table table-striped table-bordered table-hover" id="">
                <thead>
                  <th>ID</th>
                  <th>Nombre de contribuyente</th>
                  <th>DUI</th>
                  <th>NIT</th>
                  <th>Edad</th>
                  <th>Dirección</th>
                  <th>Sexo</th>
                  <th>Teléfono</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                    @foreach($contribuyentes as $contribuyente)
                    <tr>
                        <td>{{ $contribuyente->id }}</td>
                        <td>{{ $contribuyente->nombre }}</td>
                        <td>{{ $contribuyente->dui }}</td>
                        <td>{{ $contribuyente->nit }}</td>
                        <td>{{ $contribuyente->nacimiento->age }}</td>
                        <td>{{ $contribuyente->direccion }}</td>
                        <td>{{ $contribuyente->sexo }}</td>
                        <td>{{ $contribuyente->telefono }}</td>
                     <td>
                      {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <a href="{{ url('contribuyentes/'.$contribuyente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Ver</a> |
                        <a href="{{ url('/contribuyentes/'.$contribuyente->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span> Editar</a> | 
                        <button class="btn btn-danger" type="button" onclick={{ "baja(".$contribuyente->id.")" }}><span class="glyphicon glyphicon-trash"></span> Dar de baja</button>
                      {{ Form::close()}} 
                    </td>
                    </tr>
                    @endforeach 
                </tbody>
              </table>