window.addEventListener("load",function(ev){
    ev.preventDefault();
    const Contrasena=document.getElementById("Contrasena");
    const Repite_contrasena=document.getElementById("Repite_contrasena");
    const Confirmar=document.getElementById("Confirmar");
    const comprobador=document.getElementById("comprobador");

    Confirmar.onclick=function(ev){
        ev.preventDefault();
        comprobador.innerText="";
        comprobador.setAttribute("id","ifififi");
        if(Contrasena.value.length>0 && Repite_contrasena.value.length>0)
        {
            if(Contrasena.value===Repite_contrasena.value)
            {
                form1 = new FormData();
                form1.append("Contrasena",Contrasena.value);
                form1.append("Repite_contrasena",Repite_contrasena.value);

                const ajax = new XMLHttpRequest;
                ajax.onreadystatechange=function()
                {
                    if(ajax.readyState==4 && ajax.status==200)
                    {
                        var respuesta=ajax.responseText;
                        if(respuesta==1)
                        {
                            alert("Usuario confirmado");
                            window.location("../index/index.html");
                        }
                        
                    }

                }
                ajax.open("POST","../../php/Usuario/ConfirmaUsuario.php"+window.location.search);
                ajax.send(form1);
            }
            else
            {
                comprobador.innerText="Las contraseñas no coinciden";
                comprobador.setAttribute("id","error");
            }
        }
        else
        {
            comprobador.innerText="Introduzca todos los campos";
            comprobador.setAttribute("id","error");
        }
    }
    

})