"use strict";

$(document).ready(function () {
  var tableBody = $('#productTableBody'); // Call this function to initialize the table with data from localStorage

  loadTableFromLocalStorage();
  calculeTotals(); // Existing code...

  function loadTableFromLocalStorage() {
    console.log("Loading table from localStorage");
    var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
    tableBody.empty(); // Clear the existing content in the table
    // Iterate over the products and add them to the table

    listeProd.forEach(function (product) {
      var productHTML = generateProductHTML(product);
      tableBody.append(productHTML);
    });
  }

  var newProduit = {
    ref: '',
    designation: '',
    unite: '',
    quantite: 0,
    prix: 0,
    ht: 0,
    tva: 0,
    ttva: 0,
    ttc: 0
  };
  $('.getProduct').on('click', function () {
    var product_id = $('select[name="product_id"]').val();
    console.log(product_id);

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
          console.log("data.price_unit :" + data.price_unit);
          pushProdToListe(prod); // setProdToLocalStorage();

          tableProducts();
        }
      });
    } else {
      console.log('AJAX load did not work');
    }
  });

  function objectProd(data) {
    var p = Object.assign({}, newProduit);
    p.ref = data.product_code;
    p.id = data.id;
    p.designation = data.name_fr + ' | ' + data.name_ar;
    p.unite = data.unite;
    p.quantite = 1;
    p.prix = data.price_unit;
    p.tva = data.tva;
    p.ht = Math.round(data.price_unit * p.quantite);
    p.ttva = Math.round(p.prix * p.quantite * (p.tva / 100));
    p.ttc = Math.round(p.prix * p.quantite * (1 + p.tva / 100));
    return p;
  }

  function pushProdToListe(prod) {
    var listeProd = JSON.parse(localStorage.getItem('product_devis')) || []; // Check if the product already exists in the list

    var existingProduct = listeProd.find(function (product) {
      return product.id === prod.id;
    });

    if (existingProduct) {
      // If it exists, update the quantity
      existingProduct.quantite += 1;
      existingProduct.ht = Math.round(existingProduct.prix * existingProduct.quantite);
      existingProduct.ttva = Math.round(existingProduct.tva / 100 * existingProduct.ht);
      existingProduct.ttc = Math.round(existingProduct.ht * (1 + existingProduct.tva / 100));
      console.log("pushProdToListe prix:" + existingProduct.prix);
    } else {
      // If it doesn't exist, add it to the list
      listeProd.push(prod);
    }

    console.log("pushProdToListe prod prix:" + prod.prix);
    localStorage.setItem('product_devis', JSON.stringify(listeProd));
  }

  function tableProducts() {
    var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
    console.log('listeprod:', listeProd);
    tableBody.empty();
    listeProd.forEach(function (product) {
      var productHTML = generateProductHTML(product);
      tableBody.append(productHTML);
    });
    calculeTotals();
  } // Sélectionnez le conteneur où vous souhaitez ajouter les lignes (par exemple, un tbody avec l'id "productTableBody").
  // const tableBody = document.getElementById('productTableBody');


  var counter = 0; // Fonction pour générer le HTML pour chaque produit

  function generateProductHTML(product) {
    var tr = $('<tr>').addClass('text-center');
    counter++; // Properties to include in the td cells

    var propertiesToInclude = ['ref', 'designation', 'unite', 'quantite', 'prix', 'ht', 'tva', 'ttva', 'ttc']; // Iterate over properties to include and create td elements

    propertiesToInclude.forEach(function (key) {
      var td = $('<td>');

      if (key === 'quantite') {
        // Create quantity div with buttons
        var quantityDiv = $('<div>').addClass('input-step'); // Create minus button

        var minusButton = $('<button>').addClass('minus').text('–').on('click', function () {
          return decrease(product.id, 'quantite');
        }); // Create quantity input

        var tvaInput = document.createElement('input');
        tvaInput.type = 'number';
        tvaInput.classList.add('product-quantity');
        tvaInput.id = "product-qty-".concat(product.id);
        tvaInput.value = product.quantite;
        tvaInput.addEventListener('blur', function () {
          // Récupère l'élément input actuel
          var input = $(this); // Récupère l'id de l'élément input

          var id = input.attr("id"); // Appelez la fonction increase en passant l'ID du produit
          // updateQuantite(tvaInput.value, id);

          var idProd = id.slice(12);
          updateLocalStorageQuantityPrixTva(idProd, tvaInput.value, 'quantite');
          updateLocalStorageHTTTTVA(idProd, tvaInput.value, $("#product-prix-".concat(product.id)).val(), $("#product-tva-".concat(product.id)).val());
          tableProducts();
        }); // Create plus button

        var plusButton = $('<button>').addClass('plus').text('+').on('click', function () {
          return increase(product.id, 'quantite');
        }); // Append buttons and input to the div

        quantityDiv.append(minusButton, tvaInput, plusButton); // Append the div to the td element

        td.append(quantityDiv);
      } else if (key === 'prix') {
        // Create prix div with buttons (similar to quantity div)
        var prixDiv = $('<div>').addClass('input-step'); // Create minus button

        var minusButtonPrix = $('<button>').addClass('minus').text('–').on('click', function () {
          return decrease(product.id, 'prix');
        }); // Create prix input
        // Create quantity input

        var prixInput = document.createElement('input');
        prixInput.type = 'number';
        prixInput.classList.add('product-prix');
        prixInput.id = "product-prix-".concat(product.id);
        prixInput.value = product.prix;
        prixInput.addEventListener('blur', function () {
          // Récupère l'élément input actuel
          var input = $(this); // Récupère l'id de l'élément input

          var id = input.attr("id"); // Appelez la fonction increase en passant l'ID du produit

          var idProd = id.slice(13);
          updateLocalStorageQuantityPrixTva(idProd, prixInput.value, 'prix');
          updateLocalStorageHTTTTVA(idProd, $("#product-qty-".concat(product.id)).val(), prixInput.value, $("#product-tva-".concat(product.id)).val());
          tableProducts();
        }); // Create plus button

        var plusButtonPrix = $('<button>').addClass('plus').text('+').on('click', function () {
          return increase(product.id, 'prix');
        }); // Append buttons and input to the div

        prixDiv.append(minusButtonPrix, prixInput, plusButtonPrix);
        td.append(prixDiv);
      } else if (key === 'tva') {
        // Create prix div with buttons (similar to quantity div)
        var tvaDiv = $('<div>').addClass('input-step'); // Create minus button

        var minusButtonTva = $('<button>').addClass('minus').text('–').on('click', function () {
          return decrease(product.id, 'tva');
        }); // Create tva input

        var _tvaInput = document.createElement('input');

        _tvaInput.type = 'number';

        _tvaInput.classList.add('product-tva');

        _tvaInput.id = "product-tva-".concat(product.id);
        _tvaInput.value = product.tva;

        _tvaInput.addEventListener('blur', function () {
          // Récupère l'élément input actuel
          var input = $(this); // Récupère l'id de l'élément input

          var id = input.attr("id"); // Appelez la fonction increase en passant l'ID du produit
          // updateQuantite(tvaInput.value, id);

          var idProd = id.slice(12);
          updateLocalStorageQuantityPrixTva(idProd, _tvaInput.value, 'tva');
          updateLocalStorageHTTTTVA(idProd, $("#product-qty-".concat(product.id)).val(), $("#product-prix-".concat(product.id)).val(), _tvaInput.value);
          tableProducts();
        }); // Create plus button


        var plusButtonTva = $('<button>').addClass('plus').text('+').on('click', function () {
          return increase(product.id, 'tva');
        }); // Append buttons and input to the div

        tvaDiv.append(minusButtonTva, _tvaInput, plusButtonTva);
        td.append(tvaDiv);
      } else {
        td.text(product[key]);
      }

      tr.append(td);
    }); // Create remove button

    var removeButton = $('<button>').addClass('btn').html('<i class="las la-times text-danger fs-1"></i>').on('click', function () {
      return deleteProduct(product.id);
    });
    var tdRemove = $('<td>').append(removeButton);
    tr.append(tdRemove);
    return tr;
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
      var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
      var existingProduct = listeProd.find(function (product) {
        return product.id === id;
      });

      if (existingProduct) {
        existingProduct.quantite = newValue;
        localStorage.setItem('product_devis', JSON.stringify(listeProd));
      }
    } else if (type === 'prix') {
      var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
      var existingProduct = listeProd.find(function (product) {
        return product.id === id;
      });

      if (existingProduct) {
        existingProduct.prix = newValue;
        localStorage.setItem('product_devis', JSON.stringify(listeProd));
      }
    } else if (type === 'tva') {
      var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
      var existingProduct = listeProd.find(function (product) {
        return product.id === id;
      });

      if (existingProduct) {
        existingProduct.tva = newValue;
        localStorage.setItem('product_devis', JSON.stringify(listeProd));
      }
    }
  }

  function updateLocalStorageHTTTTVA(id, newQuantity, newPrix, newTva) {
    var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
    var existingProduct = listeProd.find(function (product) {
      return product.id === id;
    });

    if (existingProduct) {
      // Update ht based on the new quantity
      existingProduct.ht = Math.round(parseFloat(newPrix) * parseFloat(newQuantity)); // Update tttva based on the updated ht and tva

      existingProduct.ttva = Math.round(parseFloat(newPrix) * parseFloat(newQuantity) * (newTva / 100));
      existingProduct.ttc = Math.round(existingProduct.ht * (1 + newTva / 100));
      localStorage.setItem('product_devis', JSON.stringify(listeProd));
    }
  }

  function calculeTotals() {
    var listeProd = JSON.parse(localStorage.getItem('product_devis'));
    var prixHT = 0;
    var tva = 0;
    var prixTTC = 0;

    if (listeProd && listeProd.length > 0) {
      // Calcule le prix hors taxe
      prixHT = listeProd.reduce(function (acc, product) {
        return acc + product.ht;
      }, 0); // Calcule la TVA

      tva = listeProd.reduce(function (acc, product) {
        return acc + product.ttva;
      }, 0); // Calcule le prix toutes taxes comprises

      prixTTC = listeProd.reduce(function (acc, product) {
        return acc + product.ttc;
      }, 0);
    }

    $("#total_ht").text(prixHT.toFixed(2));
    $("#total_ttva").text(tva.toFixed(2));
    $("#total_ttc").text(prixTTC.toFixed(2));
  } //update quantite ht ttva ttc
  // function updateQuantite(quantite, idInput) {
  //     var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
  //     // Récupère id du produit
  //     const id = idInput.slice(12);
  //     var existingProduct = listeProd.find((product) => product.id === id);
  //     console.log(id);
  //     console.log(quantite);
  //     if (existingProduct) {
  //         // If it exists, update the quantity
  //         existingProduct.quantite = quantite;
  //         existingProduct.ht = Math.round((existingProduct.prix * existingProduct.quantite));
  //         existingProduct.ttva = Math.round((((existingProduct.tva / 100) * existingProduct.ht)));
  //         localStorage.setItem('product_devis', JSON.stringify(listeProd));
  //     }
  //     loadTableFromLocalStorage();
  //     calculeTotals();
  // };


  function deleteProduct(productId) {
    // e.preventDefault();
    // Récupérer les produits actuels depuis le localStorage
    var listeProd = JSON.parse(localStorage.getItem('product_devis')); // Vérifier s'il y a des produits dans le localStorage

    if (listeProd) {
      // Trouver l'index du produit avec l'ID donné
      var productIndex = listeProd.findIndex(function (product) {
        return product.id === productId;
      }); // Vérifier si le produit a été trouvé

      if (productIndex !== -1) {
        // Supprimer le produit de la liste des produits
        listeProd.splice(productIndex, 1); // Mettre à jour le localStorage avec la nouvelle liste de produits

        localStorage.setItem('product_devis', JSON.stringify(listeProd));
        console.log('Produit supprimé avec succès.');
      } else {
        console.log('Produit non trouvé.');
      }
    } else {
      console.log('Aucun produit trouvé dans le localStorage.');
    }

    tableProducts();
  }

  $('.storeDevis').on('click', function (e) {
    e.preventDefault();
    var formData = new FormData($('#formAddDevis')[0]);
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
      products: JSON.parse(localStorage.getItem('product_devis'))
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/devis",
      type: "POST",
      data: data,
      dataType: "json",
      success: function success(data) {
        if (data.success) {
          localStorage.removeItem("product_devis"); // $('#productTableBody').empty();

          loadTableFromLocalStorage();
          location.reload();
          console.log("delete storage");
          Swal.fire('Super!', 'devis added successfully', 'success'); // if (data.hasOwnProperty('redirectTo')) {
          //     window.location.href = data.redirectTo;
          // }
        }
      }
    });
  });
}); //  function generateProductHTML(product) {
//      const tr = document.createElement('tr');
//      counter++;
//      tr.classList.add('text-center');
//      console.log(tableBody);
//      // Propriétés à inclure dans les cellules td
//      const propertiesToInclude = ['ref', 'designation', 'unite', 'quantite', 'prix', 'ht', 'tva', 'ttva', 'ttc'];
//      // Itérez sur les propriétés à inclure et créez les éléments td
//      propertiesToInclude.forEach((key) => {
//          const td = document.createElement('td');
//          if (key === 'quantite') {
//              // Création de l'élément div avec les boutons pour la quantité
//              const quantityDiv = document.createElement('div');
//              quantityDiv.classList.add('input-step');
//              const minusButton = document.createElement('button');
//              minusButton.type = 'button';
//              minusButton.classList.add('minus');
//              minusButton.textContent = '–';
//              minusButton.addEventListener('click', function () {
//                  // Appelez la fonction increase en passant l'ID du produit
//                  decrease(product.id);
//              });
//              const tvaInput = document.createElement('input');
//              tvaInput.type = 'number';
//              tvaInput.classList.add('product-quantity');
//              tvaInput.id = `product-qty-${product.id}`;
//              tvaInput.value = product.quantite;
//              tvaInput.addEventListener('blur', function () {
//                  // Récupère l'élément input actuel
//                  const input = $(this);
//                  // Récupère l'id de l'élément input
//                  const id = input.attr("id");
//                  // Appelez la fonction increase en passant l'ID du produit
//                  // updateQuantite(tvaInput.value, id);
//                  const idProd = id.slice(12);
//                  updateLocalStorageQuantityPrixTva(idProd, tvaInput.value, 'quantite');
//                  updateLocalStorageHTTTTVA(idProd, tvaInput.value, $(`product-prix-${product.id}`).val(), 20);
//                  tableProducts();
//              });
//              const plusButton = document.createElement('button');
//              plusButton.type = 'button';
//              plusButton.classList.add('plus');
//              plusButton.textContent = '+';
//              plusButton.addEventListener('click', function () {
//                  // Appelez la fonction increase en passant l'ID du produit
//                  increase(product.id);
//              });
//              // Ajoutez les boutons et l'input à la div
//              quantityDiv.appendChild(minusButton);
//              quantityDiv.appendChild(tvaInput);
//              quantityDiv.appendChild(plusButton);
//              // Ajoutez la div à la cellule td
//              td.appendChild(quantityDiv);
//          }
//          if (key === 'prix') {
//              // Create the quantity div with buttons
//              const prixDiv = $('<div>')
//                  .addClass('input-step');
//              // Create the minus button and attach a click listener
//              const minusButton = $('<button>')
//                  .addClass('minus')
//                  .text('–')
//                  .on('click', function () {
//                      decrease(product.id, 'prix');
//                  });
//              // Create the quantity input and attach a blur listener
//              const prixInput = $('<input>')
//                  .attr('type', 'number')
//                  .addClass('product-prix')
//                  .attr('id', `product-prix-${product.id}`)
//                  .val(product.prix)
//                  .on('blur', function () {
//                      const id = $(this).attr('id');
//                      const idProd = id.slice(12);
//                      updateLocalStorageQuantityPrixTva(idProd, $(this).val(), 'prix');
//                      updateLocalStorageHTTTTVA(idProd, $(`product-qty-${product.id}`).val(), $(this).val(), 20);
//                      tableProducts();
//                  });
//              // Create the plus button and attach a click listener
//              const plusButton = $('<button>')
//                  .addClass('plus')
//                  .text('+')
//                  .on('click', function () {
//                      increase(product.id, 'prix');
//                  });
//              // Append buttons and input to the div
//              prixDiv.append(minusButton, prixInput, plusButton);
//              // Append the div to the td element
//              $(td).append(prixDiv);
//          } else {
//              td.textContent = product[key];
//          }
//          tr.appendChild(td);
//      });
//      // Créez un bouton pour supprimer le produit
//      const removeButton = document.createElement('button');
//      removeButton.type = 'button';
//      removeButton.classList.add('btn');
//      // removeButton.classList.add('btn', 'remove');
//      removeButton.innerHTML = '<i class="las la-times text-danger fs-1"></i>';
//      const tdRemove = document.createElement('td');
//      removeButton.addEventListener('click', function () {
//          // Appelez la fonction deleteProduct en passant l'ID du produit
//          deleteProduct(product.id);
//      });
//      tdRemove.appendChild(removeButton);
//      tr.appendChild(tdRemove);
//      return tr;
//  }