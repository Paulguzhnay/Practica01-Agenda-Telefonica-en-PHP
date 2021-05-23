function validarCamposObligatorios(){
    var bandera = true
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value == '' && elemento.type == 'text' || elemento.value == '' && elemento.type == 'password'){
            if (elemento.id == "cedula") {
                document.getElementById("mensajeCedula").innerHTML ="<br>El Campo Cédula esta vacío"
            }
            if(elemento.id == "nombres"){
                document.getElementById("mensajeNombres").innerHTML = "<br>El Campo Nombres esta vacío" 
            }
            if(elemento.id == "apellidos"){
                document.getElementById("mensajeApellidos").innerHTML = "<br>El Campo apellidos esta vacío" 
            }   
            if(elemento.id == "direccion"){
                document.getElementById("mensajeDireccion").innerHTML = "<br>El Campo Dirección esta vacío" 
            }
            if(elemento.id == "telefono"){
                document.getElementById("mensajeTelefono").innerHTML = "<br>El Campo teléfono esta vacío" 
            }
            if(elemento.id == "fechaNacimiento"){
                document.getElementById("mensajeFecha").innerHTML = "<br>El Campo Fecha de Nacimiento esta vacío" 
            }
            if(elemento.id == "correo"){
                document.getElementById("mensajeCorreo").innerHTML = "<br>El Campo Correo esta vacío" 
            }
            if (elemento.id == "contrasena") {
                document.getElementById("mensajeContrasenia").innerHTML = "<br>El Campo Contraseña esta vacío"
            }
            elemento.style.border = '2px red solid' 
            elemento.className = 'error' 
            bandera = false 
        } 
    }
    if(!bandera){ 
        alert('Error: Campos Obligatorios Vacíos')
    }else{
        alert("Bienvenido, pasaste las validaciones!")
    } 
    return bandera
}
function validarLetras(elemento){
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)
        if(miAscii >= 97 && miAscii <= 122){
            return true
         }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            elemento.style.border = '1px red solid'
            return false
        }
    }else{
        return true
    }
}
function validarCedula(elemento){
    var cedula = elemento.value
    var total = 0
    var tamanio = cedula.length
    var longcheck = tamanio - 1
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)
        if(miAscii >= 48 && miAscii <= 57){

         }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeCedula").innerHTML ="<br>Ingrese Correctamente la Cédula"
        }
    }
    if (cedula !== "" && tamanio === 10){
        for(i = 0; i < longcheck; i++){
            if (i % 2 === 0) {
              var aux = cedula.charAt(i) * 2
              if (aux > 9) aux -= 9
              total += aux
            } else {
              total += parseInt(cedula.charAt(i)); 
            }
        }
        total = total % 10 ? 10 - total % 10 : 0;
        if (cedula.charAt(tamanio-1) == total) {
            elemento.style.border = '2px green solid'
            document.getElementById("mensajeCedula").style.color = "green";
            document.getElementById("mensajeCedula").innerHTML ="<br>Cédula Válida"
            return true
        }else{
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeCedula").style.color = "red";
            document.getElementById("mensajeCedula").innerHTML ="<br>Ingrese Correctamente la Cédula"
            return false
        }
    }else{
        elemento.style.border = '2px red solid'
        document.getElementById("mensajeCedula").style.color = "red";
        document.getElementById("mensajeCedula").innerHTML ="<br>Ingrese Correctamente la Cédula"
        return false
    }
    
}
function validarNombre(elemento){
    var nombres = elemento.value
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)
        if((miAscii >= 97 && miAscii <= 122) || miAscii == 32 || (miAscii >= 65 && miAscii <= 90)){
            var dividir = nombres.split(" ")
            if(dividir.length == 2 && dividir[1].length > 0){
                elemento.style.border = '2px green solid'
                document.getElementById("mensajeNombres").style.color = "green";
                document.getElementById("mensajeNombres").innerHTML = "<br>Nombres Válidos" 
            }else{
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeNombres").style.color = "red";
                document.getElementById("mensajeNombres").innerHTML = "<br>Ingrese correctamente sus nombres" 
            }
         }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeNombres").style.color = "red";
            document.getElementById("mensajeNombres").innerHTML = "<br>Ingrese correctamente sus nombres" 
            return false
        }
    }else{
        return true
    }
}
function validarApellido(elemento){
    var apellidos = elemento.value
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        if((miAscii >= 97 && miAscii <= 122) || miAscii == 32 || (miAscii >= 65 && miAscii <= 90)){
            var dividir = apellidos.split(" ")
            if(dividir.length == 2 && dividir[1].length > 0){
                elemento.style.border = '2px green solid'
                document.getElementById("mensajeApellidos").style.color = "green";
                document.getElementById("mensajeApellidos").innerHTML = "<br>Apellidos Válidos" 
            }else{
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeApellidos").style.color = "red";
                document.getElementById("mensajeApellidos").innerHTML = "<br>Ingrese sus apellidos correctamente" 
            }
         }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeApellidos").style.color = "red";
            document.getElementById("mensajeApellidos").innerHTML = "<br>Ingrese sus apellidos correctamente" 
            return false
        }
    }else{
        return true
    }
}
function validarTelefono(elemento){
    var telefono = elemento.value
        if(telefono.length > 0){
            var miAscii = telefono.charCodeAt(telefono.length-1)
            if(miAscii >= 48 && miAscii <= 57){
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeTelefono").style.color = "red";
                document.getElementById("mensajeTelefono").innerHTML = "<br>Teléfono Inválido"
                if(telefono.length == 10){
                    elemento.style.border = '2px green solid'
                    document.getElementById("mensajeTelefono").style.color = "green";
                    document.getElementById("mensajeTelefono").innerHTML = "<br>Teléfono Válido"
                    //return true 
                }else{
                    elemento.value = elemento.value.substring(0, 10)
                }
            }else {
                elemento.value = elemento.value.substring(0, elemento.value.length-1)
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeTelefono").style.color = "red";
                document.getElementById("mensajeTelefono").innerHTML = "<br>Teléfono Inválido"
                //return false 
            }
        }    
}

function validarCorreo(elemento){
    var correo = elemento.value
    var arroba = 0
    var cont = 0
    for(var i = 0; i < correo.length; i++ ){
        var miAscii = correo.charCodeAt(i)
        if(miAscii === 64){
            arroba = i
        }
    }
    if(arroba !== 0){
        for(var i = 0; i < arroba; i++){
            var miAscii = correo.charCodeAt(i)
            if(miAscii >= 97 && miAscii <= 122 ){
                cont++
            }
        }
    }else{
        elemento.style.border = '2px red solid'
        document.getElementById("mensajeCorreo").style.color = "red";
        document.getElementById("mensajeCorreo").innerHTML = "<br>Correo Inválido"
        //return false  
    }
    if(cont >= 3){
        var alias = correo.substring(arroba+1, correo.length)
        if(alias === "ups.edu.ec" || alias === "est.ups.edu.ec"){
            elemento.style.border = '2px green solid'
            document.getElementById("mensajeCorreo").style.color = "green";
            document.getElementById("mensajeCorreo").innerHTML = "<br>Correo Válido" 
            //return true 
        }else{
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeCorreo").style.color = "red";
            document.getElementById("mensajeCorreo").innerHTML = "<br>Correo Inválido"
            //return false  
        }
    }else{
        elemento.style.border = '2px red solid'
        document.getElementById("mensajeCorreo").style.color = "red";
        document.getElementById("mensajeCorreo").innerHTML = "<br>Correo Inválido"
        //return false 
    }
}
function validarContrasenia(elemento){
    var contrasenia = elemento.value
    if(contrasenia.length >= 8){
        var mayusculas = 0
        var minusculas = 0
        var especial = 0
        for(var i = 0; i < contrasenia.length; i++){
            var miAscii = contrasenia.charCodeAt(i)
            if(miAscii >= 97 && miAscii <= 122 ){
                minusculas++
            }
            if(miAscii >= 65 && miAscii <= 90 ){
                mayusculas++
            }
            if(miAscii == 64 || miAscii == 95 || miAscii == 36){ 
                especial++
            }
        }
        if(minusculas >= 1 && mayusculas >= 1 && especial >= 1){
            elemento.style.border = '2px green solid'
            document.getElementById("mensajeContrasenia").style.color = "green";
            document.getElementById("mensajeContrasenia").innerHTML = "<br>Contraseña Válida"
            return true
        }else{
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeContrasenia").style.color = "red";
            document.getElementById("mensajeContrasenia").innerHTML = "<br>Contraseña no cumple con los requisitos"
            return false
        }
    }else{
        elemento.style.border = '2px red solid'
        document.getElementById("mensajeContrasenia").style.color = "red";
        document.getElementById("mensajeContrasenia").innerHTML = "<br>Contraseña no cumple con los requisitos"
        return false
    }
}
function validarFecha(elemento){
    var fecha = elemento.value
    var fechas = fecha.split("/")
    if(fecha.length == 10 && fechas.length == 3){
        var dia = parseInt(fechas[0])
        var mes = parseInt(fechas[1])
        var anio = parseInt(fechas[2])
        if(dia >= 1 && dia <=31){
            if(mes >= 1 && mes <=12){
                if(anio <= 2022){
                    elemento.style.border = '2px green solid'
                    document.getElementById("mensajeFecha").style.color = "green";
                    document.getElementById("mensajeFecha").innerHTML = "<br>Fecha de Nacimiento Válida" 
                }else{
                    elemento.style.border = '2px red solid'
                    document.getElementById("mensajeFecha").style.color = "red";
                    document.getElementById("mensajeFecha").innerHTML = "<br>Fecha de Nacimiento Incorrecta" 
                }
            }else{
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeFecha").style.color = "red";
                document.getElementById("mensajeFecha").innerHTML = "<br>Fecha de Nacimiento Incorrecta" 
            }
        }else{
            elemento.style.border = '2px red solid'
            document.getElementById("mensajeFecha").style.color = "red";
            document.getElementById("mensajeFecha").innerHTML = "<br>Fecha de Nacimiento Incorrecta" 
        }
    }else{
        elemento.style.border = '2px red solid'
        document.getElementById("mensajeFecha").style.color = "red";
        document.getElementById("mensajeFecha").innerHTML = "<br>Fecha de Nacimiento Incorrecta" 
    }
}