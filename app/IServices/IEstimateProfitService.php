<?php

namespace App\IServices;

use Illuminate\Http\Request; 

interface IEstimateProfitService
{   
    /**
     * @param int $id
     *
     * @return Collection
    **/     
    public function calculation($id); 

}