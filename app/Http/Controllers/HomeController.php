<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SiteContent;

class HomeController extends Controller
{
    public function index()
    {
        $site = SiteContent::get('site', []);
        $about = SiteContent::get('about', []);
        $projects = SiteContent::get('projects', []);
        $writing = SiteContent::getWriting(10); // Dynamic RSS feeds
        $links = SiteContent::get('links', []);
        $contact = SiteContent::get('contact', []);
        $visitorCount = SiteContent::incrementVisitorCount();

        return view('welcome', compact('site', 'about', 'projects', 'writing', 'links', 'contact', 'visitorCount'));
    }
}
