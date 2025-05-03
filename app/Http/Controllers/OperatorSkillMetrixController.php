<?php

namespace App\Http\Controllers;

use App\Models\OperatorSkillMetrix;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Designation;
use App\Models\Floor;
use App\Models\Line;
use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class OperatorSkillMetrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $operatorSkillMetrixs= OperatorSkillMetrix::orderBy('id','ASC')->with('line','floor','operator','designation')->get();


       return view('operator_skill_metrix.index',compact('operatorSkillMetrixs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
       // return $lines;
        $operators = Operator::whereStatus(1)->get();
        $designations = Designation::whereStatus(1)->get();

        return view('operator_skill_metrix.create',compact(['floors', 'lines','operators','designations']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();

        $this->validate($request, [
            'line_id' => 'required',
            'floor_id' => 'required',
            'operator_id' => 'required',
            'designation_id' => 'required',

        ]);

        $operatorSkillMetrix = [
            'created_by' => Auth::user()->id,
            'floor_id' => $request->floor_id,
            'line_id' => $request->line_id,
            'operator_id' => $request->operator_id,
            'designation_id' => $request->designation_id,
            'join_date' => $request->join_date,
            'salary' => $request->salary,
            'propose_salary' => $request->propose_salary,
            'ol' => json_encode($request->ol),
            'ol_performance' => $request->ol_performance,
            'snls' => json_encode($request->snls),
            'snls_performance' => $request->snls_performance,
            'vertical' => json_encode($request->vertical),
            'vertical_performance' => $request->vertical_performance,
            'dnls' => json_encode($request->dnls),
            'dnls_performance' => $request->dnls_performance,
            'kansai' => json_encode($request->kansai),
            'foa' => json_encode($request->foa),
            'snap' => json_encode($request->snap),
            'bh' => json_encode($request->bh),
            'bt' => json_encode($request->bt),
            'cs' => json_encode($request->cs),
            'performance' => $request->performance,
            'main_process' => $request->main_process,
            'present_work' => $request->present_work,


        ];
        $status = OperatorSkillMetrix::create($operatorSkillMetrix);
        //dd( $status);
        if ($status) {
            return redirect()->route('operator_skill_metrix')->with(['success' => 'Successfully Created!']);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperatorSkillMetrix  $operatorSkillMetrix
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data=  OperatorSkillMetrix::find($id);
        $ol=json_decode($data->ol);
        if($ol==null){
            $ol=['The   Operator  does not operate this Machine'];
        }
        $snls=json_decode($data->snls);
        if($snls==null){
            $snls=['The   Operator  does not operate this Machine'];
        }
        $vertical=json_decode($data->vertical);
        if($vertical==null){
            $vertical=['The   Operator  does not operate this Machine'];
        }
        $dnls=json_decode($data->dnls);
        if($dnls==null){
            $dnls=['The   Operator  does not operate this Machine'];
        }

        $kansai=json_decode($data->kansai);
        if($kansai==null){
            $kansai=['The   Operator  does not operate this Machine'];
        }
        $foa=json_decode($data->foa);
        if($foa==null){
            $foa=['The   Operator  does not operate this Machine'];
        }
        $foa=json_decode($data->foa);
        if($foa==null){
            $foa=['The   Operator  does not operate this Machine'];
        }
        $snap=json_decode($data->snap);
        if($snap==null){
            $snap=['The   Operator  does not operate this Machine'];
        }
        $bt=json_decode($data->bt);
        if($bt==null){
            $bt=['The   Operator  does not operate this Machine'];
        }
        $cs=json_decode($data->cs);
        if($cs==null){
            $cs=['The   Operator  does not operate this Machine'];
        }
        $bh=json_decode($data->bh);
        if($bh==null){
            $bh=['The   Operator  does not operate this Machine'];
        }
        if($data){
            return view('operator_skill_metrix.view',compact([
                'data',
                'ol',
                'snls',
                'vertical' ,
                'dnls' ,
                'kansai' ,
                'foa',
                'snap' ,
                'bh' ,
                'bt',
                'cs',

            ]));

          }else{
            return back()->with('error', 'Data Not Faound');
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperatorSkillMetrix  $operatorSkillMetrix
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
       // return $lines;
        $operators = Operator::whereStatus(1)->get();
        $designations = Designation::whereStatus(1)->get();
        $data= OperatorSkillMetrix::find($id);
        $ol=json_decode($data->ol);
        if($ol==null){
            $ol=['null'];
        }
        $snls=json_decode($data->snls);
        if($snls==null){
            $snls=['null'];
        }
        $vertical=json_decode($data->vertical);
        if($vertical==null){
            $vertical=['null'];
        }
        $dnls=json_decode($data->dnls);
        if($dnls==null){
            $dnls=['null'];
        }

        $kansai=json_decode($data->kansai);
        if($kansai==null){
            $kansai=['null'];
        }
        $foa=json_decode($data->foa);
        if($foa==null){
            $foa=['null'];
        }
        $foa=json_decode($data->foa);
        if($foa==null){
            $foa=['null'];
        }
        $snap=json_decode($data->snap);
        if($snap==null){
            $snap=['null'];
        }
        $bt=json_decode($data->bt);
        if($bt==null){
            $bt=['null'];
        }
        $cs=json_decode($data->cs);
        if($cs==null){
            $cs=['null'];
        }


       // return $data;
        if($data){
            return view('operator_skill_metrix.edit',['data'=>$data,
            'floors'=>$floors,
            'lines'=>$lines,
            'operators'=>$operators,
            'designations'=>$designations,
            'ol' => $ol,
            'snls' => $snls,

            'vertical' => $vertical,
            'dnls' => $dnls,
            'kansai' =>$kansai,
            'foa' => $foa,
            'snap' => $snap,
            'bh' => $bt,
            'bt' => $bt,
            'cs' => $cs,


        ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperatorSkillMetrix  $operatorSkillMetrix
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
        $this->validate($request, [
            'line_id' => 'required',
            'floor_id' => 'required',
            'operator_id' => 'required',
            'designation_id' => 'required',

        ]);
        $operatorSkillMetrix = [
            'created_by' => Auth::user()->id,
            'floor_id' => $request->floor_id,
            'line_id' => $request->line_id,
            'operator_id' => $request->operator_id,
            'designation_id' => $request->designation_id,
            'join_date' => $request->join_date,
            'salary' => $request->salary,
            'propose_salary' => $request->propose_salary,
            'ol' => json_encode($request->ol),
            'ol_performance' => $request->ol_performance,
            'snls' => json_encode($request->snls),
            'snls_performance' => $request->snls_performance,

            'vertical' => json_encode($request->vertical),
            'vertical_performance' => $request->vertical_performance,

            'dnls' => json_encode($request->dnls),
            'dnls_performance' => $request->dnls_performance,

            'kansai' => json_encode($request->kansai),
            'foa' => json_encode($request->foa),
            'snap' => json_encode($request->snap),
            'bh' => json_encode($request->bh),
            'bt' => json_encode($request->bt),
            'cs' => json_encode($request->cs),


            'performance' => $request->performance,
            'main_process' => $request->main_process,
            'present_work' => $request->present_work,
        ];
      $status=  OperatorSkillMetrix::where('id', $id)->update($operatorSkillMetrix);
      if($status){

        return redirect()->route('operator_skill_metrix')->with(['success' => 'Successfully Updated!']);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperatorSkillMetrix  $operatorSkillMetrix
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $OperatorSkillMetrix=  OperatorSkillMetrix::find($id);
        if($OperatorSkillMetrix){
            $status = $OperatorSkillMetrix->delete();
            if($status){
                return back()->with(['success' => 'Successfully Deleted !']);
            }
            else{
                return back()->with('error', 'Please Try Again');
            }

          }else{
            return back()->with('error', 'Data Not Faound');
          }
    }

    public function report(){
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
       // return $lines;
        $operators = Operator::whereStatus(1)->get();
        return view('operator_skill_metrix.report', compact('floors', 'lines','operators'));
    }
    public function report_view(Request $request){
       // return $request->all();

        $searchParams = $request->all();

        $purchaseQuery = OperatorSkillMetrix::query();

        $floor_id = Arr::get($searchParams, 'floor_id', '');
        $line_id = Arr::get($searchParams, 'line_id', '');


        if ($searchParams == null) {
            return 'Data  Not Found';
        }
        if (!empty($searchParams)) {
            $purchaseQuery
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id);

        }


        $obj = $purchaseQuery->with('line','floor','operator','designation')->paginate(10);
        return view('operator_skill_metrix.report_view',compact('obj'));
    }
}
