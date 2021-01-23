<?php
require_once "../../config.ini.php";

require_once "php/Sdk.class.php";

if (PM_IS_DEV) :
    $siteurl = "https://" . REMOTE . "/PM_DEV";
else :
    $siteurl =  "https://" . REMOTE;
endif;

?>
<canvas id="terminalCanvas"></canvas>
<div id="blockA">
    <div id="sdktitle">PUPPET MASTER SDK</div>
    <div id="sdk_control">

        <div id="sdk_control_zero">

            <div class="sdk_control_item">
                <input type="submit" id="check_ftp" value="1. check ftp connection" name="check_ftp">
            </div>
            <div class="sdk_control_item">
                <input type="submit" id="createpmdev" name="createpmdev" value="2. create pm_dev folder on ftp">
            </div>
            <div class="sdk_control_item">
                <input type="submit" id="dep_init" value="3. deploy initial" name="dep_init">
            </div>
            <div class="sdk_control_item">
                <a target="blanc" href="<?= $siteurl ?>">
                    <input type="submit" id="gotosite" name="gotosite" value="4. go to working site"> </a>
            </div>

        </div>


        <div id="sdk_control_main">

            <div class="sdk_control_item">
                <label for="_gitcom">git commit</label><br>
                <input type="text" id="_gitcom" name="gitcom">
                <label for="_gitto">to</label>
                <input type="text" disabled id="_gitto" name="gitto">
                <div class="checkbox">

                    <input type="checkbox" id="_gitself" name="gitself">
                    <label for="_gitself">self</label>
                </div>
                <div class="checkbox">

                    <input type="checkbox" checked id="_gitmaster" name="gitmaster">
                    <label for="_gitmaster">master</label>
                </div>

                <input type="submit" id="git">
            </div>
            <div class="sdk_control_item">
                <input type="submit" id="git_store_pass" value="git store pass" name="store_pass">
            </div>

            <div class="sdk_control_item">
                <label for="_colorfrom">icons color</label>
                <input type="color" id="_colorfrom" name="colorfrom">
                <label for="_colorto">to</label>
                <input type="color" id="_colorto" name="colorto">
                <input type="submit" id="color">
            </div>
            <div class="sdk_control_item">
                <label for="_pass">hash password</label>
                <input type="text" value="" id="_pass" name="pass" autocomplete="off">
                <input type="submit" id="pass">
            </div>

            <div class="sdk_control_item">
                <label for="_deploy">deploy</label>
                <select id="_deploy" name="deploy">
                    <option value="www">www (js, css)</option>
                    <option value="dist">dist (no vendor)</option>
                    <option value="assets">assets (only assets)</option>
                    <option value="noassets">no assets (dist no assets)</option>
                    <option value="upgrade">upgrade (only vendor)</option>
                </select>
                <input type="submit" id="deploy">
            </div>
        </div>

        <div id="sdk_control_second">
            <div class="sdk_control_item">
                <label for="_coms">commands</label>
                <select id="_coms" name="coms">
                    <option>git add .</option>
                    <option>ls</option>
                    <option>npm i</option>
                    <option>composer i</option>
                </select>
                <input type="submit" id="coms">
            </div>
            <div class="sdk_control_item">
                <label for="_com">command</label>
                <textarea cols="40" rows="1" id="_com" name="com"></textarea>
                <input type="submit" id="com">
            </div>
            <div class="sdk_control_item">
                <label for="_npm">npm script</label>
                <input type="text" id="_npm" name="npm">
                <input type="submit" id="npm">
            </div>
            <div class="sdk_control_item">
                <label for="_sh">sh script</label>
                <input type="text" id="_sh" name="sh">
                <input type="submit" id="sh">
            </div>
        </div>
    </div>
</div>


<div id="blockB">
    <div id="sdk_terminal"></div>

</div>

</div>