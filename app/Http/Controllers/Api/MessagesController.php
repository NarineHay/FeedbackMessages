<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Http\Requests\CreateMessage;
use App\Http\Resources\CreateMessageResource;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends  BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessage $request)
    {
        if($request->validated()){
            $message_request = $request->all();
            if($request->registered){
                $user = User::where('email', $request->email)->first();
                if($user){
                    $message_request['user_id'] = $user->id;
                }
            }
            $message = Message::create($message_request);

        }
        return $this->sendResponse(new CreateMessageResource($message));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);

        return is_null($message) ? $this->sendError('письмо не найдена.') :
               $this->sendResponse(new MessageResource($message));

    }

    public function show_message(CreateMessage $request){
        $message = Message::where(['name' => $request->name, 'email' => $request->email])->first();

        return is_null($message) ? $this->sendError('письмо не найдена.') :
            $this->sendResponse(new MessageResource($message));
    }


    public function list(Request $request){

        if($request->has('order')){
            $list = Message::orderBy('created_at', $request->order)->paginate(10);
        }else{
            $list = Message::paginate(10);
        }
        return is_null($list) ? $this->sendError('письмо не найдена.') :
            $this->sendResponse(new MessageResource($list));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
