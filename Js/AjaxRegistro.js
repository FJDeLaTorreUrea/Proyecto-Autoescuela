window.addEventListener("load",function(ev){
    ev.preventDefault();
    

    
    const body_tabla=document.getElementById("datos");
    const paginas=document.getElementById("paginas");
    
    
    
    
   

    
    var crear_thead=document.createElement("thead");
    var crear_tbody=document.createElement("tbody");
    

    
        
        
    
    
    

    
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
                var cantidad=obj.datos.usuarios.length;
                
                var numero=obj.paginas_totales;
                document.cookie=numero;
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

                    let crearTd7=document.createElement("td");
                    let Texto7=document.createTextNode("borrar");
                    crearTd7.style.cursor="pointer";
                    crearTd7.onclick=function(ev){
                        ev.preventDefault();
                        debugger;
                        
                        var form2=new FormData;

                        form2.append("Id",crearTd1.innerText);

                        const ajax2=new XMLHttpRequest;

                        ajax2.onreadystatechange=function()
                        {
                            if(ajax2.readyState==4 && ajax2.status==200)
                            {
                                
                                var respuesta=ajax.responseText;
                                if(respuesta==1)
                                {
                                    alert("Los cambios se efectuaran al recargar la pagina");
                                    
                                }
                                

                            }
                            
                        }
                        ajax2.open("POST","../../php/Usuario/BorraUsuario.php");
                        ajax2.send(form2);
                        alert("Los cambios se efectuaran al recargar la pagina");
                    }
                    crearTd7.appendChild(Texto7);


                    crearTr.appendChild(crearTd1);
                    crearTr.appendChild(crearTd2);
                    crearTr.appendChild(crearTd3);
                    crearTr.appendChild(crearTd4);
                    crearTr.appendChild(crearTd5);
                    crearTr.appendChild(crearTd6);
                    crearTr.appendChild(crearTd7);
                }
                
                
                
            }
        }
        ajax.open("GET","../../php/Usuario/Registros_usuarios.php?pagina="+pagina);
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