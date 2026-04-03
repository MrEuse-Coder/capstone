<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvaluationTemplate extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $template = Template::first();
        return view ('dashboard.evaluation-template.create', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'header_logo' => 'nullable','image',
            'footer_logo' => 'nullable','image',
            'bachelors_degree' => 'string|max:255',
            'curriculum' => 'string|max:255',
            'department' => 'string|max:255',
            'address' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'string|max:255',
        ]);

        $template = Template::first();

        $data = [
            'bachelors_degree' => $request->bachelors_degree,
            'curriculum' => $request->curriculum,
            'department' => $request->department,
            'address' => $request->address,
            'email' => $request->email,
            'phone'=> $request->phone,
        ];

        if($request->hasFile('header_logo')){
            if($template && $template->header_logo){
                Storage::disk('public')->delete($template->header_logo);
            }

            $data['header_logo'] = $request->file('header_logo')->store('images', 'public');
        }

        if($request->hasFile('footer_logo')){
            if($template && $template->footer_logo){
                Storage::disk('public')->delete($template->footer_logo);
            }

            $data['footer_logo'] = $request->file('footer_logo')->store('images', 'public');
        }



        Template::updateOrCreate(
            ['id' => $template?->id ?? null],
           $data
        );

        return redirect('/dashboard/evaluation_template')->with('success', 'Template updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
