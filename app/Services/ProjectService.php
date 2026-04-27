<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProjectService
{
    public function getFeaturedProjects(int $limit = 6): Collection
    {
        return Project::query()
            ->published()
            ->featured()
            ->ordered()
            ->take($limit)
            ->get();
    }

    public function getAllPublishedProjects(int $perPage = 9): LengthAwarePaginator
    {
        return Project::query()
            ->published()
            ->ordered()
            ->paginate($perPage);
    }

    public function getProjectBySlug(string $slug): Project
    {
        $project = Project::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $this->handleUniqueView($project);

        return $project;
    }

    protected function handleUniqueView(Project $project): void
    {
        $sessionKey = 'viewed_project_' . $project->id;

        if (!session()->has($sessionKey)) {
            $project->incrementViews();
            session()->put($sessionKey, true);
        }
    }
}