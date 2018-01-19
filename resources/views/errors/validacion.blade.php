@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable" role="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
