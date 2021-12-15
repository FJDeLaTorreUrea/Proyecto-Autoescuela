window.addEventListener("load",function(ev){
    ev.preventDefault();

    const contrasena=document.getElementById("InPassword");
    const confirma_contrasena=document.getElementById("InConfirma");
    const confirmar=document.getElementById("BtCon");

    const notificador=document.getElementById("notificador");

    
    
    
    confirmar.onclick=function(ev)
    {
        debugger;
        ev.preventDefault();
        notificador.setAttribute("id","ifififi");
        notificador.innerText="";

        if(contrasena.value.length>0 && confirma_contrasena.value.length)
        {
            if(contrasena.value==confirma_contrasena.value)
            {
                let form1 = new FormData;

                form1.append("InPassword",contrasena.value);
                form1.append("confirma_contrasena",confirma_contrasena.value);

                const ajax=new XMLHttpRequest;

                ajax.onreadystatechange=function(){
                    if(ajax.status==200 && ajax.readyState==4)
                    {
                        var respuesta = ajax.responseText;
                        if(respuesta==1)
                        {
                            alert("Usuario confirmado");
                            window.location("../../index/Index.html");
                        }
                        else
                        {
                            notificador.setAttribute("id","error");
                            notificador.innerText=respuesta;
                        }
                    }
                    else
                    {
                        notificador.setAttribute("id","error");
                        notificador.innerText="Ha ocurrido un error, intentelo mas tarde";
                    }
                }
                ajax.open("POST","../../../php/Usuario/ConfirmaUsuario.php"+window.location.search);
                ajax.send(form1);
                
            }
            else
            {
                notificador.setAttribute("id","error");
                notificador.innerText="Las contraseñas no coinciden";
            }
        }
        else
        {
            notificador.setAttribute("id","error");
            notificador.innerText="Introduzca todos los campos";
        }

    }



})