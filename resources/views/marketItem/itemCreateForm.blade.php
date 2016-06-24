@extends('layouts.app')

@section('content')

  <div class="panel-body">
    @include('common.error')
    <!-- New MarketItem Form. Has automatic CSRFT -->
    {!! Form::open(array('url'=>'/item','method'=>'POST', 'files'=>true, 'class'=>'form-horizontal')) !!}
      <!-- Item Name -->
      <div class="form-group">
        {{Form::label('name', 'Otsikko',array('class' => 'col-sm-3 control-label')) }}
        <div class="col-sm-6">
          {{Form::text('name', null,  array('class' => 'form-control', 'placeholder'=> 'esim. tuotteen tai palvelun nimi'))}}
        </div>
      </div>

      <!--Item Description-->
      <div class="form-group">
        {{Form::label('desc', 'Kuvaus', array('class' => 'col-sm-3 control-label'))}}
        <div class="col-sm-6">
          {{Form::textarea('desc', null, array('size' => '30x5','class' => 'form-control', 'placeholder'=> 'Lyhyt kuvaus tuotteesta tai palvelusta'))}}
        </div>
      </div>
      <br>

      <!-- Item Price-->
      <div class="form-group">
        {{Form::label('price', 'Hinta', array('class' => 'col-sm-3 control-label'))}}
        <div class="col-sm-6">
          {{Form::number('price', null, array('class' => 'form-control', 'placeholder'=> 'Tuotteen hinta Euroissa(€), esim. 120'))}}
        </div>
      </div>

      <!-- Seller Email -->
      <div class="form-group">
        {{Form::label('email', 'Sähköposti', array('class' => 'col-sm-3 control-label'))}}
        <div class="col-sm-6">
          {{Form::email('email', null, array('class' => 'form-control', 'placeholder'=> 'Sähköposti osoitteesi'))}}
        </div>
      </div>
      <br>

      <!-- Image -->
      <div class="form-group">
        {{Form::label('image', 'Tuotteen Kuva', array('class' => 'col-sm-3 control-label'))}}
        <div class="col-sm-6">
          {{Form::File('image', null, array('class' => 'form-control'))}}
        </div>
      </div>

      <!-- Submit -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          {{ Form::submit('Lisää tuote', array('class' => 'btn btn-default')) }}
        </div>
      </div>
    {!! Form::close() !!}
  </div>
@endsection
