@extends('layouts.app')

@section('content')

  @if (count($items) > 0)
  <div id=content>
    <div class="panel panel-default">
      <div class="panel-heading">
         Myynnissä olevat tuotteet
      </div>

      <div class="panel-body">
        <table class="table table-hover" id='item-table'>

          <!-- Table Headings -->
          <thead>
            <th>Tuotteen nimi</th>
            <th>Tuotteen hinta</th>
            <th>Tuotteen kuvaus</th>
            <th>Tuotteen kuva</th>

            <th>&nbsp;</th>
          </thead>

          <!-- Table Body -->
          <tbody class="itemList">
            <!--Add new item button to open Modal-->
            <tr>
                <a href="/item" type="button" class="btn btn-primary btn-lg btn-block">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Lisää uusi tuote
                </a>
            </tr>
            <!--to be filled in via ajax and jQuery-->
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div style="text-align:center">
      <h2 style="text-align:center"> Lista on tällä hetkellä tyhjä. Kokeile uudelleen myöhemmin tai lisää tuote!</h2>
      <a href="/item" type="button" class="btn btn-primary btn-lg">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Lisää uusi tuote
      </a>
    </div>
  @endif
  </div>
@endsection
