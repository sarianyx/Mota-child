(function ($) {
    $(document).ready(function () {
    
    var catalogueInitial = document.getElementById("catalogue-initial");
    var optionsFiltres = {
        "btnClick" : 'false',
        "ppp" : '-1',
        "offset" : '0',
        "categorie" : $('#categorie-select').find(":selected").val(),
        "format" : $('#format-select').find(":selected").val(),
        "tri" : $('#tri-select').find(":selected").val()
    };
    console.log("options filtre : ", optionsFiltres.categorie);

        $('.load-more-btn').click(function(e) {
            console.log("Click sur bouton more");

            catalogueInitial = document.getElementById("catalogue-initial");
            if (catalogueInitial != null) {
                catalogueInitial.remove();
            };

            optionsFiltres = {
                "btnClick" : 'false',
                "pppAdded" : 8,
                "offset" : '0',
                "categorie" : $('#categorie-select').find(":selected").val(),
                "format" : $('#format-select').find(":selected").val(),
                "tri" : $('#tri-select').find(":selected").val()
            };

            const ajaxurl = $(this).data('ajaxurl');
            const data = {
                action: $(this).data('action'), 
                nonce:  $(this).data('nonce'),
                type: $(this).data('type'),
                pppAdded: optionsFiltres.pppAdded
            }

            if (optionsFiltres.categorie != "") {
                console.log("catégorie sélectionnée =", optionsFiltres.categorie);
                data["cat"] = $('#categorie-select').find(":selected").val();
                console.log("data-cat = ", data.cat);
            };
            if (optionsFiltres.format != "") {
                console.log("format sélectionné =", optionsFiltres.format);
                data["format"] = $('#format-select').find(":selected").val();
                console.log("data-format = ", data.format);
            };
            if (optionsFiltres.tri != "") {
                console.log("tri sélectionné =", optionsFiltres.tri);
                data["tri"] = $('#tri-select').find(":selected").val();
                console.log("data-tri = ", data.tri);
            };

            console.log("ajaxurl = ", ajaxurl);
            console.log("data = ", data);

            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);

                // En cas d'erreur
                if (!response.success) {
                    alert(response.data);
                    return;
                }

                // Et en cas de réussite
                $('.catalogue-more').html(response.data); // Et afficher le HTML
            });
    
        }
        
    );

    });
})(jQuery);

(function ($) {
    $(document).ready(function () {

        $('.selector').change(function(e) {

            catalogueInitial = document.getElementById("catalogue-initial");
            if (catalogueInitial != null) {
                catalogueInitial.remove();
            };

            optionsFiltres = {
                "categorie" : $('#categorie-select').find(":selected").val(),
                "format" : $('#format-select').find(":selected").val(),
                "tri" : $('#tri-select').find(":selected").val()
            };

            const ajaxurl = $(this).data('ajaxurl');
            const data = {
                action: $(this).data('action'), 
                nonce:  $(this).data('nonce'),
                type: $(this).data('type')
            }

            if (optionsFiltres.categorie != "") {
                console.log("catégorie sélectionnée =", optionsFiltres.categorie);
                data["cat"] = $('#categorie-select').find(":selected").val();
                console.log("data-cat = ", data.cat);
            };
            if (optionsFiltres.format != "") {
                console.log("format sélectionné =", optionsFiltres.format);
                data["format"] = $('#format-select').find(":selected").val();
                console.log("data-format = ", data.format);
            };
            if (optionsFiltres.tri != "") {
                console.log("tri sélectionné =", optionsFiltres.tri);
                data["tri"] = $('#tri-select').find(":selected").val();
                console.log("data-tri = ", data.tri);
            };

            console.log("ajaxurl = ", ajaxurl);
            console.log("data = ", data);

            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);

                // En cas d'erreur
                if (!response.success) {
                    alert(response.data);
                    return;
                }

                // Et en cas de réussite
                $('.catalogue-more').html(response.data); // Et afficher le HTML
            });
    
        }
        
    );

    });
})(jQuery);
