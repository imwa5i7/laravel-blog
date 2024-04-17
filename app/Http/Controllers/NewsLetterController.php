<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{

    public function __invoke(Newsletter $newsLetter){
        request()->validate(['email'=>'email|required']);
        try{
            $newsLetter->subscribe(request('email'));
        }catch(Exception $e){
            throw ValidationException::withMessages([
                'email'=> 'This email couldn\'t be added to our newsletter list',
            ]);
        }

        return redirect('/')->with('success','You are now signed up for our newsletter');

    }
}
