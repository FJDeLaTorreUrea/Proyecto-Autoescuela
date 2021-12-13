window.addEventListener("load",function(ev){
    ev.preventDefault();

    const tabla=document.getElementById("tabla_registro");
    const body_tabla=document.getElementById("datos");
    const paginas=document.getElementById("paginas");
    var numero;
    var pagina=1;
    var url;
   





    
    var crear_thead=document.createElement("thead");
    var crear_tbody=document.createElement("tbody");
    

    const ajax = new XMLHttpRequest;
    ajax.onreadystatechange=function()
    {
        if(ajax.readyState==4 && ajax.status==200)
        {
            var respuesta=(ajax.responseText);
            obj=JSON.parse(respuesta);
            var cantidad=obj.datos.usuarios.length;
            

            
            for(let i=0;i<cantidad;i++)
            {

                
                let crearTr=document.createElement("tr");
                
                body_tabla.appendChild(crearTr);

                    
                    let crearTd1=document.createElement("td");
                    let Texto1=document.createTextNode(obj.datos.usuarios[i].Id);   
                    crearTd1.appendChild(Texto1);

                    let crearTd2=document.createElement("td");
                    let Texto2=document.createTextNode(obj.datos.usuarios[i].Email);   
                    crearTd2.appendChild(Texto2);

                    let crearTd3=document.createElement("td");
                    let Texto3=document.createTextNode(obj.datos.usuarios[i].Nombre);   
                    crearTd3.appendChild(Texto3);

                    let crearTd4=document.createElement("td");
                    let Texto4=document.createTextNode(obj.datos.usuarios[i].Ap1+" "+obj.datos.usuarios[i].Ap2);   
                    crearTd4.appendChild(Texto4);

                    let crearTd5=document.createElement("td");
                    let Texto5=document.createTextNode(obj.datos.usuarios[i].Fecha_nac);   
                    crearTd5.appendChild(Texto5);

                    let crearTd6=document.createElement("td");
                    let Texto6=document.createTextNode(obj.datos.usuarios[i].Rol);   
                    crearTd6.appendChild(Texto6);


                    crearTr.appendChild(crearTd1);
                    crearTr.appendChild(crearTd2);
                    crearTr.appendChild(crearTd3);
                    crearTr.appendChild(crearTd4);
                    crearTr.appendChild(crearTd5);
                    crearTr.appendChild(crearTd6);
            }
            
            for(let i=1;i<=obj.paginas_totales;i++)
            {
                let crear_span=document.createElement("span");
                numero=i;

                
                
                crear_span.innerHTML=numero;
                debugger;
                crear_span.onclick=function(ev)
                {
                    pagina=numero;
                    
                }
                paginas.appendChild(crear_span);
            }
            


          
        
        }     
    }
    
    ajax.open("GET","../../php/Usuario/Registros_usuarios.php?pagina="+pagina);
    ajax.send();


})