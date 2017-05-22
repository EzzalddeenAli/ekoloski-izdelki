<?php

namespace Modules\Billing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Billing\Entities\Subscription;
use Modules\Billing\Repositories\SubscriptionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SubscriptionController extends AdminBaseController
{
    /**
     * @var SubscriptionRepository
     */
    private $subscription;

    public function __construct(SubscriptionRepository $subscription)
    {
        parent::__construct();

        $this->subscription = $subscription;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$subscriptions = $this->subscription->all();

        return view('billing::admin.subscriptions.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('billing::admin.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->subscription->create($request->all());

        return redirect()->route('admin.billing.subscription.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('billing::subscriptions.title.subscriptions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subscription $subscription
     * @return Response
     */
    public function edit(Subscription $subscription)
    {
        return view('billing::admin.subscriptions.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Subscription $subscription
     * @param  Request $request
     * @return Response
     */
    public function update(Subscription $subscription, Request $request)
    {
        $this->subscription->update($subscription, $request->all());

        return redirect()->route('admin.billing.subscription.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('billing::subscriptions.title.subscriptions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subscription $subscription
     * @return Response
     */
    public function destroy(Subscription $subscription)
    {
        $this->subscription->destroy($subscription);

        return redirect()->route('admin.billing.subscription.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('billing::subscriptions.title.subscriptions')]));
    }
}
