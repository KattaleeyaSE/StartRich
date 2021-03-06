<?php
/**
 * Created by PhpStorm.
 * User: lunarcraft
 * Date: 3/30/17
 * Time: 10:29 PM
 */

namespace App\Repositories;


use App\IRepositories\Collection;
use App\IRepositories\id;
use App\IRepositories\Illuminate;
use App\IRepositories\IMutualFundRepository;
use App\IRepositories\Member;
use App\Models\MutualFund;
use Illuminate\Http\Request;

class MutualFundRepository  implements IMutualFundRepository
{ 
    private $nav; 

    public function __construct(MutualFund $nav)
    { 
        $this->nav = $nav;
    }

    public function all()
    {
        // TODO: Implement all() method.
      return  $this->nav->all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->nav->find($id);
    }

    public function create(Request $request, $amc_id)
    {
        // TODO: Implement create() method.
        $data = $request->all();
        $amc_id = ['amc_id' => $amc_id];
        $data = array_merge($data,$amc_id);

        return $this->nav->create($data);;

    }

    public function update($id, Request $request)
    {
        // TODO: Implement update() method.

        $temp=$this->find($id);
        return $temp->update($request->all());
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.

        $temp = $this->find($id);
        if (is_null($temp)) {
            return false;
        }
        $result = $temp->delete();
        return $result;
    }

    public function addprice($offer,$bid,$standard)
    {
        // TODO: Implement delete() method.
    }

    public function by_amc_id($id)
    {
        return $this->nav->where('amc_id', $id)->get();
    }
}