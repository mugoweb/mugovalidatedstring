<?php
/**
 * Is used to execute the validation on the mugovalidatedstring eZ Publish
 * datatype. It uses the custom MugoValidationType php class to run
 * the validation.
 *
 * @author mugodev
 */
class MugoDatatypeValidator
{
    /**
     * @var MugoValidationType
     */
    protected $validationType;

    protected $errorMessage;

    function __construct( $validationType = null )
    {
        $this->setValidationType( $validationType );
    }

    function setValidationType( $validationType )
    {
        if($validationType != null)
        {
            $iniSettings                = ezINI::instance( "mugodatatypes.ini" );
            $validationTypeClassArray   = $iniSettings->variable( "Validation", "ValidationTypesClasses" );
            $validationTypeClass        = $validationTypeClassArray[$validationType];
            $this->validationType   = new $validationTypeClass();
        }
    }

    function validate( $text )
    {
        if( $this->validationType == null )
        {
            $this->errorMessage = ezpI18n::tr( "mugovalidatedstring", "Unknown error occurred. Please contact your site administrator." );
            return eZInputValidator::STATE_INVALID;
        }
        if( !$this->validationType->validate( $text ) )
        {
            $this->errorMessage = $this->validationType->getErrorMessage();
            return eZInputValidator::STATE_INVALID;
        }

        $this->errorMessage = null;
        return eZInputValidator::STATE_ACCEPTED;
    }

    function getErrorMessage()
    {
        return $this->errorMessage;
    }

}

?>
