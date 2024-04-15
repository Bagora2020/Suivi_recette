<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
  
<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>
        <div class="card-body">
        <form action="{{route('Recetteticket.update', $recetteticket->id)}}" class="p-3" method="post">
                 @csrf
                 @method('PUT')
                
             
                 <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="typetickets_nomticket">Type de ticket</label>
                        <select name="typeticket_nomticket" class="form-control" id="typetickets_nomticket" value=" {{ $recetteticket->typeticket_nomticket }}" >
                            <option value="">Sélectionnez un type de ticket</option>
                            @foreach($typeticket as $typetickets)
                            <option value="{{ $typetickets->id }}">
                            {{ $typetickets->nomticket }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="typetickets_nomticket">Prix Unitaire</label>

                        <select name="typeticket_valeur" class="form-control" id="typetickets_nomticket" value="{{$recetteticket->typeticket_valeur}}" >
                            <option value="">Sélectionnez prix</option>
                            <option value="">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Quantité</label>
                        <input type="number" name="quantite" class="form-control" placeholder="Quantite" value="{{$recetteticket->quantite}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Date de versement</label>
                        <input type="date" name="date" class="form-control" placeholder="Date" value="{{$recetteticket->date}}" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Partie Versante</label>
                        <input type="text" name="partieVersante" class="form-control" placeholder="Partie Versante" value="{{$recetteticket->partieVersante}}">
                    </div>
                </div>



                <div class="row mb-3">
                    <div class="col-offset-4">
                        <button class="btn-success btn" type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>