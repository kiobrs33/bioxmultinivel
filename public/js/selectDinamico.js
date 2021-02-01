$(document).ready(function() {
    opcionesPaises();
});

// Funciones para OBTENER DATOS DE PAISES - DEPARTAMENTOS - PROVINCIAS Y DISTRITOS
// Se USA CALLBACK PARA LAS CONSULTAS ASINCRONAS
var paisesAJAX = function(funcion) {
    $.ajax({
        type: "GET",
        url: "/js/ubicaciones/paises.json",
        success: function(response) {
            funcion(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        }
    });
};

var departamentosAJAX = function(funcion) {
    $.ajax({
        type: "GET",
        url: "/js/ubicaciones/departamentos.json",
        success: function(response) {
            funcion(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        }
    });
};

var provinciasAJAX = function(funcion) {
    $.ajax({
        type: "GET",
        url: "/js/ubicaciones/provincias.json",
        success: function(response) {
            funcion(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        }
    });
};

var distritosAJAX = function(funcion) {
    $.ajax({
        type: "GET",
        url: "/js/ubicaciones/distritos.json",
        success: function(response) {
            funcion(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        }
    });
};

// Funcion para consultar Paises
var opcionesPaises = function() {
    paisesAJAX(function(response) {
        for (var clave in response) {
            var pais = response[clave];
            if (clave == 0) {
                var opcion =
                    "<option class='pais' value='" +
                    pais.name +
                    "' selected>" +
                    pais.name +
                    "</option>";
                $("#pais_select").append(opcion);
            } else {
                var opcion =
                    "<option class='pais' value='" +
                    pais.name +
                    "'>" +
                    pais.name +
                    "</option>";
                $("#pais_select").append(opcion);
            }
        }
        opcionesDepartamentos();
    });
};
// Funcion para consultar DEPARTAMENTOS DE ACUERDO AL PAIS SELECCIONADO
var opcionesDepartamentos = function(opcion) {
    $(".departamento").remove();

    var opcionSeleccionada;
    if (opcion) {
        opcionSeleccionada = opcion;
    } else {
        opcionSeleccionada = $("#pais_select").val();
    }

    var idPais;

    paisesAJAX(function(response) {
        for (var clave in response) {
            var pais = response[clave];
            if (opcionSeleccionada === pais.name) {
                idPais = pais.id;
                break;
            }
        }
    });

    departamentosAJAX(function(response) {
        for (var clave in response) {
            var departamento = response[clave];
            if (departamento.country_id == idPais) {
                if (clave == 0) {
                    var opcion =
                        "<option class='departamento' value='" +
                        departamento.name +
                        "' selected>" +
                        departamento.name +
                        "</option>";
                    $("#departamento_select").append(opcion);
                } else {
                    var opcion =
                        "<option class='departamento' value='" +
                        departamento.name +
                        "'>" +
                        departamento.name +
                        "</option>";
                    $("#departamento_select").append(opcion);
                }
            }
        }
        opcionesProvincias();
    });
};
// Funcion para consultar PROVINCIAS DE ACUERDO AL DEPARTAMENTO SELECCIONADO
var opcionesProvincias = function(opcion) {
    $(".provincia").remove();
    var opcionSeleccionada;
    if (opcion) {
        opcionSeleccionada = opcion;
    } else {
        opcionSeleccionada = $("#departamento_select").val();
    }

    var idDepartamento;
    departamentosAJAX(function(response) {
        for (var clave in response) {
            var departamento = response[clave];
            if (opcionSeleccionada === departamento.name) {
                idDepartamento = departamento.id;
                break;
            }
        }
    });

    provinciasAJAX(function(response) {
        for (var clave in response) {
            var provincia = response[clave];

            if (provincia.department_id == idDepartamento) {
                if (clave == 0) {
                    var opcion =
                        "<option class='provincia' value='" +
                        provincia.name +
                        "' selected>" +
                        provincia.name +
                        "</option>";
                    $("#provincia_select").append(opcion);
                } else {
                    var opcion =
                        "<option class='provincia' value='" +
                        provincia.name +
                        "'>" +
                        provincia.name +
                        "</option>";
                    $("#provincia_select").append(opcion);
                }
            }
        }
        opcionesDistritos();
    });
};
// Funcion para consultar DISTRITOS DE ACUERDO A la PROVINCIA SELECCIONADA
var opcionesDistritos = function(opcion) {
    $(".distrito").remove();
    var opcionSeleccionada;
    if (opcion) {
        opcionSeleccionada = opcion;
    } else {
        opcionSeleccionada = $("#provincia_select").val();
    }

    var idProvincia;
    provinciasAJAX(function(response) {
        for (var clave in response) {
            var provincia = response[clave];
            if (opcionSeleccionada === provincia.name) {
                idProvincia = provincia.id;
                break;
            }
        }
    });

    distritosAJAX(function(response) {
        for (var clave in response) {
            var distrito = response[clave];
            if (distrito.province_id == idProvincia) {
                if (clave == 0) {
                    var opcion =
                        "<option class='distrito' value='" +
                        distrito.name +
                        "' selected>" +
                        distrito.name +
                        "</option>";
                    $("#distrito_select").append(opcion);
                } else {
                    var opcion =
                        "<option class='distrito' value='" +
                        distrito.name +
                        "'>" +
                        distrito.name +
                        "</option>";
                    $("#distrito_select").append(opcion);
                }
            }
        }
    });
};

// EVENTOS DINAMICOS PARA LA SELECCION DE PAISES - DEPARTAMENTOS - PROVINCIAS - DISTRITOS
$("#pais_select").change(function() {
    var opcionSeleccionada = $(this).val();
    opcionesDepartamentos(opcionSeleccionada);
});
$("#departamento_select").change(function() {
    var opcionSeleccionada = $(this).val();
    $(".provincia").remove();
    opcionesProvincias(opcionSeleccionada);
});
$("#provincia_select").change(function() {
    var opcionSeleccionada = $(this).val();
    opcionesDistritos(opcionSeleccionada);
});
