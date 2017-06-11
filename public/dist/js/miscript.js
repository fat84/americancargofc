/**
 * Created by EDWARD on 10/08/2015.
 */

function validar (url, mensaje){
    var sw = confirm(mensaje);
    if(sw){
        window.location.assign(url);
    }

}