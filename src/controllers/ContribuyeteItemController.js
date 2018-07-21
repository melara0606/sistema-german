module.exports =  ["$scope", 'people', 'Restangular', '$uibModal', 'toastr', function ($scope, people, Restangular, $uibModal, toastr) {
 $scope.people = people;

  let darBajaFunction = (id, motivo, estado) => {
    return Restangular.all('contribuyentes')
      .customPOST({
        id,
        motivo: motivo,
        estado: (estado ? 0 : 1)
      },'darBajaContribuyente')
  }

  let cerrarModal = ($uibModalInstance) => {
    $uibModalInstance.close({ response: false })
  }

  $scope.onModalBajaContribuyente = (people) => {
    if(people.estado == 1){
      let open = $uibModal.open({
        resolve: { people: () => people },
        template: require('html-loader!../templates/contribuyente/modalDarBajaContribuyente.html'),
        controller: ($scope, Restangular, people, $uibModalInstance) => {
          $scope.people = people;
          $scope.cerrar = () => { cerrarModal($uibModalInstance) }
  
          $scope.onDarBaja = () => {
            darBajaFunction(people.id, $scope.motivo, $scope.people.estado)
            .then(json => {
              if(json.response) {
                $uibModalInstance.close({
                  people : json.data,
                  response: true
                });
                toastr.info('baja al contribuyente', 'baja')
              }
            });
          }
        }
      });
  
      open.result.then( res => {
        if(res.response)
          $scope.people.estado = 0
      })
    }else{
      darBajaFunction(people.id, '', people.estado).then(json => {
        $scope.people.estado = 1
        toastr.info('activo al contribuyente', 'activo contribuyente')
      })
    }
  }

 $scope.onDeleteBaja = (item) => {
  let estado = (item.estado == 1) ? 0 : 1
  Restangular.all('inmuebles').customDELETE(item.id, {
   estado: estado
  }).then(response => {
    item.estado = estado
    if(estado == 1){
      toastr.info('activo al inmueble', 'activo inmueble')
    }else{
      toastr.info('inactivo al inmueble', 'inactivo inmueble')
    }
  })
 }

 // Modal para agregar o editar un inmueble
 $scope.onViewCreateEditInmueble = (isNew = true, people) => {
  let open = $uibModal.open({
   template: require('html-loader!../templates/contribuyente/modalCreateEditInmueble.html'),
   controller: ($scope, $uibModalInstance, Restangular) => {
    $scope.people = people
    $scope.people.nacimiento = new Date(people.nacimiento)
    $scope.cerrar = () => { cerrarModal($uibModalInstance) }

    $scope.onSaveEditContribuyente = () => {
      let { people } = $scope
      Restangular.all('contribuyentes').customPOST({
        people, 
      }, 'update').then(json => {
        if(json.response){
          toastr.success(json.message, 'Exito')
          $uibModalInstance.close({  response: true, data: json.data })
        }
      })
    } 
   }
  })

  open.result.then(response => {
    people = Object.assign(people, response.data)
    people.nacimiento = new Date(people.nacimiento)
  })
 }
 
 // Modal para presentar los tipos de servicio
 $scope.onViewTipoServicio = (id) => {
  let $open = $uibModal.open({
   size:'lg',
   resolve: {
    tipoServicios: ['Restangular', function(Restangular){
     return Restangular.all('tipo_servicios').customGET();
    }],
    inmueble:['Restangular', function(Restangular) {
     return Restangular.all(`inmuebles/${id}`).customGET();
    }]
   },
   controller: ($scope, Restangular, tipoServicios, inmueble, $uibModalInstance) => {
    $scope.tipoServicios = tipoServicios;
    $scope.inmueble = inmueble;

    $scope.cerrar = () => { cerrarModal($uibModalInstance) }

    $scope.isShow = false
    $scope.onShowAdd = (show) => $scope.isShow = show

    $scope.deleteImpuesto = ($index, idTipoServicio) => {
     Restangular.all('inmuebles/removeTipoServicio').customPOST({
      id, 
      idTipoServicio
     }).then((json) => {
      if(json.response){
       $scope.inmueble.tipo_servicio.splice($index, 1)
       toastr.info('se elimino correctamente el servicio', 'servico eliminado inmueble')
      }
     })
    }

    $scope.addTipoServicio = () => {
     Restangular.all('inmuebles/addTipoServicio').customPOST({
      id, 
      idTipoServicio: parseInt($scope.impuesto)
     }).then((json) => {
      $scope.onShowAdd(false)
      if(json.response){
       $scope.inmueble.tipo_servicio.push(json.data)
       toastr.info('se agrego correctamente el servicio', 'servico agregado inmueble')
      }
     })
    }
    
   },
   template: require('html-loader!../templates/contribuyente/modalTipoServicio.html')  
  })
 }

 // Actualizar la ubicacion del inmueble
 $scope.onViewMap = (item, $index) => {
  let open = $uibModal.open({
   size: 'noventa',
   resolve: {
    $parent: $scope.people
   },
   controller: ($scope, NgMap, Restangular, $parent, $uibModalInstance) => {
    $scope.positions = [];

    NgMap.getMap().then(map => {     
     let center = {
      "lat": parseFloat(item.latitude),
      "lng": parseFloat(item.longitude)
     }
     google.maps.event.trigger(map, "resize");
     map.setCenter(center)
     $scope.positions.push(center)
    })

    $scope.updateMarkerPoints = function (event) {
     let { latLng } = event
     if(latLng){
      Restangular.all('contribuyentes').customPOST({
       id: item.id,
       lat: latLng.lat(),
       lng: latLng.lng()
      }, 'updateLatLng').then(result => {
       if(result.response){
        $parent.inmuebles[$index] = Object.assign($parent.inmuebles[$index], {
         latitude:     result.data.latitude,
         longitude:    result.data.longitude
        })
        $scope.positions[0] = { lat: result.data.latitude, lng: result.data.longitude }
        toastr.info('se actualizo la direccion del inmueble correctamente', 'inmueble ubicacion')
       }
      })
     }
    }

    $scope.cerrar = () => { cerrarModal($uibModalInstance) }
   },
   template: require('html-loader!../templates/contribuyente/modalViewMap.html')
  })
 }
}]