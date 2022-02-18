<?php

namespace App\Http\Middleware;

use Closure;

use Session;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

class UnknownUser
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
         
        if(Session::has('user') && Session::get('user') !== null && Session::has('role_id')){
			$user=User::find(Session::get('user'));
			$role=Role::find(Session::get('role_id'));
			if(!!$user && $role->identity=='superadmin'){
				return redirect(route('superadmin.dashboard'));
			}elseif(!!$user && $role->identity=='admin'){
				return redirect(route('admin.dashboard'));
			}elseif(!!$user && $role->identity=='user'){
				return redirect(route('user.dashboard'));
            }elseif(!!$user && $role->identity=='doctor'){
				return redirect(route('doctor.dashboard'));
            }elseif(!!$user && $role->identity=='patient'){
				return redirect(route('patient.dashboard'));
            }elseif(!!$user && $role->identity=='nurse'){
				return redirect(route('nurse.dashboard'));
            }elseif(!!$user && $role->identity=='receptionist'){
				return redirect(route('receptionist.dashboard'));
            }elseif(!!$user && $role->identity=='casemanager'){
				return redirect(route('casemanager.dashboard'));
            }elseif(!!$user && $role->identity=='laboratorist'){
				return redirect(route('laboratorist.dashboard'));
            }elseif(!!$user && $role->identity=='pharmacist'){
				return redirect(route('pharmacist.dashboard'));
            }elseif(!!$user && $role->identity=='accountant'){
				return redirect(route('accountant.dashboard'));
			}else{
				return redirect(route('login'))->with($this->responseMessage(false,"error","You have to login first"));
			}
		}
      return $next($request);
    }
}
