<?php

namespace App\Http\Controllers\Api;

use App\Enums\GenderEnum;
use App\Enums\JobType;
use App\Enums\Religion;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function profileEdit(Request $request){
        $cities = City::whereStatus(true)->orderBy('name', 'ASC')->get();
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();
        $genders = GenderEnum::options();
        $religions = Religion::all();
        $jobtypes = JobType::getValues();
                
        return response()->json(compact('cities', 'hobbies', 'genders', 'religions', 'jobtypes'));
    }

    public function profileUpdate(Request $request) {
        $userId = Auth::guard('api')->id();
        $user = User::find($userId);

        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:200',
            'gender'       => 'required|string',
            'city_id'      => 'required|string',
            'religion'     => 'required|string',
            'birth_date'   => 'required|date',
            'age'   => 'required',
            'height'       => 'required|numeric|min:30|max:300',
            'weight'       => 'required|numeric|min:10|max:300',
            'fathers_name' => 'required|string|max:200',
            'mothers_name' => 'required|string|max:200',
            'address'      => 'required|string|max:255',
            'type'         => 'required|string',
            'company_name' => 'nullable|string|max:200',
            'salary'       => 'nullable|string|max:20',
            'experience'   => 'nullable|string|max:20',
            'degree'       => 'nullable|string|max:200',
            'college'      => 'nullable|string|max:200',
            'school'       => 'nullable|string|max:200',
            'whatsApp'     => 'nullable|string|max:200',
            'facebook'     => 'nullable|string|max:200',
            'instagram'    => 'nullable|string|max:200',
            'x'            => 'nullable|string|max:200',
            'youtube'      => 'nullable|string|max:200',
            'linkedin'     => 'nullable|string|max:200',
            'hobbies'      => 'nullable|array',
            'image'        => [
                Rule::requiredIf(!$user->profile || !$user->profile->image),
                'nullable',
                'image',
                'mimes:png,jpg,jpeg'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $userProfile = $this->userService->updateUserProfile($request->all(), $user);
        

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => [
                'user' => $user,
            ]
        ], Response::HTTP_OK);
    }
}
