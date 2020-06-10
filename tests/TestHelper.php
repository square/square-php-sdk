<?php
namespace Square\Tests;

use Square\ApiHelper;
use \apimatic\jsonmapper\JsonMapper;

/**
 * Configure Test Constants
 */
define("REQUEST_TIMEOUT", 30);
define("ASSERT_PRECISION", 0.01);

/**
 * Contains utility methods for comparing objects and arrays
 */
class TestHelper
{
    /**
     * Check whether the response array contains all expected values
     * @param  array  $expected  The expected values
     * @param  array  $response    The response from the endpoint call
     */
    public static function isArraySubset(
        array $expected,
        array $response
    ) {
        foreach (array_values($expected) as $eK => $eV) {
            $found = false;
            foreach (array_values($response) as $rK => $rV) {
                if ($eV == $rV)
                    $found = true;
            }
            if ($found == false) {
                throw new \Exception("Response array is missing values");
            }
        }
    }

    /**
     * Recursively check whether the leftTree is a proper subset of the right tree
     * @param   array   $leftTree       Left tree
     * @param   array   $rightTree      Right tree
     * @param   boolean $checkValues    Check primitive values for equality?
     * @param   boolean $allowExtra     Are extra elements allowed in right array?
     * @param   boolean $isOrdered      Should elements in right be compared in order to left?
     * @return  boolean                 True if leftTree is a subset of rightTree
     */
    public static function isProperSubsetOf(
        array $leftTree = null,
        array $rightTree = null,
        $checkValues,
        $allowExtra,
        $isOrdered
    ) {
    
        if ($leftTree == null) {
            return true;
        }

        for ($iterator = new \ArrayIterator($leftTree); $iterator->valid(); $iterator->next()) {
            $key = $iterator->key();
            $leftVal = $leftTree[$key];
            $rightVal = $rightTree[$key];

            // Check if key exists
            if (!array_key_exists($key, $rightTree)) {
                return false;
            }
            if (static::isAssoc($leftVal)) {
                // If left value is tree, right value should be be tree too
                if (static::isAssoc($rightVal)) {
                    if (!static::isProperSubsetOf(
                        $leftVal,
                        $rightVal,
                        $checkValues,
                        $allowExtra,
                        $isOrdered
                    )) {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                // Value comparison if checkValues
                if ($checkValues) {
                    // If left value is a primitive, check if it equals right value
                    if (is_array($leftVal)) {
                        if (!is_array($rightVal)) {
                            return false;
                        }
                        if (count($leftVal) > 0 && static::isAssoc($leftVal[0])) {
                            if (!static::isArrayOfJsonObjectsProperSubsetOf(
                                $leftVal,
                                $rightVal,
                                $checkValues,
                                $allowExtra,
                                $isOrdered
                            )) {
                                return false;
                            }
                        } else {
                            if (!static::isListProperSubsetOf(
                                $leftVal,
                                $rightVal,
                                $allowExtra,
                                $isOrdered
                            )) {
                                return false;
                            }
                        }
                    } elseif (!$leftVal == $rightTree[$key] && !$leftVal == null) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
    
    /**
     * Recursively check whether the left JSON object is a proper subset of the right JSON object
     * @param   array   $leftObject     Left JSON object as string
     * @param   array   $rightObject    Right JSON object as string
     * @param   boolean $checkValues    Check primitive values for equality?
     * @param   boolean $allowExtra     Are extra elements allowed in right array?
     * @param   boolean $isOrdered      Should elements in right be compared in order to left?
     * @return  boolean                 If Json object is a subset
     */
    public static function isJsonObjectProperSubsetOf(
        $leftObject,
        $rightObject,
        $checkValues,
        $allowExtra,
        $isOrdered
    ) {
    
        return static::isProperSubsetOf(
            ApiHelper::deserialize($leftObject),
            ApiHelper::deserialize($rightObject),
            $checkValues,
            $allowExtra,
            $isOrdered
        );
    }
    
    /**
     * Check if left array of objects is a subset of right array
     * @param   array   $leftObject     Left array as a JSON string
     * @param   array   $rightObject    Right array as a JSON string
     * @param   boolean $checkValues    Check primitive values for equality?
     * @param   boolean $allowExtra     Are extra elements allowed in right array?
     * @param   boolean $isOrdered      Should elements in right be compared in order to left?
     * @return  boolean                 True if it is a subset
     */
    public static function isArrayOfStringifiedJsonObjectsProperSubsetOf(
        $leftObject,
        $rightObject,
        $checkValues,
        $allowExtra,
        $isOrdered
    ) {
    
        // Deserialize left and right objects from their respective strings
        $left = ApiHelper::deserialize($leftObject);
        $right = ApiHelper::deserialize($rightObject);
        
        return static::isArrayOfJsonObjectsProperSubsetOf(
            $left,
            $right,
            $checkValues,
            $allowExtra,
            $isOrdered
        );
    }

    /**
     * Check if left array of objects is a subset of right array
     * @param   array   $left           Left array as a JSON string
     * @param   array   $right          Right array as a JSON string
     * @param   boolean $checkValues    Check primitive values for equality?
     * @param   boolean $allowExtra     Are extra elements allowed in right array?
     * @param   boolean $isOrdered      Should elements in right be compared in order to left?
     * @return  boolean                 True if it is a subset
     */
    public static function isArrayOfJsonObjectsProperSubsetOf(
        $left,
        $right,
        $checkValues,
        $allowExtra,
        $isOrdered
    ) {
    
        // Return false if size different and checking was strict
        if (!$allowExtra && count($left) != count($right)) {
            return false;
        }
        
        // Create list iterators
        $leftIter = (new \ArrayObject($left))->getIterator();
        $rightIter = (new \ArrayObject($right))->getIterator();
        
        // Iterate left list and check if each value is present in the right list
        while ($leftIter->valid()) {
            $leftIter->next();
            $leftTree = $leftIter->current();
            $found = false;
            
            // If order is not required, then search right array from beginning
            if (!$isOrdered) {
                $rightIter->rewind();
            }
            
            // Check each right element to see if left is a subset
            while ($rightIter->valid()) {
                $rightIter->next();
                if (static::isProperSubsetOf(
                    $leftTree,
                    $rightIter->current(),
                    $checkValues,
                    $allowExtra,
                    $isOrdered
                )) {
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Check whether the a list is a subset of another list
     * @param   array   $leftList   Expected List
     * @param   array   $rightList  List to check
     * @param   boolean $allowExtra Are extras allowed in the list to check?
     * @param   boolean $isOrdered  Should checking be in order?
     * @return  boolean             True if leftList is a subset of rightList
     */
    public static function isListProperSubsetOf(
        array $leftList,
        array $rightList,
        $allowExtra,
        $isOrdered
    ) {
    
        if ($isOrdered && !$allowExtra) {
            return $leftList === $rightList;
        } elseif ($isOrdered && $allowExtra) {
            return array_slice($rightList, 0, count($leftList)) === $leftList;
        } elseif (!$isOrdered && !$allowExtra) {
            return count($leftList) == count($rightList) &&
                array_intersect($leftList, $rightList) == $leftList;
        } elseif (!$isOrdered && $allowExtra) {
            return array_intersect($leftList, $rightList) == $leftList;
        }
        return true;
    }
    
    /**
     * Recursively check whether the left headers map is a proper subset of
     * the right headers map. Header keys & values are compared case-insensitive.
     *
     * @param  array    $leftTree       Left headers map
     * @param  array    $rightTree      Right headers map
     * @param  boolean  $checkValues    Check header values for equality?
     * @return boolean                  True if leftTree is a subset of rightTree
     */
    public static function areHeadersProperSubsetOf(
        array $leftTree,
        array $rightTree,
        $checkValues
    ) {
    
        // Http headers are case-insensitive
        $l = array_change_key_case($leftTree);
        $r = array_change_key_case($rightTree);

        return static::isProperSubsetOf($l, $r, $checkValues, true, false);
    }

    /**
     * Is array associative?
     * @param  mixed   $array Input
     * @return boolean        True if associative array
     */
    public static function isAssoc($array)
    {
        if (!is_array($array)) {
            return false;
        }

        // Keys of the array
        $keys = array_keys($array);

        // If the array keys of the keys match the keys, then the array must
        // not be associative (e.g. the keys array looked like {0:0, 1:1...}).
        return array_keys($keys) !== $keys;
    }

    /**
     * Downloads and gets a local path to a file URL.
     * Subsequent calls to the same URL will get the cached file.
     * @param  string $url URL of the file to download
     * @return string      Local path to the file
     */
    public static function getFile($url)
    {
        $filename = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "sdktests" . sha1($url) . "tmp";
        if (!file_exists($filename)) {
            file_put_contents($filename, fopen($url, 'r'));
        }
        return $filename;
    }

    /**
     * Fetches a file using getFile() and creates a Filewrapper instance.
     * @param  string $url URL of the file to download
     * @return string      FileWrapper instance
     */
    public static function getFileWrapper($url): \Square\Utils\FileWrapper
    {
        return \Square\Utils\FileWrapper::createFromPath(static::getFile($url));
    }

    /**
     * Downloads and gets contents of a  file URL.
     * Subsequent calls to the same URL will get the cached file.
     * @param  string $url URL of the file to download
     * @return binary      File contents
     */
    public static function getFileContents($url)
    {
        return file_get_contents(static::getFile($url));
    }

    /**
     * Get a new JsonMapper instance for mapping objects
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    public static function getJsonMapper()
    {
        $mapper = new JsonMapper();
        return $mapper;
    }
}
