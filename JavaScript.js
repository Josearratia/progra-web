var articulos = [];
var ids = [];
var precios = [];
var cantidad = [];
var vSubtotal = [];
var countid = 0;
var tsubtotal = 0;
var finaliva = 0;


var body = document.getElementsByTagName("body")[0];

function lista() {
    var producto = document.getElementById("productos");
    var id = document.getElementById("productos");
    var precio = document.getElementById("precio");
    var unidades = document.getElementById("cantidad");
    var validacion1;
    var validacion2;
    var validacion3;


    if (producto.options[producto.selectedIndex].text != '0') {
        console.log(producto.options[producto.selectedIndex].text); //Agregar el producto
        validacion1 = true;

        if (precio.value != "") {
            console.log(precio.value); //Agregar el precio
            validacion2 = true;

            if (unidades.value != null) {
                if (unidades.value == 0) {
                    if (confirm("No es posible agregar 0 unidades se agregara 1")) {
                        console.log('1'); //Agregar 1
                        validacion3 = true;
                    } else {
                        alert('Agrega Una Cantidad');
                        validacion3 = false;
                    }
                } else {
                    console.log(unidades.value); //Agregar cantidad
                    validacion3 = true;
                }
            } else {
                alert('Agrega Una Cantidad');
                validacion3 = false;
            }
        } else {
            alert('Agrega Un Precio');
            validacion2 = true;
        }
    } else {
        alert('Escoge Un Producto');
        validacion1 = false;
    }

    if (validacion1 == true && validacion2 == true && validacion3 == true) {

        articulos.push(producto.options[producto.selectedIndex].text);
        ids.push(id.value)
        precios.push(precio.value);
        cantidad.push(unidades.value);
        producto.selectedIndex = 0;
        precio.value = "";
        unidades.value = "";


        genera_tabla();
    }
}

function genera_tabla() {
    if (document.getElementById("Table-Id") != null) {
        body.removeChild(document.getElementById("Table-Id"));
        vSubtotal = [];
        countid = 0;
    }
    // Obtener la referencia del elemento body

    var form = document.createElement("form");

    // Crea un elemento <table> y un elemento <tbody>
    var tabla = document.createElement("table");
    var tblBody = document.createElement("tbody");
    var titulos = document.createElement("tr");

    var TituloNumero = document.createElement("th");
    var TituloProducto = document.createElement("th");
    var TituloPrecio = document.createElement("th");
    var TituloUnidades = document.createElement("th");
    var TituloMonto = document.createElement("th");
    var TituloDelete = document.createElement("th");


    var textoTituloNumero = document.createTextNode("Numero");
    var textoTituloProducto = document.createTextNode("Producto");
    var textoTituloPrecio = document.createTextNode("Precio Unitario");
    var textoTituloUnidades = document.createTextNode("Unidades");
    var textoTituloMonto = document.createTextNode("Monto");
    var textoTituloDelete = document.createTextNode("Eliminar");


    TituloNumero.appendChild(textoTituloNumero);
    TituloProducto.appendChild(textoTituloProducto);
    TituloPrecio.appendChild(textoTituloPrecio);
    TituloUnidades.appendChild(textoTituloUnidades);
    TituloMonto.appendChild(textoTituloMonto);
    TituloDelete.appendChild(textoTituloDelete);


    titulos.appendChild(TituloNumero);
    titulos.appendChild(TituloProducto);
    titulos.appendChild(TituloPrecio);
    titulos.appendChild(TituloUnidades);
    titulos.appendChild(TituloMonto);
    titulos.appendChild(TituloDelete);


    tblBody.appendChild(titulos);

    titulos.setAttribute("style", "font-size: 30px;")
        // Crea las celdas
    for (var i = 0; i < articulos.length; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        hilera.setAttribute("class", "oldandnew");
        var Numero = document.createElement("td");
        var Producto = document.createElement("td");
        var Precio = document.createElement("td");
        var Unidades = document.createElement("td");
        var Monto = document.createElement("td");
        var Eliminar = document.createElement("td");




        var textoNumero = document.createTextNode(i + 1);
        var textoProducto = document.createTextNode(articulos[i]);
        var textoPrecio = document.createTextNode(precios[i]);
        var textoUnidades = document.createTextNode(cantidad[i]);
        vSubtotal.push(parseInt(precios[i]) * parseInt(cantidad[i])); //calcula el subtotal
        var textoMonto = document.createTextNode(parseInt(precios[i]) * parseInt(cantidad[i]));
        var textoEliminar = document.createElement("input");
        countid = i + 1;
        var in_id = document.createElement("input");


        in_id.setAttribute("type", "hidden");
        in_id.setAttribute("name", "id" + i);
        in_id.setAttribute("value", ids[i]);

        var in_cantidad = document.createElement("input");

        in_cantidad.setAttribute("type", "hidden");
        in_cantidad.setAttribute("name", "cantidad" + i);
        in_cantidad.setAttribute("value", cantidad[i]);

        textoEliminar.setAttribute("type", "button");
        textoEliminar.setAttribute("value", "Eliminar");
        textoEliminar.setAttribute("onclick", "eliminar(" + i + ")");
        textoEliminar.setAttribute("style", "font-size: 25px; margin-top: 30px; margin-bottom: 10px; border: REd; border-style: solid; border-radius: 30px;");




        Numero.appendChild(textoNumero);
        Producto.appendChild(textoProducto);
        Precio.appendChild(textoPrecio);
        Unidades.appendChild(textoUnidades);
        Monto.appendChild(textoMonto);
        Eliminar.appendChild(textoEliminar);



        hilera.appendChild(Numero);
        hilera.appendChild(Producto);
        hilera.appendChild(Precio);
        hilera.appendChild(Unidades);
        hilera.appendChild(Monto);
        hilera.appendChild(Eliminar);
        hilera.appendChild(in_id);
        hilera.appendChild(in_cantidad);



        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
        hilera.setAttribute("style", "font-style: italic; font-size: 40px;");
        hilera.setAttribute("id", i);
    }

    //Subtotal
    var filaSubTotal = document.createElement("tr");
    var Subtotal = document.createElement("td");
    var CantidadSubtotal = document.createElement("td");


    Subtotal.setAttribute("COLSPAN", "5");
    CantidadSubtotal.setAttribute("COLSPAN", "2");
    tsubtotal = 0;
    for (var i = 0; i < vSubtotal.length; i++) {

        tsubtotal = parseInt(tsubtotal) + parseInt(vSubtotal[i]);
    }

    var textoSubtotal = document.createTextNode("Subtotal ");
    var textoCantidadSubtotal = document.createTextNode("$" + tsubtotal);

    /* finaliva = tsubtotal * 0.16; */

    Subtotal.appendChild(textoSubtotal)
    CantidadSubtotal.appendChild(textoCantidadSubtotal);


    filaSubTotal.appendChild(Subtotal);
    filaSubTotal.appendChild(CantidadSubtotal);


    tblBody.appendChild(filaSubTotal);
    filaSubTotal.setAttribute("style", "font-style: italic; font-size: 40px;");
    //ENDSubtotal


    //Total
    var filaTotal = document.createElement("tr");
    var TextoTotal = document.createElement("td");
    TextoTotal.setAttribute("COLSPAN", "5");
    var Total = document.createElement("td");
    Total.setAttribute("COLSPAN", "2");
    var textototal = document.createTextNode("Total A Pagar");

    var textoCantidadIVA = document.createTextNode("$" + (tsubtotal));
    var total = document.createElement("input");
    total.setAttribute("type", "hidden");
    total.setAttribute("name", "total");
    total.setAttribute("value", tsubtotal);

    TextoTotal.appendChild(textototal);
    Total.appendChild(textoCantidadIVA);

    filaTotal.appendChild(TextoTotal);
    filaTotal.appendChild(Total);
    filaTotal.appendChild(total);

    tblBody.appendChild(filaTotal);
    filaTotal.setAttribute("style", "font-style: italic; font-size: 40px;");
    //ENDTotal

    var filaPagar = document.createElement("tr");
    var espacio = document.createElement("td");
    espacio.setAttribute("COLSPAN", "2");

    var textoPago = document.createTextNode("Ingrese el monto de pago:");
    espacio.appendChild(textoPago);

    var tdpagar = document.createElement("td");
    var inputpagar = document.createElement("input");

    var contador = document.createElement("input");


    contador.setAttribute("type", "hidden");
    contador.setAttribute("name", "count");
    contador.setAttribute("value", countid);




    inputpagar.setAttribute("type", "number");
    inputpagar.setAttribute("name", "pago");
    inputpagar.setAttribute("placeholder", "Ingrese el pago");
    inputpagar.setAttribute("class", "form-control");

    tdpagar.setAttribute("class", "form-group mx-sm-3 mb-2");
    tdpagar.appendChild(inputpagar);
    tdpagar.appendChild(contador);
    tdpagar.setAttribute("COLSPAN", "2");



    filaPagar.appendChild(espacio);
    filaPagar.appendChild(tdpagar);


    tblBody.appendChild(filaPagar);

    var filaPagar = document.createElement("tr");
    var espacio = document.createElement("td");
    var textoPago = document.createTextNode("Ingrese codigo de usuario(opcional):");
    espacio.appendChild(textoPago);

    var tdpagar = document.createElement("td");
    var inputpagar = document.createElement("input");
    inputpagar.setAttribute("type", "text");
    inputpagar.setAttribute("name", "codeusuario");
    inputpagar.setAttribute("placeholder", "Ingrese el codigo");
    inputpagar.setAttribute("class", "form-control");
    tdpagar.setAttribute("COLSPAN", "3");
    tdpagar.appendChild(inputpagar);
    filaPagar.appendChild(espacio);
    filaPagar.appendChild(tdpagar);
    tblBody.appendChild(filaPagar);



    var filaPagar = document.createElement("tr");
    var tdbtnpagar = document.createElement("td");
    var btnpagar = document.createElement("button");
    var textobtn = document.createTextNode("Pagar");

    btnpagar.setAttribute("type", "submit");
    btnpagar.setAttribute("class", "btn btn-primary btn-lg");
    btnpagar.appendChild(textobtn);
    tdbtnpagar.setAttribute("COLSPAN", "5");
    tdbtnpagar.appendChild(btnpagar);
    filaPagar.appendChild(tdbtnpagar);

    tblBody.appendChild(filaPagar);

    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    form.appendChild(tabla);
    // appends <table> into <body>
    body.appendChild(form);

    form.setAttribute("action", "pagar.php");
    form.setAttribute("method", "post");
    // modifica el atributo "border" de la tabla y lo fija a "2";
    form.setAttribute("id", "Table-Id");
    tabla.setAttribute("style", "width:50%; text-align: center; margin: 0px 0px 0px 235px; ");
}



function eliminar(number) {
    if (confirm("Desea Eliminar El Producto #: " + (parseInt(number) + 1))) {
        articulos.splice(parseInt(number), 1);
        ids.splice(parseInt(number), 1);
        precios.splice(parseInt(number), 1);
        cantidad.splice(parseInt(number), 1);
        genera_tabla();
    } else {

    }
}