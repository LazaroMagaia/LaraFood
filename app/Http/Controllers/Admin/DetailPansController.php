<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailRequest;
use App\Models\DetailPlan;
use App\Models\Plans;
use Illuminate\Http\Request;

class DetailPansController extends Controller
{
    protected $repository,$plan;

    public function __construct(DetailPlan $detailPlan,Plans $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }
    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first())
        {
            return redirect()->back();
        }
        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index',[
            'plan'=> $plan,
            'details'=>$details
        ]);
    }
    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first())
        {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create',[
            "plan"=>$plan
        ]);
    }
    public function store(DetailRequest $request,$urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first())
        {
            return redirect()->back();
        }
        //$data = $request->all();
        //$data['plan_id'] = $plan->id;
        //$this->repository->create($data);
        $plan->details()->create($request->all());//atraves da ralacao ele faz entre o plan e details
        return redirect()->route('plan.details.index',$plan->url);
    }
    public function edit($urlPlan,$idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit',[
            "plan"=>$plan,
            "detail"=>$detail
        ]);
    }
    public function update(DetailRequest $request,$urlPlan,$idDetail){
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        $detail->update($request->all());//atraves da ralacao ele faz entre o plan e details
        return redirect()->route('plan.details.index',$plan->url);
    }
    public function show($urlPlan,$idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.show',[
            "plan"=>$plan,
            'detail'=>$detail
        ]);

    }
    public function destroy($urlPlan,$idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        $detail->delete();
        return redirect()->route('plan.details.index',$plan->url)
        ->with('message','Registro removido com sucesso');
    }
}
