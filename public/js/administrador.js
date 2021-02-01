$(document).ready(function () {
  //Funciones para mostrar cantidad de datos POR TABLA
  NumeroProveedores();
  NumeroTrabajadores();
  NumeroCategorias();
  NumeroRangos();
  NumeroAlmacenes();
  NumeroProductos();
  NumeroPaquetes();
  NumeroSocios();

  //Funcion para consultar los almacenes con AJAX
  almacenes();
});

//URL PRINCIPAL
let URL_MAIN = "";

//Numero de DATOS POR tabla
var NumeroTrabajadores = function () {
  var URL = URL_MAIN + "/admin/employees/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_trabajadores").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroCategorias = function () {
  var URL = URL_MAIN + "/admin/categories/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_categorias").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroRangos = function () {
  var URL = URL_MAIN + "/admin/ranks/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_rangos").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroProveedores = function () {
  var URL = URL_MAIN + "/admin/providers/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_proveedores").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroAlmacenes = function () {
  var URL = URL_MAIN + "/admin/warehouses/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_almacenes").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroProductos = function () {
  var URL = URL_MAIN + "/admin/products/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_productos").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroPaquetes = function () {
  var URL = URL_MAIN + "/admin/packages/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_paquetes").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
var NumeroSocios = function () {
  var URL = URL_MAIN + "/admin/partners/count";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        $("#numero_socios").text(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};

//ADMIN - PROVEEDORES =======================================================

$("#btn_buscar_ruc").click(function () {
  var ruc = $("#ruc_proveedor").val();
  if (ruc.length == 11) {
    var URL =
      "https://dniruc.apisperu.com/api/v1/ruc/" +
      ruc +
      "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InJlbmUubG96YW5vQHRlY3N1cC5lZHUucGUifQ.zaHm2Ff1axozxsNA1LT1H4ZSrR-FSxnmCmWcFBk-a3E";

    $("#razon_social_proveedor").val("buscando ...");
    $("#direccion_proveedor").val("buscando ...");

    $.ajax({
      type: "GET",
      url: URL,
      success: function (data) {
        $("#razon_social_proveedor").val(data.razonSocial);
        $("#direccion_proveedor").val(data.direccion);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error Ajax");
      },
    });
  }
});

//ADMIN - TRABAJADORES ===================================================

//Funciones para controlar PASSWORDS en la creacion del NUEVO TRABAJADOR
$("#password_2").on("keyup", function () {
  var password_1 = $("#password_1").val();

  if (password_1 == $(this).val()) {
    $("#password_1").removeClass("is-invalid");
    $("#password_1").addClass("is-valid");

    $("#password_2").removeClass("is-invalid");
    $("#password_2").addClass("is-valid");
  } else {
    $("#password_1").addClass("is-invalid");
    $("#password_2").addClass("is-invalid");
  }
});
$("#password_1").on("keyup", function () {
  $("#password_1").removeClass("is-invalid");
  $("#password_2").removeClass("is-invalid");
  $("#password_1").removeClass("is-valid");
  $("#password_2").removeClass("is-valid");
});

//Consulta AJAX - DNI
var consultaDNI = function (dni, funcion) {
  var URL =
    "https://dniruc.apisperu.com/api/v1/dni/" +
    dni +
    "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InJlbmUubG96YW5vQHRlY3N1cC5lZHUucGUifQ.zaHm2Ff1axozxsNA1LT1H4ZSrR-FSxnmCmWcFBk-a3E";

  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      //Devolviendo las datos MEDIANTE PARAMETROS a la Funcion
      funcion(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(textStatus);
    },
  });
};

//Evento para Buscar DNI - SOCIO
$("#btn_buscar_dniSocio").click(function () {
  var dni = $("#dni_socio").val();

  if (dni.length == 8) {
    $("#nombres_socio").val("Buscando...");
    $("#apellido_paterno_socio").val("Buscando...");
    $("#apellido_materno_socio").val("Buscando...");

    //Invocando a la funcion BUSCAR_DNI y con un callback obtenemos los resultados de la CONSULTA
    consultaDNI(dni, function (response) {
      $("#nombres_socio").val(response.nombres);
      $("#apellido_paterno_socio").val(response.apellidoPaterno);
      $("#apellido_materno_socio").val(response.apellidoMaterno);
    });
  }
});
//Evento para Buscar DNI - TRABAJADOR
$("#btn_buscar_dnitTrabajador").click(function () {
  var dni = $("#dni_trabajador").val();

  if (dni.length == 8) {
    $("#nombres_trabajador").val("Buscando ..");
    $("#apellido_paterno_trabajador").val("Buscando ..");
    $("#apellido_materno_trabajador").val("Buscando ..");

    //Invocando a la funcion BUSCAR_DNI y con un callback obtenemos los resultados de la CONSULTA
    consultaDNI(dni, function (response) {
      $("#nombres_trabajador").val(response.nombres);
      $("#apellido_paterno_trabajador").val(response.apellidoPaterno);
      $("#apellido_materno_trabajador").val(response.apellidoMaterno);
    });
  }
});

//ADMIN - PRODUCTOS ====================================================

//Funcion para obtener los ALMACENES MEDIANTE AJAX
var almacenes = function () {
  var URL = URL_MAIN + "/admin/warehouses/almacenes";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (data) {
      if (data) {
        selectAlmacen(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};
//Funcion para enlistar los ALMACENES EN UN SELECT
var almacenesAJAX;
var selectAlmacen = function (response) {
  var select =
    "<select class='form-control form-control-sm' name='almacen[]'>" +
    "<option value='' selected>Seleccionar</option>";

  for (let x = 0; x < response.length; x++) {
    let dato = response[x];
    select +=
      "<option value=" + dato.id + ">" + dato.nombreAlmacen + "</option>";
  }
  select += "</select>";
  almacenesAJAX = select;
};

//Funcion para agregar FILAS STOCK del FORMULARIO DEL NUEVO PRODUCTO
$("#btn_nuevo_stock").click(function () {
  var fila =
    "<tr>" +
    "<td class='filasTable'>" +
    almacenesAJAX +
    "</td>" +
    "<td class='filasTable'>" +
    "<input type='number' step='any' class='form-control form-control-sm inputCentrado' name='cantidad[]'>" +
    "</td>" +
    "<td class='filasTable'>" +
    "<button type='button' id='btn_removeStock' class='btn btn-danger btn-sm'><i class='fas fa-times-circle'></i></button>" +
    "</td>" +
    "</tr>";

  $("#table_stocks").append(fila);
});
//EVENTO para eliminar la fila agregada en la tabla STOCKS del FORMULARIO producto
$(document).on("click", "#btn_removeStock", function () {
  $(this).parent().parent().remove();
});

//ADMIN - PAQUETES ==================================================
$(document).on("click", ".btn-addProducto", function () {
  var fila = $(this).parent().parent();

  // Obteniendo los valores de la tabla
  var idProducto = fila.find(".id-producto").text();
  var nombreProducto = fila.find(".nombre-producto").text();
  var puntosProducto = fila.find(".puntos-producto").text();
  var precioProducto = fila.find(".precio-producto").text();

  // Generando una variable BOOLEANA para AGREGAR UNIDADES O GENERAR NUEVA FILA EN LA TABLA
  var estado = true;

  var tablaDetallesPaquete = $("#tableDetallesPaquete");

  // Recorriendo las TR o FILAS DE TBODY - TABLA DETALLES PAQUETE
  tablaDetallesPaquete.find("tbody tr").each(function () {
    // Obteniendo el ID del producto de la tabla PRODUCTOS PARA LUEGO HACER UNA COMPARACION
    var id_producto = $(this).find(".id-producto").val();

    //Comprobando si el PRODUCTO existe EN EL CARRITO, solo se agregara UNIDADES
    if (id_producto == idProducto) {
      //Obteniendo la cantidad de productos del CARRITO
      var cant_producto = $(this).find(".cantidad").val();

      // Sumando Unidades al CARRITO
      cant_producto = parseInt(cant_producto) + 1;

      $(this).find(".cantidad").val(cant_producto);

      // Como el producto existe en el carrio No se CREARA EL MISMO PRODUCTO OTRA VEZ EN EL CARRITO
      estado = false;
    }
  });

  if (estado) {
    var fila =
      "<tr>" +
      "<input type='hidden' value='" +
      idProducto +
      "' class='id-producto' name='producto[]'>" +
      "<td class='filasTable'>" +
      nombreProducto +
      "</td>" +
      "<td class='filasTable puntos'>" +
      puntosProducto +
      "</td>" +
      "<td class='filasTable precio'>" +
      precioProducto +
      "</td>" +
      "<td class='filasTable'>" +
      "<input type='number' step='any' class='form-control form-control-sm inputCentrado cantidad' name='cantidad[]' value='1'>" +
      "</td>" +
      "<td class='filasTable'>" +
      "<button type='button' class='btn btn-danger btn-xs btn-removeProducto'><i class='fas fa-times'></i></button>" +
      "</td>" +
      "</tr>";

    $("#tableDetallesPaquete").append(fila);
  }
  // Para calcular totales
  calculosResumenPaquete();
});

// Esta funcion Contiene los CALCULOS de la tabla de producto de PAQUETE
var calculosResumenPaquete = function () {
  var total_soles = 0;
  var total_puntos = 0;
  // Recorriendo las filas de la TABLA - TBODY
  $("#tableDetallesPaquete")
    .find("tbody tr")
    .each(function () {
      // Obteniendo el PRECIO DEL PRODUCTO
      var precio = $(this).find(".precio").text();

      // Obteniendo la cantidad del PRODUCTO
      var cantidad = $(this).find(".cantidad").val();

      // Obteniendo los puntos del PRODUCTO
      var puntos = $(this).find(".puntos").text();

      // Calculando el costo y los puntos por cada ITEM del carrito
      total_puntos = total_puntos + cantidad * puntos;
      total_soles = total_soles + precio * cantidad;
    });

  // Pasando los datos a la vista RESUMEN CARRITO
  $("#total_precio").val(total_soles.toFixed(3));
  $("#total_puntos").val(total_puntos);
  $("#puntos-paquete").val(total_puntos);
};

// Evento para eliminar fila de la tabla PRODUCTO - PAQUETE
$(document).on("click", ".btn-removeProducto", function () {
  $(this).parent().parent().remove();
  // Para calcular totales
  calculosResumenPaquete();
});

//ADMIN INSCRIPCIONES ==================================================
