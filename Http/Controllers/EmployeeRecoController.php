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

class EmployeeRecoController extends Controller
{
    public function index(Request $request){
        $users = User::where('role', 1)->get();
        $auth_user_id = auth()->user()->id;

        $users_score = [];
        $skillArray = [];

        foreach ($users as $user) {
            $job = Job::where('employer_id', $user->id)->first();

            if ($job) {
                $jobskills = Jobskill::where('job_id', $job->id)->get();
                $count = count($jobskills);

                $skillscore = 0;

                foreach (Userskill::where('user_id', $auth_user_id)->get() as $uskill) {
                    foreach ($jobskills as $jskill) {
                        if (Str::lower($uskill['title']) == Str::lower($jskill['title'])) {
                            $skillscore += 1;
                            break; // Break the inner loop once a match is found
                        }
                    }
                }

                $skillcompatibility = ($count > 0) ? $skillscore / $count : 0;

                $educationscore = 0;

                foreach (Usereducation::where('user_id', $auth_user_id)->get() as $ueducation) {
                    if ($job['education_level'] == $ueducation['level']) {
                        $educationscore += 1;
                    }
                }
                $educationcompatibility = $educationscore;

                $expcompatibility = 0;

                foreach(Userexperience::where('user_id',  $auth_user_id)->get() as $uexp){
                    if(Str::lower($uexp['position']) == Str::lower( $job['title'])){ 
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

                if ($overallscore > 0.6) {
                    $users_score[$user->id] = $overallscore;
                }

                array_push($skillArray, $skillscore);
            }
        }

        $newusers = User::whereIn('id', array_keys($users_score))->where('role', 1)->get();

        return view('employee.recommend.index', [
            'users' => $newusers,
            'users_score' => $users_score,
        ]);
    }
}