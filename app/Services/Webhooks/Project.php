<?php
namespace webhook\Services\Webhooks;

/**
 * git project 信息
 * @author flyspring
 *
 */
class Project
{
    private $attributes;
    
    public function __construct($name, $commitId, $path, $branch, $url)
    {
        $this->attributes = [
            'name' => $name,
            'commit_id' => $commitId,
            'path' => $path,
            'branch' => $branch,
            'url' => $url
        ];
    }
    
    public function __get($key)
    {
        return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
    }
    
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
    
    public function __toString()
    {
        return implode(':', $this->attributes);
    }
    
    public function all()
    {
        return $this->attributes;
    }
}