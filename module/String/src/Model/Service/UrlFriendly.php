<?php
namespace String\Model\Service;

class UrlFriendly
{
    public function getUrlFriendly($string)
    {
        // Remove apostrophes.
        $string = preg_replace('/\'/', '', $string);

        // Replace any non-alphanumerics with a hyphen.
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);

        // Replace two or more consecutive hyphens with a single hyphen.
        $string = preg_replace('/-{2,}/', '-', $string);

        // Trim hyphens from beginning and end of string.
        $string = trim($string, '-');

        return $string;
    }
}
