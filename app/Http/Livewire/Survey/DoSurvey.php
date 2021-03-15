<?php

namespace App\Http\Livewire\Survey;

use App\Models\Section;
use App\Models\Survey;
use App\Models\SurveyDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        'responses.*.file' => 'image|max:1024',
    ];

    public function mount()
    {


    }
    public function render()
    {
        $this->sections = Section::with(['questions.answers'])->whereHas('questions',function ($q){
            $q->where('is_active',1);
        })->get();

        $last_survey = $this->outlet->latest_survey[0] ?? [];

        if($last_survey)
        {
            $data = $last_survey;
            foreach ($data->details as $detail) {
                $this->prevResponses[$detail->question_id] = (object) ['response'=>$detail->response, 'index'=>$detail->index];
            }

        }
        return view('livewire.survey.do-survey');
    }

    public function save()
    {

        $this->validate();

        DB::beginTransaction();

        $survey = Survey::create([
            'user_id'=>Auth::id(),
            'cluster_id'=>$this->outlet->cluster_id,
            'dealer_id'=>$this->outlet->dealer_id,
            'outlet_id'=>$this->outlet->id,
            'pic_name'=>$this->pic_name,
            'pic_contact'=>$this->pic_contact,
            'note'=>$this->note]);
        $data = [];

        foreach ($this->responses as $question_id => $response)
        {
            $text = 'no response';
            $index = 0;
            $prevIndex = $this->prevResponses[$question_id]['index'] ?? 0;

            if (isset($response['radio']))
            {
                $responseObject = json_decode($response['radio']);
                $text = $responseObject->text;
                $index = $responseObject->index;
            }
            if (isset($response['text']))
            {
                $text = $response['text'];
                $index = 1;
            }
            if (isset($response['number']))
            {
                $text = $response['number'];
                $index = $response['number'];
            }
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

                $text = $imageName;
                $index = 1;

            }

            if ($index > $prevIndex)
            {
                $status = 'better';
            }elseif ($index < $prevIndex)
            {
                $status = 'worst';
            }else
            {
                $status = 'state';
            }
            array_push($data, [
                'survey_id'=>$survey->id,
                'question_id'=>$question_id,
                'response'=>$text,
                'index'=>$index,
                'status'=>$status,
                'created_at'=>now()
            ]);
        }

        SurveyDetail::insert($data);


        DB::commit();

        return redirect(route('surveyor.index'));


    }
}
