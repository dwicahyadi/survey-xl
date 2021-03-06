<?php

namespace App\Http\Livewire\Survey;

use App\Models\Section;
use App\Models\Survey;
use App\Models\SurveyDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class DoSurvey extends Component
{
    use WithFileUploads;
    const STORE_FOLDER = 'public/survey/';
    const URL_TARGET = 'storage/survey/';

    public $outlet;
    public $prevResponses;
    public $pic_name, $pic_contact, $note;
    public $sections;
    public $responses = [];

    protected $rules = [
        'pic_name' => 'required',
        'pic_contact' => 'required',
        'responses' => 'required',
        'responses.*.*' => 'required',
        'responses.*.file' => 'image|max:1024',
    ];

    public function mount()
    {
        $this->sections = Section::with(['questions.answers'])->whereHas('questions',function ($q){
            $q->where('is_active',1);
        })->get();

    }
    public function render()
    {
        return view('livewire.survey.do-survey');
    }

    public function save()
    {
        $this->validate();
        $survey = Survey::create([
            'user_id'=>Auth::id(),
            'cluster_id'=>$this->coutlet->luster_id,
            'dealer_id'=>$this->outlet->dealer_id,
            'outlet_id'=>$this->outlet->outlet_id,
            'pic_name'=>$this->pic_name,
            'pic_contact'=>$this->pic_contact,
            'note'=>$this->note]);
        $data = [];
        foreach ($this->responses as $question_id => $response)
        {
            if(isset($response['file']))
            {
                /*$file = $response['file'];
                $name = Carbon::now().$file->getClientOriginalName();
                $file->storeAs(self::STORE_FOLDER, $name);*/

                $image = $response['file'];
                $imageName = date('ymd').substr(uniqid(rand(), true), 8, 8) . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image->getRealPath())->encode('jpg', 65)->resize(760, null, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                $compressedImage->stream(); // <-- Key point
                Storage::disk('local')->put(self::STORE_FOLDER . $imageName, $compressedImage, 'public');

                $response['value'] =  $imageName;

            }
            array_push($data, ['survey_id'=>$survey->id,'question_id'=>$question_id, 'response'=>$response['value']]);
        }

        SurveyDetail::insert($data);

        return redirect(route('surveyor.index'));


    }
}
