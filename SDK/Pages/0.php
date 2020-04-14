<?php require_once "php/Sdk.class.php";

?>
<div id="blockA">
    <div id="sdktitle">PUPPET MASTER SDK</div>
    <div id="sdk_control">

        <div class="sdk_control_main">
            <div class="sdk_control_item">
                <label>git commit</label>
                <input type="text" disabled name="gitcom">
                <label>to</label>
                <input type="text" disabled name="gitto">
                <label>master</label>
                <input type="checkbox" checked name="gitmaster">
                <label>self</label>
                <input type="checkbox" checked name="gitself">
                <input type="submit" id="git">
            </div>
            <div class="sdk_control_item">
                <label>icons color</label>
                <input type="color" name="colorfrom">
                <label>to</label>
                <input type="color" name="colorto">
                <input type="submit" id="color">
            </div>
            <div class="sdk_control_item">
                <label>hash password</label>
                <input type="text" value="" name="pass" autocomplete="off">
                <input type="submit" id="pass">
            </div>
            <div class="sdk_control_item">
                <label>deploy</label>
                <select name="deploy">
                    <option>init (all included vendor)</option>
                    <option>dist (all except vendor)</option>
                    <option>assets (only assets)</option>
                    <option>noassets (all exept assets)</option>
                    <option>www (js + css)</option>
                </select>
                <input type="submit" id="deploy">
            </div>
        </div>
        <div class="sdk_control_second">
            <div class="sdk_control_item">
                <label>commands</label>
                <select name="coms">
                    <option>git add .</option>
                    <option>ls</option>
                    <option>npm i</option>
                    <option>composer i</option>
                </select>
                <input type="submit" id="coms">
            </div>
            <div class="sdk_control_item">
                <label>command</label>
                <textarea cols="40" rows="4" name="com"></textarea>
                <input type="submit" id="com">
            </div>
            <div class="sdk_control_item">
                <label>npm script</label>
                <input type="text" name="npm">
                <input type="submit" id="npm">
            </div>
            <div class="sdk_control_item">
                <label>sh script</label>
                <input type="text" name="sh">
                <input type="submit" id="sh">
            </div>
        </div>
    </div>
</div>


<div id="blockB">
    <div id="sdk_terminal"></div>
    <canvas id="terminalCanvas"></canvas>
</div>

</div>