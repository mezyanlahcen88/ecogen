// $(document).ready(function () {
//     $('.getProduct').on('click', function () {
//         var product_id = $('select[name="product_id"]').val();
//         console.log(product_id);
//         if (product_id) {
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
//             $.ajax({
//                 url: window.location.origin + "/products/get-product",
//                 data :{
//                   id : product_id,
//                 },
//                 type: "GET",
//                 dataType: "json",
//                 success: function (data) {
//                     console.log(data);
//                 },
//             });
//         } else {
//             console.log('AJAX load did not work');
//         }
//     });
// });

$(document).ready(function () {
    const tableBody = $("#productTableBody");

    var product_devis = [];
    localStorage.setItem("product_devis", JSON.stringify(product_devis));

    var newProduit = {
        ref: "",
        designation: "",
        unite: "",
        quantite: "",
        prix: "",
        ht: "",
        tva: "",
        ttva: "",
        ttc: "",
    };
    $(".getProduct").on("click", function () {
        var product_id = $('select[name="product_id"]').val();
        console.log(product_id);
        if (product_id) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
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
                    // setProdToLocalStorage();
                    tableProducts();
                },
            });
        } else {
            console.log("AJAX load did not work");
        }
    });

    function objectProd(data) {
        var p = Object.assign({}, newProduit); // Use Object.assign to create a copy of newProduit
        p.ref = data.product_code;
        p.id = data.id;
        p.designation = data.name_fr + "|" + data.name_ar;
        p.unite = data.unite;
        p.quantite = 1;
        p.prix = data.price_unit;
        p.tva = data.tva;
        p.ht = data.tva * data.price_unit;
        p.ttva = p.quantite * data.tva;
        p.ttc = 0;
        return p;
    }

    function pushProdToListe(prod) {
        var listeProd = JSON.parse(localStorage.getItem("product_devis"));
        var existingProduct = listeProd.find(
            (product) => product.id === prod.id
        );

        if (existingProduct) {
            existingProduct.quantite += 1;
        } else {
            listeProd.push(prod);
        }

        localStorage.setItem("product_devis", JSON.stringify(listeProd));
    }

    // function setProdToLocalStorage() {
    //     // Use JSON.stringify to convert the array to a JSON string
    //     localStorage.setItem('product_devis', JSON.stringify(product_devis));
    // }

    function tableProducts() {
        // Use JSON.parse to convert the JSON string back to an array
        var listeProd = JSON.parse(localStorage.getItem("product_devis")) || [];
        console.log("listeprod:", listeProd);

        // Itérez sur les produits_devis et ajoutez le HTML généré au tbody
        tableBody.empty(); // Assuming tableBody is a jQuery object, use empty() to clear its content
        listeProd.forEach((product) => {
            const productHTML = generateProductHTML(product);
            tableBody.append(productHTML); // Use append() to add HTML content
        });
    }

    var counter = 0;
    // Fonction pour générer le HTML pour chaque produit
    function generateProductHTML(product) {
        const tr = $("<tr>").add("text-center");
        counter++;
        console.log(tableBody);
        // Propriétés à inclure dans les cellules td
        const propertiesToInclude = [
            "ref",
            "designation",
            "unite",
            "quantite",
            "prix",
            "ht",
            "tva",
            "ttva",
            "ttc",
        ];

        // Itérez sur les propriétés à inclure et créez les éléments td
        propertiesToInclude.forEach((key) => {
            const td = $("<td>");
            if (key === "quantite") {
                // Création de l'élément div avec les boutons pour la quantité
                const quantityDiv = $("<div>").add("input-step");

                const minusButton = $("<button>")
                    .attr({
                        type: "button",
                        class: "minus"
                    })
                    .text("-");

                const quantityInput = $("<input>").attr({
                    type: "number",
                    class: "product-quantity",
                    id: `product-qty-${product.id}`,
                    value: product.quantite,
                    readOnly: true,
                });

                const plusButton = $("<button>")
                    .attr({
                        type: "button",
                        class: "plus"
                    })
                    .text("+");

                plusButton.on("click", function () {
                    // Appelez la fonction increase en passant l'ID du produit
                    increase(product.id);
                });
                // Ajoutez les boutons et l'input à la div
                quantityDiv.append(minusButton,quantityInput,plusButton);

                // Ajoutez la div à la cellule td
                td.append(quantityDiv);
            } else {
                td.text(product[key]);
            }
            tr.append(td);
        });

        // Créez un bouton pour supprimer le produit
        const removeButton = $("<button>").attr({class: "btn remove",});

        removeButton.innerHTML =
            '<i class="las la-times text-danger fs-1"></i>';
        const tdRemove = $("<td>");
        tdRemove.append(removeButton);
        tr.append(tdRemove);

        return tr;
    }

    function increase(id) {
        var qte = document.getElementById(product - qty - `${id}`).value;
        // Assurez-vous que qte est un nombre avant d'effectuer l'opération
        qte = parseFloat(qte);

        // Vérifiez si qte est un nombre valide
        if (!isNaN(qte)) {
            // Augmentez la quantité de 1
            qte += 1;

            // Mettez à jour la valeur de l'élément input
            document.getElementById(product - qty - `${id}`).value = qte;
        } else {
            console.error("La quantité n'est pas un nombre valide.");
        }
    }
});
