<?php

namespace Modules\Billing\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('billing::subscriptions.title.subscriptions'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('billing::subscriptions.title.subscriptions'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.billing.subscription.create');
                    $item->route('admin.billing.subscription.index');
                    $item->authorize(
                        $this->auth->hasAccess('billing.subscriptions.index')
                    );
                });
                $item->item(trans('billing::customers.title.customers'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.billing.customer.create');
                    $item->route('admin.billing.customer.index');
                    $item->authorize(
                        $this->auth->hasAccess('billing.customers.index')
                    );
                });
                $item->item(trans('billing::orders.title.orders'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.billing.order.create');
                    $item->route('admin.billing.order.index');
                    $item->authorize(
                        $this->auth->hasAccess('billing.orders.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
