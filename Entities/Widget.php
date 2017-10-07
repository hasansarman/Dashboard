<?php

namespace Modules\Dashboard\Entities;
use App\Models\DashboardWidget;
use Illuminate\Database\Eloquent\Model;

class Widget extends DashboardWidget
{
    protected $fillable = ['WIDGETS', 'USER_ID'];
    protected $table = 'dashboard_widgets';

    public function user()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }
}
