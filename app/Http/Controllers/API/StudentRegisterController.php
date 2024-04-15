<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
class StudentRegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'classrooms_id' => 'required',
            'name' => 'required',
            'nisn' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $student = Student::create($input);
        $success['token'] =  $student->createToken('MyApp')->plainTextToken;
        $success['name'] =  $student->name;
        return $this->sendResponse($student, $success, 'Student register successfully.');
    }
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['nisn' => $request->nisn, 'password' => $request->password])){ 
            $student = Auth::user(); 
            $success['token'] =  $student->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $student->name;
            return $this->sendResponse($student, $success, 'Student login successfully.');
        }else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}