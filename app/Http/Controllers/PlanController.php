<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlanRequest;
use App\Models\Plan;
use App\Models\Subscription;
use App\Repositories\PlanRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class PlanController extends AppBaseController
{
    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): \Illuminate\View\View
    {
        return view('plan.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): \Illuminate\View\View
    {
        return view('plan.create');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePlanRequest $request): RedirectResponse
    {
        $input = $request->all();

        $this->planRepository->store($input);

        Flash::success(__('messages.placeholder.plan_created_successfully'));

        return redirect(route('plans.index'));
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(Plan $plan): \Illuminate\View\View
    {
        return view('plan.edit', compact('plan'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();

        $this->planRepository->update($input, $id);

        Flash::success(__('messages.placeholder.plan_updated_successfully'));

        return redirect(route('plans.index'));
    }

    public function destroy(Plan $plan): JsonResponse
    {
        $subscription = Subscription::where('plan_id', $plan->id)->where('status', Subscription::ACTIVE)->count();
        if ($plan->is_default == 1) {
            return $this->sendError(__('messages.placeholder.default_plan'));
        }
        if ($subscription > 0) {
            return $this->sendError(__('messages.placeholder.plan_already_used'));
        }

        $plan->delete();

        return $this->sendSuccess(__('messages.placeholder.plan_deleted_successfully'));
    }

    public function planMakeDefault(Plan $plan): JsonResponse
    {
        $defaultPlan = Plan::where('is_default', 1)->first();
        if($defaultPlan){
        $defaultPlan->update(['is_default' => 0]);
        }else{
            $plan->update(['is_default' => 1]);

            return $this->sendSuccess(__('messages.placeholder.default_plan_changed_successfully'));
        }
        if (empty($plan)) {
            $defaultPlan->update(['is_default' => 1]);

            return $this->sendSuccess(__('messages.placeholder.default_plan_changed_successfully'));
        }
        if ($plan->trial_days == 0) {
            $plan->trial_days = Plan::TRIAL_DAYS;
        }
        $plan->is_default = 1;
        $plan->save();

        return $this->sendSuccess(__('messages.placeholder.default_plan_changed_successfully'));
    }
}
