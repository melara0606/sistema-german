<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta charset="utf-8">
<head><meta http-equiv="Content-Type">
  <style>

    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; text-align: center }
    #footer .page:after { content: counter(page); }
    #comparativo th{font-size: 80%;}
    #comparativo td{font-size: 70%;}
  </style>
</head><body>
@yield('reporte')
</body>
</html>
