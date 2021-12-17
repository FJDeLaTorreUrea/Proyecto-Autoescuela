window.addEventListener("load",function(ev){
    ev.preventDefault();

    const body_tabla=document.getElementById("datos");
    const paginas=document.getElementById("paginas");


    cargaPagina(1);




   
   


    function cargaPagina(pagina)
    {
        

        const ajax=new XMLHttpRequest;

        ajax.onreadystatechange=function()
        {
            if(ajax.readyState==4 && ajax.status==200)
            {
                var respuesta=ajax.responseText;
                obj=JSON.parse(respuesta);
                body_tabla.innerHTML="";
                debugger;
                var cantidad=obj.datos.examenes.length;
                
                var numero=obj.paginas_totales;
                document.cookie=numero;
                for(let i=0;i<cantidad;i++)
                {
                    let crearTr=document.createElement("tr");
                
                body_tabla.appendChild(crearTr);

                    
                    let crearTd1=document.createElement("td");
                    let Texto1=document.createTextNode(obj.datos.examenes[i].Id);   
                    crearTd1.appendChild(Texto1);

                    let crearTd2=document.createElement("td");
                    let Texto2=document.createTextNode(obj.datos.examenes[i].Enunciado);   
                    crearTd2.appendChild(Texto2);

                    let crearTd3=document.createElement("td");
                    let Texto3=document.createTextNode(obj.datos.examenes[i].Duracion);   
                    crearTd3.appendChild(Texto3);

                    let crearTd4=document.createElement("td");
                    let Texto4=document.createTextNode(obj.datos.examenes[i].N_preguntas);   
                    crearTd4.appendChild(Texto4);

                    let crearTd5=document.createElement("td");
                    let Texto5=document.createTextNode("Realizar examen");
                    crearTd5.style.cursor="pointer";   
                    crearTd5.appendChild(Texto5);

                    

                   crearTd5.onclick=function(ev)
                   {
                        ev.preventDefault;

                        window.location=("../realiza_examen/RealizaExamen.php?id="+crearTd1.innerText);





                   }


                    crearTr.appendChild(crearTd1);
                    crearTr.appendChild(crearTd2);
                    crearTr.appendChild(crearTd3);
                    crearTr.appendChild(crearTd4);
                    crearTr.appendChild(crearTd5);
                    
                }
                
                
                
            }
        }
        ajax.open("GET","../../php/Examenes/ExamenesPredefinidos.php?pagina="+pagina);
        ajax.send();

        
        



    }
    for(let i=1;i<=document.cookie.charAt(0);i++)
        {
            let crear_span=document.createElement("span");
            crear_span.innerText=i;
            crear_span.style.border="1px solid black";
            paginas.appendChild(crear_span);

            crear_span.onclick=function(ev)
            {
                
                ev.preventDefault();
                var valor=this.innerText;
                cargaPagina(valor);
            }
        }

})