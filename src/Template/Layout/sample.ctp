<!DOCTYPE html>
<html = "ja">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->css('/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('mystyles.css') ?>
    <title>ダイアリー</title>
    <?= $this->Html->script('/js/jquery-3.1.1.min.js', ['block' => true]) ?>
    <?= $this->Html->script('/bootstrap/js/bootstrap.min.js', ['block' => true]) ?>
    
</head>
<body>
    <a href= "/posts"><header>
        <div><span>M</span>y<span>D</span>iary</div>

    </header></a>
    <canvas id= "mycanvas"></canvas>
    <div class= "container">
    <?= $this->fetch('content') ?>
    <!--
        <div class= "row">
            <div class= "col-sm-3" id= "side-left">
                <div id= "content">
                   <p> <i class= "glyphicon glyphicon-tag"></i> profile</p>
                   <p><img src= "img/cake.icon.png" width= "80" height= "80">  Name</p>
                   <ul>
                       <li>性別 : </li>
                       <li>誕生日 : </li>
                       <li>血液型 : </li>
                       <li>地域 : </li>
                   </ul>
                </div>
            </div>
            <div class= "col-sm-6" id= "main" style= "background:green;"><?= $this->fetch('content') ?></div>
            <div class= "col-sm3" style= "background:pink;">
                カテゴリー一覧

            </div>
        </div>
        -->
    </div>
    
    <script>
        window.onload = function(){
            draw();
        }
        function draw(){
            var canvas = document.getElementById('mycanvas');
            if(!canvas || !canvas.getContext) return false;
            ctx = canvas.getContext('2d');
            for(var i = 0;i < 120;i++){
                var x = Math.floor(Math.random() * canvas.width);
                var y = Math.floor(Math.random() * canvas.height);
                var r = Math.floor(Math.random() * 20);

                var color = "hsla(" + rand360() + "," + rand50gt() + "%," + rand50gt() + "%," + 0.2 + ")";
                ctx.fillStyle = color;
                ctx.strokeStyle = color;
                ctx.beginPath();
                ctx.arc(x,y,r,0,2*Math.PI);
                ctx.stroke();
                ctx.fill();
            }
        }
        function rand360(){
            return Math.floor(Math.random() * 361);
        }
        function rand50gt(){
            return 50 + Math.floor(Math.random() * 51);
        }
    </script>
    
</body>
</html>