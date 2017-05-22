<?php

namespace Modules\Billing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Billing\Entities\Order;
use Modules\Billing\Repositories\OrderRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class OrderController extends AdminBaseController
{
    /**
     * @var OrderRepository
     */
    private $order;

    public function __construct(OrderRepository $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$orders = $this->order->all();

        return view('billing::admin.orders.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('billing::admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->order->create($request->all());

        return redirect()->route('admin.billing.order.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('billing::orders.title.orders')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return Response
     */
    public function edit(Order $order)
    {
        return view('billing::admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Order $order
     * @param  Request $request
     * @return Response
     */
    public function update(Order $order, Request $request)
    {
        $this->order->update($order, $request->all());

        return redirect()->route('admin.billing.order.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('billing::orders.title.orders')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        $this->order->destroy($order);

        return redirect()->route('admin.billing.order.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('billing::orders.title.orders')]));
    }
}
