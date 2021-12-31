<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Carousel;
use App\Models\Expert;
use App\Models\Initiative;
use App\Models\VolunteerField;
use App\Models\UserInitiative;
use App\Models\InitiativeApply;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index'
        ]]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousel = Carousel::orderBy('created_at','desc')->take(3)->get();
        $volunteerFields = VolunteerField::orderBy('created_at','desc')->take(8)->get();
        $experts = Expert::orderBy('created_at','desc')->take(4)->get();
        $initiative = Initiative::orderBy('created_at','desc')->take(2)->get();;
        $achievments = Achievement::orderBy('created_at','desc')->take(5)->get();
        $data = [
            "carousel"=>$carousel,
            "volunteerFields"=>$volunteerFields, 
            "experts"=>$experts,
            "initiative"=>$initiative,
            "achievments"=>$achievments
        ];

        return view('home', $data);
    }

    public function initiatives()
    {
        $allInitiatives = UserInitiative::where('approved', true)->paginate(15);

        return view('home.initiatives', ['allInitiatives'=>$allInitiatives]);
    }

    public function createInitiative()
    {
        return view('home.createInitiative');
    }

    public function initiativeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'init_desc'    => 'required|max:100',
            'init_name'    => 'required',
            'init_value'    => 'required',
            'init_benefit'    => 'required',
            'init_reason'    => 'required',
            'init_qualy'    => 'required',
            'init_sustain'    => 'required',
            'init_advantage'    => 'required',
            'init_number'    => 'required',
            'init_exp'    => 'required',
            'init_skill'    => 'required',
            'init_period'    => 'required',
            'init_hours_freq'    => 'required',
            'init_hours'    => 'required',
            'init_terms'    => 'required',
            'init_video'    =>'file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:100040'
        ]);

        if(!$validator->fails())
        {
            $path = '';
            if($request->hasFile('init_video'))
            {
                $file = $request->file('init_video');
                $path = $request->file('video')->store('videos/'.time().$file->getClientOriginalExtension());
            }
            UserInitiative::create([
                'user_id'   => auth()->user()->id,
                'name'      => $request->init_name,
                'desc'      => $request->init_desc,
                'value'     => $request->init_value,
                'benefit'   => $request->init_benefit,
                'reason'    => $request->init_reason,
                'qualy'     => $request->init_qualy,
                'sustain'   => $request->init_sustain,
                'advantage' => $request->init_advantage,
                'number'    => $request->init_number,
                'exp'       => $request->init_exp,
                'skill'     => $request->init_skill,
                'period'    => $request->init_period,
                'hours_freq'=> $request->init_hours_freq,
                'hours'     => $request->init_hours,
                'terms'     => $request->init_terms,
                'notes'     => $request->init_notes,
                'period_from'=> $request->init_period_from,
                'period_to' => $request->init_period_to,
                'video'     => $path,
            ]);
            return redirect(route('initiatives'))->with('message', 'تم اضافة المبادرة بنجاح وهي الان قيد المراجعة');
        }
        else
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function showInitiative($id)
    {
        $initiative = UserInitiative::find($id);
        $initiativeExist = InitiativeApply::where([['user_id', auth()->user()->id], ['init_id', $id]])->first();
        return view('home.showInitiative', ['initiative'=>$initiative, 'initiativeExist'=>$initiativeExist]);
    }

    public function initiativeApply($id)
    {
        $userId = auth()->user()->id;
        InitiativeApply::updateOrCreate([
            'user_id'=>$userId,
            'init_id'=>$id
        ]);
        return redirect(route('initiatives'))->with('message', 'لقد قمت بالتقديم للمبادرة بنجاح');
    }
}
