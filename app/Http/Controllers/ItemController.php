<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request){

        $validated = $request -> validate([
            'name' => 'required | max:255',
            'is_required' => 'sometimes | boolean',
            'image' => 'sometimes| image | mimes:jpg,jpeg,png | max:2048',
        ]);
        // new item with validation data
        $item = new Item($validated); // creates object with validated data
        $item -> is_required = $validated['is_required'] ?? false; // false if unchecked and later shown as "Optional" default=false
        $item -> user_id = Auth::id(); // assigns user_id to item object

        if($request -> hasFile('image') && $request -> file('image') -> isValid()) { // method that checks if the incoming request contains a file field "image"
            $fileNameToStore = 'item_' . time() . '.' . $request -> file('image') -> extension(); // stores image with unique name
            $path = $request -> file('image') -> storeAs('public/item_images', $fileNameToStore); // defines path into to the specific folder given
            $item -> image = $fileNameToStore; // stores item image 
        }
        // save item to database and redirect back to items index.blade
        $item -> save();
        return redirect('/items') -> with('success', 'Item added');
    }

    /**
     * update function defined so it handles updating items details, retrieves items using their ID's in database if not found
     * redirect back with an error, if an item is found update ots name, status and after it will redirect
     * back with a success message
     */

    public function update(Request $request, $itemId){
        $item = Item::find($itemId);

        if (!$item) {
            return back()->withErrors(['error' => 'Item not found']);
        }
        $item->is_available = $request->has('is_available') ? true : false;
        $item -> fill($request -> only(['name', 'is_available']));
        $item -> save(); // saves item array to DB
        return back()->with('success', 'Item updated');
    }

    public function index(){
        $items = Item::where('user_id',Auth::id()) -> get(); // retrieves all items from database where user_id matches authenticated users
        return view('items.index',compact('items')); // compacts items array and returns items.index.blade.php
    }
    // create function returns to items.create.blade.php
    public function create(){
        return view('items.create');
    }

    /**
     * Delete function handles the deletion of items 
     * uses findOrFail method of item model to find game with given id
     * after the function it will return to items.index with a success message if the game was found and deleted
     */

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item -> delete();
        return redirect() -> route('items.index')->with('success', 'Item deleted');
    }
}