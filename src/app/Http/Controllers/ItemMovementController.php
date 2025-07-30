<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Warehouse;
use App\Models\ItemMovement;
use Illuminate\Http\Request;

class ItemMovementController extends Controller
{
    public function index() {
        $movements = ItemMovement::with(['item', 'warehouse'])->latest()->get();
        return view('movements.index', compact('movements'));
    }

    public function create() {
        $items = Item::all();
        $warehouses = Warehouse::all();
        return view('movements.create', compact('items', 'warehouses'));
    }

    public function store(Request $request) {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1'
        ]);

        ItemMovement::create($request->all());

        return redirect()->route('movements.index')->with('success', 'Pergerakan barang dicatat.');
    }
}
