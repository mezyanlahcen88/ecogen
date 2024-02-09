const tableBody = $("#productTableBody");
const inputDateId = "#status_date";
const newProduit = {
    id: "",
    product_code: "",
    name_fr: "",
    name_ar: "",
    category_id: "",
    scategory_id: "",
    buy_price: 0,
    price_unit: 0,
    price_gros: 0,
    price_reseller: 0,
    latest_price: 0,
    remise: 0,
    tva: 0,
    min_stock: 0,
    unite: "",
    bar_code: "",
    stockable: 0,
    created_by: "",
    stock_methode: "",
    archive: "",
    brand_id: "",
    picture: "",
    warehouse_id: "",
    active: 0,
    created_at: "",
    updated_at: "",
    deleted_at: null,
    pivot: {
        product_id: ",",
        product_code: "",
        command_id: "",
        designation: "",
        unite: "",
        quantity: 0,
        price: 0,
        TVA: 0,
        remise: 0,
        total_remise: 0,
        TOTAL_HT: 0,
        TOTAL_TVA: 0,
        TOTAL_TTC: 0,
    },
};

$(document).ready(function () {
    loadTableFromLocalStorage();
    tableReglements();
    calculeTotals();
});

function loadTableFromLocalStorage() {
    //Loading table from localStorage"
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var listeProd = data.commandProducts;
    tableBody.empty(); // Clear the existing content in the table

    // Iterate over the products and add them to the table
    listeProd.forEach(function (product) {
        appendTableRow(product);
    });
    // recupere numéro command et le mettre dans label
    $("#num_command").text(data.object.command_code);
    // remplir select client
    $('select[name="client_id"]').html(generateOptions(data.clients, "client"));
    $('select[name="client_id"]').select2();
    selectedClientId = data.object.client_id;
    $('select[name="client_id"]').val(selectedClientId).trigger("change");
    // remplir select categrie
    $('select[name="category_id"]').html(
        generateOptions(data.categories, "catégorie")
    );
    $('select[name="category_id"]').select2();
    //remplir select procudt
    $('select[name="product_id"]').html(
        generateOptions(data.products, "produit")
    );
    $('select[name="product_id"]').select2();
    // remplir select status
    $('select[name="status"]').html(
        generateOptions(data.command_status, "status")
    );
    $('select[name="status"]').select2();
    selectedStatus = data.object.status;
    $('select[name="status"]').val(selectedStatus).trigger("change");
    $("#comment").val(selectedStatus).val(data.object.comment);
    initializeDatePicker(data);

}

function initializeDatePicker(data) {
    flatpickr(inputDateId, {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        defaultDate: data.object.status_date,
    });
}
$(".getcommand").on("click", function (e) {
    e.preventDefault();
    var commandId = $(this).data("command-id");
    $.ajax({
        url: "/commands/" + commandId + "/edit",
        type: "GET",
        dataType: "json", // Changez ceci en 'html'
        success: function (data) {
            // $('#contenuDynamique').html(data.html);
            localStorage.setItem("product_commandEdit", JSON.stringify(data));
            loadTableFromLocalStorage();
            window.location.href = "/commands/" + commandId + "/edit";

            recupereTotalTTCHTTVA(data.object);
        },
        error: function (error) {
            console.log(error);
        },
    });
});

function generateOptions(data, objectType) {
    var options =
        '<option value="">Sélectionnez un ' + objectType + "</option>";
    for (var key in data) {
        if (data.hasOwnProperty(key)) {
            options += '<option value="' + key + '">' + data[key] + "</option>";
        }
    }
    return options;
}

function objectProd(data) {
    var p = Object.assign({}, newProduit);
    p.unite = data.unite;
    p.product_code = data.product_code;
    p.id = data.id;
    p.name_fr = data.name_fr;
    p.name_ar = data.name_ar;
    p.category_id = data.category_id;
    p.scategory_id = data.scategory_id;
    p.buy_price = data.buy_price;
    p.price_unit = data.price_unit;
    p.price_gros = data.price_gros;
    p.price_reseller = data.price_reseller;
    p.latest_price = data.latest_price;
    p.remise = data.remise;
    p.tva = data.tva;
    p.min_stock = data.min_stock;
    p.bar_code = data.bar_code;
    p.stockable = data.stockable;
    p.created_by = data.created_by;
    p.stock_methode = data.stock_methode;
    p.archive = data.archive;
    p.brand_id = data.brand_id;
    p.picture = data.picture;
    p.warehouse_id = data.warehouse_id;
    p.active = data.active;
    p.created_at = data.created_at;
    p.updated_at = data.updated_at;
    p.deleted_at = null;
    p.pivot = {
        product_code: data.product_code,
        product_id: data.id,
        command_id: data.id,
        designation: data.name_fr + " | " + data.name_ar,
        unite: data.unite,
        quantity: 1,
        price: data.price_unit,
        TVA: data.tva,
        remise: data.remise,
        total_remise: Math.round(1 * data.remise),
        TOTAL_HT: Math.round((data.price_unit * 1) - data.price_unit * 1 * data.total_remise / 100),
        TOTAL_TVA: Math.round(((data.price_unit * 1) - data.price_unit * 1 * data.total_remise / 100) * (data.tva / 100)),
        TOTAL_TTC: Math.round(((data.price_unit * 1) - data.price_unit * 1 * data.total_remise / 100) * (1 + data.tva / 100)),
    };
    return p;
}

function pushProdToListe(prod) {
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var listeProd = data.commandProducts;
    // Check if the product already exists in the list
    var existingProduct = listeProd.find((product) => product.id === prod.id);

    if (existingProduct) {
        // If it exists, update the quantity

        existingProduct.pivot.quantity += 1;
        existingProduct.pivot.TOTAL_HT = Math.round(
            existingProduct.pivot.price * existingProduct.pivot.quantity - existingProduct.pivot.price * existingProduct.pivot.quantity * existingProduct.total_remise / 100
        );
        existingProduct.pivot.TOTAL_TVA = Math.round(
            (existingProduct.pivot.TVA / 100) * existingProduct.pivot.TOTAL_HT
        );
        existingProduct.pivot.TOTAL_TTC = Math.round(
            existingProduct.pivot.TOTAL_HT *
            (1 + existingProduct.pivot.TVA / 100)
        );
    } else {
        // If it doesn't exist, add it to the list
        listeProd.push(prod);
    }
    localStorage.setItem("product_commandEdit", JSON.stringify(data));
}

function tableProducts() {
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var listeProd = data.commandProducts;
    // tableBody.empty();
    $("#productTableBody").empty();
    listeProd.forEach((product) => {
        appendTableRow(product);
    });
    calculeTotals();
}

function recupereTotalTTCHTTVA(command) {
    $("#total_ht").text(command.HT.toFixed(2));
    $("#total_ttva").text(command.TVA.toFixed(2));
    $("#total_ttc").text(command.TTTC.toFixed(2));
}
// Sélectionnez le conteneur où vous souhaitez ajouter les lignes (par exemple, un tbody avec l'id "productTableBody").
// Fonction pour générer le HTML pour chaque produit
function appendTableRow(product) {
    var row =
        '<tr class="text-center">' +
        "<td>" +
        product.product_code +
        "</td>" +
        "<td>" +
        product.pivot.designation +
        "</td>" +
        "<td>" +
        product.pivot.unite +
        "</td>" +
        "<td>" +
        '    <div class="input-step">' +
        '        <button type="button" class="minus" id="decreaseQte-' +
        product.pivot.product_id +
        '">–</button>' +
        '        <input type="number" class="product-quantity" id="product-qty-' +
        product.pivot.product_id +
        '" value="' +
        product.pivot.quantity +
        '">' +
        '        <button type="button" class="plus" id="increaseQte-' +
        product.pivot.product_id +
        '">+</button>' +
        "    </div>" +
        "</td>" +
        "<td>" +
        '    <div class="input-step">' +
        '        <button type="button" class="minus" id="decreasePrix-' +
        product.pivot.product_id +
        '">–</button>' +
        '        <input type="number" class="product-quantity" id="product-prix-' +
        product.pivot.product_id +
        '" value="' +
        product.pivot.price +
        '">' +
        '        <button type="button" class="plus" id="increasePrix-' +
        product.pivot.product_id +
        '">+</button>' +
        "    </div>" +
        "</td>" +
        "<td>" +
        product.pivot.TOTAL_HT +
        "</td>" +
        "<td>" +
        '    <div class="input-step">' +
        '        <button type="button" class="minus" id="decreaseTva-' +
        product.pivot.product_id +
        '">–</button>' +
        '        <input type="number" class="product-quantity" id="product-tva-' +
        product.pivot.product_id +
        '" value="' +
        product.pivot.TVA +
        '">' +
        '        <button type="button" class="plus" id="increaseTva-' +
        product.pivot.product_id +
        '">+</button>' +
        "    </div>" +
        "</td>" +
        "<td>" +
        product.pivot.TOTAL_TVA +
        "</td>" +
        "<td>" +
        '    <div class="input-step">' +
        '<button type="button" class="minus" id="decreaseRemise-' +
        product.pivot.product_id +
        '">–</button>' +
        '<input type="number" class="product-quantity" id="product-remise-' +
        product.pivot.product_id +
        '" value="' +
        product.pivot.remise +
        '">' +
        ' <button type="button" class="plus" id="increaseRemise-' +
        product.pivot.product_id +
        '">+</button>' +
        "    </div>" +
        "</td>" +
        "<td>" +
        product.pivot.total_remise +
        "</td>" +
        "<td>" +
        product.pivot.TOTAL_TTC +
        "</td>" +
        "<td>" +
        '    <button type="button" class="btn" id="deleteProduct-' +
        product.pivot.product_id +
        '"><i class="las la-times text-danger fs-1"></i></button>' +
        "</td>" +
        "</tr>";

    $("#productTableBody").append(row);
    $("#increaseQte-" + product.pivot.product_id).on("click", () =>
        increase(product.pivot.product_id, "quantite")
    );
    $("#decreaseQte-" + product.pivot.product_id).on("click", () =>
        decrease(product.pivot.product_id, "quantite")
    );
    $("#product-qty-" + product.pivot.product_id).on("blur", () => {
        id = product.pivot.product_id;
        var qte = $("#product-qty-" + product.pivot.product_id).val();
        if (qte < 1) {
            qte = 1;
        }
        var prix = $("#product-prix-" + product.pivot.product_id).val();
        var tva = $("#product-tva-" + product.pivot.product_id).val();
        var remise = $("#product-remise-" + product.pivot.product_id).val();
        updateLocalStorageQuantityPrixTva(
            product.pivot.product_id,
            qte,
            "quantite"
        );
        // Calculate and update ht and tttva in the localStorage
        updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
        tableProducts();
    });
    $("#increasePrix-" + product.pivot.product_id).on("click", () =>
        increase(product.pivot.product_id, "prix")
    );
    $("#decreasePrix-" + product.pivot.product_id).on("click", () =>
        decrease(product.pivot.product_id, "prix")
    );
    $("#product-prix-" + product.pivot.product_id).on("blur", () => {
        id = product.pivot.product_id;
        var qte = $("#product-qty-" + product.pivot.product_id).val();
        var prix = $("#product-prix-" + product.pivot.product_id).val();
        var tva = $("#product-tva-" + product.pivot.product_id).val();
        var remise = $("#product-remise-" + product.pivot.product_id).val();
        updateLocalStorageQuantityPrixTva(
            product.pivot.product_id,
            prix,
            "prix"
        );
        // Calculate and update ht and tttva in the localStorage
        updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
        tableProducts();
    });
    $("#increaseTva-" + product.pivot.product_id).on("click", () =>
        increase(product.pivot.product_id, "tva")
    );
    $("#decreaseTva-" + product.pivot.product_id).on("click", () =>
        decrease(product.pivot.product_id, "tva")
    );
    $("#product-tva-" + product.pivot.product_id).on("blur", () => {
        id = product.pivot.product_id;
        var qte = $("#product-qty-" + product.pivot.product_id).val();
        var prix = $("#product-prix-" + product.pivot.product_id).val();
        var tva = $("#product-tva-" + product.pivot.product_id).val();
        var remise = $("#product-remise-" + product.pivot.product_id).val();
        updateLocalStorageQuantityPrixTva(product.pivot.product_id, tva, "tva");
        // Calculate and update ht and tttva in the localStorage
        updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
        tableProducts();
    });
    $("#increaseRemise-" + product.pivot.product_id).on("click", () =>
        increase(product.pivot.product_id, "remise")
    );
    $("#decreaseRemise-" + product.pivot.product_id).on("click", () =>
        decrease(product.pivot.product_id, "remise")
    );
    $("#product-remise-" + product.pivot.product_id).on("blur", () => {
        id = product.pivot.product_id;
        var qte = $("#product-qty-" + product.pivot.product_id).val();
        var prix = $("#product-prix-" + product.pivot.product_id).val();
        var tva = $("#product-tva-" + product.pivot.product_id).val();
        var remise = $("#product-remise-" + product.pivot.product_id).val();
        updateLocalStorageQuantityPrixTva(product.pivot.product_id, remise, "remise");
        // Calculate and update ht and tttva in the localStorage
        updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
        tableProducts();
    });
    $("#deleteProduct-" + product.pivot.product_id).on("click", () =>
        deleteProduct(product.pivot.product_id)
    );
}

function increase(id, type) {
    var qteInput = $(`#product-qty-${id}`);
    var qte = parseFloat(qteInput.val());
    var prixInput = $(`#product-prix-${id}`);
    var prix = parseFloat(prixInput.val());
    var tvaInput = $(`#product-tva-${id}`);
    var tva = parseFloat(tvaInput.val());
    var remiseInput = $(`#product-remise-${id}`);
    var remise = parseFloat(remiseInput.val());
    if (type === "quantite") {
        if (!isNaN(qte)) {
            // Update the quantity in the input
            qte += 1;
            qteInput.val(qte);

            // Update the localStorage with the new quantity
            updateLocalStorageQuantityPrixTva(id, qte, "quantite");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error(`La quantité n'est pas un nombre valide.`);
        }
    } else if (type === "prix") {
        if (!isNaN(prix)) {
            // Update the prix in the input
            prix += 1;
            prixInput.val(prix);

            // Update the localStorage with the new prix
            updateLocalStorageQuantityPrixTva(id, prix, "prix");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error(`Le prix n'est pas un nombre valide.`);
        }
    } else if (type === "tva") {
        if (!isNaN(tva)) {
            // Update the tva in the input
            tva += 1;
            tvaInput.val(tva);

            // Update the localStorage with the new tva
            updateLocalStorageQuantityPrixTva(id, tva, "tva");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error(`Le tva n'est pas un nombre valide.`);
        }
    } else if (type === "remise") {
        if (!isNaN(remise)) {
            // Update the remise in the input
            remise += 1;
            remiseInput.val(remise);

            // Update the localStorage with the new remise
            updateLocalStorageQuantityPrixTva(id, remise, "remise");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error(`La remise n'est pas un nombre valide.`);
        }
    }
}

function decrease(id, type) {
    var qteInput = document.getElementById(`product-qty-${id}`);
    var qte = parseFloat(qteInput.value);
    var prixInput = $(`#product-prix-${id}`);
    var prix = parseFloat(prixInput.val());
    var tvaInput = $(`#product-tva-${id}`);
    var tva = parseFloat(tvaInput.val());
    var remiseInput = $(`#product-remise-${id}`);
    var remise = parseFloat(remiseInput.val());
    if (type === "quantite") {
        if (!isNaN(qte) && qte > 1) {
            qte -= 1;

            // Update the quantity in the input field
            qteInput.value = qte;

            // Update the localStorage with the new quantity
            updateLocalStorageQuantityPrixTva(id, qte, "quantite");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error(
                "Invalid quantity or quantity cannot be decreased further."
            );
        }
    } else if (type === "prix") {
        if (!isNaN(prix) && prix > 1) {
            prix -= 1;

            // Update the prix in the input field
            prixInput.value = prix;

            // Update the localStorage with the new prix
            updateLocalStorageQuantityPrixTva(id, prix, "prix");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error(
                "Invalid price or price cannot be decreased further."
            );
        }
    } else if (type === "tva") {
        if (!isNaN(tva) && tva > 0) {
            tva -= 1;

            // Update the tva in the input field
            tvaInput.value = tva;

            // Update the localStorage with the new tva
            updateLocalStorageQuantityPrixTva(id, tva, "tva");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error("Invalid tva or tva cannot be decreased further.");
        }
    } else if (type === "remise") {
        if (!isNaN(remise) && remise >= 0) {
            remise -= 1;

            // Update the remise in the input field
            remiseInput.value = remise;

            // Update the localStorage with the new remise
            updateLocalStorageQuantityPrixTva(id, remise, "remise");

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte, prix, tva, remise);
            tableProducts();
        } else {
            console.error("Invalid remise or remise cannot be decreased further.");
        }
    }
}

function updateLocalStorageQuantityPrixTva(id, newValue, type) {
    if (type === "quantite") {
        var data =
            JSON.parse(localStorage.getItem("product_commandEdit")) || [];
        var listeProd = data.commandProducts;
        var existingProduct = listeProd.find((product) => product.id === id);

        if (existingProduct) {
            existingProduct.pivot.quantity = newValue;
            localStorage.setItem("product_commandEdit", JSON.stringify(data));
        }
    } else if (type === "prix") {
        var data =
            JSON.parse(localStorage.getItem("product_commandEdit")) || [];
        var listeProd = data.commandProducts;
        var existingProduct = listeProd.find((product) => product.id === id);

        if (existingProduct) {
            existingProduct.pivot.price = newValue;
            localStorage.setItem("product_commandEdit", JSON.stringify(data));
        }
    } else if (type === "tva") {
        var data =
            JSON.parse(localStorage.getItem("product_commandEdit")) || [];
        var listeProd = data.commandProducts;
        var existingProduct = listeProd.find((product) => product.id === id);

        if (existingProduct) {
            existingProduct.pivot.TVA = newValue;
            localStorage.setItem("product_commandEdit", JSON.stringify(data));
        }
    } else if (type === "remise") {
        var data =
            JSON.parse(localStorage.getItem("product_commandEdit")) || [];
        var listeProd = data.commandProducts;
        var existingProduct = listeProd.find((product) => product.id === id);

        if (existingProduct) {
            existingProduct.pivot.remise = newValue;
            localStorage.setItem("product_commandEdit", JSON.stringify(data));
        }
    }
}

function updateLocalStorageHTTTTVA(id, newQuantity, newPrix, newTva, newRemise) {
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var listeProd = data.commandProducts;
    var existingProduct = listeProd.find((product) => product.id === id);
    if (existingProduct) {
        // Update ht based on the new quantity
        existingProduct.pivot.TOTAL_HT = Math.round(
            (parseFloat(newPrix) * parseFloat(newQuantity)) - parseFloat(newPrix) * parseFloat(newQuantity) * parseFloat(newRemise) / 100);
        // Update tttva based on the updated ht and tva
        existingProduct.pivot.TOTAL_TVA = Math.round(
            parseFloat(newPrix) * parseFloat(newQuantity) * (newTva / 100)
        );
        // Update tremise based on the updated qte and remise

        existingProduct.pivot.total_remise = Math.round((existingProduct.pivot.quantity * newRemise));

        existingProduct.pivot.TOTAL_TTC = Math.round(
            existingProduct.pivot.TOTAL_HT * (1 + newTva / 100)
        );

        localStorage.setItem("product_commandEdit", JSON.stringify(data));
    }
}

function calculeTotals() {
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var listeProd = data.commandProducts;
    var prixHT = 0;
    var tva = 0;
    var prixTTC = 0;
    if (listeProd && listeProd.length > 0) {
        // Calcule le prix hors taxe
        prixHT = listeProd.reduce(
            (acc, product) => acc + product.pivot.TOTAL_HT,
            0
        );
        // Calcule la TVA
        tva = listeProd.reduce(
            (acc, product) => acc + product.pivot.TOTAL_TVA,
            0
        );
        // Calcule le prix toutes taxes comprises
        prixTTC = listeProd.reduce(
            (acc, product) => acc + product.pivot.TOTAL_TTC,
            0
        );
    }
    $("#total_ht").text(prixHT.toFixed(2));
    $("#total_ttva").text(tva.toFixed(2));
    $("#total_ttc").text(prixTTC.toFixed(2));
}

function deleteProduct(productId) {
    // e.preventDefault();
    // Récupérer les produits actuels depuis le localStorage
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var listeProd = data.commandProducts;

    // Vérifier s'il y a des produits dans le localStorage
    if (listeProd) {
        // Trouver l'index du produit avec l'ID donné
        var productIndex = listeProd.findIndex(function (product) {
            return product.id === productId;
        });

        // Vérifier si le produit a été trouvé
        if (productIndex !== -1) {
            // Supprimer le produit de la liste des produits
            listeProd.splice(productIndex, 1);

            // Mettre à jour le localStorage avec la nouvelle liste de produits
            localStorage.setItem("product_commandEdit", JSON.stringify(data));
            console.log("Produit supprimé avec succès.");
        } else {
            console.log("Produit non trouvé.");
        }
    } else {
        console.log("Aucun produit trouvé dans le localStorage.");
    }
    tableProducts();
}

$(".getProduct").on("click", function () {
    var product_id = $('select[name="product_id"]').val();
    if (product_id) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: window.location.origin + "/products/get-product",
            data: {
                id: product_id,
            },
            type: "GET",
            dataType: "json",
            success: function (data) {
                var prod = objectProd(data);
                pushProdToListe(prod);
                tableProducts();
            },
        });
    } else {
        console.log("AJAX load did not work");
    }
});

$(".storeCommand").on("click", function (e) {
    e.preventDefault();
    var data = JSON.parse(localStorage.getItem("product_commandEdit"));
    console.log(data);
    var listeProd = data.commandProducts;
    var commandId = data.object.id;
    var products = [];
    listeProd.forEach(function (product) {
        products.push(product.pivot);
    });
    console.log(products);
    let formData = new FormData($("#command_form")[0]);
    formData.append("_method", "PUT");
    data = {
        client: $('select[name="client_id"]').val(),
        category: $('select[name="category_id"]').val(),
        scategory: $('select[name="scategory_id"]').val(),
        status: $('select[name="status"]').val(),
        status_date: $('input[name="status_date"]').val(),
        comment: $('textarea[name="comment"]').val(),
        num_command: $("#num_command").text(),
        total_ttc: $("#total_ttc").text(),
        total_ht: $("#total_ht").text(),
        total_ttva: $("#total_ttva").text(),
        products: products,
    };
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "/commands/" + commandId,
        type: "PUT",
        data: data,
        dataType: "json",
        success: function (data) {
            if (data.success) {
                localStorage.removeItem("product_commandEdit");
                // $('#productTableBody').empty();
                // loadTableFromLocalStorage();
                window.location.href = "/commands";
                // location.reload();
                console.log("delete storage");

                Swal.fire("Super!", "command updated successfully", "success");
                // if (data.hasOwnProperty('redirectTo')) {
                //     window.location.href = data.redirectTo;
                // }
            }
        },
    });
});

var reglements = [];
var newReglement = {
    id: "",
    command_id: "",
    ref_reg: "",
    num_order: "",
    nature_reg: "",
    parent_type: "",
    parent_id: "",
    mode_reg: "",
    comment: "",
    amount_reg: "",
    date_reg: "",
};
$("#btnValider").on("click", function (e) {
    e.preventDefault();
    var montantTotalPayer = 0;
    // var data = JSON.parse(localStorage.getItem("reglements")) || [];
    var commande = JSON.parse(localStorage.getItem("product_commandEdit"));
    var data = commande.detailsReglement;
    if (data && data.length > 0) {
        // Calcule le prix hors taxe
        montantTotalPayer = data.reduce(
            (acc, reg) => acc + reg.amount_reg,
            0
        );
    }
    var reg = Object.assign({}, newReglement);
    var command_id = commande.object.id;
    var parent_id = commande.object.client_id;
    console.log(montantTotalPayer);
    var total_ttc = parseFloat($("#total_ttc").text());
    var total_ht = parseFloat($("#total_ht").text());
    var total_ttva = parseFloat($("#total_ttva").text());
    var modePaiment = $('select[name="reglement"]').val();
    var num_order = $("#check_ref").val();
    var comment = $("#commentReg").val();
    var montantPayer = parseFloat($("#montantPayer").val());
    // console.log("total_ttc : " + total_ttc);
    // console.log("total_ht : " + total_ht);
    // console.log("total_ttva : " + total_ttva);
    // console.log("montantPayer : " + montantPayer);
    reg.command_id = command_id;
    reg.parent_id = parent_id;
    reg.mode_reg = modePaiment;
    reg.num_order = num_order;
    reg.comment = comment;
    reg.amount_reg = montantPayer;
    var dateObj = new Date();
    // Formate la date selon le format YYYY-MM-DD HH:MM:SS
    reg.date_reg = dateObj.toISOString().slice(0, 19).replace('T', ' ');
    if (montantPayer + montantTotalPayer <= total_ttc && montantPayer > 0) {
        var total_restanter = total_ttc - (montantPayer + montantTotalPayer);
        $("#total_restanter").text(total_restanter.toFixed(2));
        if (total_restanter === 0) {
            $('#montantPayer').val(0);
            $('#montantPayer').prop('readonly', true);
        }
        data.push(reg);
        // reglements.push(reg);
        localStorage.setItem("product_commandEdit", JSON.stringify(commande));
        // console.log(total_restanter);
        tableReglements();
        $('#montantPayer').val(0);
        $('#commentReg').val("");
        $('#check_ref').val("");
        $('select[name="reglement"]').val("").trigger('change.select2'); // Déselectionner l'option
    } else {
        console.log("le montant entrer est plus grand que le reste à payer !");
        Swal.fire(
            "Super!",
            "Le montant saisi n'est as valide ou plus grand que le reste à payer",
            "error"
        );
    }
});

// function tableReglements() {
//     var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
//     var listeReg = data.detailsReglement;
//     console.log(listeReg);
//     // tableBody.empty();
//     $("#RegTableBody").empty();
//     listeReg.forEach((reg) => {
//         appendTableRegRow(reg);
//     });
//     // calculeTotals();
// }
function tableReglements() {
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || {};
    var listeReg = data.detailsReglement || [];
    // console.log(listeReg);

    // Vide le corps de la table
    $("#RegTableBody").empty();

    // Parcourt la liste des reglements et ajoute chaque ligne à la table
    listeReg.forEach((reg, index) => {
        appendTableRegRow(reg, index);
    });

    // calculeTotals();
}
// Fonction pour générer le HTML pour chaque produit
// function appendTableRegRow(reg) {
//     var row =
//         '<tr class="text-center">' +
//         "<td>" +
//         reg.mode_reg +
//         "</td>" +
//         "<td>" +
//         reg.amount_reg +
//         "</td>" +
//         "<td>" +
//         reg.date_reg +
//         "</td>" +
//         "<td>" +
//         '<td>' +
//         '    <button type="button" onClick="deleteReglement()" class="btn" id="deleteReglement-' + index + '"><i class="las la-times text-danger fs-1"></i></button>' +
//         '</td>' +
//         "</tr>";

//     $("#RegTableBody").append(row);

//     // $('#deleteProduct-' + product.pivot.product_id).on('click', () => deleteProduct(product.pivot.product_id));
// }


// function deleteReglement(index) {
//     // e.preventDefault();
//     // Récupérer les produits actuels depuis le localStorage
//     var data = JSON.parse(localStorage.getItem('product_commandEdit'));
//     var listeReglements = data.detailsReglement;

//     // Vérifier s'il y a des produits dans le localStorage
//     if (listeReglements) {

//             listeReglements.splice(index, 1);

//             // Mettre à jour le localStorage avec la nouvelle liste de reglements
//             localStorage.setItem('product_commandEdit', JSON.stringify(data));
//             console.log('Reglement supprimé avec succès.');

//     } else {
//         console.log('Aucun reglement trouvé dans le localStorage.');
//     }
//     tableReglements();
// }


function appendTableRegRow(reg, index) {
    var row =
        '<tr class="text-center">' +
        "<td>" +
        reg.mode_reg +
        "</td>" +
        "<td>" +
        reg.amount_reg +
        "</td>" +
        "<td>" +
        reg.date_reg +
        "</td>" +
        '<td>' +
        '    <button type="button" class="btn editerReglement" data-index="' + index + '"><i class="las la-edit text-danger fs-1"></i></button> <button type="button" class="btn deleteReglement" data-index="' + index + '"><i class="las la-times text-danger fs-1"></i></button>' +
        '</td>' +
        "</tr>";

    $("#RegTableBody").append(row);
}

// Attachez un gestionnaire d'événements de délégation à un élément parent
// $("#RegTableBody").on('click', '.deleteReglement', function () {
//     // Obtenez l'index de la ligne à supprimer
//     var index = $(this).data('index');

//     // Récupérez les données actuelles depuis le localStorage
//     var data = JSON.parse(localStorage.getItem('product_commandEdit'));
//     var listeReglements = data.detailsReglement;
//         console.log(listeReglements);
//     var montantSaisie = listeReglements[index].amount_reg;
//     var rest_payer = $("#total_restanter").text();
//     var total_ttc = parseFloat($("#total_ttc").text());
//     if ((parseFloat(rest_payer) + parseFloat(montantSaisie)) <= total_ttc) {
//         rest_payer = parseFloat(rest_payer) + parseFloat(montantSaisie);
//         $("#total_restanter").text(rest_payer.toFixed(2));
//         if (listeReglements) {
//             // Supprimez le reglement à l'index spécifié
//             listeReglements.splice(index, 1);

//             // Mettez à jour le localStorage avec la nouvelle liste de reglements
//             localStorage.setItem('product_commandEdit', JSON.stringify(data));
//             $("#montantPayer").val(0);
//             $('select[name="reglement"]').val("");
//             $("#check_ref").val("");
//             $("#commentReg").val("");
//             console.log('Reglement supprimé avec succès.');
//         } else {
//             console.log('Aucun reglement trouvé dans le localStorage.');
//         }
//         if (total_ttc >= rest_payer) {
//             $('#montantPayer').val(0);
//             $('#montantPayer').prop('readonly', false);
//         } else {
//             $('#montantPayer').val(0);
//             $('#montantPayer').prop('readonly', true);
//         }
//     } else {
//         Swal.fire(
//             "Super!",
//             "Le montant saisi n'est as valide ou plus grand que le reste à payer",
//             "error"
//         );
//     }

//     console.log("montantSaisie : " + montantSaisie);
//     console.log("total_restanter : " + rest_payer);
//     // Vérifiez s'il y a des reglements dans le localStorage


//     // Actualisez la table des reglements
//     tableReglements();
// });

// $("#RegTableBody").on('click', '.editerReglement', function () {
//     // Obtenez l'index de la ligne à supprimer
//     var index = $(this).data('index');

//     // Récupérez les données actuelles depuis le localStorage
//     var data = JSON.parse(localStorage.getItem('product_commandEdit'));
//     var listeReglements = data.detailsReglement;
//     console.log(listeReglements);
//     var montantSaisie = listeReglements[index].amount_reg;
//     var modePaiment = listeReglements[index].mode_reg;
//     var num_order = listeReglements[index].num_order;
//     var comment = listeReglements[index].comment;
//     $("#montantPayer").val(montantSaisie);
//      // Mettez à jour la valeur du select2
//      $('select[name="reglement"]').val(modePaiment).trigger('change.select2');
//     $("#check_ref").val(num_order);
//     $("#commentReg").val(comment);

// });

$("#RegTableBody").on('click', '.deleteReglement', function () {
    let index = $(this).data('index');

    let data = JSON.parse(localStorage.getItem('product_commandEdit'));
    if (!data || !data.detailsReglement) {
        console.log('Erreur : Aucune donnée de reglement trouvée dans le localStorage.');
        return;
    }
    let listeReglements = data.detailsReglement;
    let montantSaisie = listeReglements[index].amount_reg;
    let rest_payer = parseFloat($("#total_restanter").text());
    let total_ttc = parseFloat($("#total_ttc").text());

    if ((rest_payer + montantSaisie) <= total_ttc) {
        rest_payer += montantSaisie;
        $("#total_restanter").text(rest_payer.toFixed(2));

        listeReglements.splice(index, 1);
        localStorage.setItem('product_commandEdit', JSON.stringify(data));

        $("#montantPayer").val(0);
        $('select[name="reglement"]').val("").trigger('change.select2'); // Déselectionner l'option        $("#check_ref").val("");
        $("#commentReg").val("");
        $("#check_ref").val("");
        console.log('Reglement supprimé avec succès.');

        if (total_ttc >= rest_payer) {
            $('#montantPayer').val(0);
            $('#montantPayer').prop('readonly', false);
        }
    } else {
        Swal.fire("Super!", "Le montant saisi n'est pas valide ou plus grand que le reste à payer", "error");
    }
    console.log("montantSaisie : " + montantSaisie);
    console.log("total_restanter : " + rest_payer);

    tableReglements();
});

$("#RegTableBody").on('click', '.editerReglement', function () {
    let index = $(this).data('index');

    let data = JSON.parse(localStorage.getItem('product_commandEdit'));
    if (!data || !data.detailsReglement) {
        console.log('Erreur : Aucune donnée de reglement trouvée dans le localStorage.');
        return;
    }
    let listeReglements = data.detailsReglement;
    let montantSaisie = listeReglements[index].amount_reg;
    let modePaiment = listeReglements[index].mode_reg;
    let num_order = listeReglements[index].num_order;
    let comment = listeReglements[index].comment;

    $("#montantPayer").val(montantSaisie);
    $('select[name="reglement"]').val(modePaiment).trigger('change.select2');
    $("#check_ref").val(num_order);
    $("#commentReg").val(comment);
});


$(".storeReglement").on("click", function (e) {
    e.preventDefault();

    // let formData = new FormData($("#commands_form")[0]);
    var data = JSON.parse(localStorage.getItem("product_commandEdit")) || [];
    var commandId = data.object.id;
    var listeReg = data.detailsReglement;
    var postData = {
        reglements: listeReg,
    };
    console.log(postData);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "/reglements",
        type: "POST",
        data: postData,
        dataType: "json",
        success: function (response) {
            if (response.success) {
                localStorage.removeItem("product_commandEdit");
                // $('#productTableBody').empty();
                data.detailsReglement = [];
                getCommandDetails(commandId);
                Swal.fire(
                    "Super!",
                    "Réglement a été créé avec succès",
                    "success"
                );
                location.reload();
                console.log("delete storage");
                loadTableFromLocalStorage();

                // localStorage.setItem("product_commandEdit", JSON.stringify(data));


            }
        },
    });
});

function getCommandDetails(commandId) {
    console.log(commandId);
    $.ajax({
        url: "/commands/" + commandId + "/edit",
        type: 'GET',
        dataType: 'json', // Changez ceci en 'html'
        success: function (data) {
            localStorage.setItem('product_commandEdit', JSON.stringify(data));
        },
        error: function (error) {
            console.log(error);
        }
    });
};
