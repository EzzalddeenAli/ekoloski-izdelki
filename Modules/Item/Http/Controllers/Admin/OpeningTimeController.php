<?php

namespace Modules\Item\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Item\Entities\OpeningTime;
use Modules\Item\Repositories\OpeningTimeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class OpeningTimeController extends AdminBaseController
{
    /**
     * @var OpeningTimeRepository
     */
    private $openingtime;

    public function __construct(OpeningTimeRepository $openingtime)
    {
        parent::__construct();

        $this->openingtime = $openingtime;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$openingtimes = $this->openingtime->all();

        return view('item::admin.openingtimes.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('item::admin.openingtimes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->openingtime->create($request->all());

        return redirect()->route('admin.item.openingtime.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('item::openingtimes.title.openingtimes')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  OpeningTime $openingtime
     * @return Response
     */
    public function edit(OpeningTime $openingtime)
    {
        return view('item::admin.openingtimes.edit', compact('openingtime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OpeningTime $openingtime
     * @param  Request $request
     * @return Response
     */
    public function update(OpeningTime $openingtime, Request $request)
    {
        $this->openingtime->update($openingtime, $request->all());

        return redirect()->route('admin.item.openingtime.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('item::openingtimes.title.openingtimes')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OpeningTime $openingtime
     * @return Response
     */
    public function destroy(OpeningTime $openingtime)
    {
        $this->openingtime->destroy($openingtime);

        return redirect()->route('admin.item.openingtime.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('item::openingtimes.title.openingtimes')]));
    }
}
