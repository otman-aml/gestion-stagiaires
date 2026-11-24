@csrf
@if(isset($stagiaire))
    @method('PUT')
@endif

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="prenom" class="block text-sm font-medium text-slate-700">Prénom <span class="text-red-600">*</span></label>
        <input id="prenom" name="prenom" type="text" value="{{ old('prenom', $stagiaire->prenom ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('prenom') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('prenom')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="nom" class="block text-sm font-medium text-slate-700">Nom <span class="text-red-600">*</span></label>
        <input id="nom" name="nom" type="text" value="{{ old('nom', $stagiaire->nom ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('nom') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('nom')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="etablissement" class="block text-sm font-medium text-slate-700">Établissement <span class="text-red-600">*</span></label>
        <input id="etablissement" name="etablissement" type="text" value="{{ old('etablissement', $stagiaire->etablissement ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('etablissement') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('etablissement')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="filiere" class="block text-sm font-medium text-slate-700">Filière ou formation <span class="text-red-600">*</span></label>
        <input id="filiere" name="filiere" type="text" value="{{ old('filiere', $stagiaire->filiere ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('filiere') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('filiere')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="date_debut" class="block text-sm font-medium text-slate-700">Date de début <span class="text-red-600">*</span></label>
        <input id="date_debut" name="date_debut" type="date" value="{{ old('date_debut', isset($stagiaire) ? $stagiaire->date_debut->format('Y-m-d') : '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('date_debut') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('date_debut')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="date_fin" class="block text-sm font-medium text-slate-700">Date de fin <span class="text-red-600">*</span></label>
        <input id="date_fin" name="date_fin" type="date" value="{{ old('date_fin', isset($stagiaire) ? $stagiaire->date_fin->format('Y-m-d') : '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('date_fin') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('date_fin')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="encadrant_id" class="block text-sm font-medium text-slate-700">Encadrant <span class="text-red-600">*</span></label>
        <select id="encadrant_id" name="encadrant_id" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('encadrant_id') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
            <option value="">Sélectionner un encadrant</option>
            @foreach ($encadrants as $encadrant)
                <option value="{{ $encadrant->id }}" @selected(old('encadrant_id', $stagiaire->encadrant_id ?? '') == $encadrant->id)>
                    {{ $encadrant->prenom }} {{ $encadrant->nom }} — {{ $encadrant->service }}
                </option>
            @endforeach
        </select>
        @error('encadrant_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="statut" class="block text-sm font-medium text-slate-700">Statut <span class="text-red-600">*</span></label>
        <select id="statut" name="statut" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('statut') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
            <option value="">Sélectionner un statut</option>
            @foreach ($statuts as $statut)
                <option value="{{ $statut }}" @selected(old('statut', $stagiaire->statut ?? '') == $statut)>{{ $statut }}</option>
            @endforeach
        </select>
        @error('statut')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="sm:col-span-2">
        <label for="sujet_stage" class="block text-sm font-medium text-slate-700">Sujet du stage <span class="text-red-600">*</span></label>
        <textarea id="sujet_stage" name="sujet_stage" rows="4" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('sujet_stage') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">{{ old('sujet_stage', $stagiaire->sujet_stage ?? '') }}</textarea>
        @error('sujet_stage')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex items-center justify-end gap-3">
    <a href="{{ route('stagiaires.index') }}" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Annuler</a>
    <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">{{ $submitLabel }}</button>
</div>
