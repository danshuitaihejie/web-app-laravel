<?php

namespace App\Modules\Common;

use Illuminate\Support\Facades\Auth;
use App\Models\Diagram;
use Facades\App\Policies\DiagramPolicy;
class DiagramObserver
{
    public function creating(Diagram $diagram):bool
    {
        logger('DiagramObserver creating');
        return  DiagramPolicy::create(Auth::user());
    }

    public function updating(Diagram $diagram):bool
    {
        logger('DiagramObserver updating');
        return  DiagramPolicy::update(Auth::user(),$diagram);
    }

    public function deleting(Diagram $diagram):bool
    {
        logger('DiagramObserver deleting');
        return  DiagramPolicy::delete(Auth::user(),$diagram);
    }

}
