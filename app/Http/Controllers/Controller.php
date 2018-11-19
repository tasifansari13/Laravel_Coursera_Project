<?php

namespace App\Http\Controllers;
//use GuzzleHttp\Client;

use App\Course;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // To fetch the course details
    public function index() {
      //$client = new \GuzzleHttp\Client();
      //$res = $client->request('GET', 'https://api.coursera.org/api/courses.v1');
      //$res = $client->get('https://api.coursera.org/api/courses.v1');
      //echo $res->getStatusCode(); // 200
      $str = file_get_contents('https://api.coursera.org/api/courses.v1');
      $res = json_decode($str, true); // decode the JSON into an associative array
      $result = ($res['elements']);
      return view('welcome', compact('result'));
    }

    // To save the course detaisl
    public function saveData(Request $request) {
      $courseId = $request['id'];
      $courseDetails = Course::where('course_id', $courseId)->first();
      if(!isset($courseDetails) || $courseDetails == '') {
        Course::create($request->all());
      }
      return redirect()->back()->with('success', ['Data saved successfully']);
    }

    public function viewData() {
      $result = Course::get();
      return view('viewData', compact('result'));
    }
}
