<?php

namespace App\Services\Shared\Format;

class FormatService
{

    function getYoutubeThumbnail($url, $quality = 'high')
    {
        if ($url) {
            $video_id = null;
            $thumbnail = null;
            $result = null;
    
            if (preg_match('/youtube\.com.*(\?v=|\/embed\/)(.{11})/', $url, $result)) {
                $video_id = array_pop($result);
            } elseif (preg_match('/youtu.be\/(.{11})/', $url, $result)) {
                $video_id = array_pop($result);
            }
    
            if ($video_id) {
                $quality_key = 'maxresdefault'; // Max quality
    
                if ($quality == 'low') {
                    $quality_key = 'sddefault';
                } elseif ($quality == 'medium') {
                    $quality_key = 'mqdefault';
                } elseif ($quality == 'high') {
                    $quality_key = 'hqdefault';
                }
    
                $thumbnail = "http://img.youtube.com/vi/{$video_id}/{$quality_key}.jpg";
                return $thumbnail;
            }
        }
        return false;
    }
}
