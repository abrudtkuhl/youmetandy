<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\VisitorCounter;

class VisitorCounterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:count {action=show : Action to perform (show|reset|increment)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage the visitor counter';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');
        
        switch ($action) {
            case 'show':
                $count = VisitorCounter::get();
                $this->info("Current visitor count: " . number_format($count));
                break;
                
            case 'reset':
                $count = VisitorCounter::reset();
                $this->info("Visitor counter reset! New count: " . number_format($count));
                break;
                
            case 'increment':
                $count = VisitorCounter::increment();
                $this->info("Visitor count incremented! New count: " . number_format($count));
                break;
                
            default:
                $this->error("Invalid action. Use: show, reset, or increment");
                return 1;
        }
        
        return 0;
    }
}
