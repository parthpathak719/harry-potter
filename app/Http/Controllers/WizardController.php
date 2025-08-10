<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Option;
use App\Models\Question;
use App\Models\Wizard;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class WizardController extends Controller
{
    public function welcome(){
    return view('welcome');
    }
    
    public function platform(){
        return view('platform');
    }

    public function kingcross(){
        return view('kingcross');
    }

    public function houses(){
        $houses=House::all();
        return view('houses',['houses'=>$houses]);
    }


    public function wizards($id){
       $wizards=Wizard::where('house_id',$id)->orderBy('name','asc')->with('house')->get();
        return view('wizards',['wizards'=>$wizards]);
    }
    public function edit($id){
        $wizard=Wizard::findorFail($id);
        $houses=House::all();
        return view('edit',['wizard'=>$wizard,'houses'=>$houses]);
    }
    public function editAction(Request $request,$id){
        $wizard=Wizard::findorFail($id);
        $validated=$request->validate([
            'name'=>['required','string','min:3','max:100',Rule::unique('wizards')->ignore($wizard->id),'regex:/^[a-zA-Z- ]*$/'],
            'type'=>'required|string|min:3|max:100|regex:/^[a-zA-Z- ]*$/',
            'house'=>'required|exists:houses,id',
            'wand'=>'required|string|min:3|max:100|regex:/^[a-zA-Z\s\-.,:\'"()]+$/',
            'specialisation'=>'required|string|min:3|max:500|regex:/^[a-zA-Z\s\-.,:\'"()]+$/',
            'patronus'=>'required|string|min:3|max:100|regex:/^[a-zA-Z- ]*$/',
            'title'=>'required|string|min:3|max:500|regex:/^[a-zA-Z\s\-.,:\'"()]+$/',
            'bio'=>'required|string|min:3|max:1000',
            'quote'=>'nullable|string|max:500',
            'image'=>'required|url|min:10|max:500',
            'background_image'=>'required|url|min:10|max:500'
        ]);
        $validated['house_id']=$validated['house'];
        unset($validated['house']);
        $wizard->update($validated);
        return redirect()->route('wizards',['id'=>$validated['house_id']])->with('success','Sorcerer Modified Successfully!!');
    }
    public function destroy($id1,$id2){
        $wizard=Wizard::findorFail($id1);
        $wizard->delete();
        return redirect()->route('wizards',['id'=>$id2])->with('success','Sorcerer Deleted Successfully!!');
    }


    public function details($id){
        $details=Wizard::findOrFail($id);
        return view('details',['details'=>$details]);
    }


    public function recruit(){
        $houses=House::all();
        return view('recruit',['houses'=>$houses]);
    }
    public function recruitAction(Request $request){
        $validated=$request->validate([
            'name'=>'required|string|min:3|max:100|unique:wizards,name|regex:/^[a-zA-Z- ]*$/',
            'type'=>'required|string|min:3|max:100|regex:/^[a-zA-Z- ]*$/',
            'house'=>'required|exists:houses,id',
            'wand'=>'required|string|min:3|max:100|regex:/^[a-zA-Z\s\-.,:\'"()]+$/',
            'specialisation'=>'required|string|min:3|max:500|regex:/^[a-zA-Z\s\-.,:\'"()]+$/',
            'patronus'=>'required|string|min:3|max:100|regex:/^[a-zA-Z- ]*$/',
            'title'=>'required|string|min:3|max:500|regex:/^[a-zA-Z\s\-.,:\'"()]+$/',
            'bio'=>'required|string|min:3|max:1000',
            'quote'=>'nullable|string|max:500',
            'image'=>'required|url|min:10|max:500',
            'background_image'=>'required|url|min:10|max:500'
        ]);
        $validated['house_id']=$validated['house'];
        unset($validated['house']);
        Wizard::create($validated);
        return redirect()->route('wizards',['id'=>$validated['house_id']])->with('success','Sorcerer Recruited Successfully!!');
    }

    public function cast(){
        return view('cast');
    }

    public function quiz(){
        $questions=Question::with('option')->inRandomOrder()->limit(10)->get();
        return view('quiz',['questions'=>$questions]);
    }
    public function quizAction(Request $request){
        $answers=$request->input('answers');
        $score=0;
        $total=count($answers);
        $results=[];

        foreach ($answers as $questionId => $optionId) {
            $selectedOption = Option::find($optionId);
            $question = $selectedOption->question;
            $correctOption = $question->option->where('is_correct', true)->first(); // gets correct answer
            
            $isCorrect = $selectedOption && $selectedOption->is_correct;
            if ($isCorrect) $score++;
            
            $results[] = [
                'question' => $question->question_text,
                'selected' => $selectedOption->option_text,
                'correct' => $isCorrect ? '✔️ Correct' : '❌ Wrong',
                'correct_answer' => $correctOption->option_text, // NEW
            ];
        }

        return view('quizAction', ['score'=>$score,'total'=>$total,'results'=>$results]);
    }
}
