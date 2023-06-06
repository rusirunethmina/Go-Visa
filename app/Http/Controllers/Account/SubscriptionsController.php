<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\AuthTrait;
use App\Models\Plan;
use App\Models\Plan_Items;
use App\Models\Subscription;
use Exception;

class SubscriptionsController extends Controller
{

    use AuthTrait;

    public function __construct()
    {
    }

    public function index()
    {

        $current_user = $this->getCurrentUser();
        $user_id = $current_user->id;
        $user_subcription_type = Subscription::where('user_id', $user_id)->first();
        $plans = Plan::get();
        $plans_items = Plan_Items::get();
        if ($user_subcription_type) {
            $subcription_name =  $user_subcription_type->name;
            return view("frontend.account.subscriptions.index", compact("plans", "plans_items", "subcription_name", "user_subcription_type"));
        } else {
            $subcription_name = null;
            return view("frontend.account.subscriptions.index", compact("plans", "plans_items", "subcription_name"));
        }
        
    }

    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("frontend.account.subscriptions.show", compact("plan", "intent"));
    }
    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
        if ($plan) {
            try {
                $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                    ->create($request->token);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            return view("frontend.account.subscriptions.subscription_success");
        }
    }

    public function status()
    {
        $current_user = $this->getCurrentUser();
        $status = 'deactive';
        Subscription::where("user_id", $current_user->id)->update(["stripe_status" => $status]);
        return view("frontend.account.dashboard.default.index");
    }
}
