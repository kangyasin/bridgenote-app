<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPosition\NewUserPositionRequest;
use App\Http\Requests\UserPosition\UpdateUserPositionRequest;
use App\Models\UserPosition;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserPositionController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $size = 10;
        if($request->has('size')) {
            $size = $request->get('size');
        }
        return $this->success(UserPosition::simplePaginate($size)->items());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewUserPositionRequest $request
     * @return JsonResponse
     */
    public function store(NewUserPositionRequest $request)
    {
        try {
            $validateInputs = $request->validated();
            $userPosition = UserPosition::create($validateInputs);
            return $this->success($userPosition);
        } catch (ValidationException $validationException) {
            return $this->error('Oops', 406, $validationException->errors());
        } catch (\Exception $exception) {
            dd($exception);
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $userPosition = UserPosition::find($id);
        if($userPosition == null) {
            return $this->error('Not Found',404);
        }
        return $this->success($userPosition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserPositionRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateUserPositionRequest $request, $id)
    {
        try {
            $validateInputs = $request->validated();
            $userPosition = UserPosition::find($id);
            if($userPosition == null) {
                return $this->error('Not Found',404);
            }
            $userPosition->update($validateInputs);
            return $this->success($userPosition);
        } catch (ValidationException $validationException) {
            return $this->error('Oops', 406, $validationException->errors());
        } catch (\Exception $exception) {
            return $this->error();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $userPosition = UserPosition::find($id);
        if($userPosition == null) {
            return $this->error('Not Found',404);
        }
        return $this->success($userPosition->delete());
    }
}
