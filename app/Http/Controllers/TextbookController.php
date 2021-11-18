<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Lab;
use App\Models\LabMission;
use App\Models\MissionStep;
use App\Models\Theme;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TextbookController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function index(){
        $headers= Header::with('themes','labs.missions.steps')
            ->orderBy('queue')
            ->get();
        return view('index',['headers'=>$headers]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function show($id){
        $headers= Header::with('themes','labs.missions.steps')
            ->orderBy('queue')
            ->get();
        $header= Header::with('themes','labs.missions.steps')->where('id',$id)->orderBy('queue')->get();
        return view('show',['header'=>$header,'headers'=>$headers]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function themeShow($id){
        $headers= Header::with('themes','labs.missions.steps')
            ->orderBy('queue')
            ->get();
        $header= Header::with('themes')
            ->whereHas('themes',function($query) use ($id) {
                $query->where('id',$id);
            })
            ->orderBy('queue')->get();
        return view('showTheme',['header'=>$header,'headers'=>$headers]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function labShow($id){
        $headers= Header::with('themes','labs.missions.steps')
            ->orderBy('queue')
            ->get();
        $header= Header::with('labs.missions.steps')
            ->whereHas('labs',function($query) use ($id) {
                $query->where('id',$id);
            })
            ->orderBy('queue')->get();
        return view('showLab',['header'=>$header,'headers'=>$headers]);
    }

    /**
     * @param string $suc
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function edit($suc=''){
        $headers= Header::all();
        if($suc!==''){
            return view('editHeader',['headers'=>$headers,'success'=>$suc]);
        }
        return view('editHeader',['headers'=>$headers]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function theme($mes=''){
        $headers=[];
        $heads= Header::all();
        foreach ($heads as $header){
            $headers[$header->id] = $header->name;
        }
        if($mes!==''){
            return view('createTheme',['headers'=>$headers,'success'=>$mes]);
        }
        return view('createTheme',['headers'=>$headers]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function themeEdit($mes=''){
        $headers=[];
        $heads= Header::all();
        foreach ($heads as $header){
            $headers[$header->id] = $header->name;
        }
        $themes= Theme::with('header')->get();
        if($mes!==''){
            return view('editTheme',['themes'=>$themes,'headers'=>$headers,'success'=>$mes]);
        }
        return view('editTheme',['themes'=>$themes,'headers'=>$headers]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function lab($mes=''){
        $headers=[];
        $heads= Header::all();
        foreach ($heads as $header){
            $headers[$header->id] = $header->name;
        }
        if($mes!==''){
            return view('createLab',['headers'=>$headers,'success'=>$mes]);
        }
        return view('createLab',['headers'=>$headers]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function labEdit($mes=''){
        $headers=[];
        $heads= Header::all();
        foreach ($heads as $header){
            $headers[$header->id] = $header->name;
        }
        $labs= Lab::with('header')->get();
        if($mes!==''){
            return view('editLab',['labs'=>$labs,'headers'=>$headers,'success'=>$mes]);
        }
        return view('editLab',['labs'=>$labs,'headers'=>$headers]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function mission($mes=''){
        $labs=[];
        $laboratories= Lab::all();
        foreach ($laboratories as $lab){
            $labs[$lab->id] = $lab->name;
        }
        if($mes!==''){
            return view('createMission',['labs'=>$labs,'success'=>$mes]);
        }
        return view('createMission',['labs'=>$labs]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function missionEdit($mes=''){
        $labs=[];
        $laboratories= Lab::all();
        foreach ($laboratories as $lab){
            $labs[$lab->id] = $lab->name;
        }
        $missions= LabMission::with('lab')->get();
        if($mes!==''){
            return view('editMission',['missions'=>$missions,'labs'=>$labs,'success'=>$mes]);
        }
        return view('editMission',['missions'=>$missions,'labs'=>$labs]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function step($mes=''){
        $missions=[];
        $labMissions= LabMission::all();
        foreach ($labMissions as $mission){
            $missions[$mission->id] = $mission->name;
        }
        if($mes!==''){
            return view('createStep',['missions'=>$missions,'success'=>$mes]);
        }
        return view('createStep',['missions'=>$missions]);
    }

    /**
     * @param string $mes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function stepEdit($mes=''){
        $missions=[];
        $labMissions= LabMission::all();
        foreach ($labMissions as $mission){
            $missions[$mission->id] = $mission->name;
        }
        $steps= MissionStep::with('mission')->get();
        if($mes!==''){
            return view('editStep',['steps'=>$steps,'missions'=>$missions,'success'=>$mes]);
        }
        return view('editStep',['steps'=>$steps,'missions'=>$missions]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function headerCreate(Request $request){
        try{
            Header::create([
                'name' => $request->name,
                'queue' => $request->queue
            ]);
            return view('create',['success'=>'Глава добавлена']);
        }catch(QueryException $e){
            return view('create',['error'=>'Данные не верны']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function themeCreate(Request $request){
        try{
            Theme::create([
                'header_id'=> $request->header,
                'name' => $request->name,
                'content' => $request->cont,
            ]);
            return $this->theme('Лекция добавлена');
        }catch(QueryException $e){
            return $this->theme('Данные не верны');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function labCreate(Request $request){
        try{
            Lab::create([
                'header_id'=> $request->header,
                'name' => $request->name,
                'queue' => $request->queue,
            ]);
            return $this->lab('Лабораторная работа добавлена');
        }catch(QueryException $e){
            return $this->lab('Данные не верны');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function missionCreate(Request $request){
        try{
            LabMission::create([
                'lab_id'=> $request->lab,
                'name' => $request->name,
                'queue' => $request->queue,
            ]);
            return $this->mission('Задание добавлено');
        }catch(QueryException $e){
            return $this->mission('Данные не верны');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function stepCreate(Request $request){
        try{
            if($request->file('image')){
                $url = Storage::disk('public')->put('images', $request->file('image'));
                MissionStep::create([
                    'lab_mission_id'=> $request->mission,
                    'name' => $request->name,
                    'queue' => $request->queue,
                    'img'=>$url
                ]);
            }else{
                MissionStep::create([
                    'lab_mission_id'=> $request->mission,
                    'name' => $request->name,
                    'queue' => $request->queue,
                ]);
            }
            return $this->step('Шаг добавлен');
        }catch(QueryException $e){
            return $this->step('Данные не верны');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function headerUpdate(Request $request){
        try {
            Header::where('id', $request->id)->update([
                'name' => $request->name,
                'queue' => $request->queue
            ]);
            return $this->edit('Глава изменена');
        }catch(QueryException $e){
            return $this->edit('Данные уже существуют');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function headerDelete(Request $request){
        Header::where('id',$request->id)->delete();
        return $this->edit('Глава удалена');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function themeUpdate(Request $request){
        Theme::where('id',$request->id)->update([
            'header_id'=> $request->header,
            'name'=>$request->name,
            'content' => $request->cont,
        ]);
        return $this->themeEdit('Лекция изменена');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function themeDelete(Request $request){
        Theme::where('id',$request->id)->delete();
        return $this->themeEdit('Лекция удалена');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function labUpdate(Request $request){
        Lab::where('id',$request->id)->update([
            'header_id'=> $request->header,
            'name'=>$request->name,
            'queue'=>$request->queue
        ]);
        return $this->labEdit('Лабораторная работа изменена');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function labDelete(Request $request){
        Lab::where('id',$request->id)->delete();
        return $this->labEdit('Лабораторная работа удалена');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function missionUpdate(Request $request){
        LabMission::where('id',$request->id)->update([
            'lab_id'=> $request->lab,
            'name'=>$request->name,
            'queue'=>$request->queue
        ]);
        return $this->missionEdit('Задание изменено');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function missionDelete(Request $request){
        LabMission::where('id',$request->id)->delete();
        return $this->missionEdit('Задание удалено');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function stepUpdate(Request $request){
        if($request->file('image')){
            Storage::disk('public')->delete($request->url);
            $url = Storage::disk('public')->put('images', $request->file('image'));
            MissionStep::where('id',$request->id)->update([
                'lab_mission_id'=> $request->mission,
                'name' => $request->name,
                'queue'=>$request->queue,
                'img'=>$url
            ]);
        }else{
            MissionStep::where('id',$request->id)->update([
                'lab_mission_id'=> $request->mission,
                'name' => $request->name,
                'queue'=>$request->queue
            ]);
        }
        return $this->stepEdit('Шаг изменен');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function stepDelete(Request $request){
        Storage::disk('public')->delete($request->url);
        MissionStep::where('id',$request->id)->delete();
        return $this->stepEdit('Шаг удален');
    }

}
