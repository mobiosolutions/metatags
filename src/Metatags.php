<?php

namespace mobiosolutions\metatags;

/* A Laravel package to fetch webpage metadata ( Open Graph | Twitter | Facebook | Article ) */

use DOMDocument;
use DOMXPath;

/**
 * Metatag class is to get Metadata from webpage URL
 * 
 * @category PHP_Class
 * @package  Metatags
 * @author   Nishit Maheta <nishit.maheta@mobiosolutions.com>
 */
class Metatags
{

    /**
     * Get Meta data from URL
     * 
     * @param string  $url 
     * @param boolean $onlyOGMetatags get only og metatags
     * 
     * @return array 
     */
    function get( $url, $onlyOGMetatags = false )
    {
        $html = $this->getMetaContents($url);
        
        $doc = new DomDocument();
        @$doc->loadHTML($html);

        $xpath = new DOMXPath($doc);

        if(!$onlyOGMetatags)
        {
            $metaQuery = '//*/meta';
        }else{
            $metaQuery = '//*/meta[starts-with(@property, \'og:\')]';
        }
        
        $mMetas = $xpath->query($metaQuery);
        $mmetas = array();
    
        foreach ($mMetas as $meta) {
            $key = $meta->getAttribute('name');
            $value = $meta->getAttribute('value'); 
    
            if( empty($key) ) {
                $key = $meta->getAttribute('property');
            }
    
            if( empty($key) ) {
                $key = $meta->getAttribute('itemprop');
            }
    
            if( !empty($key) ) {
                if(empty($value)) {
                    $value = $meta->getAttribute('content');
                }
                $mmetas[$key] = $value;
            }
        }
    
        return $mmetas;
    }

    /** 
     *  Get contenet from url using CURL
     *
     * @param string $url 
     * 
     * @return object 
     */
    protected function getMetaContents($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FAILONERROR, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}