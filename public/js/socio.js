$(document).ready(function () {
  $("#ContenedorCarritoOrden").hide();
  $("#contenedorCarrito").hide();
  numeroInscripciones();
});

var numeroInscripciones = function () {
  var URL = "/partner/inscriptions/numeroInscripciones";
  $.ajax({
    type: "GET",
    url: URL,
    success: function (response) {
      $("#numero_inscripciones").text(response);
      $("#numero_socios").text(response);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
};

//Evento para eliminar el producto del carrito
$(document).on("click", ".btn_remove_item", function () {
  $(this).parent().parent().remove();
  calculosCarrito();
});

// Evento para ir a la SEMIVISTAR INSCRIPCION ========================================================
$("#btn_contenedorInscripcion").click(function () {
  //Se llama la funcion para mostrar un RESUMEN DEL CARRITO
  ResumenOrden();
  $("#ContenedorCarritoOrden").hide();
  $("#btn_atras").show();
  $("#ContainerBotonEnviar").show();
  $("#ContenedorInscripcionSocio").show();
});
// Evento para ir a la SEMIVISTAR ORDEN CARRITO ======================================================
$("#btn_contenedorCarrito").click(function () {
  $("#ContenedorInscripcionSocio").hide();
  $("#ContainerBotonEnviar").hide();
  $("#btn_atras").hide();
  $("#ContenedorCarritoOrden").show();
});

// CONFIRMACION DE CORREOS =============================================================================
$("#email_2").on("keyup", function () {
  var email_1 = $("#email_1").val();

  if (email_1 == $(this).val()) {
    $("#email_1").removeClass("is-invalid");
    $("#email_1").addClass("is-valid");

    $("#email_2").removeClass("is-invalid");
    $("#email_2").addClass("is-valid");
  } else {
    $("#email_1").addClass("is-invalid");
    $("#email_2").addClass("is-invalid");
  }
});
$("#email_1").on("keyup", function () {
  $("#email_1").removeClass("is-invalid");
  $("#email_2").removeClass("is-invalid");
  $("#email_1").removeClass("is-valid");
  $("#email_2").removeClass("is-valid");
});
// CONFIRMACION DE CONTRASEÑAS  =======================================================================
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

// INSCRIPCION DE NUEVO SOCIO MEDIANTE PAQUETE =========================================================================
// Evento para la SELECCION DE PAQUETES
$("#paquete_select").change(function () {
  //Obteniendo el ID del PAQUETE SELECCIONADO
  var id_paquete = $(this).val();

  //Haciendo una consulta sobre el contenido DEL PAQUETE
  var URL = "/partner/inscriptions/paquetes/" + id_paquete;
  $.ajax({
    type: "GET",
    url: URL,
    success: function (response) {
      EnlistarProductosDelPaquete(response);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Ajax");
    },
  });
});
//Enlistando los productos en el CARRITO - PAQUETE
var EnlistarProductosDelPaquete = function (data) {
  // Vaciando los campos
  $("#total_resumen_carrito_paquete").val(0);
  $("#subtotal_resumen_carrito_paquete").val(0);
  $("#igv_resumen_carrito_paquete").val(0);
  $("#puntos_resumen_carrito_paquete").val(0);

  //Vaciando TABLA al cambiar de Paquete
  $("#table_resumen_carrito_package")
    .find("tbody tr")
    .each(function () {
      $(this).remove();
    });

  for (var item in data) {
    var producto = data[item];

    var fila =
      "<tr>" +
      // Aqui se esta creando INPUT - HIDDEN que almacenan informacion
      "<input type='hidden' value='" +
      producto.idProducto +
      "' name='id_producto[]' class='id_producto'>" +
      "<input type='hidden' value='" +
      producto.puntosProducto +
      "' name='puntos_producto[]' class='puntos_producto'>" +
      "<input type='hidden' value='" +
      producto.puntosProducto * producto.cantidadProducto +
      "' name='subtotal_puntos_producto[]'>" +
      "<input type='hidden' value='" +
      producto.precioProducto +
      "' name='precio_producto[]' class='precio_producto'>" +
      "<input type='hidden' value='" +
      producto.precioProducto * producto.cantidadProducto +
      "' name='subtotal_precio_producto[]'>" +
      "<input type='hidden' value='" +
      producto.cantidadProducto +
      "' name='cantidad_producto[]' class='cantidad_producto'>" +
      // ============================================================
      // COLUMNA
      "<td>" +
      "<p class='text-sm filasTable'>" +
      producto.nombreProducto +
      "</p>" +
      "</td>" +
      // COLUMNA
      "<td class='filasTable'>" +
      producto.cantidadProducto +
      "</td>" +
      // COLUMNA
      "<td class='filasTable'>S/." +
      producto.precioProducto +
      "</td>" +
      "</tr>";

    $("#table_resumen_carrito_package").append(fila);
    // Haciendo calculos de los PRODUCTOS EN EL CARRITO
    calculosCarritoPaquete();
  }
};
// Funcion para hacer calculos en el carrito
var calculosCarritoPaquete = function () {
  var total_soles = 0;
  var total_puntos = 0;
  // Recorriendo las filas de la TABLA - TBODY
  $("#table_resumen_carrito_package")
    .find("tbody tr")
    .each(function () {
      // Obteniendo el PRECIO DEL PRODUCTO DESDE EL CARRITO
      var precio = $(this).find(".precio_producto").val();

      // Obteniendo la cantidad del PRODUCTO DESDE EL CARRITO
      var cantidad = $(this).find(".cantidad_producto").val();

      // Obteniendo los puntos del PRODUCTO DESDE EL CARRITO
      var puntos = $(this).find(".puntos_producto").val();

      // Calculando el costo y los puntos por cada ITEM del carrito
      total_puntos = total_puntos + cantidad * puntos;
      total_soles = total_soles + precio * cantidad;
    });

  var subtotal = total_soles / 1.18;
  var igv = total_soles - subtotal;

  // Pasando los datos a la vista RESUMEN CARRITO PAQUETE
  $("#total_resumen_carrito_paquete").val(total_soles.toFixed(3));
  $("#subtotal_resumen_carrito_paquete").val(subtotal.toFixed(3));
  $("#igv_resumen_carrito_paquete").val(igv.toFixed(3));
  $("#puntos_resumen_carrito_paquete").val(total_puntos);
};

// INSCRIPCION DE NUEVO SOCIO MEDIANTE ELECCION LIBRE ===============================================================
// EVENTO PARA AGREGAR PRODUCTOS AL CARRITO
$(".btn_agregarProducto").click(function () {
  var item = $(this).parent().parent().parent();

  // Obteniendo los datos del PRODUCTO SELECCIONADO
  var id = item.find(".id_producto").val();
  var nombre = item.find(".nombre_producto").val();
  var precio = item.find(".precio_producto").val();
  var puntos = item.find(".puntos_producto").val();

  // Generando una variable BOOLEANA para el control de unidades
  var estado = true;

  // Almacenando la tabla CARRITO
  var tablaCarrito = $("#table_carrito");

  console.log("asdasd");

  // Recorriendo las TR o FILAS DE TBODY - TABLA CARRITO
  tablaCarrito.find("tbody tr").each(function () {
    // Obteniendo el ID del producto del CARRITO PARA LUEGO HACER UNA COMPARACION
    var id_producto = $(this).find(".id_producto").val();

    console.log("emtrpppp");
    console.log(id_producto + "-----" + id);

    //Comprobando si el PRODUCTO existe EN EL CARRITO, solo se agregara UNIDADES
    if (id_producto == id) {
      //Obteniendo la cantidad de productos del CARRITO
      var cant_producto = $(this).find(".cantidad_producto").val();

      // Sumando Unidades al CARRITO
      cant_producto = parseInt(cant_producto) + 1;

      $(this).find(".cantidad_producto").val(cant_producto);

      // Como el producto existe en el carrio No se CREARA EL MISMO PRODUCTO OTRA VEZ EN EL CARRITO
      estado = false;
    }
  });

  // Si el producto no existe en el CARRITO SE AGREGA
  if (estado) {
    //Creando un STRING de etiquetas HTML que luego seran escritos en el DOM
    var fila_carrito =
      "<tr>" +
      // Aqui se esta creando INPUT - HIDDEN que almacenan informacion
      "<input type='hidden' value='" +
      id +
      "' name='id_producto[]' class='id_producto'>" +
      "<input type='hidden' value='" +
      precio +
      "' name='precio_producto[]' class='precio_producto'>" +
      "<input type='hidden' name='subtotal_precio_producto[]' value='0' class='subtotal_precio_producto'>" +
      "<input type='hidden' value='" +
      puntos +
      "' name='puntos_producto[]' class='puntos_producto'>" +
      "<input type='hidden' name='subtotal_puntos_producto[]' value='0' class='subtotal_puntos_producto'>" +
      "<input type='hidden' value='" +
      nombre +
      "' class='nombre_producto'>" +
      // ===============================================================
      // COLUMNA
      "<td>" +
      "<p class='text-sm'>" +
      nombre +
      "</p>" +
      "</td>" +
      // COLUMNA
      "<td class='filasTable'>" +
      "<input type='number' class='form-control form-control-sm inputCentrado cantidad_producto' value='1' name='cantidad_producto[]'>" +
      "</td>" +
      // COLUMNA
      "<td class='filasTable'>" +
      "<p class='text-sm'>S/." +
      precio +
      "</p>" +
      "</td>" +
      // COLUMNA
      "<td class='filasTable p-0'>" +
      "<button type='button' class='btn bg-gradient-danger btn-xs btn_remove_item'><i class='fas fa-times'></i></button>" +
      "</td>" +
      "</tr>";

    //Pasando la cadena de etiquetas HTML a la TABLA
    tablaCarrito.append(fila_carrito);
  }

  calculosCarrito();
});
// Funcion para recorrer los PRODUCTOS de CARRITO Y TRANAFERIRLOS A RESUMEN
var ResumenOrden = function () {
  //Aqui se evita la repeticion de datos en la RESUMEN - CARRITO
  $("#table_resumen_carrito")
    .find("tbody tr")
    .each(function () {
      $(this).remove();
    });

  $("#table_carrito")
    .find("tbody tr")
    .each(function () {
      // Obteniendo el PRECIO DEL PRODUCTO DESDE EL CARRITO
      var precio = $(this).find(".precio_producto").val();

      // Obteniendo la cantidad del PRODUCTO DESDE EL CARRITO
      var cantidad = $(this).find(".cantidad_producto").val();

      // Obteniendo el Nombre del PRODUCTO DESDE EL CARRITO
      var nombre = $(this).find(".nombre_producto").val();

      var fila =
        "<tr>" +
        // COLUMNA
        "<td>" +
        "<p class='text-sm filasTable'>" +
        nombre +
        "</p>" +
        "</td>" +
        // COLUMNA
        "<td class='filasTable'>" +
        cantidad +
        "</td>" +
        // COLUMNA
        "<td class='filasTable'>S/." +
        precio +
        "</td>" +
        "</tr>";

      $("#table_resumen_carrito").append(fila);
    });
};

//Evento para eliminar el producto del carrito
$(document).on("keyup", ".cantidad_producto", function () {
  calculosCarrito();
});

//CALCULOS - TOTAL - SUBTOTAL - IGV - TOTAL_PUNTOS
// Esta funcion Contiene los CALCULOS DE RESUMEN CARRITO Y DEL CARRITO
var calculosCarrito = function () {
  var total_soles = 0;
  var total_puntos = 0;
  // Recorriendo las filas de la TABLA - TBODY
  $("#table_carrito")
    .find("tbody tr")
    .each(function () {
      // Obteniendo el PRECIO DEL PRODUCTO DESDE EL CARRITO
      var precio = $(this).find(".precio_producto").val();

      // Obteniendo la cantidad del PRODUCTO DESDE EL CARRITO
      var cantidad = $(this).find(".cantidad_producto").val();

      // Obteniendo los puntos del PRODUCTO DESDE EL CARRITO
      var puntos = $(this).find(".puntos_producto").val();

      // Calculando el SUBTOTAL DE PRECIO
      $(this)
        .find(".subtotal_precio_producto")
        .val(precio * cantidad);
      // Calculando el SUBTOTAL DE PUNTOS
      $(this)
        .find(".subtotal_puntos_producto")
        .val(puntos * cantidad);

      // Calculando el costo y los puntos por cada ITEM del carrito
      total_puntos = total_puntos + cantidad * puntos;

      total_soles = total_soles + precio * cantidad;
    });

  var subtotal = total_soles / 1.18;
  var igv = total_soles - subtotal;

  // Pasando los datos CALCULADOS A LA VISTA ORDEN
  $("#total_soles_carrito").val(total_soles.toFixed(3));
  $("#subtotal_carrito").val(subtotal.toFixed(3));
  $("#igv_carrito").val(igv.toFixed(3));
  $("#total_puntos_carrito").val(total_puntos);

  // Pasando los datos a la vista RESUMEN CARRITO
  $("#total_resumen_carrito").val(total_soles.toFixed(3));
  $("#subtotal_resumen_carrito").val(subtotal.toFixed(3));
  $("#igv_resumen_carrito").val(igv.toFixed(3));
  $("#puntos_resumen_carrito").val(total_puntos);
};

// ORDEN - SOCIO =========================================================================================================================
var contenedorResumenCarrito = $("#container-resumen-carrito");
var tablaCarrito = $("#table-carrito");

$("#btn_contenedorCarrito").click(function () {
  $("#contenedorProductos").hide();
  $("#contenedorCarrito").show();
});

$("#btn_contenedorProductos").click(function () {
  $("#contenedorProductos").show();
  $("#contenedorCarrito").hide();
});

$(".btn_addProducto").click(function () {
  var item = $(this).parent();

  var idProducto = item.find(".id_producto").val();
  var precioProducto = item.find(".precio_producto").val();
  var nombreProducto = item.find(".nombre_producto").val();
  var puntosProducto = item.find(".puntos_producto").val();
  var imagenProducto = item.find(".imagen_producto").val();
  var codigoProducto = item.find(".codigo_producto").val();

  var existe = false;

  contenedorResumenCarrito.find(".productoCar").each(function () {
    var idProductoCar = $(this).find(".idPro").val();
    if (idProducto === idProductoCar) {
      existe = true;
    }
  });

  if (!existe) {
    var objProducto1 =
      "<div class='row container-fluid mb-2 productoCar'>" +
      "<input type='hidden' class='idPro' value='" +
      idProducto +
      "'>" +
      "<div class='col-3 col-sm-2 col-lg-3 p-0' align='center'>" +
      "<button type='button' class='btn bg-gradient-danger btn-xs btn-quitar1'><i class='fas fa-times'></i></button>" +
      "</div>" +
      "<div class='col-6 col-sm-8 col-lg-7 p-0'>" +
      "<p class='text-sm m-0'>" +
      nombreProducto +
      "(" +
      codigoProducto +
      ")" +
      "</p>" +
      // estableciendo clases  PRECIO Y CANTIDAD PRODUCTO
      "<p class='text-sm m-0'><b class='cantidadProducto'>1</b> unidad(es) x S/<b class='precioProducto'>" +
      precioProducto +
      "</b></p>" +
      "</div>" +
      "<div class='col-2 col-sm-2 col-lg-2 p-0'>" +
      "<img src='" +
      imagenProducto +
      "' class='img-responsive border' alt='...' width='35px' height='35px' style='border-radius:5px'>" +
      "</div>" +
      "</div>";

    contenedorResumenCarrito.append(objProducto1);
  }

  if (!existe) {
    var objProducto2 =
      "<tr>" +
      // Creando INPUTS tipo HIDDEN para almacenar los valores
      "<input type='hidden' class='idProducto' name='id_producto[]' value='" +
      idProducto +
      "'>" +
      "<input type='hidden' class='precioProducto' name='precio_producto[]' value='" +
      precioProducto +
      "'>" +
      "<input type='hidden' class='puntosProducto' name='puntos_producto[]' value='" +
      puntosProducto +
      "'>" +
      "<input type='hidden' class='subtotalPrecioProducto' name='subtotal_precio_producto[]' value='" +
      precioProducto +
      "'>" +
      "<input type='hidden' class='subtotalPuntosProducto' name='subtotal_puntos_producto[]' value='" +
      puntosProducto +
      "'>" +
      // CAMPORS PARA LA VISTA
      "<td class='text-center'>" +
      "<button type='button' class='btn bg-gradient-danger btn-xs btn-quitar2'><i class='fas fa-times'></i></button>" +
      "</td>" +
      "<td class='text-center'>" +
      "<img src='" +
      imagenProducto +
      "' class='img-responsive border' alt='...' width='55px' height='55px' style='border-radius:5px'>" +
      "</td>" +
      "<td>" +
      "<p class='text-sm m-0'>" +
      nombreProducto +
      "(" +
      codigoProducto +
      ")</p>" +
      "<p class='text-sm m-0'><b>Precio: </b>S/" +
      precioProducto +
      "</p>" +
      "<p class='text-sm m-0'><b>Puntos: </b>" +
      puntosProducto +
      "</p>" +
      "</td>" +
      "<td>" +
      "<input type='text' class='form-control form-control-sm cantidadProducto text-center' value='1' name='cantidad_producto[]' readonly>" +
      "</td>" +
      "<td class='text-center'>" +
      "<div class='btn-group-vertical'>" +
      "<button type='button' class='btn btn-xs btn-primary btn_addPro'><i class='fas fa-plus'></i></button>" +
      "<button type='button' class='btn btn-xs btn-default btn_restPro'><i class='fas fa-minus'></i></button>" +
      "</div>" +
      "</td>" +
      "<td class='text-center'>" +
      "<p class='text-sm subtotalPuntosView'>" +
      puntosProducto +
      "</p>" +
      "</td>" +
      "<td class='text-center'>" +
      "<p class='text-sm'>S/<b class='subtotalPrecioView'>" +
      precioProducto +
      "</b></p>" +
      "</td>" +
      "</tr>";

    tablaCarrito.append(objProducto2);
  }

  totalPrecio_totalPuntos();
});

var totalPrecio_totalPuntos = function () {
  var totalPuntos = 0;
  var totalPrecio = 0;

  tablaCarrito.find("tbody tr").each(function () {
    var cantidadProductoCar = parseInt($(this).find(".cantidadProducto").val());
    var precioProductoCar = parseInt($(this).find(".precioProducto").val());
    var puntosProductoCar = parseInt($(this).find(".puntosProducto").val());

    totalPrecio += cantidadProductoCar * precioProductoCar;
    totalPuntos += cantidadProductoCar * puntosProductoCar;
  });

  var subtotal = totalPrecio / 1.18;
  var igv = totalPrecio - subtotal;

  // Para el resumen carrito
  $("#totalPrecioCar").text(totalPrecio);
  $("#totalPuntosCar").text(totalPuntos);

  // Para el carrito tabla
  $("#totalPrecioTabla").text(totalPrecio);
  $("#totalPuntosTabla").text(totalPuntos);

  $("#subtotalPrecioTabla").text(subtotal.toFixed(3));
  $("#igvTabla").text(igv.toFixed(3));

  $("#subtotal_precio_tabla").val(subtotal.toFixed(3));
  $("#igv_tabla").val(igv.toFixed(3));

  // Para los INPUTS CARRITO TABLA
  $("#total_precio_tabla").val(totalPrecio);
  $("#total_puntos_tabla").val(totalPuntos);
};

$(document).on("click", ".btn-quitar1", function () {
  var item = $(this).parent().parent();
  var idProducto = item.find(".idPro").val();

  tablaCarrito.find("tbody tr").each(function () {
    if (idProducto === $(this).find(".idProducto").val()) {
      $(this).remove();
    }
  });

  item.remove();
  totalPrecio_totalPuntos();
});

$(document).on("click", ".btn-quitar2", function () {
  var item = $(this).parent().parent();
  var idProducto = item.find(".idProducto").val();

  contenedorResumenCarrito.find(".productoCar").each(function () {
    if (idProducto === $(this).find(".idPro").val()) {
      $(this).remove();
    }
  });

  item.remove();
  totalPrecio_totalPuntos();
});

$(document).on("click", ".btn_addPro", function () {
  var item = $(this).parent().parent().parent();

  var idProducto = item.find(".idProducto").val();
  var precioProducto = item.find(".precioProducto").val();
  var puntosProducto = item.find(".puntosProducto").val();
  var cantidad = parseInt(item.find(".cantidadProducto").val());

  cantidad += 1;

  contenedorResumenCarrito.find(".productoCar").each(function () {
    var idProductoCar = $(this).find(".idPro").val();
    if (idProducto === idProductoCar) {
      $(this).find(".cantidadProducto").text(cantidad);
    }
  });

  var totalPrecio = cantidad * precioProducto;
  var totalPuntos = cantidad * puntosProducto;

  item.find(".subtotalPrecioView").text(totalPrecio);
  item.find(".subtotalPuntosView").text(totalPuntos);

  item.find(".subtotalPrecioProducto").val(totalPrecio);
  item.find(".subtotalPuntosProducto").val(totalPuntos);

  item.find(".cantidadProducto").val(cantidad);
  totalPrecio_totalPuntos();
});

$(document).on("click", ".btn_restPro", function () {
  var item = $(this).parent().parent().parent();

  var idProducto = item.find(".idProducto").val();
  var precioProducto = item.find(".precioProducto").val();
  var puntosProducto = item.find(".puntosProducto").val();
  var cantidad = parseInt(item.find(".cantidadProducto").val());

  if (cantidad > 1) {
    cantidad -= 1;

    contenedorResumenCarrito.find(".productoCar").each(function () {
      var idProductoCar = $(this).find(".idPro").val();
      if (idProducto === idProductoCar) {
        $(this).find(".cantidadProducto").text(cantidad);
      }
    });
  }

  var totalPrecio = cantidad * precioProducto;
  var totalPuntos = cantidad * puntosProducto;

  item.find(".subtotalPrecioView").text(totalPrecio);
  item.find(".subtotalPuntosView").text(totalPuntos);

  item.find(".subtotalPrecioProducto").val(totalPrecio);
  item.find(".subtotalPuntosProducto").val(totalPuntos);

  item.find(".cantidadProducto").val(cantidad);
  totalPrecio_totalPuntos();
});
