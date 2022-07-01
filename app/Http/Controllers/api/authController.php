<?php
namespace App\Http\Controllers\api;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class authController extends Controller
{

    public function login(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 422);
        }

        $credentials = $r->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $data['name'] = $user->name;
            $data['email '] = $user->email;
            $data['access_token'] = $user->createToken('accessToken')->accessToken;
            //  return sent_response('Login Success', $data);
            return $this->respondWithToken($user->createToken('accessToken')->accessToken);
        } else {
            return sent_error('Unauthorised', '', 401);
        }
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60,

            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ]);
    }



    public function register(Request $r)
    {
        $data = [];
        $inputData = $r->all();
        foreach ($inputData as $key => $value) {
            if ($key == '_token' || $key == 'submit') {
            } else if ($key == 'password') {
                $data[$key] = hash::make($value);
            } else {
                $data[$key] = $value;
            }
        }
        $validator = Validator::make($r->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 422);
        }
        try {
            $user =   User::create($data);
            $output = [];
            $inputData = $r->all();
            foreach ($inputData as $key => $value) {
                if ($key == 'id') {
                } else if ($key == 'password') {
                    $output[$key] = hash::make($value);
                } else {
                    $output[$key] = $value;
                }
            }
            $output = [
                'user' => $output,
            ];
            return sent_response('User Registration Success', $output);
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
        // return $r->all();
    }
    public function Edit(Request $r, $id)
    {
        $user = User::findOrFail($id);
        $data = [];
        $inputData = $r->all();
        foreach ($inputData as $key => $value) {
            if ($key == '_token' || $key == 'submit') {
            } else if ($key == 'password') {
                $data[$key] = hash::make($value);
            } else {
                $data[$key] = $value;
            }
        }
        $validator = Validator::make($r->all(), [

            'name' => 'required|min:4',

        ]);
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 422);
        }
        try {
            $user->update($data);
            $output = [];
            $inputData = $r->all();
            foreach ($inputData as $key => $value) {
                if ($key == 'id') {
                } else if ($key == 'password') {
                    $output[$key] = hash::make($value);
                } else {
                    $output['id'] = $id;
                    $output[$key] = $value;
                }
            }
            $output = [
                'user' => $output,
            ];
            return sent_response('User Update Success', $output);
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
        // return $r->all();
    }
    public function delete(Request $r, $id)
    {
        $user = User::findOrFail($id);
        try {
            $user->delete();
            return sent_response('User Delete Success');
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
    }
    public function restore(Request $r, $id)
    {
        // $user = User::findOrFail($id);
        try {
            User::withTrashed()->find($id)->restore();
            return sent_response('User Restore Success');
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
    }
    public function restoreAll(Request $r)
    {
        // $user = User::findOrFail($id);
        try {
            User::onlyTrashed()->restore();
            return sent_response('All User Restore Success');
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
    }
    public function deleted(Request $r)
    {
        return  $trashed = User::onlyTrashed()->get();
    }
    public function logout(Request $r)
    {
        auth()->user()->token()->revoke();
        $data = [];
        return sent_response('Logout Success', $data);
    }
    public function show(Request $r, $id)
    {
        $data =   User::find($id);
        if ($data) {
            return sent_response('Success', $data);
        } else {
            return sent_error('Data Not Found!');
        }
    }
    public function showByUnion(Request $r, $union)
    {
        //    $data =   User::find('unioun',$union);
        $data =   User::where('unioun', $union)->get();
        if ($data) {
            return sent_response('Success', $data);
        } else {
            return sent_error('Data Not Found!');
        }
    }
    public function index(Request $r)
    {
        $data =   User::all();
        if ($data) {
            return sent_response('Success', $data);
        } else {
            return sent_error('Data Not Found!');
        }
    }
}
