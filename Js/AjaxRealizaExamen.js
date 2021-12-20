window.addEventListener("load",function(ev)
{
    ev.preventDefault();

    const Pregunta=document.getElementById("pregunta");
    const menu=document.getElementById("menu");

    const ajax=new XMLHttpRequest;

    ajax.onreadystatechange=function()
    {
        if(ajax.status==200 && ajax.readyState==4)
        {
            var respuesta=ajax.responseText;
            
            obj1=JSON.parse(respuesta);
            
            var numero=obj1.n_preguntas;
            document.cookie=numero;

            var cuenta_atras=document.createElement("p");
            cuenta_atras.setAttribute("id","cuenta_atras")
            cuenta_atras.style.float="right";
            cuenta_atras.style.fontSize="1.5rem";

            var dia_actual=new Date;
                
            var tiempo=obj1.duracion.substr(3,2)-0;

                

            var tiempolimite=dia_actual.getTime();

            var fecha_incrementada=new Date(tiempolimite+tiempo*60000);
            
            var x = setInterval(function(){
                var ahora=new Date().getTime();

                var tiempo_restante=fecha_incrementada - ahora;

                var minutos = Math.floor((tiempo_restante % (1000 * 60 * 60)) / (1000 * 60));
                var segundos = Math.floor((tiempo_restante % (1000 * 60)) / 1000);


                document.getElementById("cuenta_atras").innerHTML= minutos +":"+ segundos;

                if(tiempo_restante<0)
                {
                    window.history.go(-1);
                }
            },1000);
            
            Pregunta.appendChild(cuenta_atras);








            
            
            
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
                    Op1_radio.setAttribute("name","opcion"+i);
                    Op1_radio.setAttribute("checked","true");
                    

                    let Op2=document.createElement("label");
                    Op2.innerText=obj1.respuestas[i].respuestas[1].Enunciado;
                    let Op2_radio=document.createElement("input");
                    Op2_radio.setAttribute("type","radio");
                    Op2_radio.setAttribute("name","opcion"+i);
                    

                    let Op3=document.createElement("label");
                    Op3.innerText=obj1.respuestas[i].respuestas[2].Enunciado;
                    let Op3_radio=document.createElement("input");
                    Op3_radio.setAttribute("type","radio");
                    Op3_radio.setAttribute("name","opcion"+i);
                   


                    let Op4=document.createElement("label");
                    Op4.innerHTML=obj1.respuestas[i].respuestas[3].Enunciado;
                    let Op4_radio=document.createElement("input");
                    Op4_radio.setAttribute("type","radio");
                    Op4_radio.setAttribute("name","opcion"+i);
                   
                    

                    let Finalizar=document.createElement("input");
                        Finalizar.setAttribute("type","submit");
                        Finalizar.setAttribute("value","Finalizar");
                        Finalizar.style.display="inline-block";
                        Finalizar.style.cursor="pointer";
                        Finalizar.onclick=function(ev)
                        {
                            var respuestas=[];
                            for(let j=0;j<numero;j++)
                            {
                                for(let k=0;k<4;k++)
                                {
                                    if(document.getElementsByName("opcion"+j)[k].checked==true)
                                    {
                                        respuestas.push(k);
                                    }
                                

                                }
                            }
                            
                            var aciertos=[];
                            for(let j=0;j<numero;j++)
                            {
                                
                                if(obj1.respuestas[j].respuestas[respuestas[j]].Correcta==1)
                                {
                                    aciertos.push(1);
                                }
                                else
                                {
                                    aciertos.push(0);
                                }
                                
                            }
                            var correctas=0;
                            for(let j=0;j<=aciertos.length;j++)
                            {
                                if(aciertos[j]==1)
                                {
                                    correctas++;
                                }
                                
                            }
                            console.log(correctas+"/"+aciertos.length);

                            const ajax2=new XMLHttpRequest;

                            var form2=new FormData;

                            form2.append("correctas",correctas);
                            form2.append("total",aciertos.length);
                            


                            ajax2.onreadystatechange=function()
                            {
                                if(ajax2.status==200 && ajax2.readyState==4)
                                {
                                    var respuesta2=ajax.responseText;
                                }
                            }
                            ajax2.open("POST","../../php/Examenes/EntregaExamen.php"+window.location.search);
                            ajax2.send(form2);

                            window.history.go(-1);
                        }

                        let Siguiente=document.createElement("input");
                        Siguiente.setAttribute("type","submit");
                        Siguiente.setAttribute("value","Siguiente");
                        Siguiente.setAttribute("id",i)
                        Siguiente.style.display="inline-block";
                        Siguiente.style.cursor="pointer";
                        Siguiente.onclick=function(ev)
                        {
                            ev.preventDefault();

                            let id_a_mostrar=parseInt(this.getAttribute("id"))+1;

                            p = document.querySelectorAll("section > section.pPrinci");
                    

                            for(let w=0;w<p.length;w++)
                            {
                                p[w].style.display="none";
                            }
                            document.getElementsByTagName("section")[id_a_mostrar+1].style.display="block";
                            
                        }

            let Anterior=document.createElement("input");
            Anterior.setAttribute("type","submit");
            Anterior.setAttribute("value","Anterior");
            Anterior.setAttribute("id",i)
            Anterior.style.display="inline-block";
            Anterior.style.cursor="pointer";
            Anterior.onclick=function(ev)
            {
                ev.preventDefault();

                let id_a_mostrar=parseInt(this.getAttribute("id"));

                p = document.querySelectorAll("section > section.pPrinci");
                    

                for(let w=0;w<p.length;w++)
                {
                    p[w].style.display="none";
                }
                document.getElementsByTagName("section")[id_a_mostrar].style.display="block";
                
                            
            }
                    





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
                
                pregunta.appendChild(Anterior);
                pregunta.appendChild(Siguiente);
                pregunta.appendChild(Finalizar);
                
               
                
                
                
                
                
            }
            
            
            pregunta.children[1].children[10].style.display="none";
            var preguntas=(pregunta.children.length)-1;
            pregunta.children[preguntas].children[11].style.display="none";
            
            for(let i=1;i<preguntas;i++)
            {
                pregunta.children[i].children[12].style.display="none";
            }         
            for(let i=1;i<=obj1.n_preguntas;i++)
            {
                let crearspan=document.createElement("span");
                crearspan.innerText=i;
                crearspan.style.border="1px solid black";
                crearspan.style.cursor="pointer";
                crearspan.style.padding="2px"
                debugger;
                crearspan.onclick=function()
                {
                    let id_a_mostrar=this.innerText;
                    p = document.querySelectorAll("section > section.pPrinci");
                    

                    for(let w=0;w<p.length;w++)
                    {
                        p[w].style.display="none";
                    }
                    document.getElementsByTagName("section")[id_a_mostrar].style.display="block";
                    
                }
                menu.appendChild(crearspan);
            }






        }
        
    }
    ajax.open("POST","../../php/Examenes/PintaExamen.php"+window.location.search);
    ajax.send();






});