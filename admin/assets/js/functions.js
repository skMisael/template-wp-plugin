jQuery(document).ready(function($){ 


    $("#btnnuevo").click(function(){
        $("#modalnuevo").modal("show");
    });


    

    $(document).on('click',"#btnguardar",function(){
            const data1 = $("#data1").val();
            const data2 = $("#data1").val();
            const url = SolicitudesAjax.url;
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    action : "agregarData",
                    nonce : SolicitudesAjax.seguridad,
                    data1,
                    data2
                },
                success:function(res){
                    if(res){
                        alert("Datos Insertados");
                        location.reload();
                    }else{
                        alert("Error");
                    }
                    
                }
            });
    });
    
    $(document).on('click',".btnBorrar",function(){
            const id = $(this).attr('data-id');
            const url = SolicitudesAjax.url;
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    action : "eliminarData",
                    nonce : SolicitudesAjax.seguridad,
                    id
                },
                success:function(res){
                    if(res){
                        alert("Datos borrados");
                        location.reload();
                    }else{
                        alert('Error');
                    }
                    
                }
            });
    });





});