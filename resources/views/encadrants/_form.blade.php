@csrf
@if(isset($encadrant))
    @method('PUT')
@endif

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="prenom" class="block text-sm font-medium text-slate-700">Prénom <span class="text-red-600">*</span></label>
        <input id="prenom" name="prenom" type="text" value="{{ old('prenom', $encadrant->prenom ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('prenom') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('prenom')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="nom" class="block text-sm font-medium text-slate-700">Nom <span class="text-red-600">*</span></label>
        <input id="nom" name="nom" type="text" value="{{ old('nom', $encadrant->nom ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('nom') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('nom')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="service" class="block text-sm font-medium text-slate-700">Service ou département <span class="text-red-600">*</span></label>
        <input id="service" name="service" type="text" value="{{ old('service', $encadrant->service ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('service') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('service')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-slate-700">Adresse e-mail professionnelle <span class="text-red-600">*</span></label>
        <input id="email" name="email" type="email" value="{{ old('email', $encadrant->email ?? '') }}" required
            class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
        @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex items-center justify-end gap-3">
    <a href="{{ route('encadrants.index') }}" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Annuler</a>
    <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">{{ $submitLabel }}</button>
</div>
