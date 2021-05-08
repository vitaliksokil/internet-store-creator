<?php


namespace App\Services\StripeService;


use App\Models\Shop\Shop;
use Stripe\BaseStripeClient;
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
}
