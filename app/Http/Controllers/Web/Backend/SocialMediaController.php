<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('backend.layout.system_setting.social-media', compact('socialMedia'));
    }

    public function update(Request $request, $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        $validatedData = $request->validate([
            'link' => 'required|url',
            'status' => 'required|in:active,deactive',
        ]);

        $socialMedia->update($validatedData);

        return redirect()->route('social.media')->with('success', 'Social Media link updated successfully');
    }

    public function destroy($id)
{
    $socialMedia = SocialMedia::findOrFail($id);
    $socialMedia->delete();

    return redirect()->route('social.media')->with('success', 'Social Media link deleted successfully');
}

}
