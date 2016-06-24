@extends('layouts.app')
  <!-- Helpful link for navigation. Dynamic html?-->
  <div> <a href="/itemlist"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Takaisin listaan </a></div>
  <div class="panel panel-default" >
    <div class="panel-heading" id="itemPanel">{{$item->header}} - {{$item->price}} €</div></div>
    <div class="panel-body">
      <!-- For simplicity, the layout is done using a table-->
      <table class="table table-default">
        <tbody>
          <tr>
            <td class = "table-text">
              <?php
                //Again, we use php in order to make life a bit easier
                $path = "/images/" . $item->image;
                echo "<div><img src='$path' class=' img img-rounded'/></div>";
              ?>
            </td>
          </tr>
          <tr>
            <td class="table-text">
              <div><b>Tuotteen/Palvelun nimi:</b> {{$item->header}}</div>
              <div><b>Tuotteen Hinta:</b> {{$item->price}} €</div>
            </td>
          </tr>
          <tr>
            <td class="table-text">
              <div><b>Tuotteen kuvaus:</b> <div class="well">{{$item->description}}</div></div>
            </td>
          </tr>
          <tr>
            <td class="table-text">
              <!--Here we use PHP to split the email into parts inorder to avoid spambots picking up the email address-->
              <?php
                $parts = explode("@",trim($item->email));
                echo "<div><b>Myyjän Sähköpostiosoite: </b>" .$parts[0] ."-at-" .$parts[1]."</div>";
              ?>
            </td>
          </tr>
          <tr>
            <!--Created and Updated on-->
            <td class="table-text">
              <div><b>Ilmoitus päivitetty:</b> <div>{{$item->updated_at}}</div></div>
              <div><b>Ilmoitus luotu:</b> <div>{{$item->created_at}}</div></div>
            </td>
          </tr>

          <tr>
            <!--options-->
            <td class="table-text">
              <form action="/item/{{ $item->id }}" method="POST" class="pull-right">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">Poista ilmoitus</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@section('content')
@endsection
