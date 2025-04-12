<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['products', 'products.vendor'])
            ->where('user_id', Auth::id());
    
        if ($request->has('search') && $request->search != '') {
            $query->where('id', $request->search);
        }
    
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'amount_asc':
                    $query->orderBy('total_price', 'asc');
                    break;
                case 'amount_desc':
                    $query->orderBy('total_price', 'desc');
                    break;
                case 'id_asc':
                    $query->orderBy('id', 'asc');
                    break;
                case 'id_desc':
                    $query->orderBy('id', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }
    
        $orders = $query->get();
    
        return view('purchase_history.index', compact('orders'));
    }
}
