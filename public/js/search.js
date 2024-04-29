$(document).ready(function() {
    $('#query').on('input', function() {
        var query = $(this).val();
        var searchUrl = '{{ route("produit.search") }}'; // Utilisez Blade pour insérer la route
           console.log('test')
        if (query.length > 2) { // Effectuez la recherche uniquement si la requête est suffisamment longue
            $.ajax({
                url: searchUrl,
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    afficherResultats(data); // Afficher les résultats
                }
            });
        }
    });

    function afficherResultats(produits) {
        var resultsContainer = $('#search-results');
        resultsContainer.empty(); // Effacer les résultats précédents

        if (produits.length > 0) {
            produits.forEach(function(produit) {
                var resultItem = '<div class="result">' +
                    '<h3>' + produit.nom + '</h3>' +
                    '<p>' + produit.description + '</p>' +
                    '<span>' + produit.prix + ' MAD</span>' +
                    '</div>';
                resultsContainer.append(resultItem);
            });
        } else {
            resultsContainer.append('<p>Aucun produit trouvé.</p>');
        }
    }
});
