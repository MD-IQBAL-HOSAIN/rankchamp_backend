<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     /* privacy policy start */
    public function editprivacy($slug)
    {
        $PrivacyPolicy = PrivacyPolicy::where('slug', $slug)->firstOrFail();
        return view('backend.layout.cms.privacy.index', compact('PrivacyPolicy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function privacyupdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $PrivacyPolicy = PrivacyPolicy::where('slug', $request->slug)->firstOrFail();
        $PrivacyPolicy->title = $request->title;
        $PrivacyPolicy->description = $request->description;

        $PrivacyPolicy->slug = Str::slug($request->title);  // Update slug based on title

        $PrivacyPolicy->save();

        return redirect()->route('privacy.edit', ['slug' => $PrivacyPolicy->slug])
            ->with('t-success', 'privacy updated successfully.');
    }

      /* privacy policy end */


      /* terms and condition start */
 public function editterms($slug)
    {
        $terms = PrivacyPolicy::where('slug', $slug)->firstOrFail();
        return view('backend.layout.cms.privacy.terms', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function termsupdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $terms = PrivacyPolicy::where('slug', $request->slug)->firstOrFail();
        $terms->title = $request->title;
        $terms->description = $request->description;

        $terms->slug = Str::slug($request->title);  // Update slug based on title

        $terms->save();

        return redirect()->route('terms.edit', ['slug' => $terms->slug])
        ->with('t-success', 'terms updated successfully.');
    }
      /* terms and condition end */
}
