<?php namespace App\Http\Controllers;

use App\Term;

class TermsController extends Controller
{

    public function index()
    {
        return Term::all();
    }

    public function verify(Term $term)
    {
        $term->update([
          'verified' => ! $term->verified,
        ]);

        return $term;
    }
}