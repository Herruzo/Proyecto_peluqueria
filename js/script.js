if (document.querySelector('#op1')) {
    window.onload = function() {
        let marcador = document.getElementById("op1");
        marcador.style.color = 'rgb(252, 209, 153)';
        marcador.style.border = '1px solid rgb(252, 209, 153)';
        marcador.style.borderRadius = '25px';
    }

}

/************************** Validación formulario registro ********************/

if (document.querySelector('#formulario_reg')) {

    formulario_reg.addEventListener('submit', function validar(e) {

        /*Con preventDefault() evitamos que se ejecute submit() no se envia */
        e.preventDefault();

        let name = /^[a-zA-ZÀ-ÿ\s]{1,20}$/; // Letras y espacios, pueden llevar acentos.

        let apelli = /^[a-zA-ZÀ-ÿ\s]{1,50}$/; // Letras y espacios, pueden llevar acentos.

        let direcc = /^[a-zA-ZÀ-ÿ0-9/,.ºª\s]{3,80}$/; //Letras, puende llevar acentos, números, espacios, /, , º, ª.

        let pobla = /^[a-zA-ZÀ-ÿ\s]{1,50}$/;

        let provi = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;

        let codigo = /^[0-9]{5}$/;

        let correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

        let tel = /^(6|7|8|9)[0-9]{8,9}$/; //  /^\d{7,14}$/; // 9 a 14 numeros.

        let fech = /^\d{4}-\d{2}-\d{2}$/; // /^\d{1,2}\/-\d{1,2}\/-\d{2,4}$/;

        let sex = /^[a-zA-ZÀ-ÿ/]{1,6}$/;

        let user = /^[a-zA-ZÀ-ÿ0-9_.]{1,15}$/;

        let contra = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
        //Entre 8 y 16 caracteres, al menos una minúscula y una mayúscula y al menos un caracter no alfanumérico.

        let ok = 'si';

        //Quitamos el .value del final y lo ponemos en el parámetro de test() 
        let nombre = document.getElementById('nombre'); //.value;
        let apellidos = document.getElementById('apellidos');
        let direccion = document.getElementById('direccion');
        let poblacion = document.getElementById('poblacion');
        let provincia = document.getElementById('provincia');
        let cp = document.getElementById('cp');
        let email = document.getElementById('email');
        let telefono = document.getElementById('telefono');
        let usuario = document.getElementById('usuario');
        let pass = document.getElementById('pass');
        let pass_rep = document.getElementById('pass_rep');
        let fecha_nac = document.getElementById('fecha_nac');
        let sexo = document.getElementById('sexo');

        // console.log(name.test(nombre.value));
        /*Validamos la expresión regular con .exce() o con test()*/
        if (!name.test(nombre.value)) {
            ok = 'no';
            setError(nombre, 'El campo Nombre no está correctamente rellenado .');
        } else {
            setCorrecto(nombre);
        }
        if (!apelli.test(apellidos.value)) {
            ok = 'no';
            setError(apellidos, 'El campo Apellidos no está correctamente rellenado.');
        } else {
            setCorrecto(apellidos);
        }
        if (!direcc.test(direccion.value)) {
            ok = 'no';
            setError(direccion, 'El campo dirección no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(direccion);
        }
        if (!pobla.test(poblacion.value)) {
            ok = 'no';
            setError(poblacion, 'El campo población no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(poblacion);
        }
        if (!provi.test(provincia.value)) {
            ok = 'no';
            setError(provincia, 'El campo provincia no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(provincia);
        }
        if (!codigo.test(cp.value)) {
            ok = 'no';
            setError(cp, 'El campo código postal no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(cp);
        }
        if (!correo.test(email.value)) {
            ok = 'no';
            setError(email, 'El campo Email no está correctamente rellenado.');
        } else {
            setCorrecto(email);
        }
        if (!tel.test(telefono.value)) {
            ok = 'no';
            setError(telefono, 'El campo Teléfono no está correctamente rellenado.');
        } else {
            setCorrecto(telefono);
        }
        if (!fech.test(fecha_nac.value)) {
            ok = 'no';
            setError(fecha_nac, 'No has pusto ninguna fecha.');
        } else {
            setCorrecto(fecha_nac);
        }
        if (!sex.test(sexo.value)) {
            ok = 'no';
            setError(sexo, 'No has elegido ninguna opción.');
        } else {
            setCorrecto(sexo);
        }
        if (!user.test(usuario.value)) {
            ok = 'no';
            setError(usuario, 'El campo de usuario no admite este formato.');
        } else {
            setCorrecto(usuario);
        }
        if (!contra.test(pass.value)) {
            ok = 'no';
            setError(pass, 'El campo contraseña debe tener entre 8 y 16 caracteres, al menos un numero, una mayúscula, una minúscula y al menos un caracter no alfanumérico.');
        } else {
            setCorrecto(pass);
        }
        if (pass_rep.value !== pass.value) {
            ok = 'no';
            setError(pass_rep, 'El campo Repetir cotraseña no coincide con la contraseña.');
        } else {
            setCorrecto(pass_rep);

        }
        if (ok == 'si') {
            /*Con submit() hacemos mandar a que se envie el documento formulario*/

            document.formulario_reg.submit();
        }

    });

    //Definimos las funciones en caso de error o de acierto
    //El setError tiene 2 parámetros el 1º es el input que vamos a manajar y el 2º el mensaje que va aparecer.
    function setError(input, mensaje) {
        //Metemos en al constante el elemento padre de la etiqueta input
        const formContol = input.parentElement;
        //Seleccionamos la etiqueta small y la metemos en una constante
        //Con esto le decimos a que small no referimos.
        const small = formContol.querySelector('small');
        //En la constante formControl le agregamos la clase error para dar estilos.
        formContol.className = 'error';
        //Escribimos en la etiqueta small el mensaje.
        small.innerText = mensaje;
    }

    //En esta función solo tiene un parámetro, el input a manipular.
    function setCorrecto(input) {
        const formContol = input.parentElement;
        formContol.className = 'correcto';

    }

    //Script para ver la contraseña con un click y al sortar que deje de mostrar la contraseña.
    const ver_pass = document.querySelector('#ver_pass');
    ver_pass.addEventListener('mousedown', function() {
        let tipo = document.querySelector('#pass');
        if (tipo.type == 'password') {
            tipo.type = 'text';
            ver_pass.addEventListener('mouseup', function() {
                tipo.type = 'password';
            });
        }
    })
    const ver_pass_rep = document.querySelector('#ver_pass_rep');
    ver_pass_rep.addEventListener('mousedown', function() {
        let tipo = document.querySelector('#pass_rep');
        if (tipo.type == 'password') {
            tipo.type = 'text';
            ver_pass_rep.addEventListener('mouseup', function() {
                tipo.type = 'password';
            });
        }
    })
};

/**************************Validación formulario acceder ********************* */

if (document.querySelector('#formulario_acce')) {

    formulario_acce.addEventListener('submit', function validar(e) {

        /*Con preventDefault() evitamos que se ejecute submit() no se envia */
        e.preventDefault();
        let user = /^[a-zA-ZÀ-ÿ0-9_.]{1,15}$/;

        let contra = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
        let ok = 'si';
        let usuario = document.getElementById('usuario');
        let pass = document.getElementById('pass');

        if (!user.test(usuario.value)) {
            ok = 'no';
            setError(usuario, 'El campo de usuario no admite este formato.');
        } else {
            setCorrecto(usuario);
        }
        if (!contra.test(pass.value)) {
            ok = 'no';
            setError(pass, 'El campo contraseña debe tener entre 8 y 16 caracteres, al menos un numero, una mayúscula, una minúscula y al menos un caracter no alfanumérico.');
        } else {
            setCorrecto(pass);
        }

        if (ok == 'si') {
            /*Con submit() hacemos mandar a que se envie el documento formulario*/

            document.formulario_acce.submit();
        }
    });

    function setError(input, mensaje) {

        const formContol = input.parentElement;

        const small = formContol.querySelector('small');

        formContol.className = 'error';

        small.innerText = mensaje;
    }

    function setCorrecto(input) {
        const formContol = input.parentElement;
        formContol.className = 'correcto';
    }
    const ver_pass = document.querySelector('#ver_pass');
    ver_pass.addEventListener('mousedown', function() {
        let tipo = document.querySelector('#pass');
        if (tipo.type == 'password') {
            tipo.type = 'text';
            ver_pass.addEventListener('mouseup', function() {
                tipo.type = 'password';
            });
        }
    })
};
/************************************************************************************************/
/************************************ Página de perfil *****************************************/
/************************************************************************************************/


if (document.querySelector('#perfil')) {
    perfil.addEventListener('submit', function validar(e) {

        /*Con preventDefault() evitamos que se ejecute submit() no se envia */
        e.preventDefault();

        let name = /^[a-zA-ZÀ-ÿ\s]{1,20}$/; // Letras y espacios, pueden llevar acentos.

        let apelli = /^[a-zA-ZÀ-ÿ\s]{1,50}$/; // Letras y espacios, pueden llevar acentos.

        let direcc = /^[a-zA-ZÀ-ÿ0-9/,.ºª\s]{3,80}$/; //Letras, puende llevar acentos, números, espacios, /, , º, ª.

        let pobla = /^[a-zA-ZÀ-ÿ\s]{1,50}$/;

        let provi = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;

        let codigo = /^[0-9]{5}$/;

        let correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

        let tel = /^(6|7|8|9)[0-9]{8,9}$/; //  /^\d{7,14}$/; // 9 a 14 numeros.

        let fech = /^\d{4}-\d{2}-\d{2}$/; // /^\d{1,2}\/-\d{1,2}\/-\d{2,4}$/;

        let sex = /^[a-zA-ZÀ-ÿ/]{1,6}$/;

        let contra = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
        //Entre 8 y 16 caracteres, al menos una minúscula y una mayúscula y al menos un caracter no alfanumérico.

        let ok = 'si';

        //Quitamos el .value del final y lo ponemos en el parámetro de test() 
        let nombre = document.getElementById('nombre'); //.value;
        let apellidos = document.getElementById('apellidos');
        let direccion = document.getElementById('direccion');
        let poblacion = document.getElementById('poblacion');
        let provincia = document.getElementById('provincia');
        let cp = document.getElementById('cp');
        let email = document.getElementById('email');
        let telefono = document.getElementById('telefono');

        let pass = document.getElementById('pass');
        let pass_rep = document.getElementById('pass_rep');
        let fecha_nac = document.getElementById('fecha_nac');
        let sexo = document.getElementById('sexo');

        // console.log(name.test(nombre.value));
        /*Validamos la expresión regular con .exce() o con test()*/
        if (!name.test(nombre.value)) {
            ok = 'no';
            setError(nombre, 'El campo Nombre no está correctamente rellenado .');
        } else {
            setCorrecto(nombre);
        }
        if (!apelli.test(apellidos.value)) {
            ok = 'no';
            setError(apellidos, 'El campo Apellidos no está correctamente rellenado.');
        } else {
            setCorrecto(apellidos);
        }
        if (!direcc.test(direccion.value)) {
            ok = 'no';
            setError(direccion, 'El campo dirección no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(direccion);
        }
        if (!pobla.test(poblacion.value)) {
            ok = 'no';
            setError(poblacion, 'El campo población no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(poblacion);
        }
        if (!provi.test(provincia.value)) {
            ok = 'no';
            setError(provincia, 'El campo provincia no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(provincia);
        }
        if (!codigo.test(cp.value)) {
            ok = 'no';
            setError(cp, 'El campo código postal no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(cp);
        }
        if (!correo.test(email.value)) {
            ok = 'no';
            setError(email, 'El campo Email no está correctamente rellenado.');
        } else {
            setCorrecto(email);
        }
        if (!tel.test(telefono.value)) {
            ok = 'no';
            setError(telefono, 'El campo Teléfono no está correctamente rellenado.');
        } else {
            setCorrecto(telefono);
        }
        if (!fech.test(fecha_nac.value)) {
            ok = 'no';
            setError(fecha_nac, 'No has pusto ninguna fecha.');
        } else {
            setCorrecto(fecha_nac);
        }
        if (!sex.test(sexo.value)) {
            ok = 'no';
            setError(sexo, 'No has elegido ninguna opción.');
        } else {
            setCorrecto(sexo);
        }
        if (!pass.value && !pass_rep.value) {
            setCorrecto(pass);
            setCorrecto(pass_rep);
        } else {

            if (!contra.test(pass.value)) {
                ok = 'no';
                setError(pass, 'El campo contraseña debe tener entre 8 y 16 caracteres, al menos un numero, una mayúscula, una minúscula y al menos un caracter no alfanumérico.');
            } else {
                setCorrecto(pass);
            }
            if (pass_rep.value !== pass.value) {
                ok = 'no';
                setError(pass_rep, 'El campo Repetir cotraseña no coincide con la contraseña.');
            } else {
                setCorrecto(pass_rep);

            }
        }
        if (ok == 'si') {
            /*Con submit() hacemos mandar a que se envie el documento formulario*/

            document.perfil.submit();
        }

    });

    //Definimos las funciones en caso de error o de acierto
    //El setError tiene 2 parámetros el 1º es el input que vamos a manajar y el 2º el mensaje que va aparecer.
    function setError(input, mensaje) {
        //Metemos en la constante el elemento padre de la etiqueta input
        const formContol = input.parentElement;
        //Seleccionamos la etiqueta small y la metemos en una constante
        //Con esto le decimos a que small no referimos.
        const small = formContol.querySelector('small');
        //En la constante formControl le agregamos la clase error para dar estilos.
        formContol.className = 'error';
        //Escribimos en la etiqueta small el mensaje.
        small.innerText = mensaje;
    }

    //En esta función solo tiene un parámetro, el input a manipular.
    function setCorrecto(input) {
        const formContol = input.parentElement;
        formContol.className = 'correcto';
    }

    //Script para ver la contraseña con un click y al sortar que deje de mostrar la contraseña.
    const ver_pass = document.querySelector('#ver_pass');
    ver_pass.addEventListener('mousedown', function() {
        let tipo = document.querySelector('#pass');
        if (tipo.type == 'password') {
            tipo.type = 'text';
            ver_pass.addEventListener('mouseup', function() {
                tipo.type = 'password';
            });
        }
    })
    const ver_pass_rep = document.querySelector('#ver_pass_rep');
    ver_pass_rep.addEventListener('mousedown', function() {
        let tipo = document.querySelector('#pass_rep');
        if (tipo.type == 'password') {
            tipo.type = 'text';
            ver_pass_rep.addEventListener('mouseup', function() {
                tipo.type = 'password';
            });
        }
    })
    if (document.querySelector('#baja_admin')) {
        baja_admin.addEventListener('click', function preguntar(e) {
            if (confirm('¿Deseas eliminar por completo este usuario?')) {
                window.location.href = '../admin/control/baja_user.php';
            } else {
                window.location.href = '#';
            }
        });
    }
    if (document.querySelector('#baja_use')) {
        baja_use.addEventListener('click', function preguntar(e) {
            if (confirm('¿Deseas eliminar por completo este usuario?')) {
                window.location.href = '../admin/control/baja_user.php';
            } else {
                window.location.href = '#';
            }
        });
    }
    if (document.querySelector('#baja')) {
        baja.addEventListener('click', function preguntar(e) {
            let idU = document.getElementById('idU').value;
            if (confirm('¿Deseas eliminar por completo este usuario?')) {
                window.location.href = '../admin/control_admin/baja_usuario.php?idU=' + idU;
            } else {
                window.location.href = '#';
            }
        });
    }
}
//******************************************************************************************/
//******************************* Página Cita***********************************************/
//******************************************************************************************/

/************************************* Administrar cita de Usuario*****************************/

if (document.querySelector('#formulario_cita')) {

    $(document).ready(function() {
        $("#dia").datepicker({
            //Cambiar el formato
            dateFormat: "yy-mm-dd",
            //Primer día que sea lunes
            firstDay: 1,
            //Nombres de los días
            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            //Abreviatura de los días
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            //Meses del año
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            defaultDate: "+w",
            //changeMonth: true,
            minDate: 0,
            //showButtonPanel: true,
            //beforeShowDay: $.datepicker.noWeekends, //Bloquear los fines de semana
            beforeShowDay: function(day) {
                var day = day.getDay();
                if (day == 0) { //(day == 6 || day == 0) Bloqueo de las sábados y domingos
                    return [false, "somecssclass"]
                } else {
                    return [true, "someothercssclass"]
                }
            }
        });
        $("#dia").on("change", function() {
            let dia = document.getElementById('dia').value;
            // document.getElementById('dia2').value = dia;
            window.location = '../admin/control/control_cita.php?dia=' + dia;
        });

    });

    /************************************************* Administrar citas de administrador **********************/
    $(document).ready(function() {
        $("#dia_admin").datepicker({
            //Cambiar el formato
            dateFormat: "yy-mm-dd",
            //Primer día que sea lunes
            firstDay: 1,
            //Nombres de los días
            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            //Abreviatura de los días
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            //Meses del año
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            defaultDate: "+w",
            //changeMonth: true,
            minDate: 0,
            //showButtonPanel: true,
            //beforeShowDay: $.datepicker.noWeekends, //Bloquear los fines de semana
            beforeShowDay: function(day) {
                var day = day.getDay();
                if (day == 0) { //(day == 6 || day == 0) Bloqueo de las sábados y domingos
                    return [false, "somecssclass"]
                } else {
                    return [true, "someothercssclass"]
                }
            }
        });

        $("#dia_admin").on("change", function() {
            let dia = document.getElementById('dia_admin').value;
            let idU = document.getElementById('idU').value;
            window.location = '../admin/control_admin/control_cita_admin.php?dia_admin=' + dia + '&idU=' + idU;
        });
    });


    /******************************* Confirmación de de borrado y modificadión de citas **************/

    function borrar_cita(e) {

        if (confirm('¿Deseas eliminar la cita?')) {
            return true;
        } else {
            e.preventDefault();
            //Con esto detenemos el evento.
        }
    };
    let input_borrar = document.querySelectorAll('.ico_borrar');
    //Con esto obtenemos el número de botones de borrar_cita tenemos.
    for (i = 0; i < input_borrar.length; i++) {
        input_borrar[i].addEventListener('click', borrar_cita)
    };

    function modificar_cita(e) {

        if (confirm('¿Deseas modificar esta cita?')) {
            return true;

        } else {
            e.preventDefault();
            //Con esto detenemos el evento.
        }
    };

    let input_modificar = document.querySelectorAll('.ico_editar');
    for (i = 0; i < input_modificar.length; i++) {
        input_modificar[i].addEventListener('click', modificar_cita)
    };
}

if (document.querySelector('#admin_citas')) {
    function borrar_cita(e) {

        if (confirm('¿Deseas eliminar la cita?')) {
            return true;
        } else {
            e.preventDefault();
            //Con esto detenemos el evento.
        }
    };
    let input_borrar = document.querySelectorAll('.ico_borrar');
    //Con esto obtenemos el número de botones de borrar_cita tenemos.
    for (i = 0; i < input_borrar.length; i++) {
        input_borrar[i].addEventListener('click', borrar_cita)
    };

    function modificar_cita(e) {
        if (confirm('¿Deseas modificar esta cita?')) {
            return true;
        } else {
            e.preventDefault();
            //Con esto detenemos el evento.
        }
    };

    let input_modificar = document.querySelectorAll('.ico_editar');
    for (i = 0; i < input_modificar.length; i++) {
        input_modificar[i].addEventListener('click', modificar_cita)
    };
}



//******************************* Página Modificar Cita ****************************************/
if (document.querySelector('#modificar_cita')) {


    $(document).ready(function() {

        $("#dia").datepicker({
            //Cambiar el formato
            dateFormat: "yy-mm-dd",
            //Primer día que sea lunes
            firstDay: 1,
            //Nombres de los días
            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            //Abreviatura de los días
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            //Meses del año
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            defaultDate: "+w",
            //changeMonth: true,
            minDate: 0,
            //showButtonPanel: true,
            //beforeShowDay: $.datepicker.noWeekends, //Bloquear los fines de semana
            beforeShowDay: function(day) {
                var day = day.getDay();
                if (day == 0) { //(day == 6 || day == 0) Bloqueo de las sábados y domingos
                    return [false, "somecssclass"]
                } else {
                    return [true, "someothercssclass"]
                }
            }
        });
        $("#dia").on("change", function() {
            let dia = document.getElementById('dia').value;
            let id_cita = document.getElementById('id_cita').value;
            window.location = '../admin/control/control_modificar_cita.php?dia=' + dia + '&iD_2=' + id_cita;
            //Enviamos por GET a control_modificar_cita las variables dia de la cita y id de la cita.
        });
    });



}
/********************************************* Modifiacer y borrar noticias *********************/
if (document.querySelector('#mostrar_noticias')) {
    function borrar_noticia(e) {
        if (confirm('¿Deseas eliminar la noticia?')) {
            return true;
        } else {
            e.preventDefault();
            //Con esto detenemos el evento.
        }
    };
    let input_borrar = document.querySelectorAll('.ico_borrar');
    //Con esto obtenemos el número de botones de borrar_cita tenemos.
    for (i = 0; i < input_borrar.length; i++) {
        input_borrar[i].addEventListener('click', borrar_noticia)
    };

    function modificar_noticia(e) {
        if (confirm('¿Deseas modificar esta noticia?')) {
            return true;
        } else {
            e.preventDefault();
            //Con esto detenemos el evento.
        }
    };

    let input_modificar = document.querySelectorAll('.ico_editar');
    for (i = 0; i < input_modificar.length; i++) {
        input_modificar[i].addEventListener('click', modificar_noticia)
    };
}

//*****************************Función menú hamburquesa*****************************************/

const toggleButton = document.getElementById('button-menu');
const navWrapper = document.getElementById('nav_links_registro');

toggleButton.addEventListener('click', () => {
    toggleButton.classList.toggle('close')
    navWrapper.classList.toggle('show')
});

const textHide_port_btn = document.getElementById('textHide_port_btn');
const textHide_port = document.getElementById('textHide_port');

//Función leer más del index
if (document.querySelector('#contenedor_portada')) {
    textHide_port_btn.addEventListener('click', () => {
        textHide_port.classList.toggle('show_port_btn');
        if (textHide_port.classList.contains('show_port_btn')) {
            textHide_port_btn.innerHTML = 'Leer menos';
        } else {
            textHide_port_btn.innerHTML = 'Leer más';
        }
    })
    textHide_corte_btn.addEventListener('click', () => {
        corte.classList.toggle('show_servicios');

        textHide_corte.classList.toggle('show_corte_btn');


        if (textHide_corte.classList.contains('show_corte_btn')) {

            textHide_corte_btn.innerHTML = 'Leer menos';
        } else {
            textHide_corte_btn.innerHTML = 'Leer más';
        }
    })
    textHide_tinte_btn.addEventListener('click', () => {
        tinte.classList.toggle('show_servicios');
        textHide_tinte.classList.toggle('show_tinte_btn');

        if (textHide_tinte.classList.contains('show_tinte_btn')) {

            textHide_tinte_btn.innerHTML = 'Leer menos';
        } else {
            textHide_tinte_btn.innerHTML = 'Leer más';
        }
    })
    textHide_peinado_btn.addEventListener('click', () => {
        peinado.classList.toggle('show_servicios');
        textHide_peinado.classList.toggle('show_peinado_btn');

        if (textHide_peinado.classList.contains('show_peinado_btn')) {

            textHide_peinado_btn.innerHTML = 'Leer menos';
        } else {
            textHide_peinado_btn.innerHTML = 'Leer más';
        }
    })
    textHide_moldeado_btn.addEventListener('click', () => {
        moldeado.classList.toggle('show_servicios');
        textHide_moldeado.classList.toggle('show_moldeado_btn');

        if (textHide_moldeado.classList.contains('show_moldeado_btn')) {

            textHide_moldeado_btn.innerHTML = 'Leer menos';
        } else {
            textHide_moldeado_btn.innerHTML = 'Leer más';
        }
    })
}

/************************** Validación formulario registro ********************/

if (document.querySelector('#formulario_reg')) {

    formulario_reg.addEventListener('submit', function validar(e) {

        /*Con preventDefault() evitamos que se ejecute submit() no se envia */
        e.preventDefault();

        let name = /^[a-zA-ZÀ-ÿ\s]{1,20}$/; // Letras y espacios, pueden llevar acentos.

        let apelli = /^[a-zA-ZÀ-ÿ\s]{1,50}$/; // Letras y espacios, pueden llevar acentos.

        let direcc = /^[a-zA-ZÀ-ÿ0-9/,.ºª\s]{3,80}$/; //Letras, puende llevar acentos, números, espacios, /, , º, ª.

        let pobla = /^[a-zA-ZÀ-ÿ\s]{1,50}$/;

        let provi = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;

        let codigo = /^[0-9]{5}$/;

        let correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

        let tel = /^(6|7|8|9)[0-9]{8}$/; //  /^\d{7,14}$/; // 9 a 14 numeros.

        let fech = /^\d{4}-\d{2}-\d{2}$/; // /^\d{1,2}\/-\d{1,2}\/-\d{2,4}$/;

        let sex = /^[a-zA-ZÀ-ÿ/]{1,2}$/;

        let user = /^[a-zA-ZÀ-ÿ0-9_.]{1,15}$/;

        let contra = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
        //Entre 8 y 16 caracteres, al menos una minúscula y una mayúscula y al menos un caracter no alfanumérico.

        let ok = 'si';

        let msg = '';

        //Quitamos el .value del final y lo ponemos en el parámetro de test() 
        let nombre = document.getElementById('nombre'); //.value;
        let apellidos = document.getElementById('apellidos');
        let direccion = document.getElementById('direccion');
        let poblacion = document.getElementById('poblacion');
        let provincia = document.getElementById('provincia');
        let cp = document.getElementById('cp');
        let email = document.getElementById('email');
        let telefono = document.getElementById('telefono');
        let usuario = document.getElementById('usuario');
        let pass = document.getElementById('pass');
        let pass_rep = document.getElementById('pass_rep');
        let fecha_nac = document.getElementById('fecha_nac');
        let sexo = document.getElementById('sexo');

        // console.log(name.test(nombre.value));
        /*Validamos la expresión regular con .exce() o con test()*/
        if (!name.test(nombre.value)) {
            ok = 'no';
            setError(nombre, 'El campo Nombre no está correctamente rellenado .');
        } else {
            setCorrecto(nombre);
        }
        if (!apelli.test(apellidos.value)) {
            ok = 'no';
            setError(apellidos, 'El campo Apellidos no está correctamente rellenado.');
        } else {
            setCorrecto(apellidos);
        }
        if (!direcc.test(direccion.value)) {
            ok = 'no';
            setError(direccion, 'El campo dirección no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(direccion);
        }
        if (!pobla.test(poblacion.value)) {
            ok = 'no';
            setError(poblacion, 'El campo población no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(poblacion);
        }
        if (!provi.test(provincia.value)) {
            ok = 'no';
            setError(provincia, 'El campo provincia no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(provincia);
        }
        if (!codigo.test(cp.value)) {
            ok = 'no';
            setError(cp, 'El campo código postal no está correctamente rellenado o no es un formato válido.');
        } else {
            setCorrecto(cp);
        }
        if (!correo.test(email.value)) {
            ok = 'no';
            setError(email, 'El campo Email no está correctamente rellenado.');
        } else {
            setCorrecto(email);
        }
        if (!tel.test(telefono.value)) {
            ok = 'no';
            setError(telefono, 'El campo Teléfono no está correctamente rellenado.');
        } else {
            setCorrecto(telefono);
        }
        if (!fech.test(fecha_nac.value)) {
            ok = 'no';
            setError(fecha_nac, 'No has pusto ninguna fecha.');
        } else {
            setCorrecto(fecha_nac);
        }
        if (!sex.test(sexo.value)) {
            ok = 'no';
            setError(sexo, 'No has elegido ninguna opción.');
        } else {
            setCorrecto(sexo);
        }
        if (!user.test(usuario.value)) {
            ok = 'no';
            setError(usuario, 'El campo de usuario no admite este formato.');
        } else {
            setCorrecto(usuario);
        }
        if (!contra.test(pass.value)) {
            ok = 'no';
            setError(pass, 'El campo contraseña debe tener entre 8 y 16 caracteres, al menos una minúscula y una mayúscula y al menos un caracter no alfanumérico.');
        } else {
            setCorrecto(pass);
        }
        if (pass_rep.value !== pass.value) {
            ok = 'no';
            setError(pass_rep, 'El campo Repetir cotraseña no coincide con la contraseña.');
        } else {
            setCorrecto(pass_rep);
        }
        if (ok == 'si') {
            /*Con submit() hacemos mandar a que se envie el documento formulario*/
            document.formulario_reg.submit();
        }

    });

    //Definimos las funciones en caso de error o de acierto
    //El setError tiene 2 parámetros el 1º es el input que vamos a manajar y el 2º el mensaje que va aparecer.
    function setError(input, mensaje) {
        //Metemos en al constante el elemento padre de la etiqueta input
        const formContol = input.parentElement;
        //Seleccionamos la etiqueta small y la metemos en una constante
        //Con esto le decimos a que small no referimos.
        const small = formContol.querySelector('small');
        //En la constante formControl le agregamos la clase error para dar estilos.
        formContol.className = 'error';
        //Escribimos en la etiqueta small el mensaje.
        small.innerText = mensaje;
    }

    //En esta función solo tiene un parámetro, el input a manipular.
    function setCorrecto(input) {
        const formContol = input.parentElement;
        formContol.className = 'correcto';
    }
};
/********************************* Contacto **************************************/

if (document.querySelector('#mimapa')) {
    let options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0 //No queremos coger posicionamiento de caché.
    };
    //Ejecutamos la condición si en el dispositivo está activado el geolocalizador.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sucess, error, options);

    } else {
        alert('Los servicios de geolocalización no están disponibles');
    }

    function sucess(position) { //Calculamos la posición del usuario.
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;
        //Iniciamos coordenadas en el mapa del usuario.
        let map = L.map('mimapa', {
            center: [latitude, longitude],
            zoom: 10
        });
        //Aplicamos capa, tipo de mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        //añadimos el primer marcador:

        //podemos personalizar el tipo de marcador.
        //Icono de meta.
        let final = L.icon({
            iconUrl: '../assets/images/meta_mapa1.png',
            iconSize: [50, 40],
            iconAnchor: [20, 45]
        });
        //insertamos en let marker {icon: marcador}

        //let marker = L.marker([39.8659848445602, -4.02622594524905], { icon: final }).bindTooltip("<img src='../assets/images/Local.png' alt='Imagen Lorem_&_Ipsum.com'width='60px' height='60px'><br><b>Lorem_&_Ipsum.com</b><br><a href='../assets/images/Local.PNG' target='_black'>Solicita más información</a>").openTooltip().addTo(map);

        //Icono de inicio.
        let inicio = L.icon({
            iconUrl: '../assets/images/inicio_mapa1.png',
            iconSize: [60, 55],
            iconAnchor: [30, 25]
        });
        //Icono de intermedio.
        let track = L.icon({
                iconUrl: '../assets/images/paso_mapa.png',
                iconSize: [60, 50],
                iconAnchor: [0, 50]
            })
            //Trazamos ruta.
        let control = L.Routing.control({
            waypoints: [
                L.latLng(latitude, longitude),
                L.latLng(39.8659848445602, -4.02622594524905)
            ],
            language: 'es',

            show: false, //Activamos el cartel del enrutamiento.
            //Esto es para crear las marcas con trazo de ruta.
            createMarker: function(i, wp, nWps) {
                switch (i) {
                    case 0:
                        return L.marker(wp.latLng, {
                            icon: inicio,
                            draggable: true
                        }).bindPopup("<b>" + "Tu posición" + "</b>");
                    case nWps - 1:
                        return L.marker(wp.latLng, {
                            icon: final,
                            draggable: false
                        }).bindPopup("<img src='../assets/images/Local.png' alt='Imagen Lorem_&_Ipsum.com'width='60px' height='60px'><br><b>Lorem_&_Ipsum.com</b><br><a href='../assets/images/Local.PNG' target='_black'>Solicita más información</a>");
                    default:
                        return L.marker(wp.latLng, {
                            icon: track,
                            draggable: true
                        }).bindPopup("<b>" + "Ruta alternativa" + "</b>");
                }
            }
        }).addTo(map);

    }
    //Cuando va mal o no da permiso de geolocalización del usuario.
    function error() {
        let map = L.map('mimapa', {
            center: [39.8659848445602, -4.02622594524905],
            zoom: 18
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        let marker = L.marker([39.8659848445602, -4.02622594524905]).bindPopup("<img src='../assets/images/Local.png' alt='Imagen Lorem_&_Ipsum.com'width='60px' height='60px'><br><b>Lorem_&_Ipsum.com</b><br><a href='../assets/images/Local.PNG' target='_black'>Solicita más información</a>").openPopup().addTo(map);

    }
}