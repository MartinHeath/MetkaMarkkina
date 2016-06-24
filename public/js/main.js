$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
$(document).ready(function(){
  $('.itemList').on("click","tr",function (e){
    //if the target of the click is the delete button, we do not wish to press it.
    if (e.target.id == "deleteButton"){
      return;
    }
    $(this).children("td").children("#id").css({'display':'block'});
     var id = $(this).children("td").children("#id").text();
    $(this).children("td").children("#id").css({'display':'none'});
    window.location.href = "/"+id;
  });

  //DHTML listing of items. First data is retrieved from JSON table via Ajax, then sorted into html elements, which ar appended to the table
  //
  $.getJSON( "http://localhost:8080/listdata", function( data ){
    var items = [];
    var names = [];
    $.each( data, function( key, val ) {
      //collecting names for searchbar
      names.push("<option value=" + val["header"] + ">");
      //setting relevant data to rows
      items.push("<tr>");
      items.push("<td class='table-text'><div id='id' style= 'display:none'>" + val["id"] + "</div>");
      items.push("<div id='name'>" + val["header"] + "</div></td>");
      items.push("<td class='table-text'><div id='price'>" + val["price"] + " €</div></td>");
      items.push("<td class='table-text'><div>" + val["description"] + " </div></td>");
      items.push("<td class='table-text'><img src='/images/"+val["image"]+"'class='img img-thumbnail'/></td>");
      //as the normal method of using method spoofing does not work, we shall do it slightly differently
      items.push("<td><div><button class='btn btn-danger' id='deleteButton'> Poista tuote </button></div></td>");
      items.push("</tr>");
    });
    //adding all items to table
    $(items.join( "" )).appendTo( ".itemList" );
    $(names.join("")).text("#jsonDataList");
  });

  //OnClick functionality for delete button
  $('.itemList').on("click","#deleteButton",function (e){

    $(this).closest("tr").find("td #id").css({'display':'block'});
     var id = $(this).closest("tr").find("td #id").text();
    $(this).closest("tr").find("td #id").css({'display':'none'});

    $.ajax({
      url:'/item/' + id,
      type: 'post',
      data: {_method:"delete"},
      success: function(result){
        $("#content").html(result);
      }
    });
  });
  $("#searchBut").click(function(){
    var name= $(".search").val();
    console.log(name);
    $.ajax({
      url:'/search/' + name,
      type: 'Get',
      success: function(result){
        window.location.href = "/search/"+name;
      },
      error: function(error){
        console.log(error);
      }
    });
  });

  /*functionality for clicking add item link. NOT WORKING!!
  $("tr").on("click","#addBut", function(){
    var id=$(this).parent("#id").text();
    var name=$(this).parent("#name").text();
    var price = $(this).parent("#price").text();
    //create list item
    var listItem = "<tr> <td id=" + id + "> " + name + " </td><td> " + price + "</td><td>" +
    "<span class='glyphicon glyphicon-remove' id='removeBut' aria-hidden='true'></span></td> </tr>";
    console.log(id, name, price, listItem);
    $("#basket").append(listItem);
  });*/
});
