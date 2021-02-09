<?php

namespace App\Http\Controllers;

//
use App\User;
use App\Transaction;
use App\Train;
use App\AppAccount;
use App\Mail\SendMail;
use App\Models\Transaction as ModelsTransaction;
use App\Order;
use App\Product;
use App\SaveForLater;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $details;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('mail');
    }

    public function levelAmount($level){
        if($level == 1){
            return 3000;
        }else if($level == 2){
            return 2500;
        }else if($level == 3){
            return 5000;
        }else if($level == 4){
            return 16000;
        }else if($level == 5){
            return 56000;
        }else if($level == 6){
            return 350000;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail(Request $request) {

        try{

            $d = new SendMail();
          $d->name = $request->name;
          $d->email = $request->email;
          $d->subject = "Contact Email From  ". $request->name;
          $d->message = $request->message;


         Mail::to('info@e-earners.com')->send($d);

         $request->session()->flash('success', "Success!! We will be in touch!");

          return back();
        }catch(\Exception $e) {

            $request->session()->flash('error', "Failed!! Please try again!". $e->getMessage());

            return back();
        }


      }

      public function profile()
      {
          return view('pages/profile');
      }
      public function update(User $user, Request $request)
      {
          $request->validate([
              'name' => 'string|max:255',
              'phone' => 'string|max:255',
              'address' => 'string|max:255',
              'state' => 'string|max:255',
              'country' => 'string|max:255',
          ]);

          $user->name = $request->name;
          $user->phone = $request->phone;
          $user->address = $request->address;
          $user->state = $request->state;
          $user->country = $request->country;
          $user->save();
          $request->session()->flash('success', "Success!! Profile updated!" );
          return back();
      }



      //this will build tree from flat array in database if project demands it
      public function buildTree($items) {
          $children = array();
          foreach($items as $item)
              $children[$item->parent_id][] = $item;
          foreach($items as $item) if (isset($children[$item->id]))
              $item->children = $children[$item->id];
          return $children;
      }
      public function index()
      {
          $data['upline'] = User::find(Auth::user()->parent_id);

          $data['allusers'] = User::all()->count();
        //   $data['pending'] = User::where('activated', 'pending')->count();
          $data['activated'] = User::where('name', 'yes')->count();
        //   $data['notActivated'] = User::where('activated', 'no')->count();
          $data['transOut'] = ModelsTransaction::where('type', 'Withdrawal')
                                ->where('user_id', '=', Auth::id())
                                ->where('status', 'successful')->sum('amount');

          $data['transIn'] = ModelsTransaction::where('type', 'like', '%Benefits')
                            ->where('user_id', '=', Auth::id())
                            ->sum('amount');
        // $data['upgrade'] = Transaction::where('type', 'like', '%Upgrade')
        //                     ->where('user_id', '=', Auth::id())
        //                     ->sum('amount');
        //   $data['referrals'] = User::where('referred_by', Auth::user()->username)->count();
          $data['accs'] = AppAccount::all();  // $data['upgrade'] = Transaction::where('type', 'like', '%Upgrade')
        //                     ->where('user_id', '=', Auth::id())
        //                     ->sum('amount');

          $data['paystack_key'] = env('PAYSTACK_PUBLIC_KEY');

            $levelTo = Auth::user()->level + 1;
          $data['pay_amount'] = $this->levelAmount($levelTo);


          return view('pages/index')->with($data);
      }
      public function notActivated()
      {
        $data['users'] =User::where('activated', 'no')
                        ->where('referrer', '=', Auth::user()->username)
                        ->get();

        // return response()->json($data['users']);

        return view('not_activated')->with($data);
      }

      public function getDownlines($level) {
          $theLevel = DB::table('users')
          ->select(DB::raw('users.*, users_tree.*'))
          ->where('users_tree.ancestor', '=', Auth::id())
          ->where('users_tree.depth', '=', $level)
          ->join('users_tree', 'users.id', '=', 'users_tree.descendant')
          ->get();

          return $theLevel;
      }

      public function matrix() {

          $level_one = $this->getDownlines(1);

          $level_two = $this->getDownlines(2);

          $level_three = $this->getDownlines(3);

          $level_four = $this->getDownlines(4);

          $level_five = $this->getDownlines(5);

          $level_six = $this->getDownlines(6);

          return view('pages.matrix')->with([
              'ones' => $level_one,
              'twos' => $level_two,
              'threes' => $level_three,
              'fours' => $level_four,
              'fives' => $level_five,
              'sixs' => $level_six,
              ]);
      }

      public function activationRequest(Request $request) {

            if(Auth::user()->activated != 'no') {
                $request->session()->flash('error', 'Already activated!');
                return redirect()->back();
            }

              DB::table('users')
              ->where('id', Auth::id())
              ->update(['activated' => 'pending']);

              $request->session()->flash('success', 'We are reviewing your request!');
              return redirect()->back();

      }
      public function VenOrdersPage()
      {
        $id = Auth::user()->id;
        $order_products = Product::rightjoin("orders", "orders.product_id", "=", "products.id")->join("users", "orders.user_id", "=", "users.id")->where("orders.vendor_id", $id)->get();
        $orders = Order::all(); 
    
        foreach ($order_products as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
          }
          return view("vendor.orders", compact("order_products", "orders"));
      }
      public function ordersPage()
      {
          $id = Auth::user()->id;
        $order_products = Product::rightjoin("orders", "orders.product_id", "=", "products.id")->join("users", "orders.user_id", "=", "users.id")->where("orders.user_id", $id)->get();
        $orders = Order::all(); 
    
        foreach ($order_products as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
          }
          return view("main.orders", compact("order_products", "orders"));
      }
    public function saveProduct()
    {
        $id = Auth::user()->id;
        // $order_products = Product::rightjoin("orders", "orders.product_id", "=", "products.id")->join("users", "orders.user_id", "=", "users.id")->where("orders.user_id", $id)->get();
        $save = SaveForLater::join("products", "save_for_laters.product_id", "=", "products.id")->where("save_for_laters.user_id", $id)->get();
        foreach ($save as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
          }
        return view("pages.save", compact("save"));
    }
}
