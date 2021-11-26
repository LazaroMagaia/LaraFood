<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlansRequest;
use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlansController extends Controller
{

    private $repository;
    public function __construct(Plans $plans){
        $this->repository = $plans;
    }
    public function index()
    {
        $plans = $this->repository->latest()->paginate();
        return view('admin.pages.plans.index',[
            "plans"=>$plans
        ]);
    }
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store(PlansRequest $request)
    {
        $data = $request->all();
        $data['url'] = Str::slug($request->name);
        $this->repository->create($data);
        return redirect()->route('plans.index');
    }
    public function show($url)
    {
        $plan = $this->repository->where('url',$url)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.show',[
            'plan'=>$plan
        ]);
    }
    public function destroy($id)
    {
        $plan = $this->repository
        ->with('details')
        ->where('id',$id)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        if($plan->details->count() > 0)
        {
            return redirect()->back()
            ->with('error','Existem detalhes vinculados a este plano, remova-os primeiro');
        }
        $plan->delete();
        return redirect()->route('plans.index');
    }
    public function search(Request $request){
        $filters = $request->all();
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index',[
            "plans"=> $plans,
            "filters" => $filters,
        ]);
    }
    public function edit($url)
    {
        $plan = $this->repository->where('url',$url)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.edit',[
            'plan'=>$plan
        ]);
    }
    public function update(PlansRequest $request, $url)
    {
        $plan = $this->repository->where('url',$url)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        $plan->url = Str::slug($request->name);
        $plan->update($request->all());
        return redirect()->route('plans.index');
    }
}
