<?php
namespace webhook\Services\Webhooks;

trait Webhook
{
    /**
     * 获取接口验证秘钥
     * @return string
     */
    public function getSecret()
    {
        return isset($this->config['secret']) ? $this->config['secret'] : '';
    }
    
    /**
     * 获取分支名称
     * @return string
     */
    public function getBranch($projectName)
    {
        return isset($this->projects[$projectName]) ? $this->projects[$projectName]['branch'] : 'dev';
    }
    
    /**
     * 获取项目更新路径
     * @param string $projectName
     * @return string
     */
    public function getPath($projectName)
    {
        return isset($this->projects[$projectName]) ? $this->projects[$projectName]['path'] : '';
    }
    
    /**
     * 判断项目是否配置
     * @param string $projectName
     * @return bool
     */
    public function isExistProject($projectName)
    {
        return isset($this->projects[$projectName]);
    }
    
    /**
     * 获取可以访问的giturl
     * @param string $url
     */
    public function getGitUrl($url)
    {
        if (empty($this->config['usermail']) || empty($this->config['password'])) {
            return $url;
        }
        
        $replace = 'https://' . urlencode($this->config['usermail']) . ':' . urlencode($this->config['password']) . '@';
        return str_replace('https://', $replace, $url);
    }
}