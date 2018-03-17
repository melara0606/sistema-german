<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type">
  <style>

    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; text-align: center }
    #footer .page:after { content: counter(page); }
  </style>
</head><body>
@yield('reporte')
</body>
</html>
