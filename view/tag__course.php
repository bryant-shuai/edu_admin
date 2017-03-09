<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta content="telephone=no,email=no" name="format-detection" />
    <meta content="maximum-dpr=2" name="flexible" />
    <meta content="modeName=750-12" name="grid" />
    <script src="/rem_files/flexible_css.debug.js"></script>
    <script src="/rem_files/flexible.debug.js"></script>
    <script src="/rem_files/makegrid.debug.js"></script>
    <title>lib.flexible - 移动端自适应方案</title>
    <style type="text/css">
    html {
        width: 100%;
    }

    .grid > div,.grid-thin > div,.grid-fat > div {
        margin-bottom: 0.3rem;
        text-align: center;
        color: #fff;
    }
    
    div[class^="col-"] > div {
        margin-top: 0.04rem;
    }

    .grid>div {
        background-color: rgba(242,234,255,0.8);
        background-color: rgba(96,125,255,0.85);
    }
    .grid-thin>div {
        background-color: rgba(241,149,36,0.85);
    }
    .grid-fat>div {
        background-color: rgba(228,80,66,0.85);
        outline: 1px dashed #333;
    }
    .grid-fat-wrap .bg>div {
        outline: 1px solid #fff;
    }
    .grid-thin-wrap, .grid-wrap, .grid-fat-wrap {
        position: relative;
        background-color: rgba(241,149,36, 0.2);
        background-color: rgba(0,0,0, 0.05);
        padding-top: 0.4rem;
    }

    .grid-thin-wrap .bg,.grid-wrap .bg,.grid-fat-wrap .bg {
        position: absolute;
        z-index: -1;
        top: 0;
    }

    .grid-thin-wrap .bg > div[class^="col-"],
    .grid-wrap .bg > div[class^="col-"],
    .grid-fat-wrap .bg > div[class^="col-"]{
        height: 14.7rem;
    }

    .grid-thin-wrap .bg>div,
    .grid-wrap .bg>div,
    .grid-fat-wrap .bg>div{
        background-color: rgba(0,0,0, 0.15);
    }

    .global button{
        width: 3.2rem;
        padding: 0.1rem 0;
        margin: 0.1rem;
        font-size: inherit;
    }

    .grid-config {
        margin-bottom: 0.2rem;
    }

    .grid-config label{
        display: inline-block;
        padding: 0.4rem 0;
        width: 5rem;
        text-align: right;
        font-size: inherit;
    }

    .grid-config input {
        display: inline-block;
        font-size: inherit;
    }

    .grid-config button {
        display: block;
        width: 2rem;
        padding: 0.1rem;
        font-size: inherit;
        margin: auto;
    }

    [data-dpr="1"] .grid-config, [data-dpr="1"] .global{
        font-size: 12px;
    }
    [data-dpr="2"] .grid-config, [data-dpr="2"] .global{
        font-size: 24px;
    }
    [data-dpr="3"] .grid-config, [data-dpr="3"] .global{
        font-size: 36px;
    }
    </style>
</head>
<body>
<div class="global">
    <button data-grid-mode="750-12">750/12列方案</button>
    <button data-grid-mode="750-6">750/6列方案</button>
    <button data-grid-mode="640-12">640/12列方案</button>
    <button data-grid-mode="640-6">640/6列方案</button>
</div>
<div class="grid-config">
    <div><label>设计稿宽度（单位为：px）</label><input name="designWidth" value="750"></div>
    <div><label>最小单位（单位为：px）</label><input name="designUnit" value="6"></div>
    <div><label>列数（单位为：列）</label><input name="columnCount" value="12"></div>
    <div><label>列宽（单位为：a）</label><input name="columnXUnit" value="7"></div>
    <div><label>列间距（单位为：a）</label><input name="gutterXUnit" value="3"></div>
    <div><label>边距（单位为：a）</label><input name="edgeXUnit" value="4"></div>
    <div><button id="render">渲染</button></div>
</div>
<div class="grid-wrap"></div>
<script type="text/template" id="grid-html">
    <div class="grid">
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
    </div>
    <div class="grid">
        <div class="col-3"><div class="info"></div><div class="a"></div></div>
        <div class="col-3"><div class="info"></div><div class="a"></div></div>
        <div class="col-3"><div class="info"></div><div class="a"></div></div>
        <div class="col-3"><div class="info"></div><div class="a"></div></div>
    </div> 

    <div class="grid">
        <div class="col-4"><div class="info"></div><div class="a"></div></div>
        <div class="col-4"><div class="info"></div><div class="a"></div></div>
        <div class="col-4"><div class="info"></div><div class="a"></div></div>
    </div>

    <div class="grid">
        <div class="col-6"><div class="info"></div><div class="a"></div></div>
        <div class="col-6"><div class="info"></div><div class="a"></div></div>
    </div>

    <div class="grid">
        <div class="col-12"><div class="info"></div><div class="a"></div></div>
    </div>

    <div class="grid">
        <div class="col-11"><div class="info"></div><div class="a"></div></div>
        <div class="col-1"><div class="info"></div><div class="a"></div></div>
    </div>

    <div class="grid">
        <div class="col-10"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
    </div>
    
    <div class="grid">
        <div class="col-5"><div class="info"></div><div class="a"></div></div>
        <div class="col-5"><div class="info"></div><div class="a"></div></div>
        <div class="col-2"><div class="info"></div><div class="a"></div></div>
    </div>
    <div class="grid">
        <div class="col-9"><div class="info"></div><div class="a"></div></div>
        <div class="col-3"><div class="info"></div><div class="a"></div></div>
    </div>
    <div class="grid">
        <div class="col-8"><div class="info"></div><div class="a"></div></div>
        <div class="col-4"><div class="info"></div><div class="a"></div></div>
    </div>
    <div class="grid">
        <div class="col-7"><div class="info"></div><div class="a"></div></div>
        <div class="col-5"><div class="info"></div><div class="a"></div></div>
    </div>
    <div class="grid bg">
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-1"></div>
    </div>
</script>
<script>
    function fillHtml() {
        var html = document.querySelector('#grid-html').innerHTML;
        var wrap = document.querySelector('.grid-wrap');
        wrap.innerHTML = html;
        var params = lib.flexible.gridParams;

        for (var i = 1; i <= params.columnCount; i++) {
            (function(j) {
                Array.prototype.slice.call(wrap.querySelectorAll('.grid .col-' + j)).forEach(function(el) {
                    var info = el.querySelector('.info');
                    var a = el.querySelector('.a');
                    if (info) {
                        info.innerHTML = 'c' + j;
                    }
                    if (a) {
                        a.innerHTML = (params.columnXUnit * j + params.gutterXUnit * (j - 1)) + 'a';
                    }
                });
            })(i);
        }
    }

    document.querySelector('.global').addEventListener('click', function(e) {
        var target = e.target;
        if (target.tagName.toUpperCase() === 'BUTTON') {
            var modeName = target.getAttribute('data-grid-mode');

            lib.flexible.makeGridMode(modeName);
            var params = lib.flexible.gridParams;
            for (var key in params) {
                document.querySelector('.grid-config input[name="' + key+ '"]').value = params[key];
            }
            fillHtml();
        }
    });

    document.querySelector('#render').addEventListener('click', function() {
        var designWidth = parseFloat(document.querySelector('.grid-config input[name="designWidth"]').value);
        var designUnit = parseFloat(document.querySelector('.grid-config input[name="designUnit"]').value);
        var columnCount = parseFloat(document.querySelector('.grid-config input[name="columnCount"]').value);
        var columnXUnit = parseFloat(document.querySelector('.grid-config input[name="columnXUnit"]').value);
        var gutterXUnit = parseFloat(document.querySelector('.grid-config input[name="gutterXUnit"]').value);
        var edgeXUnit = parseFloat(document.querySelector('.grid-config input[name="edgeXUnit"]').value);

        lib.flexible.makeGrid({
            designWidth: designWidth,
            designUnit: designUnit,
            columnCount: columnCount,
            columnXUnit: columnXUnit,
            gutterXUnit: gutterXUnit,
            edgeXUnit: edgeXUnit
        });
        fillHtml();
    }, false);

    fillHtml();
</script>
</body>
</html>

