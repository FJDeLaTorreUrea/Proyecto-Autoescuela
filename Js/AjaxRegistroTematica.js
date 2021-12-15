window.addEventListener("load",function(ev){
    ev.preventDefault();
    
    const body_tabla=document.getElementById("datos");
    const paginas=document.getElementById("paginas");
    var numero;



    
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
                var cantidad=obj.datos.tematicas.length;
                var numero=obj.paginas_totales;
                document.cookie=numero;
                for(let i=0;i<cantidad;i++)
                {
                    let crearTr=document.createElement("tr");
                
                body_tabla.appendChild(crearTr);

                    
                    let crearTd1=document.createElement("td");
                    let Texto1=document.createTextNode(obj.datos.tematicas[i].Id);   
                    crearTd1.appendChild(Texto1);

                    let crearTd2=document.createElement("td");
                    let Texto2=document.createTextNode(obj.datos.tematicas[i].Tema);   
                    crearTd2.appendChild(Texto2);



                    crearTr.appendChild(crearTd1);
                    crearTr.appendChild(crearTd2);
                    
                }
                
            }
        }
        ajax.open("GET","../../php/Tematica/RegistroTematica.php?pagina="+pagina);
        ajax.send();



    }
    debugger;
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