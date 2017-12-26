<?php

namespace webhook\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use webhook\Services\Webhooks\Project;
use webhook\Services\Scripts\Runner;
use Symfony\Component\Process\Process;
use Log;

class UpdateProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $project;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Runner $runner)
    {
        $output = '';
        $runner->setScript('deploy.UpdateProject', $this->getTokens())
               ->run(function($type, $line) use (&$output) {
                  if ($type === Process::ERR) {
                      $output .= $line;
                  } else {
                      $output .= $line;  //这里可以进行格式化处理
                  }
               });
               
        if (!$runner->isSuccessful()) {
            $this->logError($output. '---' . $runner->getErrorOutput());
            //$this->logError($runner->getScript());
        } else {
            $this->logInfo('success');
        }      
    }
    
    /**
     * 记录信息日志
     * @param string $msg
     */
    private function logInfo($msg)
    {
        Log::info($this->project . ':' . $msg);
    }
    
    /**
     * 记录错误日志
     * @param string $msg
     */
    private function logError($msg)
    {
        Log::error($this->project . ':' . $msg);
    }
    
    /**
     * 获取填充的参数
     */
    private function getTokens()
    {
        return $this->project->all();
    }
}
