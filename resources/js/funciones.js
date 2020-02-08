function borrar_planta(id,nombre){
    Swal.fire({
        title: 'Esta seguro de borrar la planta:'+nombre+'?',
        text: "Solo se borrara las plantas que no tengan algun dato asociado!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!',
        cancelButtonText: 'Cancelar!'
      }).then((result) => {
        if (result.value) {

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $("#form_borrar_"+id).attr('action'),
                method: $("#form_borrar_"+id).attr('method'),
                data:new FormData($("#form_"+id)[0]),
                dataType:'json',
                contentType:false,
                cache:false,
                processData: false,
                beforeSend: function() {

                },
                success:function(data){
                    if(data.codigo==1){
                        $('#lista_'+id).remove();
                        toastr.success(data.mensaje,'MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
                    }
                    else if(data.codigo==2){
                        toastr.warning(data.mensaje,'MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
                    }else if(data.codigo==0){
                        toastr.error(data.mensaje,'MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
                    }
                }
                });
        }
      })
}
function borrar_sistema(id,nombre){
    Swal.fire({
        title: 'Esta seguro de borrar el sistema:'+nombre+'?',
        text: "Solo se borrara los sistemas que no tengan algun dato asociado!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!',
        cancelButtonText: 'Cancelar!'
      }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $("#form_borrar_"+id).attr('action'),
                method: $("#form_borrar_"+id).attr('method'),
                data:new FormData($("#form_"+id)[0]),
                dataType:'json',
                contentType:false,
                cache:false,
                processData: false,
                beforeSend: function() {

                },
                success:function(data){
                    if(data.codigo==1){
                        $('#lista_'+id).remove();
                        toastr.success(data.mensaje,'MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
                    }
                    else if(data.codigo==2){
                        toastr.warning(data.mensaje,'MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
                    }else if(data.codigo==0){
                        toastr.error(data.mensaje,'MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
                    }
                }
                });
        }
      })
}
