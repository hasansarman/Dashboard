<?php

namespace Modules\Dashboard\Repositories\Eloquent;

use App\Models\DashboardWidget;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Dashboard\Repositories\WidgetRepository;

class EloquentWidgetRepository extends EloquentBaseRepository implements WidgetRepository
{
    /**
     * Find the saved state of widgets for the given user id
     * @param int $userId
     * @return string
     */
    public function findForUser($userId)
    {
        return DashboardWidget::where("USER_ID",$userId)->first();
        //return $this->model->whereUserId($userId)->first();
    }

    /**
     * Update or create the given widgets for given user
     * @param array $widgets
     * @return void
     */
    public function updateOrCreateForUser($widgets, $userId)
    {
        $widget = $this->findForUser($userId);

        if ($widget) {
            return $this->update($widget, ['WIDGETS' => $widgets]);
        }

        return $this->create(['WIDGETS' => $widgets, 'USER_ID' => $userId]);
    }
}
