window.addEventListener("load",function(ev)
{
    ev.preventDefault();

    const campo_Usuario=document.getElementById("InId");
    const campo_password=document.getElementById("InPassw");
    const form=document.getElementById("formLogin");
    const boton=document.getElementById("BotonAceptar");
    const comprobar=document.getElementById("nada");
    formLogin=new FormData();
    boton.onclick=function(ev)
    {
        ev.preventDefault();
        if(campo_Usuario.value.length>0 && campo_password.value.length>0) 
        {
            formLogin.append("InId",campo_Usuario.value);
            formLogin.append("InPassw",campo_password.value);
            
           

            const ajax=new XMLHttpRequest;
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4 && ajax.status==200)
                {
                     var respuesta=ajax.responseText;
                     console.log(respuesta);
                    if(respuesta!=1)
                    {
                        comprobar.setAttribute("id","error")
                        comprobar.innerText=respuesta;
                    }
                    else
                    {
                        window.location=("../Pagina_principal/Pagina_principal.html");
                    }
                    
                     

                    

                }

        }
        
        ajax.open("POST","http://localhost/Proyecto-Autoescuela/php/Login/Login.php");
        //ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(formLogin);



        }
    }
    







})