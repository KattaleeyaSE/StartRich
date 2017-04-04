<?php

namespace App\Repositories;

use App\IRepositories\IEstimateProfileRepository; 

use App\Models\EstimateProfit; 

class EstimateProfileRepository implements IEstimateProfileRepository
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