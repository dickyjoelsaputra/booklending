<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        // $books = Book::where('transactions', 'confirmed', '=', '0')->with(['categories'])->latest()->get();
        $books = Book::with(['categories', 'transaction'])->latest()->get();
        return view('user.dashboard', ['books' => $books]);
    }

    public function userbookdetail($id)
    {
        $book = Book::with(['categories'])->findOrFail($id);
        return view('user.user-book-detail', ['book' => $book]);
    }
    public function mytransaction()
    {
        $transactions = Transaction::with(['book'])->where('user_id', Auth::user()->id)->get();
        return view('user.my-transaction', ['transactions' => $transactions]);
    }
}
