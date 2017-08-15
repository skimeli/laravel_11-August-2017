<?php
/**
 * Created by PhpStorm.
 * User: skimeli
 * Date: 8/12/17
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::orderBy('id','DESC')->paginate(5);
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $items = Item::create($request->all());


        Mail::send('email.email', ['title' => 'New item Added', 'items' => $items], function ($items)
        {
            $items->from('shazkim51@gmail.com', 'sharon');
            $items->to('skimeli@cytonn.com');
        });

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully');
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Item::find($id)->update($request->all());
        return redirect()->route('items.index')
            ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->route('items.index')
            ->with('success','Item deleted successfully');
    }
}