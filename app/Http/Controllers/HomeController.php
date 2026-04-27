<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function __construct(
        protected ProjectService $projectService
    ) {}

    public function index()
    {
        $featuredProjects = $this->projectService
            ->getFeaturedProjects();

        $featuredSkills = Skill::query()
            ->featured()
            ->ordered()
            ->get();

        $experiences = Experience::query()
            ->orderByDesc('start_date')
            ->get();

        $siteSetting = SiteSetting::query()->first();

        return view('pages.home', compact(
            'featuredProjects',
            'featuredSkills',
            'experiences',
            'siteSetting'
        ));
    }
}