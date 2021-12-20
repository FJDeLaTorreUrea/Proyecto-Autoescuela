window.addEventListener("load",function(ev){
    ev.preventDefault();

    const correo=document.getElementById("InCorreo");
    const enviar=document.getElementById("BoEnviar");
    const corrector=document.getElementById("corrector");

    debugger;
    enviar.onclick=function(ev)
    {
        ev.preventDefault();

        if(correo.value.length>0)
        {

            let form1=new FormData;
            form1.append("InCorreo",correo.value);

            const ajax=new XMLHttpRequest;

            

            ajax.onreadystatechange=function(){
                if(ajax.readyState==4 && ajax.status==200)
                {
                    var respuesta=ajax.responseText;
                    if(respuesta==1)
                    {
                        corrector.setAttribute("Id","acierto");
                        corrector.innerText="Email enviado";
                    }
                    else
                    {
                        corrector.setAttribute("Id","error");
                        corrector.innerText=respuesta;
                    }
                }
                
            }
            ajax.open("POST","../../php/mandarEmail/RecuperarPassword.php");
            ajax.send(form1);
        }
        
        else
        {
            corrector.setAttribute("Id","error");
            corrector.innerText="Introduzca un Email";
        }

    }














})