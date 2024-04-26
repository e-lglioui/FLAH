<div class="bg-white p-10 md:w-2/3 lg:w-1/2 mx-auto rounded">
    <form action="{{ route('demmande') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center mb-5">
            <label for="nom" class="w-50 inline-block text-right mr-4 text-gray-500">Nom de l'entreprise ou Cabinie</label>
            <input id="nom_entreprise" name="nom_entreprise" type="text" placeholder="Ecrire" class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400">
        </div>
        <div class="flex items-center mb-10">
            <label for="description" class="w-50 inline-block text-right mr-4 text-gray-500">Fournisseur ou vétérinaire</label>
            <select class="form-select" id="type" name="type" required>
                <option >select</option>
                <option value="fournisseur">Fournisseur</option>
                <option value="veterinaire">Vétérinaire</option>
            </select>
        </div>
        <div class="flex items-center mb-10" id="certificatField" style="display: none;">
            <label for="certificat" class="w-50 inline-block text-right mr-4 text-gray-500">Certificat (pour les vétérinaires)</label>
            <input type="file" id="certificat" name="certificat">
        </div>
        <div class="flex items-center mb-10" id="matriculeField" style="display: none;">
            <label for="matricule" class="w-50 inline-block text-right mr-4 text-gray-500">Matricule (pour les fournisseurs)</label>
            <input type="text" id="matricule" name="matricule" placeholder="Matricule">
        </div>
        <div class="text-right" id="certificate"></div>
        <button class="w-full bg-green-700 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg" type="submit" name="submit">
            Demande
        </button>
    </form>
</div>

<script>
    let typeSelect = document.getElementById('type');
    let certificatField = document.getElementById('certificatField');
    let matriculeField = document.getElementById('matriculeField');

    typeSelect.addEventListener('change', function() {
        if (typeSelect.value === 'veterinaire') {
            certificatField.style.display = 'flex';
            matriculeField.style.display = 'none';
        } else if (typeSelect.value === 'fournisseur') {
            certificatField.style.display = 'none';
            matriculeField.style.display = 'flex';
        }
    });
</script>
