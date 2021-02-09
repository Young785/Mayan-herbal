<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\EmailVerification;
use App\Mail\ForgotPasswordMail;
use App\Mailing;
use App\Notifications\AdminOrderNotification;
use App\Notifications\VendorOrderNotification;
use App\Order;
use App\User;
use App\Product;
use App\SaveForLater;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class MainController extends Controller
{
    public function home()
    {
        $category = Category::all();

        $pics = Product::all();

        foreach ($pics as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
        }
        return view("main.index", compact("pics", "category"));
    }
    public function about()
    {
        return view("main.about");
    }
    public function contact()
    {
        return view("main.contact");
    }
    public function partner()
    {
        return view("main.partner");
    }
    public function blog()
    {
        return view("main.blog");
    }
    public function proDetails()
    {
        return view("main.product_detail");
    }
    public function career()
    {
        return view("main.career");
    }
    public function vendor()
    {
        return view("main.vendor");
    }
    public function search()
    {
        $q = request('q');

        $category = Category::all();

        $pics = Product::all();
        foreach ($pics as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
        }
        $products = product::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        
        return view('main.search', compact("pics", "products"))->withDetails($products)->withQuery($q);
    }
    public function registerPage()
    {
        return view("main.signup");
    }
    public function register()
    {
        $data = request()->validate([
            'username' => "required",
            'fullname' => "required",
            'phone' => "required",
            'address' => "required",
            'email' => "required|unique:users",
            'password' => "required|min:5",
            'confPass' => "required|same:password",
        ]);

        $item['username'] = request("username");
        $item['fullname'] = request("fullname");
        $item['gender'] = request("gender");
        $item['phone'] = request("phone");
        $item['address'] = request("address");
        $item['email'] = request("email");
        $item['password'] = Hash::make(request("password"));
        
        if(request("vendor") == "on"){
            $item['vendor_request'] = "Yes";
        }else{
            $item['vendor_request'] = "No";
        }

        $user = User::create($item);
        $id = $user->id;
        $hash = md5( rand(0,1000));
        session()->put("hash", $hash);
        session()->put("permit", "hasPermission");
        $email = request("email");
        $password = request("password");

        $check = Mailing::where("email", $email)->first();
        if(request("emailme") == "on"){
            if($check == null){
                $mail['email'] = request("email");
                $mail['email_status'] = "no";
                $mail['user_id'] = $id;
                Mailing::create($mail);
            }else{
               
            }
        }

        Auth::attempt(['email' => $email, 'password' => $password]);
        Mail::to($email)->send(new EmailVerification($user));
        return redirect("/main/verify");
    }
    public function verifyPage()
    {
        $session = session()->get("permit");
        if($session == null){
            return redirect("/main/login")->with("msgNopermit", "You have no access there!");
        }else{
            return view("main.verify");
        }
    }
    public function verify($hash)
    {
        $sess = session()->get("permit");
        if($sess == null){
            return redirect("/main/login")->with("msgNopermit", "You have no access there!");

        }else{
            
            $session = session()->get("hash");
            $id = Auth::user()->id;
            if ($session == $hash) {
                User::where("id", $id)->update(['email_verified_at' => Carbon::now()]);
                Mailing::where("user_id", $id)->update(['email_status' => "yes"]);
                session()->forget("hash");
                session()->forget("permit");
                return redirect("/account")->with("verify", "Your account has been verified Successfully!");
            }elseif($session == null){
                return redirect("/main/login")->with("msgNopermit", "You have no access there!");
            }else{
                return redirect("/main/register");
            }
        }
    }
    public function loginPage()
    {
        return view("main\login");
    }
    public function login()
    {
        $data = request()->validate([
            'email' => "required",  
            'password' => "required",
        ]);

        if (Auth::attempt($data)) {
            if (Auth::user()->user_type == "user") {
                return redirect("/account");
            }else{
                return redirect("/main/login")->with("notExist", "These credentials do not match our records.");
            }
        }else{
            return redirect("/main/login")->with("notExist", "These credentials do not match our records.");
        }
    }
    public function forgotPage()
    {
        $email = request('email');
       
        if (request("email") == null) {
            return view("main/forgot");
        }else{
            $user = User::where("email", $email)->first();
            if($user != null){
                $hash = md5( rand(0,1000));
                session()->put("hash", $hash);
                session()->put("reset", "hasPermission");
        
                Mail::to($email)->send(new ForgotPasswordMail($user));
                return redirect("/main/forgot-password/reset-pass")->with("wrongInfo", "Wrong Email Provided!");
            }else{
                return redirect("/main/forgot-password")->with("wrongInfo", "Wrong Email Provided!");
            }
        }
       
        // dd($email);
    }
    public function resetPass()
    {
        $session = session()->get("reset");
        if($session == null){
            return redirect("/main/login")->with("msgNopermit", "You have no access there!");
        }else{
            return view("main/resetpass");
        }
    }
    public function resetPassword($id)
    {
        $sess = session()->get("reset");
        if($sess == null){
            return redirect("/main/login")->with("msgNopermit", "You have no access there!");
        }else{
        return view("main/reset");
        }
    }
    public function reset($email)
    {
        $sess = session()->get("reset");
        if($sess == null){
            return redirect("/main/login")->with("msgNopermit", "You have no access there!");
        }else{
            $password = Hash::make(request("password"));
        
            User::where("email", $email)->update(["password"=> $password]);
            session()->forget("hash");
            session()->forget("reset");
    
            return redirect("/main/login")->with("changedPass", "Your password was changed Successfully! You can now login with the new Password");
        }
    }
    public function index()
    {
        $prod_id = session()->get("req_url");

        if($prod_id != null){
            $data['user_id'] = Auth::user()->id;

            $data['product_id'] = substr($prod_id, -1);

            $data['status'] =   "No";
            
            SaveForLater::create($data);
            session()->forget("req_url");

            return redirect("/account")->with("saved", "Product saved to your Account Successfully!");
        }
        $auth = Auth::user()->id;
        $saved = SaveForLater::join("products", "save_for_laters.product_id", "=", "products.id")
        ->where("save_for_laters.user_id", $auth)->get();

        $pics = Product::all();
        foreach ($pics as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
        }

        return view("main.profile.fav", compact("pics", "saved"));
    }
    public function delFav($id)
    {
        SaveForLater::where("id", $id)->delete();

        return redirect("/account")->with("msg", "You deleted the saved product Successfully!");
    }
    public function profile()
    {
        $id = Auth::user()->id;

        $user = User::where("id", $id)->first();
        return view("main.profile.profile",compact("user"));
    }
    public function orderHistory()
    {
        $id = Auth::user()->id;
        $order = Order::where("id", $id)->get();
        $order_products = Order::join("products", "orders.product_id", "=", "products.id")->where("orders.user_id", $id)->get();
        // dd($order_products);
        $pics = Product::all();

        foreach ($pics as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
        }
        return view("main.profile.order_history", compact("order", "order_products", "pics"));
    }
    public function addressPage()
    {
        return view("main.profile.address");
    }
    public function paymentPage()
    {
        return view("main.profile.payment");
    }
    public function comprePage()
    {
        return view("main.profile.com_preference");
    }

    public function catSlug($slug)
    {        
     
        $cat_id = Category::where('category_slug', $slug)->first('id');
        $catproduct = Product::all()->where('category_id', $cat_id->id);
        
        $pics = Product::where('category_id', $cat_id->id)->get('image_name');

        foreach ($pics as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
        }

        return view("main/category", compact("slug", "catproduct", "pics"));
    }
    public function fullDetails($slug, $id)
    {
        $product = Product::where("id", $id)->first();

        $category = Category::where("id", $product->category_id)->first();
        $prod = Product::all()->where('id', $id);
        foreach ($prod as $pic) {
            $pic['image_name'] = json_decode($pic['image_name'], true);
        }
        return view("main/fulldetails", compact("product", "category", "pic"));
    }
    public function cart()
    {
        // dd(session("cart"));
        
        if (session('cart') != null) {
            $session = session('cart');
            foreach ($session as $value) {
                $val = $value['id'];
            }
            $prod = Product::where('id', $val)->get();
        return view("main/cart", compact('prod'));

        }else{
            return view("main/cart");
        }
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        
        $pic['image_name'] = json_decode($product['image_name'], true);
        
        $car = $pic['image_name'][0];
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" => $id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "vendor_id" => $product->user_id,
                        "size" => 'S',
                        "image_name" => $car
                    ]
            ];

            session()->put('cart', $cart);
            return redirect('/main/cart')->with('msg', ' Product Added to Cart Successfully. You can remove, update or Proceed with the buying Below. Thanks!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'];
            session()->put('cart', $cart);
            return redirect('/main/cart')->with('msg', ' Product Added to Cart Successfully. You can remove, update or Proceed with the buying Below. Thanks!');
        }
        
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "vendor_id" => $product->user_id,
            "price" => $product->price,
            "size" => 'S',
            "image_name" => $car,
        ];
        
        session()->put('cart', $cart);
        return redirect('/main/cart')->with('msg', ' Product Added to Cart Successfully. You can remove, update or Proceed with the buying Below. Thanks!');
    }
    public function editCart(Request $request)
    {        
        if($request->id and $request->quantity and $request->quantity)
        {
            $getProductPrice = Product::where('id', $request->id)->first(['price']);
            dd($getProductPrice);
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["price"] = $getProductPrice->price * $request->quantity;
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
            session()->flash('success', 'Cart updated successfully');

            // return redirect("/pages/cart")->with('msasg', "Product Updated successfully!");
        }
    }
    public function delCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');

            return redirect("/main/cart")->with('mssg', "Product removed from Cart successfully!");
        }
     
}
    public function savePage($id)
    {
        if (Auth::user() == null) {
            session()->put("req_url", $_SERVER['PHP_SELF']);
            return redirect("/pages/login")->with("mustLogin", "Please login to confirm your request!");
        }elseif (Auth::user()->user_type != "user") {
            session()->put("req_url", $_SERVER['PHP_SELF']);
            return redirect("/pages/login")->with("mustLogin", "Please login to confirm your request!");
        }else{
            session()->put("req_url", $_SERVER['PHP_SELF']);

            $prod_id = session()->get("req_url");

        if($prod_id != null){
            $data['user_id'] = Auth::user()->id;

            $data['product_id'] = substr($prod_id, -1);
            $data['status'] = "No";
            
            SaveForLater::create($data);
            session()->forget("req_url");

            return redirect("/index")->with("saved", "Product saved to your Account Successfully!");
        }
            return redirect("/index");
        }
        }
    
    
        public function checkout()
        {   
            \Stripe\Stripe::setApiKey('sk_test_51IFPayLM8gMb7ledDqKykMlZbymziH8Y5VapHl6Na5vZaFUZvO91Yf6RNaWQUEjlltxzHd59hFWseENJIl0dVFcl00VucYQh0g');
            $user = Auth::user();
            $cart = session('cart');

            $subTotal = 0;
            foreach ($cart as  $item) {
                $subTotal += $item['price'];
            }
            $amount = $subTotal;
            $amount *= 100;
            $amount = (int) $amount;
            
            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Payment',
                'description' => 'Payment made from User Id ' .$user->id. ", Name: " .$user->username. ", Email: " .$user->email. ", Phone No: " . $user->phone. ", Address: " .$user->address. ", Vendor Satus: " . $user->vendor_request. ".",
                'amount' => $amount,
                'currency' => "USD",
            'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            
            $data['user_id'] = $user->id;
            $data['order_status'] = "pending";
            // if(count($cart) > 1){
                foreach ($cart as $key => $value) {
                    $data['vendor_id'] = $value['vendor_id'];
        
                    $data['product_id'] = $value['id'];

                    $data['quantity'] = $value['quantity'];
        
                    $data['paid_amount'] = $value['price'];
        
                    $order = Order::create($data);
        
                    }
            
            // }else{
            //     $data['vendor_id'] = $cart['vendor_id'];
        
            //     $data['product_id'] = $cart['id'];
    
            //     $data['paid_amount'] = $cart['price'];
    
            //     $order = Order::create($data);
            // }
            $user_o = User::where("id", $value['vendor_id'])->first();
            session()->put("id", $value['vendor_id']);
            if ($user_o->user_type == "admin") {
                Auth::user()->notify(new AdminOrderNotification);
            }elseif($user_o->user_type == "vendor"){
                Auth::user()->notify(new AdminOrderNotification);
                Auth::user()->notify(new VendorOrderNotification);
            }
                
            return view('checkout.checkout', compact("intent"));
    
        }
    
        public function afterPayment()
        {
            session()->forget("cart");
            session()->forget("id");
            
            return redirect("/account/order_history")->with("msg","Your Order has been placed Successfully!");
        }
}
