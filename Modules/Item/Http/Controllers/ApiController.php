<?php namespace Modules\Item\Http\Controllers;

use Guzzle\Http\Message\Response;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;
use Modules\Item\Repositories\ItemRepository;
use Modules\Core\Http\Controllers\BasePublicController;

use Modules\Item\Entities\Item;

class ApiController extends BasePublicController
{
    /**
     * @var PostRepository
     */
    private $item;

    public function __construct(ItemRepository $item)
    {
        parent::__construct();
        $this->item = $item;
    }


    public function bounds(Request $request) {


        //
        //

        $items = Item::where([
            ['latitude', '>', $request->input('south')],
            ['latitude', '<', $request->input('north')],
            ['longitude', '>', $request->input('west')],
            ['longitude', '<', $request->input('east')]

        ])
            ->orderBy('name', 'desc')
            // ->take(10)
            ->get();



        return response()
            ->json($items);

        // ->withCallback($request->input('callback'))

    }


    public function get(Request $request, $id) {

        $item = $this->item->find(1);

        $view = View::make('');

        return [
            'success' => true,
            'data' => $item
        ];

    }

}

