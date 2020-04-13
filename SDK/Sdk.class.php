<?php


class Sdk
{



    public function __construct($item)

    {
        echo "<div class='sdk_control_item' id='" . $this->item . "'>";
    }
    public function input($label, $type, $name, $value = "", $id = "", $class = "", $disabled = false, $checked = false, $required = false)
    {
        if ($class) {
            $_class = $class;
        }
        if ($disabled) {
            $_disabled = $disabled;
        }
        if ($checked) {
            $_checked = $checked;
        }
        if ($required) {
            $_required = $required;
        }


        echo  "<label> $label</label>";
        echo "<input type='$type' name='$name' value='$value' id='$id' class='$_class'" . $_disabled . " " . $_checked . " " . $_required . ">";
    }

    public function textarea($cols, $rows, $name, $value = "", $id = "", $class = "", $disabled = false, $required = false)
    {
        if ($class) {
            $_class = $class;
        }
        if ($disabled) {
            $_disabled = $disabled;
        }

        if ($required) {
            $_required = $required;
        }

        echo "<textarea cols='$cols' rows='$rows' name='$name' value=' $value' id='$id' class='$_class' " .  $_disabled .  " " . $_required . "></textarea>";
    }
    public function select($options = array(), $name, $value = "", $id = "", $class = "", $disabled = false, $required = false)
    {
        if ($class) {
            $_class = $class;
        }
        if ($disabled) {
            $_disabled = $disabled;
        }

        if ($required) {
            $_required = $required;
        }

        echo "<select name='$name' value=' $value' id='$id' class='$_class' " .  $_disabled .  " " . $_required . ">";
        foreach ($options as $key => $value) {

            echo "<option>$value</option>";
        }

        echo "</select>";
    }

    public function submit($id)
    {
        echo "<input type='submit' id='" . $id . "'>";
        echo "</div>";
    }
}
