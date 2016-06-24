<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Responce;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\MarketItem;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ItemController extends Controller{
    protected $itemRepo;
    //constructor, where repository instance is created.
    public function __construct(ItemRepository $itemrepo){
        //$this->middleware('auth');

        $this->itemRepo = $itemrepo;
    }
    //provides a JSON array for use with AJAX
    public function getJsonItems(){
       $json = MarketItem::all()->toJson();
       return view('marketItem.jsonData',[
         'json' => $json
       ]);
    }
    //creates a list of all current items in database
    public function itemList(Request $request){
      $items = MarketItem::orderBy('created_at', 'asc')->get();

      return view('marketItem.itemList', [
        'items' => $items
      ]);
    }
    //returns the Item creation form
    public function showForm(){
      return view('marketItem.itemCreateForm');
    }

    //returns a view with for a single Item, with all relevant info.
    public function showItem(Request $req,$item){
      $i = $this->itemRepo->getItemById($item);
      return view('marketItem.showItem', [
        'item' => $i,
      ]);
    }

    public function getSearch(Request $req, $name){
      //checking to see if there is an item with given name
      if($this->itemRepo->exists($name)){
        $item = $this->itemRepo->getItemByName($name);
        return view('marketItem.showItem', [
          'item' => $item,
        ]);
      }
      else{
          return redirect('/')->with('status', 'Hakukohdetta ei löytynyt');
      }
    }

    //method for adding an item to the database
    public function addItem(Request $req){
      $validator = Validator::make($req->all(), [
        'name' => 'required|unique:marketitem,header|max:255',
        'desc' => 'required|max:500',
        'price' => 'required',
        'email' => 'required',
        'image' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect('/item')
          ->withInput()
          ->withErrors($validator);
      }
      else{
        if (Input::file('image')->isValid()) {
          //moving file to new destination
          $file = $req->file('image');
          $extension = $file->getClientOriginalExtension();
          // TODO: Due to file permission problems, files are saved in Public folder. Needs to be changed
          Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
        }
        else{
          return redirect('/item')
            ->withInput()
            ->withErrors($validator);
        }
        //setting values to model and saving to db
        $i = new MarketItem;
        $i->header = $req->name;
        $i->description = $req->desc;
        $i->price = $req->price;
        $i->email = $req->email;
        $extension = $file->getClientOriginalExtension();
        $i->image = $req->file('image')->getFilename().'.'.$extension;

        $this->itemRepo->saveItem($i);
        return redirect('/itemlist');
      }
    }
    //Item delete function
    public function deleteItem(Request $request,$item){
        $i= $this->itemRepo->getItemById($item);
        //deleting image in storage
        Storage::disk('public')->delete($i->image);
        $this->itemRepo->delete($i);
        return redirect('/itemlist');
    }
  }
