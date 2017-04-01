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
use App\IRepositories\INAVRepository;
use App\IRepositories\Member;
use App\Models\Nav;
use Illuminate\Http\Request;

class NAVRepositories  implements INAVRepository
{
    private $NavRepository;
    private $nav;
    public function __construct(INAVRepository $NavRepository,Nav $nav)
    {

        $this->NavRepository = $NavRepository;
        $this->nav=$nav;
    }

    public function all()
    {
        // TODO: Implement all() method.
      return  $this->nav->all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->nav-find($id);
    }

    public function create(Request $request)
    {
        // TODO: Implement create() method.
        $user = $this->NavRepository->create($request);


        return $this->nav->create($request->all());;

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
}