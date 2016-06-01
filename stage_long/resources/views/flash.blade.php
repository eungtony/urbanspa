@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>Attention, certains champs obligatoires n'ont pas été remplis !</p>
    </div>
@endif

@if(session()->has('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

@if(session()->has('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

@endif