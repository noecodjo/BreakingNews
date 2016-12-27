<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return "This is PagesController@index";
    }

    public function show(){
        return "This is PagesController@show";
    }

    public function about(){
        $first = 'Chatri';
        $last = 'Ngambenchawong';
        $skills = ['HTML5', 'CSS3', 'Laravel5', 'CakePHP'];
        return view('pages.about')->withFirst($first)
                                  ->withLast($last)
                                  ->withSkills($skills);
    }

    public function contact(){
        $first = 'Chatri';
        $last = 'Ngambenchawong';
        $contact = 'pingkunga [AT] afterfmail [dot] com';
        return view('pages.contact')->withFirst($first)
                                  ->withLast($last)
                                  ->withContact($contact);
    }
}
