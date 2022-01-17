<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Hierarchical($data, $majors_id = 0, $level = 0)
    {
        $result = [];
        // dd($dataCateOld);
        foreach ($data as $item) {
            if ($item->parent_id ==  $majors_id) {
                $item->level = $level;
                $result[] = $item;
                $child = $this->Hierarchical($data, $item->id, $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}
