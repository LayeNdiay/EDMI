<!DOCTYPE html>
<html>
<head>
<style>
#candidats {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#candidats td, #candidats th {
  border: 1px solid #ddd;
  padding: 8px;
}

#candidats tr:nth-child(even){background-color: #f2f2f2;}

#candidats tr:hover {background-color: #ddd;}

#candidats th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #bec0c3;
  color: white;
}
</style>
</head>
<body>

  <h4 >Liste des candidats</h4>

<table id="candidats">
  <tr>
    <th>PRENOM</th>
      <th>NOM</th>
      <th>Directeur</th>
      <th>Etablissement de ratachement</th>
      <th>Laboratoire</th>
  </tr>
  @foreach ($candidats as $candidat)
                <tr>
                  <td>{{$candidat->user->prenom}}</td>
                  <td>{{$candidat->user->name}}</td>
                  <td>{{$candidat->dg}}</td>
                  <td>{{$candidat->etablissement}}</td>
                  <td>{{$candidat->labo}}</td>
                    
                </tr> 
    @endforeach

</table>

</body>
</html>



{{-- <div class=" grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste des candidats</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table">
           <thead>
               <tr>
                   <td>PRENOM</td>
                   <td>NOM</td>
                   <td>Directeur de thése</td>
                   <td>Etablissement de ratachement</td>
                   <td>Laboratoire</td>
    
               </tr>
           </thead>
            <tbody>
                <!--For each new candidate-->
                @foreach ($candidats as $candidat)
                <tr>
                  <td>{{$candidat->user->prenom}}</td>
                  <td>{{$candidat->user->name}}</td>
                  <td>{{$candidat->dg}}</td>
                  <td>{{$candidat->etablissement}}</td>
                  <td>{{$candidat->labo}}</td>
                    
                </tr> 
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
</div> --}}