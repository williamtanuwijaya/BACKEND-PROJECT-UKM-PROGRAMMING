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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.auth')->except('login');
    }

    public function login(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'nisn' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Percobaan login
        $credentials = $request->only('nisn', 'password');
        if (Auth::guard('student')->attempt($credentials)) {
            $student = Auth::guard('student')->user(); // Mengambil user yang berhasil diautentikasi
            $success['token'] =  $student->createToken('MyApp')->plainTextToken;
            $success['name'] =  $student->name;
            return $this->sendResponse($student, $success, 'Student login successfully.');
        } else {
            return $this->sendError('Invalid credentials.', [], JsonResponse::HTTP_UNAUTHORIZED);
        }
    }
    // /**
    //  * Register api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function register(Request $request): JsonResponse
    // {
    //     $validator = Validator::make($request->all(), [
    //         'classrooms_id' => 'required',
    //         'name' => 'required',
    //         'nisn' => 'required',
    //         'gender' => 'required',
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //     ]);
    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }
    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $student = Student::create($input);
    //     $success['token'] =  $student->createToken('MyApp')->plainTextToken;
    //     $success['name'] =  $student->name;
    //     return $this->sendResponse($student, $success, 'Student register successfully.');
    // }
    // /**
    //  * Login api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function login(Request $request): JsonResponse
    // {
    //     if(Auth::attempt(['nisn' => $request->nisn, 'password' => $request->password])){ 
    //         $student = Auth::user(); 
    //         $success['token'] =  $student->createToken('MyApp')->plainTextToken; 
    //         $success['name'] =  $student->name;
    //         return $this->sendResponse($student, $success, 'Student login successfully.');
    //     }else{ 
    //         return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    //     } 
    // }
}