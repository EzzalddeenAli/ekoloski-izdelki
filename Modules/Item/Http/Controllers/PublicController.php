<?php namespace Modules\Item\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Item\Repositories\ItemRepository;
use Modules\Core\Http\Controllers\BasePublicController;

class PublicController extends BasePublicController
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

    public function index()
    {
        // $places = $this->place->allTranslatedIn(App::getLocale());
        $items = $this->item->all();
        return view('item.index', compact('items'));
    }


    public function show($slug)
    {
        // dd($this->item->all()->jsonSerialize());
        $item = $this->item->find(1); // findBySlug
        return view('item.show', compact('item'));
    }

    public function store($chat) {
        // $message = request.param('message');
    }

}
