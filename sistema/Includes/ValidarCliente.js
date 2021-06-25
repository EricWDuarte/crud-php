function validarCampos()
{
    if(document.getElementById("nome").value == "")
    {
        alert("Campo nome em branco");
        return false;
    }
    else if(document.getElementById("mensagem").value == "")
    {
        alert("Campo mensagem em branco");
        return false;
    }
    else
    {
        return true;
    }
}