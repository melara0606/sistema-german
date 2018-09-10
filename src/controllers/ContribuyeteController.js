module.exports =  ["$scope", '$compile', 'DTOptionsBuilder', 'DTColumnBuilder', 'Restangular', '$uibModal', 'toastr', function ($scope, $compile, DTOptionsBuilder, DTColumnBuilder, Restangular, $uibModal, toastr) {
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

  // para la creacion del nuevo contribuyente
  $scope.openModalContribuyente = () => {
    let open = $uibModal.open({
      template: require('html-loader!../templates/contribuyente/modalCreateAddContribuyente.html'),
      controller: function ($scope, $uibModalInstance) {
        $scope.people = {};
        $scope.cerrar = () => $uibModalInstance.close({ })

        $scope.onSaveContribuyente = () => {
          Restangular.all('contribuyentes').customPOST({
            object: $scope.people
          }).then(j => {
            if(j.response){
              $uibModalInstance.close({
                obj: j.data,
                resp: j.response
              })
              toastr.success(j.message, 'Exito')              
            }else{
              toastr.error(j.message, 'Error')
              $uibModalInstance.close({ resp: false })
            }
          })
        }
      }
    })

    open.result.then(obj => {
      if(obj.resp){
        
      }
    })
  }
}]