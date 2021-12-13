window.addEventListener("load",function(ev){
    ev.preventDefault();

    const Nombre_Tematica=document.getElementById("NombreTematica");
    const confirmar=document.getElementById("confirmar");
    const comprobador=document.getElementById("comprobador");

    confirmar.onclick=function(ev){
        ev.preventDefault();

        comprobador.innerText="";
        comprobador.setAttribute("id","ififififi");
        if(Nombre_Tematica.value.length>0)
        {
            var form1 = new FormData();
            form1.append("NombreTematica",Nombre_Tematica.value);

            const ajax=new XMLHttpRequest;

            ajax.onreadystatechange=function(){
                if(ajax.readyState==4 && ajax.status==200)
                {
                    var respuesta = ajax.responseText;
                    if(respuesta==1)
                    {
                        comprobador.innerText="Tematica introducida";
                        comprobador.setAttribute("id","acierto");
                    }
                    else
                    {
                        comprobador.innerText=respuesta;
                        comprobador.setAttribute("id","error");
                    }
                }
            }
            ajax.open("POST","../../php/Tematica/CreaTematica.php");
            ajax.send(form1);
        }
        else
        {
            comprobador.innerText="Introduzca todos los campos";
            comprobador.setAttribute("id","error");

        }

    }








})