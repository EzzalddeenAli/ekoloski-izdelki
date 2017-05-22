<?php namespace Modules\Billing\Http\Controllers;

use Illuminate\Support\Facades\App;

use Auth;

use Modules\Billing\Entities\Order;
use Modules\Item\Entities\Item;
use Modules\Item\Repositories\ItemRepository;
use Modules\Billing\Repositories\OrderRepository;
use Modules\Core\Http\Controllers\BasePublicController;

use Illuminate\Http\Request;
use Modules\User\Entities\Sentinel\User;
use Stripe\Stripe;
use Stripe\Customer as StripeCustomer;


class StoreController extends BasePublicController
{

    private $item;
    private $order;


    public function __construct(ItemRepository $item, OrderRepository $order)
    {
        parent::__construct();
        $this->item = $item;
        $this->order = $order;
    }

    /**
     *
     */
    public function index() {
        return view('order.index');
    }

    /**
     * Get all orders.
     *
     * @var \Modules\Billing\Entities\Order $orders
     * @return \Illuminate\View\View

    public function getAllOrders()
    {
        $orders = Order::all();
        return view('admin', compact('orders'));
    }
     **/

    /**
     * Make a Stripe payment.
     *
     * @param Request $request
     * @param Item $item
     * @return chargeCustomer
     **/
    public function postPayWithStripe(Request $request, Item $item)
    {
        dd($request->all());
        // return $request->input('stripeToken');
        // return $this->chargeCustomer($item->id, $item->price, $item->name, $request->input('stripeToken'));
    }


    /**
     * Charge a Stripe customer.
     *
     * @var \Stripe\Customer $customer
     * @param integer $item_id
     * @param integer $item_price
     * @param string $item_name
     * @param string $token
     * @return createStripeCharge()
     **/
    public function chargeCustomer($item_id, $item_price, $item_name, $token)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        if (!$this->isStripeCustomer()) {
            $customer = $this->createStripeCustomer($token);
        } else  {
            $customer = StripeCustomer::retrieve(Auth::user()->stripe_id);
        }

        return $this->createStripeCharge($item_id, $item_price, $item_name, $customer);
    }


    /**
     * Create a Stripe charge.
     *
     * @var \Stripe\Charge $charge
     * @var \Stripe\Error\Card $e
     * @param integer $item_id
     * @param integer $item_price
     * @param string $item_name
     * @param \Stripe\Customer $customer
     * @return postStoreOrder()
     **/
    public function createStripeCharge($item_id, $item_price, $item_name, $customer)
    {
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $item_price,
                "currency" => "brl",
                "customer" => $customer->id,
                "description" => $item_name
            ));
        } catch(\Stripe\Error\Card $e) {
            return redirect()
                ->route('index')
                ->with('error', 'Your credit card was been declined. Please try again or contact us.');
        }

        return $this->postStoreOrder($item_name);
    }


    /**
     * Create a new Stripe customer for a given user.
     *
     * @var \Stripe\Customer $customer
     * @param string $token
     * @return \Stripe\Customer $customer
     **/
    public function createStripeCustomer($token)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Customer::create(array(
            "description" => Auth::user()->email,
            "source" => $token
        ));

        Auth::user()->stripe_id = $customer->id;
        Auth::user()->save();

        return $customer;
    }


    /**
     * Check if the Stripe customer exists.
     *
     * @return boolean
     **/
    public function isStripeCustomer()
    {
        return Auth::user() &&
            User::where('id', Auth::user()->id)
                ->whereNotNull('stripe_id')->first();
    }


    /**
     * Store a order.
     *
     * @param string $item_name
     * @return redirect()
     **/
    public function postStoreOrder($item_name)
    {
        Order::create([
            'email' => Auth::user()->email,
            'product' => $item_name
        ]);

        return redirect()
            ->route('index')
            ->with('msg', 'Thanks for your purchase!');
    }

}

