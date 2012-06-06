{* Validation Type. *}
{def $validation_options        = ezini("Validation", "ValidationTypes", "mugodatatypes.ini")}
{def $validation_descriptions   = ezini("Validation", "ValidationTypesDescriptions", "mugodatatypes.ini")}
<div class="block">
    <label>{'Validation Type'|i18n( 'mugovalidatedstring' )}:</label>
    <div class="labelbreak"></div>
    <select name="ContentClass_mugovalidatedstring_validation_type_{$class_attribute.id}">
        {foreach $validation_options as $option}
        <option value="{$option}"
                {section show=eq($class_attribute.data_text2,$option)}selected{/section}>
            {$validation_descriptions.$option}
        </option>
        {/foreach}
    </select>
</div>
{* Default value. *}
<div class="block">
    <label>{'Default value'|i18n( 'design/standard/class/datatype' )}:</label>
    <input class="box" type="text" name="ContentClass_mugovalidatedstring_default_value_{$class_attribute.id}" value="{$class_attribute.data_text1|wash}" size="30" maxlength="50" />
</div>

{* Maximum string length. *}
<div class="block">
    <label>{'Max string length'|i18n( 'design/standard/class/datatype' )}:</label>
    <input type="text" name="ContentClass_mugovalidatedstring_max_string_length_{$class_attribute.id}" value="{$class_attribute.data_int1}" size="5" maxlength="5" />&nbsp;{'characters'|i18n( 'design/standard/class/datatype' )}
</div>
