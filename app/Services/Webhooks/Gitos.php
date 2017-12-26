<?php
namespace webhook\Services\Webhooks;

use Illuminate\Http\Request;

/**
 * 开源中国处理push
 * @author flyspring
 *
 */
class Gitos implements WebhookInterface
{
    use Webhook;
    
    private $config;
    private $projects;

    public function __construct($config, $projects)
    {
        $this->config = $config;
        $this->projects = $projects;
    }
    
    /**
     * 核查请求是否正确
     * @see \webhook\Services\Webhooks\WebHookInterface::checkRequest()
     */
    public function checkRequest(Request $request)
    {
        $password = $request->input('password');
        return $this->getSecret() == $password;
    }
    
    /**
     * 处理push响应，返回project
     * @see \webhook\Services\Webhooks\WebHookInterface::handlePush()
     */
    public function handlePush(Request $request)
    {
        $input = $request->input();
        
        if (empty($input['hook_name']) || $input['hook_name'] != 'push_hooks') {
            return false;
        }
        
        $arrProject = $input['project'];
        $projectName = $arrProject['name'];
        if (!$this->isExistProject($projectName)) {
            return false;
        }
        
        $branch = $this->getBranch($projectName);
        $ref = $input['ref'];
        if (strpos($ref, $branch) === false) {
            return false;
        }
        
        $url = $this->getGitUrl($arrProject['git_http_url']);
        $path = $this->getPath($projectName);
        $commitId = $input['after'];
        return new Project($projectName, $commitId, $path, $branch, $url);
    }
}