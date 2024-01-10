<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Jobskill;
use App\Models\User;
use App\Models\Usereducation;
use App\Models\Userexperience;
use App\Models\Userskill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserrecomenderController extends Controller
{
    public function index(Request $request){
        $skillcompatibility = 0;
        $educationcompatibility = 0;
        $expcompatibility = 0;
        $users = User::where('role', 0)->get();
        $job = Job::where('id', $request->job_id)->first();
        $jobskills = Jobskill::where('job_id', $request->job_id)->get();

        $count = 0;

        foreach($jobskills as $data){
            $count += 1;
        }
        $users_score = [];
        $skillArray = [];
        foreach($users as $user){
            $skillscore = 0;
            $educationscore = 0;
            foreach(Userskill::where('user_id', $user['id'])->get() as $uskill){
                foreach($jobskills as $jskill){
                    if(Str::lower($uskill['title']) == Str::lower($jskill['title'])){
                        $skillscore = $skillscore + 1;
                    }
                }
            }
            if($count>0){
                $skillcompatibility = $skillscore/$count;
            }
            else{
                $skillcompatibility = 0;
            }

            foreach(Usereducation::where('user_id', $user['id'])->get() as $ueducation){
                if($job['education_level'] == $ueducation['level']){
                    $educationscore += 1;
                }
            }
            $educationcompatibility = $educationscore;

            foreach(Userexperience::where('user_id', $user['id'])->get() as $uexp){
                if($uexp['position'] == $job['title']){
                    if($job['experience'] == 0){
                        $expcompatibility = $uexp['experience'];
                    }
                    elseif($uexp['experience']==$job['experience']){
                        $expcompatibility = 1;
                    }
                    elseif($uexp['experience']>$job['experience']){
                        $expcompatibility = $uexp['experience']/$job['experience'];
                    }
                    elseif($uexp['experience'] == 0){
                        $expcompatibility = 0;
                    }
                    else{
                        $expcompatibility = $uexp['experience']/$job['experience'];
                    }
                }
                else{
                    $expcompatibility = 0;
                }
            }

            $overallscore = ($skillcompatibility + $educationcompatibility + $expcompatibility) / 3;

            if($overallscore>0.6){
                $users_score[$user['id']] = $overallscore;
            }

            array_push($skillArray, $skillscore);
        }

        $newusers = User::whereIn('id', array_keys($users_score))->get();

        return view('employer.job.recommend.index', [
            'users' => $newusers,
            'users_score' => $users_score,
        ]);
    }
    }

