@extends('layouts.app')

@section('content')
<!DOCTYPE html>

  <body>
    <div class="container">
        <div class="content">
            <div class="title">Tervetuloa Markkinoihin</div>
            <a href="/itemlist" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Selaa tuotteita
            </a>
            <a href="/item" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Lisää uusi tuote
            </a>
        </div>
    </div>
  </body>
@endsection
