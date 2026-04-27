<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $projectService
    ) {}

    public function index()
    {
        $projects = $this->projectService
            ->getAllPublishedProjects();

        return view('pages.projects.index', compact('projects'));
    }

    public function show(string $slug)
    {
        $project = $this->projectService
            ->getProjectBySlug($slug);

        return view('pages.projects.show', compact('project'));
    }
}