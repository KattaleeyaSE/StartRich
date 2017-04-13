<?php

namespace App\Repositories;

use App\IRepositories\IEstimateProfitRepository; 

use App\Models\EstimateProfit; 

use Illuminate\Http\Request;
class EstimateProfitRepository implements IEstimateProfitRepository
{
    private $estimateProfit;

    public function __construct(EstimateProfit $estimateProfit)
    {
        $this->estimateProfit = $estimateProfit;    
    }

    public function all()
    {
        return $this->estimateProfit->all();
    }

    public function all_by_member_id($id)
    {
        return $this->estimateProfit->where('member_id','=',$id)->get();
    }

    public function find($id)
    {
        return $this->estimateProfit->find($id);
    }

    public function create(Request $request)
    {         
        return $this->estimateProfit->create($request->all());
    }

    public function update($id, Request $request)
    {

        $estimateProfit = $this->find($id);

        return $estimateProfit->update($request->all());
    }

    public function delete($id)
    {
        $estimateProfit = $this->find($id);
        if (is_null($estimateProfit)) {
            return false;
        }
        return $estimateProfit->delete();
    }
}