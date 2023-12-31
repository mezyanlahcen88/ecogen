$(document).ready(function () {
    const tableBody = $('#productTableBody');

    // Existing code...

    // Call this function to initialize the table with data from localStorage
    loadTableFromLocalStorage();
    calculeTotals();
    // Existing code...

    function loadTableFromLocalStorage() {
        console.log("Loading table from localStorage");

        var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
        tableBody.empty(); // Clear the existing content in the table

        // Iterate over the products and add them to the table
        listeProd.forEach((product) => {
            const productHTML = generateProductHTML(product);
            tableBody.append(productHTML);
        });
    }


    var product_devis = [];
    var newProduit = {
        ref: '',
        designation: '',
        unite: '',
        quantite: 0,
        prix: 0,
        ht: 0,
        tva: 0,
        ttva: 0,
        ttc: 0,
    }

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
                    id: product_id,
                },
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var prod = objectProd(data);
                    pushProdToListe(prod);
                    setProdToLocalStorage();
                    tableProducts();
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });

    function objectProd(data) {
        var p = Object.assign({}, newProduit);
        p.ref = data.product_code;
        p.id = data.id;
        p.designation = data.name_fr + '|' + data.name_ar;
        p.unite = data.unite;
        p.quantite = 1;
        p.prix = data.buy_price;
        p.tva = data.tva;
        p.ht = Math.round((data.buy_price / (1 + p.tva / 100) * p.quantite) * 100) / 100;
        // Math.round(data.ht * 100) / 100;
        p.ttva = Math.round(((p.tva / 100) * p.ht * p.quantite) * 100) / 100;
        p.ttc = Math.round((p.ht * (1 + p.tva / 100) * p.quantite) * 100) / 100;
        return p;
    }

    function pushProdToListe(prod) {
        var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];

        // Check if the product already exists in the list
        var existingProduct = listeProd.find((product) => product.id === prod.id);

        if (existingProduct) {
            // If it exists, update the quantity
            existingProduct.quantite += 1;
            existingProduct.ht = Math.round(((existingProduct.prix / (1 + existingProduct.tva / 100) * existingProduct.quantite)) * 100) / 100;
            existingProduct.ttva = Math.round((((existingProduct.tva / 100) * existingProduct.ht * existingProduct.quantite)) * 100) / 100;
        } else {
            // If it doesn't exist, add it to the list
            listeProd.push(prod);
        }

        localStorage.setItem('product_devis', JSON.stringify(listeProd));
    }

    function setProdToLocalStorage() {
        // No need to use this function; you can directly update localStorage in pushProdToListe
    }

    function tableProducts() {
        var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
        console.log('listeprod:', listeProd);

        tableBody.empty();

        listeProd.forEach((product) => {
            const productHTML = generateProductHTML(product);
            tableBody.append(productHTML);
        });
        calculeTotals();
    }


    // Sélectionnez le conteneur où vous souhaitez ajouter les lignes (par exemple, un tbody avec l'id "productTableBody").
    // const tableBody = document.getElementById('productTableBody');
    var counter = 0;
    // Fonction pour générer le HTML pour chaque produit
    function generateProductHTML(product) {
        const tr = document.createElement('tr');
        counter++;
        tr.classList.add('text-center');
        console.log(tableBody);
        // Propriétés à inclure dans les cellules td
        const propertiesToInclude = ['ref', 'designation', 'unite', 'quantite', 'prix', 'ht', 'tva', 'ttva', 'ttc'];

        // Itérez sur les propriétés à inclure et créez les éléments td
        propertiesToInclude.forEach((key) => {
            const td = document.createElement('td');
            if (key === 'quantite') {
                // Création de l'élément div avec les boutons pour la quantité
                const quantityDiv = document.createElement('div');
                quantityDiv.classList.add('input-step');

                const minusButton = document.createElement('button');
                minusButton.type = 'button';
                minusButton.classList.add('minus');
                minusButton.textContent = '–';

                minusButton.addEventListener('click', function () {
                    // Appelez la fonction increase en passant l'ID du produit
                    decrease(product.id);
                });

                const quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.classList.add('product-quantity');
                quantityInput.id = product-qty-`${product.id}`;
                quantityInput.value = product.quantite;
                quantityInput.readOnly = true;

                const plusButton = document.createElement('button');
                plusButton.type = 'button';
                plusButton.classList.add('plus');
                plusButton.textContent = '+';

                plusButton.addEventListener('click', function () {
                    // Appelez la fonction increase en passant l'ID du produit
                    increase(product.id);
                });
                // Ajoutez les boutons et l'input à la div
                quantityDiv.appendChild(minusButton);
                quantityDiv.appendChild(quantityInput);
                quantityDiv.appendChild(plusButton);

                // Ajoutez la div à la cellule td
                td.appendChild(quantityDiv);
            } else {
                td.textContent = product[key];
            }
            tr.appendChild(td);
        });

        // Créez un bouton pour supprimer le produit
        const removeButton = document.createElement('button');
        removeButton.classList.add('btn','remove');
        // removeButton.classList.add('btn', 'remove');
        removeButton.innerHTML = '<i class="las la-times text-danger fs-1"></i>';
        const tdRemove = document.createElement('td');
        removeButton.addEventListener('click', function () {
            // Appelez la fonction deleteProduct en passant l'ID du produit
            // deleteProduct(product.id);
        });
        tdRemove.appendChild(removeButton);
        tr.appendChild(tdRemove);

        return tr;
    }

    function increase(id) {
        var qteInput = $('#product-qty-`${id}`');
        var qte = parseFloat(qteInput.val());

        if (!isNaN(qte)) {
            // Update the quantity in the input
            qte += 1;
            qteInput.val(qte);

            // Update the localStorage with the new quantity
            updateLocalStorageQuantity(id, qte);

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte);
            tableProducts();
        } else {
            console.error('La quantité n\'est pas un nombre valide.');
        }
    }

    function decrease(id) {
        var quantityInput = document.getElementById(product-qty-`${id}`);
        var qte = parseFloat(quantityInput.value);

        if (!isNaN(qte) && qte > 1) {
            qte -= 1;

            // Update the quantity in the input field
            quantityInput.value = qte;

            // Update the localStorage with the new quantity
            updateLocalStorageQuantity(id, qte);

            // Calculate and update ht and tttva in the localStorage
            updateLocalStorageHTTTTVA(id, qte);
            tableProducts();

        } else {
            console.error("Invalid quantity or quantity cannot be decreased further.");
        }
    }


    function updateLocalStorageQuantity(id, newQuantity) {
        var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
        var existingProduct = listeProd.find((product) => product.id === id);

        if (existingProduct) {
            existingProduct.quantite = newQuantity;
            localStorage.setItem('product_devis', JSON.stringify(listeProd));
        }
    }

    function updateLocalStorageHTTTTVA(id, newQuantity) {
        var listeProd = JSON.parse(localStorage.getItem('product_devis')) || [];
        var existingProduct = listeProd.find((product) => product.id === id);

        if (existingProduct) {
            // Update ht based on the new quantity
            existingProduct.ht = Math.round((parseFloat(existingProduct.prix) / (1 + parseFloat(existingProduct.tva) / 100) * parseFloat(newQuantity)) * 100) / 100;

            // Update tttva based on the updated ht and tva
            existingProduct.ttva = Math.round(((parseFloat(existingProduct.tva) / 100) * parseFloat(existingProduct.ht) * parseFloat(newQuantity)) * 100) / 100;
            existingProduct.ttc = Math.round((parseFloat(existingProduct.ht) * (1 + parseFloat(existingProduct.tva) / 100) * parseFloat(newQuantity)) * 100) / 100;
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
            prixHT = listeProd.reduce((acc, product) => acc + product.ht * product.quantite, 0);
            // Calcule la TVA
            tva = listeProd.reduce((acc, product) => acc + product.ttva, 0);
            // Calcule le prix toutes taxes comprises
            prixTTC = listeProd.reduce((acc, product) => acc + product.ttc, 0);
        }
        $("#total_ht").text(prixHT.toFixed(2));
        $("#total_ttva").text(tva.toFixed(2));
        $("#total_ttc").text(prixTTC.toFixed(2));
    }

    // function deleteProduct(productId) {
    //     // Récupérer les produits actuels depuis le localStorage
    //     var listeProd = JSON.parse(localStorage.getItem('product_devis'));

    //     // Vérifier s'il y a des produits dans le localStorage
    //     if (listeProd) {
    //         // Convertir la chaîne JSON en objet JavaScript
    //         var products = JSON.parse(listeProd);

    //         // Trouver l'index du produit avec l'ID donné
    //         var productIndex = products.findIndex(function (product) {
    //             return product.id === productId;
    //         });

    //         // Vérifier si le produit a été trouvé
    //         if (productIndex !== -1) {
    //             // Supprimer le produit de la liste des produits
    //             products.splice(productIndex, 1);

    //             // Mettre à jour le localStorage avec la nouvelle liste de produits
    //             localStorage.setItem('product_devis', JSON.stringify(products));
    //             console.log('Produit supprimé avec succès.');
    //         } else {
    //             console.log('Produit non trouvé.');
    //         }
    //     } else {
    //         console.log('Aucun produit trouvé dans le localStorage.');
    //     }
    //     tableProducts();
    // }

});
