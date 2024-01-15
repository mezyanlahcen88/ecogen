"use strict";

var tableBody = $('#productTableBody');
var inputDateId = "#status_date";
var newProduit = {
  id: '',
  product_code: '',
  name_fr: '',
  name_ar: '',
  category_id: '',
  scategory_id: '',
  buy_price: 0,
  price_unit: 0,
  price_gros: 0,
  price_reseller: 0,
  latest_price: 0,
  remise: 0,
  tva: 0,
  min_stock: 0,
  unite: '',
  bar_code: '',
  stockable: 0,
  created_by: '',
  stock_methode: '',
  archive: '',
  brand_id: '',
  picture: '',
  warehouse_id: '',
  active: 0,
  created_at: '',
  updated_at: '',
  deleted_at: null,
  pivot: {
    product_id: ',',
    product_code: '',
    devis_id: '',
    designation: '',
    unite: '',
    quantity: 0,
    price: 0,
    TVA: 0,
    TOTAL_HT: 0,
    TOTAL_TVA: 0,
    TOTAL_TTC: 0
  }
};
$(document).ready(function () {
  loadTableFromLocalStorage();
  calculeTotals();
});

function loadTableFromLocalStorage() {
  //Loading table from localStorage"
  var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
  var listeProd = data.devisProducts;
  tableBody.empty(); // Clear the existing content in the table
  // Iterate over the products and add them to the table

  listeProd.forEach(function (product) {
    appendTableRow(product);
  }); // recupere numéro devis et le mettre dans label

  $("#num_devis").text(data.object.devis_code); // remplir select client

  $('select[name="client_id"]').html(generateOptions(data.clients, 'client'));
  $('select[name="client_id"]').select2();
  selectedClientId = data.object.client_id;
  $('select[name="client_id"]').val(selectedClientId).trigger('change'); // remplir select categrie

  $('select[name="category_id"]').html(generateOptions(data.categories, 'catégorie'));
  $('select[name="category_id"]').select2(); //remplir select procudt

  $('select[name="product_id"]').html(generateOptions(data.products, 'produit'));
  $('select[name="product_id"]').select2(); // remplir select status

  $('select[name="status"]').html(generateOptions(data.devis_status, 'status'));
  $('select[name="status"]').select2();
  selectedStatus = data.object.status;
  $('select[name="status"]').val(selectedStatus).trigger('change');
  $('#comment').val(selectedStatus).val(data.object.comment);
  initializeDatePicker(data);
}

function initializeDatePicker(data) {
  flatpickr(inputDateId, {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    defaultDate: data.object.status_date
  });
}

$('.getDevis').on('click', function (e) {
  e.preventDefault();
  var devisId = $(this).data('devis-id');
  $.ajax({
    url: "/devis/" + devisId + "/edit",
    type: 'GET',
    dataType: 'json',
    // Changez ceci en 'html'
    success: function success(data) {
      // $('#contenuDynamique').html(data.html);
      localStorage.setItem('product_devisEdit', JSON.stringify(data));
      loadTableFromLocalStorage();
      window.location.href = "/devis/" + devisId + "/edit";
      recupereTotalTTCHTTVA(data.object);
    },
    error: function error(_error) {
      console.log(_error);
    }
  });
});

function generateOptions(data, objectType) {
  var options = '<option value="">Sélectionnez un ' + objectType + '</option>';

  for (var key in data) {
    if (data.hasOwnProperty(key)) {
      options += '<option value="' + key + '">' + data[key] + '</option>';
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
    devis_id: data.id,
    designation: data.name_fr + ' | ' + data.name_ar,
    unite: data.unite,
    quantity: 1,
    price: data.price_unit,
    TVA: data.tva,
    TOTAL_HT: Math.round(data.price_unit * 1),
    TOTAL_TVA: Math.round(data.price_unit * 1 * (data.tva / 100)),
    TOTAL_TTC: Math.round(data.price_unit * 1 * (1 + data.tva / 100))
  };
  return p;
}

function pushProdToListe(prod) {
  var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
  var listeProd = data.devisProducts; // Check if the product already exists in the list

  var existingProduct = listeProd.find(function (product) {
    return product.id === prod.id;
  });

  if (existingProduct) {
    // If it exists, update the quantity
    existingProduct.pivot.quantity += 1;
    existingProduct.pivot.TOTAL_HT = Math.round(existingProduct.pivot.price * existingProduct.pivot.quantity);
    existingProduct.pivot.TOTAL_TVA = Math.round(existingProduct.pivot.TVA / 100 * existingProduct.pivot.TOTAL_HT);
    existingProduct.pivot.TOTAL_TTC = Math.round(existingProduct.pivot.TOTAL_HT * (1 + existingProduct.pivot.TVA / 100));
  } else {
    // If it doesn't exist, add it to the list
    listeProd.push(prod);
  }

  localStorage.setItem('product_devisEdit', JSON.stringify(data));
}

function tableProducts() {
  var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
  var listeProd = data.devisProducts; // tableBody.empty();

  $('#productTableBody').empty();
  listeProd.forEach(function (product) {
    appendTableRow(product);
  });
  calculeTotals();
}

function recupereTotalTTCHTTVA(devis) {
  $("#total_ht").text(devis.HT.toFixed(2));
  $("#total_ttva").text(devis.TVA.toFixed(2));
  $("#total_ttc").text(devis.TTTC.toFixed(2));
} // Sélectionnez le conteneur où vous souhaitez ajouter les lignes (par exemple, un tbody avec l'id "productTableBody").
// Fonction pour générer le HTML pour chaque produit


function appendTableRow(product) {
  var row = '<tr class="text-center">' + '<td>' + product.product_code + '</td>' + '<td>' + product.pivot.designation + '</td>' + '<td>' + product.pivot.unite + '</td>' + '<td>' + '    <div class="input-step">' + '        <button type="button" class="minus" id="decreaseQte-' + product.pivot.product_id + '">–</button>' + '        <input type="number" class="product-quantity" id="product-qty-' + product.pivot.product_id + '" value="' + product.pivot.quantity + '">' + '        <button type="button" class="plus" id="increaseQte-' + product.pivot.product_id + '">+</button>' + '    </div>' + '</td>' + '<td>' + '    <div class="input-step">' + '        <button type="button" class="minus" id="decreasePrix-' + product.pivot.product_id + '">–</button>' + '        <input type="number" class="product-quantity" id="product-prix-' + product.pivot.product_id + '" value="' + product.pivot.price + '">' + '        <button type="button" class="plus" id="increasePrix-' + product.pivot.product_id + '">+</button>' + '    </div>' + '</td>' + '<td>' + product.pivot.TOTAL_HT + '</td>' + '<td>' + '    <div class="input-step">' + '        <button type="button" class="minus" id="decreaseTva-' + product.pivot.product_id + '">–</button>' + '        <input type="number" class="product-quantity" id="product-tva-' + product.pivot.product_id + '" value="' + product.pivot.TVA + '">' + '        <button type="button" class="plus" id="increaseTva-' + product.pivot.product_id + '">+</button>' + '    </div>' + '</td>' + '<td>' + product.pivot.TOTAL_TVA + '</td>' + '<td>' + product.pivot.TOTAL_TTC + '</td>' + '<td>' + '    <button type="button" class="btn" id="deleteProduct-' + product.pivot.product_id + '"><i class="las la-times text-danger fs-1"></i></button>' + '</td>' + '</tr>';
  $('#productTableBody').append(row);
  $('#increaseQte-' + product.pivot.product_id).on('click', function () {
    return increase(product.pivot.product_id, 'quantite');
  });
  $('#decreaseQte-' + product.pivot.product_id).on('click', function () {
    return decrease(product.pivot.product_id, 'quantite');
  });
  $('#product-qty-' + product.pivot.product_id).on('blur', function () {
    id = product.pivot.product_id;
    var qte = $('#product-qty-' + product.pivot.product_id).val();
    var prix = $('#product-prix-' + product.pivot.product_id).val();
    var tva = $('#product-tva-' + product.pivot.product_id).val();
    updateLocalStorageQuantityPrixTva(product.pivot.product_id, qte, 'quantite'); // Calculate and update ht and tttva in the localStorage

    updateLocalStorageHTTTTVA(id, qte, prix, tva);
    tableProducts();
  });
  $('#increasePrix-' + product.pivot.product_id).on('click', function () {
    return increase(product.pivot.product_id, 'prix');
  });
  $('#decreasePrix-' + product.pivot.product_id).on('click', function () {
    return decrease(product.pivot.product_id, 'prix');
  });
  $('#product-prix-' + product.pivot.product_id).on('blur', function () {
    id = product.pivot.product_id;
    var qte = $('#product-qty-' + product.pivot.product_id).val();
    var prix = $('#product-prix-' + product.pivot.product_id).val();
    var tva = $('#product-tva-' + product.pivot.product_id).val();
    updateLocalStorageQuantityPrixTva(product.pivot.product_id, prix, 'prix'); // Calculate and update ht and tttva in the localStorage

    updateLocalStorageHTTTTVA(id, qte, prix, tva);
    tableProducts();
  });
  $('#increaseTva-' + product.pivot.product_id).on('click', function () {
    return increase(product.pivot.product_id, 'tva');
  });
  $('#decreaseTva-' + product.pivot.product_id).on('click', function () {
    return decrease(product.pivot.product_id, 'tva');
  });
  $('#product-tva-' + product.pivot.product_id).on('blur', function () {
    id = product.pivot.product_id;
    var qte = $('#product-qty-' + product.pivot.product_id).val();
    var prix = $('#product-prix-' + product.pivot.product_id).val();
    var tva = $('#product-tva-' + product.pivot.product_id).val();
    updateLocalStorageQuantityPrixTva(product.pivot.product_id, tva, 'tva'); // Calculate and update ht and tttva in the localStorage

    updateLocalStorageHTTTTVA(id, qte, prix, tva);
    tableProducts();
  });
  $('#deleteProduct-' + product.pivot.product_id).on('click', function () {
    return deleteProduct(product.pivot.product_id);
  });
}

function increase(id, type) {
  var qteInput = $("#product-qty-".concat(id));
  var qte = parseFloat(qteInput.val());
  var prixInput = $("#product-prix-".concat(id));
  var prix = parseFloat(prixInput.val());
  var tvaInput = $("#product-tva-".concat(id));
  var tva = parseFloat(tvaInput.val());

  if (type === 'quantite') {
    if (!isNaN(qte)) {
      // Update the quantity in the input
      qte += 1;
      qteInput.val(qte); // Update the localStorage with the new quantity

      updateLocalStorageQuantityPrixTva(id, qte, 'quantite'); // Calculate and update ht and tttva in the localStorage

      updateLocalStorageHTTTTVA(id, qte, prix, tva);
      tableProducts();
    } else {
      console.error("La quantit\xE9 n'est pas un nombre valide.");
    }
  } else if (type === 'prix') {
    if (!isNaN(prix)) {
      // Update the prix in the input
      prix += 1;
      prixInput.val(prix); // Update the localStorage with the new prix

      updateLocalStorageQuantityPrixTva(id, prix, 'prix'); // Calculate and update ht and tttva in the localStorage

      updateLocalStorageHTTTTVA(id, qte, prix, tva);
      tableProducts();
    } else {
      console.error("Le prix n'est pas un nombre valide.");
    }
  } else if (type === 'tva') {
    if (!isNaN(tva)) {
      // Update the tva in the input
      tva += 1;
      tvaInput.val(tva); // Update the localStorage with the new tva

      updateLocalStorageQuantityPrixTva(id, tva, 'tva'); // Calculate and update ht and tttva in the localStorage

      updateLocalStorageHTTTTVA(id, qte, prix, tva);
      tableProducts();
    } else {
      console.error("Le tva n'est pas un nombre valide.");
    }
  }
}

function decrease(id, type) {
  var tvaInput = document.getElementById("product-qty-".concat(id));
  var qte = parseFloat(tvaInput.value);
  var prixInput = $("#product-prix-".concat(id));
  var prix = parseFloat(prixInput.val());
  var tvaInput = $("#product-tva-".concat(id));
  var tva = parseFloat(tvaInput.val());

  if (type === 'quantite') {
    if (!isNaN(qte) && qte > 1) {
      qte -= 1; // Update the quantity in the input field

      tvaInput.value = qte; // Update the localStorage with the new quantity

      updateLocalStorageQuantityPrixTva(id, qte, 'quantite'); // Calculate and update ht and tttva in the localStorage

      updateLocalStorageHTTTTVA(id, qte, prix, 20);
      tableProducts();
    } else {
      console.error("Invalid quantity or quantity cannot be decreased further.");
    }
  } else if (type === 'prix') {
    if (!isNaN(prix) && prix > 1) {
      prix -= 1; // Update the prix in the input field

      prixInput.value = prix; // Update the localStorage with the new prix

      updateLocalStorageQuantityPrixTva(id, prix, 'prix'); // Calculate and update ht and tttva in the localStorage

      updateLocalStorageHTTTTVA(id, qte, prix, 20);
      tableProducts();
    } else {
      console.error("Invalid price or price cannot be decreased further.");
    }
  } else if (type === 'tva') {
    if (!isNaN(tva) && tva > 1) {
      tva -= 1; // Update the tva in the input field

      tvaInput.value = tva; // Update the localStorage with the new tva

      updateLocalStorageQuantityPrixTva(id, tva, 'tva'); // Calculate and update ht and tttva in the localStorage

      updateLocalStorageHTTTTVA(id, qte, prix, tva);
      tableProducts();
    } else {
      console.error("Invalid tva or tva cannot be decreased further.");
    }
  }
}

function updateLocalStorageQuantityPrixTva(id, newValue, type) {
  if (type === 'quantite') {
    var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
    var listeProd = data.devisProducts;
    var existingProduct = listeProd.find(function (product) {
      return product.id === id;
    });

    if (existingProduct) {
      existingProduct.pivot.quantity = newValue;
      localStorage.setItem('product_devisEdit', JSON.stringify(data));
    }
  } else if (type === 'prix') {
    var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
    var listeProd = data.devisProducts;
    var existingProduct = listeProd.find(function (product) {
      return product.id === id;
    });

    if (existingProduct) {
      existingProduct.pivot.price = newValue;
      localStorage.setItem('product_devisEdit', JSON.stringify(data));
    }
  } else if (type === 'tva') {
    var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
    var listeProd = data.devisProducts;
    var existingProduct = listeProd.find(function (product) {
      return product.id === id;
    });

    if (existingProduct) {
      existingProduct.pivot.TVA = newValue;
      localStorage.setItem('product_devisEdit', JSON.stringify(data));
    }
  }
}

function updateLocalStorageHTTTTVA(id, newQuantity, newPrix, newTva) {
  var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
  var listeProd = data.devisProducts;
  var existingProduct = listeProd.find(function (product) {
    return product.id === id;
  });

  if (existingProduct) {
    // Update ht based on the new quantity
    existingProduct.pivot.TOTAL_HT = Math.round(parseFloat(newPrix) * parseFloat(newQuantity)); // Update tttva based on the updated ht and tva

    existingProduct.pivot.TOTAL_TVA = Math.round(parseFloat(newPrix) * parseFloat(newQuantity) * (newTva / 100));
    existingProduct.pivot.TOTAL_TTC = Math.round(existingProduct.pivot.TOTAL_HT * (1 + newTva / 100));
    localStorage.setItem('product_devisEdit', JSON.stringify(data));
  }
}

function calculeTotals() {
  var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
  var listeProd = data.devisProducts;
  var prixHT = 0;
  var tva = 0;
  var prixTTC = 0;

  if (listeProd && listeProd.length > 0) {
    // Calcule le prix hors taxe
    prixHT = listeProd.reduce(function (acc, product) {
      return acc + product.pivot.TOTAL_HT;
    }, 0); // Calcule la TVA

    tva = listeProd.reduce(function (acc, product) {
      return acc + product.pivot.TOTAL_TVA;
    }, 0); // Calcule le prix toutes taxes comprises

    prixTTC = listeProd.reduce(function (acc, product) {
      return acc + product.pivot.TOTAL_TTC;
    }, 0);
  }

  $("#total_ht").text(prixHT.toFixed(2));
  $("#total_ttva").text(tva.toFixed(2));
  $("#total_ttc").text(prixTTC.toFixed(2));
}

function deleteProduct(productId) {
  // e.preventDefault();
  // Récupérer les produits actuels depuis le localStorage
  var data = JSON.parse(localStorage.getItem('product_devisEdit')) || [];
  var listeProd = data.devisProducts; // Vérifier s'il y a des produits dans le localStorage

  if (listeProd) {
    // Trouver l'index du produit avec l'ID donné
    var productIndex = listeProd.findIndex(function (product) {
      return product.id === productId;
    }); // Vérifier si le produit a été trouvé

    if (productIndex !== -1) {
      // Supprimer le produit de la liste des produits
      listeProd.splice(productIndex, 1); // Mettre à jour le localStorage avec la nouvelle liste de produits

      localStorage.setItem('product_devisEdit', JSON.stringify(data));
      console.log('Produit supprimé avec succès.');
    } else {
      console.log('Produit non trouvé.');
    }
  } else {
    console.log('Aucun produit trouvé dans le localStorage.');
  }

  tableProducts();
}

$('.getProduct').on('click', function () {
  var product_id = $('select[name="product_id"]').val();

  if (product_id) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: window.location.origin + "/products/get-product",
      data: {
        id: product_id
      },
      type: "GET",
      dataType: "json",
      success: function success(data) {
        var prod = objectProd(data);
        pushProdToListe(prod);
        tableProducts();
      }
    });
  } else {
    console.log('AJAX load did not work');
  }
});
$('.storeDevis').on('click', function (e) {
  e.preventDefault();
  var data = JSON.parse(localStorage.getItem('product_devisEdit'));
  console.log(data);
  var listeProd = data.devisProducts;
  var devisId = data.object.id;
  var products = [];
  listeProd.forEach(function (product) {
    products.push(product.pivot);
  });
  console.log(products);
  var formData = new FormData($('#devis_form')[0]);
  formData.append('_method', 'PUT');
  data = {
    client: $('select[name="client_id"]').val(),
    category: $('select[name="category_id"]').val(),
    scategory: $('select[name="scategory_id"]').val(),
    status: $('select[name="status"]').val(),
    status_date: $('input[name="status_date"]').val(),
    comment: $('textarea[name="comment"]').val(),
    num_devis: $('#num_devis').text(),
    total_ttc: $('#total_ttc').text(),
    total_ht: $('#total_ht').text(),
    total_ttva: $('#total_ttva').text(),
    products: products
  };
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "/devis/" + devisId,
    type: "PUT",
    data: data,
    dataType: "json",
    success: function success(data) {
      if (data.success) {
        localStorage.removeItem("product_devisEdit"); // $('#productTableBody').empty();
        // loadTableFromLocalStorage();

        window.location.href = "/devis"; // location.reload();

        console.log("delete storage");
        Swal.fire('Super!', 'devis updated successfully', 'success'); // if (data.hasOwnProperty('redirectTo')) {
        //     window.location.href = data.redirectTo;
        // }
      }
    }
  });
});