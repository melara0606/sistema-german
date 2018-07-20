module.exports =  ["$scope", '$compile', 'DTOptionsBuilder', 'DTColumnBuilder', 'Restangular', function ($scope, $compile, DTOptionsBuilder, DTColumnBuilder, Restangular) {
  $scope.dtOptions = DTOptionsBuilder
   .fromSource('api/contribuyentes')
   .withOption('createdRow', createdRow)
   .withPaginationType('full_numbers')

  $scope.dtColumns =  [
    DTColumnBuilder.newColumn('id').withTitle('Id'),
    DTColumnBuilder.newColumn('nombre').withTitle('Nombre'),
    DTColumnBuilder.newColumn('telefono').withTitle('Telefono'),
    DTColumnBuilder.newColumn('dui').withTitle('DUI').notSortable(),
    DTColumnBuilder.newColumn('nit').withTitle('NIT').notSortable(),
    DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
    .renderWith(actionsHtml)
  ]

  function createdRow(row, data, dataIndex) {
    $compile(angular.element(row).contents())($scope);
  }

 $scope.DarBajaStudent = (id, estado) => {
   Restangular.all('contribuyentes').customDELETE(id, {
    estado: (estado == 1) ? 0 : 1
  }).then(response => {

  })
 }

 function actionsHtml(data, type, full, meta) {
  return `
   <div class='btn-group text-align'>
    <a ui-sref="app.contribuyenteitem({ id: ${data.id} })" class='btn btn-warning'><i class="fa fa-eye"></i></a>
   </div>
  `;
 }
}]

/**
  <button class='btn btn-success'><i class="fa fa-edit"></i></button>
  <button class='btn btn-danger' ng-click='DarBajaStudent(${data.id}, ${data.estado})'>
    <i class="fa fa-trash-o"></i>
  </button>
*/