window.addEventListener("load",function(ev){

    ev.preventDefault();

    debugger;
    const Email=document.getElementById("IEmail");
    const Nombre=document.getElementById("INombre");
    const Apellido1=document.getElementById("IAp1");
    const Apellido2=document.getElementById("IAp2");
    const IFecha=document.getElementById("IFecha");
    const SRol=document.getElementById("SRol");
    const Confirmar=document.getElementById("IAceptar");
    const comprobar=document.getElementById("notificacion");
    var opcion_seleccionada;
    opcion_seleccionada=SRol.options[SRol.selectedIndex];

    



    

    Confirmar.onclick=function(ev){
    comprobar.setAttribute("id","ifififfi");
    comprobar.innerText="";
    ev.preventDefault();
    if(Email.value.length>0 && Nombre.value.length>0 && Apellido1.value.length>0 && IFecha.value!='' && opcion_seleccionada.text!=undefined)
    {
        let form1 = new FormData();
        
        form1.append("IEmail",Email.value);
        form1.append("INombre",Nombre.value);
        form1.append("IAp1",Apellido1.value);
        form1.append("IAp2",Apellido2.value);
        form1.append("IFecha",IFecha.value);
        form1.append("SRol",opcion_seleccionada.text);

        

        const ajax=new XMLHttpRequest;

        ajax.onreadystatechange=function(){

            if(ajax.readyState==4 && ajax.status==200)
            {
               var respuesta = ajax.responseText;
               if(respuesta==1)
               {
                    Email.value="";
                    Nombre.value="";
                    Apellido1.value="";
                    Apellido2.value="";
                    comprobar.setAttribute("id","acierto");
                    comprobar.innerText="Se ha enviado un email de confirmación a su correo";
               }
               else
               {
                    comprobar.setAttribute("id","error");
                    comprobar.innerText=respuesta;
               }

            }





        }

        ajax.open("POST","../../../php/Usuario/CreaUsuario.php");
        ajax.send(form1);
        
    }


    
        

        


    };

    







})