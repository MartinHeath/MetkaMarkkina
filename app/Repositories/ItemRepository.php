<?php

namespace App\Repositories;

use App\User;
use App\MarketItem;
use Illuminate\Http\Request;

class ItemRepository
{
  public function exists($name){
    return MarketItem::where('header', '=', $name)->exists();
  }
  public function getItemByName($name){
    $item = MarketItem::where('header',$name)->first();
    return $item;
  }
  public function saveItem(MarketItem $i){
    $i->save();
  }

  public function getItemById($id){
    $item = MarketItem::findorfail($id);
    return $item;
  }
  public function delete(MarketItem $item){
    $item->delete();
  }
}
