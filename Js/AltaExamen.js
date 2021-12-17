window.addEventListener("load",function(ev)
{
    ev.preventDefault();
    
    //Para drag and drop
    const izq=document.getElementById("contenedor1");
    const der=document.getElementById("contenedor2");
    const divs=izq.getElementsByTagName("div");
    
    const divs_der=der.getElementsByTagName("div");

    const n_preguntas=document.getElementById("n_preguntas");
    const filtro=document.getElementById("texto");
    



    //Para formulario
    const nombre=document.getElementById("nombre");

    const duracion=document.getElementById("duracion");

    const confirmar=document.getElementById("confirmar");

    const notificador=document.getElementById("notificador");
    

    izq.ondragover=function(ev)
    {
        ev.preventDefault();

    }
    der.ondragover=function(ev)
    {
        ev.preventDefault();
    }


    izq.ondrop=function(ev)
    {
        ev.preventDefault();
        var id=ev.dataTransfer.getData("text");
        this.appendChild(document.getElementById(id));
        n_preguntas.innerText="Numero de preguntas="+divs_der.length;
    }

    der.ondrop=function(ev)
    {
        ev.preventDefault();
        var id=ev.dataTransfer.getData("text");
        this.appendChild(document.getElementById(id));
        n_preguntas.innerText="Numero de preguntas="+divs_der.length;
    }
    
    for(let i=0;i<divs.length;i++)
    {
        
        divs[i].ondragstart=function(ev)
        {
            ev.dataTransfer.setData("text",this.id);
        }

    }





    confirmar.onclick=function(ev)
    {
        ev.preventDefault();
        notificador.setAttribute("id","ifififfif");
        notificador.innerText="";

        var preguntas={};

        debugger;
        for(let i=1;i<=der.children.length-1;i++)
        {
            preguntas[i]=der.children[i].getAttribute("id_pregunta");
        }



        if(nombre.value.length>0 && duracion.value.length>0 && divs_der.length>0)
        {
            let form1 = new FormData;

            form1.append("Nombre",nombre.value);
            form1.append("Duracion",duracion.value);
            form1.append("N_preguntas",divs_der.length);
            form1.append("preguntas",JSON.stringify(preguntas));

            const ajax = new XMLHttpRequest;

            ajax.onreadystatechange=function()
            {
                if(ajax.status==200 && ajax.readyState==4)
                {
                    var respuesta=ajax.responseText;
                    if(respuesta=="1")
                    {
                        notificador.setAttribute("id","acierto");
                        notificador.innerText="Examen insertado";
                    
                    }
                    else
                    {
                        notificador.setAttribute("id","error");
                        notificador.innerText="Ha ocurrido un error";
                    }

                }
                nombre.value="";
                nombre.focus();
                duracion.value="";
            }
            ajax.open("POST","../../php/Examen/AltaExamen.php");
            ajax.send(form1);
        }
        else
        {
            notificador.setAttribute("id","error");
            notificador.innerText="Introduzca todos los campos, y al menos una pregunta";
        }




    }
});