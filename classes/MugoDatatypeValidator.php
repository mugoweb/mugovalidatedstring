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
    /**
     * used for error messages
     */
    protected $ContentObjectAttribute;

    function __construct( $validationType = null )
    {
        $this->setValidationType( $validationType );
    }

    /**
     * This function sets the contentObjectAttribute that will be used to set
     * error messages from inside this function.
     * @param type $ContentObjectAttribute
     */
    function setContentObjectAttribute(&$ContentObjectAttribute )
    {
        $this->ContentObjectAttribute = $ContentObjectAttribute;
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
            $this->ContentObjectAttribute->setValidationError( "Unknown error occurred. Please contact your site administrator." );
            return eZInputValidator::STATE_INVALID;
        }
        if( !$this->validationType->validate( $text ) )
        {
            $this->ContentObjectAttribute->setValidationError( $this->validationType->getErrorMessage() );
            return eZInputValidator::STATE_INVALID;
        }

        return eZInputValidator::STATE_ACCEPTED;
    }

}

?>
