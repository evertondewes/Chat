<?php

namespace Chat\Http\Controllers;

use Chat\Message;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(15);

        return view('message.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Chat\Http\Requests\MessageRequest $request)
    {
        $message = new \Chat\Message($request->all());
        $message->user_id = \Auth::user()->id;
        $message->save();

        \Session::flash('flash_message', [
            'message' => 'Mensagem enviada com sucesso!',
            'class' => 'alert-success'
        ]);

        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Chat\Message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('message.show', ['message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Chat\Message $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('message.edit', ['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Chat\Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        if ($message->user_id == \Auth::user()->id) {
            $message->update($request->all());
            return $this->index();
        } else {
            throw new \Exception('Usuário não tem permissões para editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Chat\Message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return $this->index();
    }

    public function report()
    {
        $rows = DB::table('messages')
            ->join('users', 'users.id', '=', 'messages.user_id')
            ->select('users.name', DB::raw('count(*) as count'))
            ->groupBy('users.name')
            ->paginate(15);

        return view('message.report', ['rows' => $rows]);
    }
}
