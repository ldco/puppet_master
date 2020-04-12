<title>SDK PUPPET MASTER</title>
<link rel="stylesheet" href="css.css">
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
<script src="js.js"></script>





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
            <input type="submit" id="submit_git">
        </div>

        <div class="sdk_control_item">
            <label>icons color</label>
            <input type="text" name="gitcom">
            <label>to</label>
            <input type="text" name="gitto">
            <input type="submit">
        </div>
        <div class="sdk_control_item">
            <label>hash password</label>
            <input type="text" value="" name="pass" id="">
            <input type="submit">
            <span id="sdk_hashedpassword"></span>
        </div>

        <div class="sdk_control_item">
            <label>deploy</label>
            <select name="ftp">
                <option>init (dist + vendor)</option>
                <option>dist</option>
                <option>vendor</option>
                <option>css</option>
                <option>js</option>
                <option>assets</option>
            </select>
            <input type="submit">
        </div>
        <div class="sdk_control_item">
            <label>kill php</label>
            <input type="submit">
        </div>
    </div>
    <div class="sdk_control_second">
        <div class="sdk_control_item">
            <label>commands</label>
            <select name="commands">
                <option>git add .</option>
                <option>ls</option>
                <option>npm i</option>
                <option>composer i</option>
            </select>
            <input type="submit" id="coms">
        </div>
        <div class="sdk_control_item">
            <label>command</label>
            <textarea cols="30" rows="8" name="com"></textarea>
            <input type="submit" id="com">
        </div>

        <div class="sdk_control_item">
            <label>npm script</label>
            <input type="text" name="npm">
            <input type="submit">
        </div>

        <div class="sdk_control_item">
            <label>sh script</label>
            <input type="text" name="sh">
            <input type="submit" id="sh">
        </div>

    </div>
</div>


<div id="sdk_terminal">

</div>
<canvas id="c"></canvas>



</div>


<script src="matrix.js"></script>