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
            <form action="{{route('ordreRecette.update', $ordreRecette->id)}}" method="post" class="p-3">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control rounded-3"  name="objetRecette" value="{{$ordreRecette->objetRecette}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <select name="type" class="form-select" value="{{$ordreRecette->type}}">
                            <option value="medicament">Médicament</option>
                            <option value="musculation">Musculation</option>
                            <option value="consultation">Consultation</option>
                            <option value="petitdej">Petit Déjeuner</option>
                            <option value="ticketdej">Déjeuner</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="number" name="quantite" class="form-control" placeholder="Quantite" value="{{$ordreRecette->quantite}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="pu" class="form-control" placeholder="Prix Unitaire" value="{{$ordreRecette->pu}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="date" name="datedebut" class="form-control" placeholder="Date debut" value="{{$ordreRecette->date}}">
                    </div>
                    <div class="col-12 col-md-6">
                        
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


<!-- <div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>
        
        <div class="card-body">
            <form action="{{route('ordreRecette.add')}}" class="p-3">
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control rounded-3" placeholder="objet recette" name="objetRecette">
                    </div>
                    <div class="col-12 col-md-6">
                        <select name="type" class="form-select">
                            <option value="medicament">Médicament</option>
                            <option value="musculation">Musculation</option>
                            <option value="consultation">Consultation</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="number" name="quantite" class="form-control" placeholder="Quantite">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="pu" class="form-control" placeholder="Prix Unitaire">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="date" name="datedebut" class="form-control" placeholder="Date debut">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="date" name="datefin" class="form-control" placeholder="Date Fin">
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
</div> -->

