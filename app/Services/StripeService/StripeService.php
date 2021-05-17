<?php


namespace App\Services\StripeService;


use App\Models\Order;
use App\Models\Shop\Shop;
use App\Models\User;
use Stripe\BaseStripeClient;
use Stripe\Customer;
use Stripe\StripeClient;

class StripeService implements StripeServiceInterface
{
    /**
     * @var StripeClient
     */
    private $stripeClient;

    public function __construct()
    {
        $this->stripeClient = new StripeClient(config('stripe.stripe_secret'));
        \Stripe\Stripe::setApiKey(config('stripe.stripe_secret'));
    }

    public function issetShopStripeAccount(Shop $shop)
    {
        try {
            if ($shop->account_id == null) {
                return false;
            }
            $stripe_account = $this->stripeClient->accounts->retrieve($shop->account_id);
        } catch (\Exception $exception) {
            return false;
        }
        return $stripe_account->email;
    }
    public function connectShopStripeAccount(Shop $shop)
    {
        if (!$shop->account_id) {
            $account = $this->stripeClient->accounts->create([
                'type' => 'standard'
            ]);
            $shop->update(['account_id' => $account->id]);
        }
        $link = $this->stripeClient->accountLinks->create([
            'account' => $shop->account_id,
            'refresh_url' => route('shop.stripe.index'),
            'return_url' => route('shop.stripe.index'),
            'type' => 'account_onboarding',
        ]);
        return $link;
    }

    public function getCheckoutLink(User $user, Shop $shop, Order $order)
    {
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $customer = Customer::create([
            'customer' => $stripeCustomer,
            'email' => $user->email
        ],['stripe_account' => $shop->account_id]);
        $amount = $order->getAttributes()['total_price'];
        $checkoutSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'payment_intent_data' => [
//                'application_fee_amount' => getApplicationFee($validatedRequest['amount'])
            ],
            'line_items' => [
                [
                    'amount' => $amount,
                    'quantity' => 1,
                    'currency' => 'usd',
                    'name' => 'Замовлення № ' . $order->id
                ],
            ],
            'customer'      => $customer->id,
            'success_url'   => route('stripe.paid-success',['order'=>$order]),
            'cancel_url'    => route('stripe.paid-canceled',['order'=>$order]),
            'metadata'      => [
                'order_id' => $order->id,
                'total_price' => $amount,
                'shop_id' => $shop->id
            ],
        ], ['stripe_account' => $shop->account_id]);
        return $checkoutSession->id;
    }
}
