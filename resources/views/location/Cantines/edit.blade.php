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
        <form action="{{route('Cantines.update', $cantine->id)}}" class="p-3" method="post">
                 @csrf
                 @method('PUT')
                 <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Nature de la recette</label>
                        <input type="text" class="form-control rounded-3" placeholder="objet recette" name="objetrecette" value="{{$cantine->objetrecette}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Numéro Cantine</label>
                        <input type="text" class="form-control rounded-3" placeholder="numero" name="numero" value="{{$cantine->numero}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Nom Locataire</label>
                        <input type="text" name="nomLoc" class="form-control" placeholder="Date" value="{{$cantine->nomLoc}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Mois</label>
                        <select name="mois" class="form-select" value="{{$cantine->mois}}">
                            <option value="Janvier">Janvier</option>
                            <option value="Février">Février</option>
                            <option value="Mars">Mars</option>
                            <option value="Avril">Avril</option>
                            <option value="Mai">Mai</option>
                            <option value="Juin">Juin</option>
                            <option value="Juillet">Juillet</option>
                            <option value="Août">Août</option>
                            <option value="Septembre">Septembre</option>
                            <option value="Octobre">Octobre</option>
                            <option value="Novembre">Novembre</option>
                            <option value="Decembre">Décembre</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Montant</label>
                        <input type="number" name="montant" class="form-control" placeholder="montant" value="{{$cantine->montant}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Date Paiement</label>
                        <input type="Date" name="date" class="form-control" placeholder="Date" value="{{$cantine->date}}">
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




