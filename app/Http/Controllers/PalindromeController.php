<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalindromeController extends Controller
{
    public function view()
    {
        return view('palindrome.palindrome-interface',['palindrome'=>'']);

    }

    public function check_palindrome(Request $request)
    {
        $validated = $request->validate([
            'palindrome_string' => 'required|max:255',            
        ]);

        $palindrome_string=$request->palindrome_string;
        $length = strlen($palindrome_string);
        if ($length < 2)
        {
            return view('palindrome.palindrome-interface',['palindrome'=>$palindrome_string." (Single character is always a palindrome)"]);
   
   
        }
        $maxLength=1;
       
        $start = 0;
        $lower;
        $upper;
        for ($i = 0; $i < $length; $i++) {
            $lower = $i - 1;
            $upper = $i + 1;
            while ($upper < $length
                   && $palindrome_string[$upper] == $palindrome_string[$i])
                $upper++;
     
            while ($lower >= 0
                   && $palindrome_string[$lower] == $palindrome_string[$i]) // decrement 'low'
                $lower--;
     
            while ($lower >= 0 && $upper < $length
                   && $palindrome_string[$lower] == $palindrome_string[$upper]) {
                $lower--;
                $upper++;
            }
     
            $cal_length = $upper - $lower - 1;
            if ($maxLength < $cal_length) {
                $maxLength = $cal_length;
                $start = $lower + 1;
            }
        }
     
        $longest_palindrome=substr($palindrome_string, $start, $maxLength);
        return view('palindrome.palindrome-interface',['palindrome'=>$longest_palindrome]);
   
   
}




}
