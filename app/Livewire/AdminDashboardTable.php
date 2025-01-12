<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboardTable extends Component
{
    public $posts,$postsDraft, $users, $rss, $rssPost;
    public function mount($posts, $postsDraft, $users, $rss, $rssPost) {
        $this->posts = $posts;
        $this->postsDraft = $postsDraft;
        $this->users = $users;
        $this->rss = $rss;
        $this->rssPost = $rssPost;
    }
    public function placeholder()
    {
        return view('livewire_lazy_load.admin_dashboard_table');
    }
    public function render()
    {
        return view('livewire.admin-dashboard-table');
    }
}
