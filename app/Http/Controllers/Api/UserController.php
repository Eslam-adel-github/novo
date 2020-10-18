<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserChangePasswordRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\User as UserResource;

use App\Services\UserService;
use App\Repositories\Eloquent\User\UserRepository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Mail\ResetMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Resources\Product\ProductCollection;
use Auth;

class UserController extends Controller
{

    use SendsPasswordResetEmails;


    private $userRepository;
    private $userService;


    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->middleware('auth:api')->except(['login','store','reset']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $request["password"]=Hash::make($request['password']);
        $request['type']=1;
        $user = $this->userService->store($request);
        if ($user) {
            Auth::login($user);
            $token = Auth::user()->createToken(env('APP_KEY'))->accessToken;
            $data["token"]=$token;
            $data["user"]=new UserResource($user);
            return $this->apiResponse($data, true, 200);
        }
        return $this->apiResponse("Problem occures during the process. User not addedd", true, 406);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();
        return $this->apiResponse(new UserResource($user), true, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UsersRequest $request)
    {
        $id=Auth::user()->id;
        //$request['type']=2;
        $user = $this->userService->update($request,$id);

        if ($user) {
            return $this->apiResponse(new UserResource($user), true, 200);
        }
        return $this->apiResponse("Problem occures during the process. User not addedd", true, 422);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Reequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required_without:phone|exists:users,email',
            'phone'=>'required_without:email|exists:users,phone',
            'password'=>'required'
        ]);
        if (Auth::attempt($request->all())) {
            $token = Auth::user()->createToken(env('APP_KEY'))->accessToken;
        }
        else{
            return response()->json([
                'message' => 'Error In Email OR Password'
            ], 401);
        }
        $user = $this->userRepository->instance()->where('id',Auth::id())->first();
        $data["token"]=$token;
        $data["user"]=new UserResource($user);
        return $this->apiResponse($data, true, 200);
    }


    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json(['msg'=>'Mail sent succeffully'], 200);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['msg'=>'Mail not sent'], 400);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password(UserChangePasswordRequest $request){
        $id=Auth::user()->id;
        $user = $this->userService->change_password($request,$id);
        if ($user) {
            return $this->apiResponse(new UserResource($user), true, 200);
        }
        return $this->apiResponse("failed to change password", true, 422);
    }

}
