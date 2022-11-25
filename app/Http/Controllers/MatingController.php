<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatingRequest;
use App\Models\Mating;
use App\Models\Reptile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatingController extends Controller
{
    private Mating $mating;
    private Reptile $reptile;

    public function __construct(Mating $maitng, Reptile $reptile)
    {
        $this->mating = $maitng;
        $this->reptile = $reptile;
        parent::__construct('mating');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->mating
            ->where('user_id', Auth::id())->get();
        return view("$this->path.index", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::id();
        $maleReptileList = $this->reptile->listByUserId($userId)->conditionGender('m')->pluck('name', 'id');
        $femaleReptileList = $this->reptile->listByUserId($userId)->conditionGender('w')->pluck('name', 'id');

        return view($this->path.".create", compact('maleReptileList', 'femaleReptileList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MatingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatingRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['comment'] = $request->input('comment');
        $this->mating->create($validated);

        return redirect(route('dashboard'))->with('status', '메이팅을 등록했습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
