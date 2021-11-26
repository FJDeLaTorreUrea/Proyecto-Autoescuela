window.addEventListener("load",function(){
    const Campo_Email=document.getElementById("InId");
    const Campo_password=document.getElementById("InPassw");
    const BtEnviar=document.getElementById("BotonAceptar")

BtEnviar.onclick=function(ev)
{
    ev.preventDefault();
    if(Campo_Email.ariaValueMax.length!=0 && Campo_password.ariaValueMax.length!=0)
    {
        const ajax= new XMLHttpRequest();
        var url="localhost/Proyecto-Autoescuela/index/index.html";

        ajax.onreadystatechange=function(){
            if(ajax.readyState==4 && ajax.status==200)
            {
                var respuesta=ajax.responseText;
            }
        }
    }

}










})