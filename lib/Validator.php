<?php
namespace CantEscape;

use CantEscape\Exception\CantEscapeException as CantEscapeException;

include "/Rules.php";
include "/CantEscapeExceptions.php";

class Validator extends Rules
{
    private $validationOk = "";
    private $validationBrief = array();
    
    /**
    * Entry point for all calls to the validator rules
    * Objects of requested rules will be created adhoc and their response evaluated
    */
    public function __call($rule, $args)
    {
        try {
            $this->bootstrapValidation($rule, $args);
            return $this;
        } catch (CantEscapeException $e) {
            $this->exceptionHandle($e);
            return $this;
        }
    }
    
    /**
    * Starts the validation
    */
    private function bootstrapValidation($rule, $args)
    {
        //Get the rule file
        $this->getRule($rule);

        //Create new instance of the rule
        $ruleObject = $this->getRuleObject($rule);
        
        //Target the rule's entry point
        $rulesResponse = $this->invokeRuleEntryPoint($ruleObject, $args);
        
        //Record the validation result
        $this->recordValidationResult($rule, $args, $rulesResponse);
    }
    
    /**
    * Records the response twice, first as $validationOk which shows the overall
    * pass or fail of chained validations and as $validationBrief for use by
    * the debrief() terminating method to show a detailed overview of the
    * responses given
    */
    private function recordValidationResult($rule, $args, $rulesResponse)
    {
        if ($rulesResponse === true && ($this->validationOk === "" || $this->validationOk === true)) {
            $this->validationOk = true;
        } else {
            $this->validationOk = false;
        }
        
        array_push($this->validationBrief, array("rule" => $rule, "args" => $args, "validationPass" => $rulesResponse));
    }
    
    /**
    * Cleans the validation buffer for the next time
    */
    private function cleanupValidationResults()
    {
        $this->validationOk = "";
        $this->validationBrief = array();
    }
    
    /**
    * This terminating method checks if all validation rules passed their tests
    */
    public function is()
    {
        return $this->terminatingMethodClosedown();
    }
    
    /**
    * This terminating method checks if all validation rules failed their tests
    */
    public function not()
    {
        return $this->terminatingMethodClosedown(true);
    }
    
    /**
    * This terminating method provides detailed overview of each phase of the
    * validation chain and shows which arguments passed and which failed
    */
    public function debrief()
    {
        $this->validationBrief["chainValidationPass"] = $this->validationOk;
        $validationBrief = $this->validationBrief;
        $this->terminatingMethodClosedown();
        return $validationBrief;
    }
    
    /**
    * Used by the terminating methods to run the cleanup method and return the
    * correct outcome
    * @bool $flipReturn Set to true to return the reverse response, default is false
    */
    private function terminatingMethodClosedown($flipReturn = false)
    {
        $validationResult = $this->validationOk;
        $this->cleanupValidationResults();
        if ($flipReturn === false) {
            return $validationResult;
        } elseif ($flipReturn === true) {
            return ($validationResult) ? false : true;
        }
    }
    
    /**
    * Accepts all exceptions to unify the response back to the user
    */
    private function exceptionHandle($e)
    {
        $this->validationOk = false;
        $this->recordValidationResult("MethodError", array(), false);
        echo "CantEscape Validation Error: " . $e->getMessage();
    }
}