{def $validation_options = ezini("Validation", "ValidationTypesDescriptions", "mugodatatypes.ini")}
<div class="block">
    <div class="element">
        <label>{'Validation Type'|i18n( 'mugovalidatedstring' )}:</label>
        {if is_set( $validation_options[$class_attribute.data_text2] )}
            <p>{$validation_options[$class_attribute.data_text2]|wash()}</p>
        {else}
            <p><i>{'Not Set'|i18n( 'mugovalidatedstring' )}</i></p>
        {/if}
    </div>

    <div class="element">
        <label>{'Default value'|i18n( 'design/standard/class/datatype' )}:</label>
        {if $class_attribute.data_text1}
            <p>{$class_attribute.data_text1|wash}</p>
        {else}
            <p><i>{'Empty'|i18n( 'design/standard/class/datatype' )}</i></p>
        {/if}
    </div>

    <div class="element">
        <label>{'Max string length'|i18n( 'design/standard/class/datatype' )}:</label>
        <p>{$class_attribute.data_int1}&nbsp;{'characters'|i18n( 'design/standard/class/datatype' )}</p>
    </div>

</div>
