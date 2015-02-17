<?php
namespace CantEscape;

use CantEscape\Exception\CantEscapeException as CantEscapeException;

const RULE_ENTRY_POINT = "check";
const RULE_LOC = "/Rules/";

class Rules
{
    protected function getRule($rule)
    {
        //Bring in the script for the rule requested
        //if it does not exist then return an error
        if(file_exists(__DIR__ . RULE_LOC . $rule . ".php")) {
            require_once RULE_LOC . $rule . ".php";
            return true;
        } else {
            throw new CantEscapeException("Either " . $rule . " is not a valid rule or the associated class file does not exist.");
            return false;
        }
    }
    
    protected function getRuleObject($rule)
    {
        $reflectionClass = new \ReflectionClass($rule);
        return $reflectionClass->newInstance();
    }
    
    protected function invokeRuleEntryPoint($obj, $args)
    {
        $argsInArray = array($args);
        $argsReturnValues = true;
        $argsLoopRan = false;
        
        //Loop through args so each arg is fired individually to be validateda
        foreach ($args as $argValue) {
            $argsLoopRan = true;
            
            if (! call_user_func_array(array($obj, RULE_ENTRY_POINT), array($argValue))) {
                $argsReturnValues = false;
            }
        }
        
        //Check if there were no arguments provided to the rule and trigger exception
        if (! $argsLoopRan) {
           throw new CantEscapeException("No arguments were provided");
        }
        
        return $argsReturnValues;
    }
}