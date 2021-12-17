window.addEventListener("load",function(ev)
{
    ev.preventDefault();

    const Pregunta=document.getElementById("pregunta");
    const menu=document.getElementById("menu");
debugger;
    const ajax=new XMLHttpRequest;

    ajax.onreadystatechange=function()
    {
        if(ajax.status==200 && ajax.readyState==4)
        {
            var respuesta=ajax.responseText;
            debugger;
            obj1=JSON.parse(respuesta);
            
            
            var numero=obj1.n_preguntas;
            document.cookie=numero;
            for(let i=0;i<numero;i++)
            {
                let pregunta=document.createElement("section");
                pregunta.innerHTML= "";
                pregunta.setAttribute("NPregunta",i);
                pregunta.classList.add("pPrinci");
                pregunta.style.display="none";
                let imagen=document.createElement("img");
                imagen.setAttribute("src","../../recursos/imagenes_preguntas/"+obj1.datos_unicos.pregunta[i].Recurso);
                imagen.style.float="left";

                let Enunciado=document.createElement("p");
                Enunciado.innerText=obj1.datos_unicos.pregunta[i].Enunciado;

                
                    let Op1=document.createElement("label");
                    Op1.innerText=obj1.respuestas[i].respuestas[0].Enunciado;
                    let Op1_radio=document.createElement("input");
                    Op1_radio.setAttribute("type","radio");
                    Op1_radio.setAttribute("name","opcion");
                    

                    let Op2=document.createElement("label");
                    Op2.innerText=obj1.respuestas[i].respuestas[1].Enunciado;
                    let Op2_radio=document.createElement("input");
                    Op2_radio.setAttribute("type","radio");
                    Op2_radio.setAttribute("name","opcion");
                    

                    let Op3=document.createElement("label");
                    Op3.innerText=obj1.respuestas[i].respuestas[2].Enunciado;
                    let Op3_radio=document.createElement("input");
                    Op3_radio.setAttribute("type","radio");
                    Op3_radio.setAttribute("name","opcion");
                   


                    let Op4=document.createElement("label");
                    Op4.innerHTML=obj1.respuestas[i].respuestas[3].Enunciado;
                    let Op4_radio=document.createElement("input");
                    Op4_radio.setAttribute("type","radio");
                    Op4_radio.setAttribute("name","opcion");
                   








                Examen.appendChild(Pregunta);
                Pregunta.appendChild(pregunta);
                pregunta.appendChild(imagen);
                pregunta.appendChild(Enunciado);

                pregunta.appendChild(Op1);
                pregunta.appendChild(Op1_radio);
                pregunta.appendChild(Op2);
                pregunta.appendChild(Op2_radio);
                pregunta.appendChild(Op3);
                pregunta.appendChild(Op3_radio);
                pregunta.appendChild(Op4);
                pregunta.appendChild(Op4_radio);
                
            }
            for(let i=1;i<=obj1.n_preguntas;i++)
            {
                let crearspan=document.createElement("span");
                crearspan.innerText=i;
                crearspan.style.border="1px solid black";
                crearspan.onclick=function()
                {
                    let id_a_mostrar=this.innerText;
                    p = document.querySelectorAll("section > section.pPrinci");
                    

                    for(let w=0;w<p.length;w++)
                    {
                        p[w].style.display="none";
                    }
                    document.getElementsByTagName("section")[id_a_mostrar].style.display="block";
                    ;
                }
                menu.appendChild(crearspan);
            }

        }
        
    }
    ajax.open("POST","../../php/Examenes/PintaExamen.php"+window.location.search);
    ajax.send();






});