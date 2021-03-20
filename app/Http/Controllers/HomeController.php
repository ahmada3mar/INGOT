<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Support\Facades\Validator;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {

        $users =  \App\User::where('is_admin', '0')->get([
            'id',
            'name',
            'email',
            'phone',
            'birth_date',
            'created_at',
            'balance'
        ]);

        return view('adminHome', compact('users'));
    }

    function add(Request $req)
    {

        $this->validate($req,[
            'amount' => 'required|numeric',
            'category'=>'required' ,
            'name'=>"required",

        ]);


    

     

        $category = Category::find($req['category']);
        $user = User::find(Auth::User()->id);
        $transaction = new Transaction() ;

        if ($category->type == 'Income') {

            $user->balance += $req['amount'];
            $user->save();
            $transaction->credit = $req['amount'];
            

        } elseif ($user->balance < $req['amount']) {
            
            return redirect('home')->withErrors(['error'=>'Your Balnce less than amount']);
        } else {
            $user->balance -= $req['amount'];
            $user->save();
            $transaction->debit = $req['amount'];
  
        }
        $transaction -> name = $req['name'];
        $transaction -> user_id = $user->id;
        $transaction -> category_id = $category->id;
        $transaction->save();

        return redirect('home');
    }

    function addCategory(Request $req)
    {
        $category = new Category();
        $category->name = $req['name'];
        $category->type = $req['category'];
        $category->user_id = Auth::User()->id;
        $category->save();
        return redirect('home');
    }
}
