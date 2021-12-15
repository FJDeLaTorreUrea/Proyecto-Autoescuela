window.addEventListener("load",function(ev){
    ev.preventDefault();

    const selector_tematica=document.getElementById("selecciona_tematica");
    const enunciado=document.getElementById("Enunciado");

    const Op1=document.getElementById("Op1");
    const Op2=document.getElementById("Op2");
    const Op3=document.getElementById("Op3");
    const Op4=document.getElementById("Op4");

    const Op1_correcta=document.getElementById("Op1_correcta");
    const Op2_correcta=document.getElementById("Op2_correcta");
    const Op3_correcta=document.getElementById("Op3_correcta");
    const Op4_correcta=document.getElementById("Op4_correcta");

    var correcta;

    const imagen=document.getElementById("imagen");

    const aceptar=document.getElementById("Aceptar");


    const notificador=document.getElementById("notificador");

    aceptar.onclick=function(ev)
    {
        





        ev.preventDefault();
        debugger;

        notificador.setAttribute("id","ifififi");
        notificador.innerText="";
        
        
        if(enunciado.value.length>0 && Op1.value.length>0 && Op2.value.length>0 && Op3.value.length>0 && Op4.value.length>0 )
        {
            let form1=new FormData;

            form1.append("selecciona_tematica",selector_tematica.value);
            form1.append("Enunciado",enunciado.value);
            form1.append("Op1",Op1.value);
            form1.append("Op2",Op2.value);
            form1.append("Op3",Op3.value);
            form1.append("Op4",Op4.value);
            form1.append("Op1_correcta",Op1_correcta.checked);
            form1.append("Op2_correcta",Op2_correcta.checked);
            form1.append("Op3_correcta",Op3_correcta.checked);
            form1.append("Op4_correcta",Op4_correcta.checked);

            if(imagen.files.length>0)
            {
                form1.append("imagen",imagen.files[0]);
            }



            if(Op1_correcta.checked==true)
            {
                correcta=1;
            }
            if(Op2_correcta.checked==true)
            {
                correcta=2;
            }
            if(Op3_correcta.checked==true)
            {
                correcta=3;
            }
            if(Op4_correcta.checked==true)
            {
                correcta=4;
            }








            const ajax = new XMLHttpRequest;

            ajax.onreadystatechange=function()
            {
                if(ajax.status==200 && ajax.readyState==4)
                {
                    var respuesta=ajax.responseText;
                    if(respuesta==1)
                    {
                        notificador.setAttribute("id","acierto");
                        notificador.innerText="Pregunta creada";
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
                    notificador.innerText="Ha ocurrido un error, inténtelo mas tarde";
                }
            }
            ajax.open("POST","../../php/Preguntas/CreaPreguntaRespuestas.php?correcta="+correcta);
            ajax.send(form1);

        }

        enunciado.value="";
        Op1.value="";
        Op2.value="";
        Op3.value="";
        Op4.value="";
        imagen.value="";
        enunciado.focus();
        

    }








})